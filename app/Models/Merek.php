<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class Merek extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function mobil()
    {
        return $this->hasMany(Mobil::class, 'id_merek');
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($merek) {
            // Mengecek Apakah Merke Memiliki Mobil
            if ($merek->mobil->count() > 0) {
                Alert::html('Gagal Mengapus!', 'Tidak dapat menghapus merek <b>' . $merek->nama . '</b>, masih ada mobil dengan merek ini.', 'error')->autoClose(false);
                return false;
            }
            Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose();
        });
    }
}
