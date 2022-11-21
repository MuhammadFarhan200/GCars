<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\GambarMobilController;
use App\Http\Controllers\PenggunaController;

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

Route::get('/', [PenggunaController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/errors', function () {
    return view('errors.403');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::resource('merek', MerekController::class);
    Route::resource('mobil', MobilController::class);
    Route::get('mobil/{id}/tambah-gambar', [GambarMobilController::class, 'index'])->name('tambahGambar.index');
    Route::post('mobil/{id}/tambah-gambar', [GambarMobilController::class, 'store'])->name('tambahGambar.store');
    Route::post('gambar/{id}/hapus-gambar', [GambarMobilController::class, 'destroy'])->name('tambahGambar.destroy');
});
