<?php

namespace App\Http\Controllers;

use App\Models\GambarMobil;
use App\Models\Mobil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GambarMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $mobil = Mobil::findOrFail($id);
        $gambar = GambarMobil::with('mobil')->where('id_mobil', $id)->get();
        return view('admin.pages.gambarMobil.index', compact('mobil', 'gambar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'id_mobil' => 'required',
            'gambar' => 'required|image',
        ]);

        $gambar = new GambarMobil();
        $gambar->id_mobil = $request->id_mobil;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/mobil/', $imageName);
            $gambar->gambar = $imageName;
        }
        $gambar->save();

        return response()->json(['status' => true, 'mesaage' => 'image(s) uploaded!']);
        // return $request->all();
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
        $gambar = GambarMobil::find($id);
        $gambar->deleteImage();
        $gambar->delete();
        $id_mobil = $gambar->mobil->id;
        Alert::success('Done!', 'Gambar berhasil dihapus')->autoClose();
        return redirect()->route('tambahGambar.index', $id_mobil);
    }
}
