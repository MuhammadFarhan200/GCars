<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobil;

class PenggunaController extends Controller
{
    public function index() {
        $mobils = Mobil::limit(6)->get();
        return view('index', compact('mobils'));
    }

    public function mobil()
    {
        $mobils = Mobil::all();
        return view('pages.mobil.index', compact('mobils'));
    }

    public function detailMobil(Mobil $mobil)
    {
        $title = $mobil->merek->nama . ' ' . $mobil->tipe . ' ' . $mobil->tahun_keluar;
        return view('pages.mobil.show', [
            'title' => $title,
            'mobil' => $mobil,
        ]);
    }
}
