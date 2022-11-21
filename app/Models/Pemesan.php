<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    public function pesanan()
    {
        return $this->hasMany(Pemesan::class, 'id_pemesan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user',);
    }
}
