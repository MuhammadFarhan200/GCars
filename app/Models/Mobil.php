<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
