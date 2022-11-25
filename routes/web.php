<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GambarMobilController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PesananContoller;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

Route::get('/errors', function () {
    return view('errors.403');
});

Route::get('/', [PenggunaController::class, 'index']);

Route::get('/mobil', [PenggunaController::class, 'mobil']);

Route::get('/mobil/{mobil:slug}', [PenggunaController::class, 'detailMobil']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::get('profile/{user:username}', [AdminController::class, 'profile'])->name('admin.profile.index');

    Route::get('profile/{user:username}/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');

    Route::put('profile/{user:username}/edit', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    Route::resource('merek', MerekController::class);

    Route::resource('mobil', MobilController::class);

    Route::resource('pemesanan', PesananContoller::class);

    Route::resource('transaksi', TransaksiController::class);

    Route::get('mobil/{id}/gambar', [GambarMobilController::class, 'index'])->name('tambahGambar.index');

    Route::post('mobil/{id}/gambar', [GambarMobilController::class, 'store'])->name('tambahGambar.store');

    Route::post('gambar/{id}/hapus', [GambarMobilController::class, 'destroy'])->name('tambahGambar.destroy');
});

Route::get('test-front-template', function () {
    return view('layouts.main');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
