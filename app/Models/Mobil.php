<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class Mobil extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function merek()
    {
        return $this->belongsTo(Merek::class, 'id_merek');
    }
    public function gambar()
    {
        return $this->hasMany(GambarMobil::class, 'id_mobil');
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($mobil) {
            if ($mobil->pesanan->where('id_mobil', $mobil->id)->count() > 0) {
                Alert::html('Gagal Mengapus!', 'Tidak dapat menghapus mobil <b>' . $mobil->tipe . '</b> karena masih digunakan pada table pesanan.', 'error')->autoClose(false);
                return false;
            }
            if ($mobil->gambar->where('id_mobil', $mobil->id)) {
                $mobil->gambar->where('id_mobil', $mobil->id)->deleteImage();
            }
            Alert::success('Done', 'Data Mobil Berhasil Dihapus!')->autoClose();
        });
    }
}
