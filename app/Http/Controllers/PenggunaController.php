<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobil;
use App\Models\GambarMobil;
use App\Models\Pesanan;

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
        $gambar = GambarMobil::with('mobil')->where('id_mobil', $mobil->id)->get();
        $title = $mobil->merek->nama . ' ' . $mobil->tipe . ' ' . $mobil->tahun_keluar;
        $pesananAktif = Pesanan::where('id_mobil', $mobil->id)->get()->filter(fn($item) => $item->status_pesanan !== 'gagal');
        $isBooked = ($pesananAktif->count() > 0);
        return view('pages.mobil.show', compact('title', 'mobil', 'gambar', 'isBooked'));
    }

    public function order(Mobil $mobil)
    {
        $title = 'Isi Detail Pesanan';
        $pesananAktif = Pesanan::where('id_mobil', $mobil->id)->get()->filter(fn($item) => $item->status_pesanan !== 'gagal');
        $isBooked = ($pesananAktif->count() > 0);
        if ($isBooked) {
            return redirect('/');
        }
        if (auth()->user()->role->role === 'admin') {
            return redirect('/admin');
        }
        return view('pages.mobil.order', compact('title', 'mobil'));
    }

    public function createOrder()
    {

    }
}
