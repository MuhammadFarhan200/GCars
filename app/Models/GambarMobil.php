<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarMobil extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

    public function image()
    {
        if ($this->gambar && file_exists(public_path('images/mobil/' . $this->gambar))) {
            return asset('images/mobil/' . $this->gambar);
        }

        return asset('images/mobil/default.png');
    }

    public function deleteImage()
    {
        if ($this->gambar && file_exists(public_path('images/mobil/' . $this->gambar))) {
            return unlink(public_path('images/mobil/' . $this->gambar));
        }
    }
}
