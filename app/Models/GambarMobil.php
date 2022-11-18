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
}
