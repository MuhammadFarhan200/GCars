<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mobil::create([
            'id_merek' => 1,
            'slug' => 'toyota-avanza-g',
            'tipe' => 'Avanza G',
            'tahun_keluar' => 2021,
            'warna' => 'Black',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa mollitia ullam voluptates tempora aliquam sed deleniti, commodi eaque optio laboriosam illo nam placeat a amet sunt rem! Provident, beatae dolorum.',
            'harga' => 455000000,
            'status' => 'tersedia',
        ]);

        Mobil::create([
            'id_merek' => 1,
            'slug' => 'toyota-rush-1-5-g-mt',
            'tipe' => 'Toyota Rush 1.5 G MT',
            'tahun_keluar' => 2020,
            'warna' => 'Silver',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa mollitia ullam voluptates tempora aliquam sed deleniti, commodi eaque optio laboriosam illo nam placeat a amet sunt rem! Provident, beatae dolorum.',
            'harga' => 240000000,
            'status' => 'tersedia',
        ]);
    }
}
