<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Merek;
use App\Models\Mobil;
use App\Models\Pesanan;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::user() || (Auth::user()->role->role !== 'admin')) return redirect('/login');

        $title = 'Dashboard';
        $jumlahMerek = Merek::all()->count();
        $jumlahMobil = Mobil::all()->count();
        $jumlahPengguna = User::where('id_role', 2)->get()->count();
        $jumlahPesanan = Pesanan::all()->count();

        return view('admin.pages.index', compact(
            'title',
            'jumlahMerek',
            'jumlahMobil',
            'jumlahPengguna',
            'jumlahPesanan'
        ));
    }

    public function profile()
    {
        return view('admin.pages.profile');
    }
}
