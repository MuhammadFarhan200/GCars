<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pesanan;
use Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allTransaksi = Transaksi::latest()->get();
        return view('admin.pages.transaksi.index', compact('allTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pesanan = Pesanan::all();
        return view('admin.pages.transaksi.create', compact('pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id_pesanan' => 'required',
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
            'status_transaksi' => 'required',
        ];

        $messages = [
            'id_pesanan.required' => 'Pesanan harus dipilih!',
            'tanggal_bayar.required' => 'Tanggal bayar harus diisi!',
            'total_bayar.required' => 'Total bayar harus diisi!',
            'status_transaksi.required' => 'Status Transaksi harus pilih!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('Oops!', 'Data yang anda input ada kesalahan!');
            return back()->withErrors($validation)->withInput();
        }

        $transaksi = new Transaksi();
        $transaksi->id_pesanan = $request->id_pesanan;
        $transaksi->tanggal_bayar = $request->tanggal_bayar;
        $transaksi->total_bayar = $request->total_bayar;
        $transaksi->status_transaksi = $request->status_transaksi;
        $transaksi->kode_transaksi = Str::random(12);
        $transaksi->save();
        Alert::success('Done!', 'Data Transaksi berhasil dibuat.');
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.pages.transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanan::all();
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.pages.transaksi.edit', compact('transaksi', 'pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'id_pesanan' => 'required',
            'tanggal_bayar' => 'required',
            'total_bayar' => 'nullable',
            'status_transaksi' => 'required',
        ];

        $messages = [
            'id_pesanan.required' => 'Pesanan harus dipilih!',
            'tanggal_bayar.required' => 'Tanggal bayar harus diisi!',
            'status_transaksi.required' => 'Status Transaksi harus pilih!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('Oops!', 'Data yang anda input ada kesalahan!');
            return back()->withErrors($validation)->withInput();
        }

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->id_pesanan = $request->id_pesanan;
        $transaksi->tanggal_bayar = $request->tanggal_bayar;
        $transaksi->total_bayar = $request->total_bayar;
        $transaksi->status_transaksi = $request->status_transaksi;
        $transaksi->kode_transaksi = $request->kode_transaksi;
        $transaksi->save();
        Alert::success('Done!', 'Data Transaksi berhasil diedit.');
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        Alert::success('Done!', 'Data Transaksi berhasil dihapus.');
        return redirect()->route('transaksi.index');
    }
}
