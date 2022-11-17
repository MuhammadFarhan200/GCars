<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Merek;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.mobil.index', [
            'mobils' => Mobil::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.mobil.create', [
            'mereks' => Merek::all(),
        ]);
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
            'id_merek' => 'required',
            'tipe' => 'required',
            'tahun_keluar' => 'required',
            'warna' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'status' => 'required',
        ];

        $message = [
            'id_merek.required' => 'Merek harus dipilih!',
            'tipe.required' => 'Tipe harus diisi!',
            'tahun_keluar.required' => 'Tahun keluar harus diisi!',
            'warna.required' => 'Warna harus diisi!',
            'deskripsi.required' => 'deskripsi harus diisi!',
            'harga.required' => 'harga harus diisi!',
            'status.required' => 'status harus diisi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('Oops!', 'Data yang anda input ada kesalahan!');
            return back()->withErrors($validation)->withInput();
        }

        $mobil = new Mobil();
        $mobil->id_merek = $request->id_merek;
        $mobil->tipe = $request->tipe;
        $mobil->tahun_keluar = $request->tahun_keluar;
        $mobil->warna = $request->warna;
        $mobil->deskripsi = $request->deskripsi;
        $mobil->harga = $request->harga;
        $mobil->status = $request->status;
        $mobil->save();
        Alert::success('Done', 'Data Mobil berhasil dibuat')->autoClose(2000);
        return redirect()->route('mobil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
