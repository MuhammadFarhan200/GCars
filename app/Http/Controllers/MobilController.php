<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Merek;
use App\Models\GambarMobil;
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
            'mereks' => Merek::all()->sortBy('nama'),
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

        $messages = [
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
        $mobil->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $mobil->merek->nama . '-' . $mobil->tipe));
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
        $gambar = GambarMobil::with('mobil')->where('id_mobil', $id)->get();
        return view('admin.pages.mobil.show', [
            'mobil' => Mobil::findOrFail($id)->load('gambar'),
            'gambar' => $gambar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.mobil.edit', [
            'mobil' => Mobil::findOrFail($id),
            'mereks' => Merek::all()->sortBy('nama'),
        ]);
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
            'id_merek' => 'required',
            'tipe' => 'required',
            'tahun_keluar' => 'required',
            'warna' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'status' => 'required',
        ];

        $messages = [
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

        $mobil = Mobil::findOrFail($id);
        $mobil->id_merek = $request->id_merek;
        $mobil->tipe = $request->tipe;
        $mobil->slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $mobil->tipe));
        $mobil->tahun_keluar = $request->tahun_keluar;
        $mobil->warna = $request->warna;
        $mobil->deskripsi = $request->deskripsi;
        $mobil->harga = $request->harga;
        $mobil->status = $request->status;
        $mobil->save();
        Alert::success('Done', 'Data Mobil berhasil diedit')->autoClose(2000);
        return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Mobil::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Done', 'Data Mobil Berhasil Dihapus!')->autoClose();
        return redirect()->route('mobil.index');
    }
}
