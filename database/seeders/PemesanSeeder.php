<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pemesan;

class PemesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pemesan::create([
            'id_user' => 2,
            'nama_lengkap' => 'Muhammad Farhan',
            'alamat_lengkap' => 'Kp. Cilebak Desa Rancamanyar Kec. Baleendah Kab. Bandung',
            'no_hp' => '08992538143',
        ]);
        Pemesan::create([
            'id_user' => 2,
            'nama_lengkap' => 'Riko',
            'alamat_lengkap' => 'Riko Mura',
            'no_hp' => '08983297362',
        ]);
    }
}
