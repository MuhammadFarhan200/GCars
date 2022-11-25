<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mobil;
use App\Models\Merek;
use App\Models\User;
use App\Models\GambarMobil;
use App\Models\Pesanan;
use App\Models\Pemesan;
use Validator;
use Alert;

class PenggunaController extends Controller
{
    public function index() {
        $mobils = Mobil::limit(6)->get();
        return view('index', compact('mobils'));
    }

    public function merek()
    {
        $mereks = Merek::all();
        return view('pages.mobil.merek', compact('mereks'));
    }

    public function mobil()
    {
        if (request('merek') && request('search')) {
            $merek = Merek::firstWhere('slug', request('merek'));
            $mobils = Mobil::whereHas('merek', function ($query) {
                $query->where('slug', request('search'));
            })->orWhere('tipe', 'like', '%' . request('search') . '%')
                ->orWhere('tahun_keluar', 'like', '%' . request('search') . '%')->get();
            $title = 'Hasil Pencarian Untuk ' . request('search') . ' Pada Merek ' . $merek->nama;
        } else if (request('merek')) {
            $merek = Merek::firstWhere('slug', request('merek'));
            $mobils = $merek->mobil;
            $title = 'Daftar Mobil Dengan Merek ' . $merek->nama;
        } else if (request('search')) {
            $title = 'Hasil Pencarian Untuk ' . request('search');
            $mobils = Mobil::where('tipe', 'like', '%' . request('search') . '%')
                ->orWhere('tahun_keluar', 'like', '%' . request('search') . '%')
                ->orWhereHas('merek', fn($query) => $query->where('nama', 'like', '%' . request('search') . '%'))->get();
        } else {
            $title = 'Daftar Seluruh Mobil';
            $mobils = Mobil::all();
        }
        return view('pages.mobil.index', compact('mobils', 'title'));
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
        if (!Auth::user()) {
            return redirect('/login');
        }
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

    public function createOrder(Request $request)
    {
        $rules = [
            'id_mobil' => 'required',
            'nama_lengkap' => 'required|max:255',
            'no_hp' => 'required',
            'alamat_lengkap' => 'required',
        ];

        $messages = [
            'nama_lengkap.required' => 'Nama lengkap harus diisi!',
            'no_hp.required' => 'Nomor handphone harus diisi!',
            'alamat_lengkap.required' => 'Alamat lengkap harus diisi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('Oops!', 'Data yang anda input ada kesalahan!');
            return back()->withErrors($validation)->withInput();
        }

        $pemesan = new Pemesan();
        $pemesan->id_user = auth()->user()->id;
        $pemesan->nama_lengkap = $request->nama_lengkap;
        $pemesan->no_hp = $request->no_hp;
        $pemesan->alamat_lengkap = $request->alamat_lengkap;
        $pemesan->save();

        date_default_timezone_set('Asia/Jakarta');

        $pesanan = new Pesanan();
        $pesanan->id_pemesan = $pemesan->id;
        $pesanan->id_mobil = $request->id_mobil;
        $pesanan->tanggal_pesan = date('Y-m-d');
        $pesanan->status_pesanan = 'tertunda';
        $pesanan->save();
        Alert::success('Done', 'Pesanan Berhasil Dibuat!')->autoClose(4000);
        return redirect('/pesanan/' . $pesanan->id);
    }

    public function orders()
    {
        if (auth()->user()->role->nama === 'admin') {
            return redirect('/admin');
        }

        $title = 'Daftar Pesananmu';
        $pemesan = Pemesan::where('id_user', auth()->user()->id)->get();

        if ($pemesan->count() < 1) {
            $filterPesanan = collect([]);
            return view('pages.pesanan.index', compact('title', 'filterPesanan'));
        }

        $pesanans = Pesanan::with('pemesan')->get();
        $filterPesanan = $pesanans->filter(function ($value) {
            return $value->pemesan->id_user == auth()->user()->id;
        });

        return view('pages.pesanan.index', compact('title', 'filterPesanan'));
    }

    public function orderDetail(Pesanan $pesanan)
    {
        if (auth()->user()->role->role === 'admin') {
            return redirect('/admin');
        }

        if ($pesanan->pemesan->id_user !== auth()->user()->id) {
            return redirect('/');
        }

        $title = 'Detail Pesanan';
        return view('pages.pesanan.show', compact('title', 'pesanan'));
    }

    public function profile(User $user)
    {
        $title = $user->username . ' (' . $user->name . ')';
        return view('pages.profile.index', compact('title', 'user'));
    }

    public function editProfile(User $user)
    {
        if (auth()->user()->role->nama === 'admin') {
            return redirect('/admin');
        }

        $title = 'Ubah profilmu';
        return view('pages.profile.edit', compact('title'));
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
        return redirect('/user/' . $user->username);
    }
}
