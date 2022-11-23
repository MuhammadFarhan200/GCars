<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Merek;
use App\Models\Mobil;
use App\Models\Pesanan;
use Validator;
use Alert;

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

    public function profile(User $user)
    {
        $title = 'Profile (' . $user->username . ')';
        return view('admin.pages.profile.index', compact('title', 'user'));
    }

    public function editProfile(User $user)
    {
        $title = 'Profile (' . $user->username . ') - Edit';
        return view('admin.pages.profile.edit', compact('title'));
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'username' => 'required|max:12',
            'foto_profil' => 'nullable|image',
        ];

        $messages = [
            'name.required' => 'Name harus diisi!',
            'name.max' => 'Username harus memiliki jumlah karakter maksimal 255',
            'username.required' => 'Username harus diisi!',
            'username.max' => 'Username harus memiliki jumlah karakter maksimal 12',
            'foto_profil.image' => 'Foto profil harus berbentuk .jpg atau .png',
        ];


        $user = User::find(auth()->user()->id);
        if ($request->username !== auth()->user()->username) {
            $validation = Validator::make($request->all(), $rules, $messages);
            if ($validation->fails()) {
                Alert::error('Oops!', 'Data yang anda input ada kesalahan!');
                return back()->withErrors($validation)->withInput();
            }
        }

        if ($request->hasFile('foto_profil')) {
            $image = $request->file('foto_profil');
            $imageName = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/user/', $imageName);
            $user->foto_profil = $imageName;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->save();
        Alert::success('Done!', 'Data Profilmu berhasil diedit.');
        return redirect()->route('admin.profile.index', $user->username);
    }
}
