<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

    public function pemesan()
    {
        return $this->belongsTo(Pemesan::class, 'id_pemesan');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pesanan');
    }
}
