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
        $files = scandir(public_path('images'));
        $data = [];
        foreach ($files as $row) {
            if ($row != '.' && $row != '..') {
                $data[] = [
                    'name' => explode('.', $row)[0],
                    'url' => asset('images/' . $row),
                ];
            }
        }
        $mobil = Mobil::findOrFail($id);
        return view('admin.pages.gambarMobil.create', compact('data', 'mobil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambarMobil = new GambarMobil;
        $gambarMobil->id_mobil = $request->id_mobil;
        $image = $request->file('gambar');
        $imageName = rand(1000, 9999) . $image->getClientOriginalName();
        $image->move('images/mobil/', $imageName);
        $gambarMobil->gambar = $imageName;
        $gambarMobil->save();
        Alert::success('Done', 'Gambar berhasil ditambahkan')->autoClose();
        return redirect()->route('tambahGambar.index');
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
