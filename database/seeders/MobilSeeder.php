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
            'slug' => 'toyota-kijang-innova-v-2-4',
            'tipe' => 'KIJANG INNOVA V 2.4',
            'tahun_keluar' => 2019,
            'warna' => 'Grey',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa mollitia ullam voluptates tempora aliquam sed deleniti, commodi eaque optio laboriosam illo nam placeat a amet sunt rem! Provident, beatae dolorum.',
            'harga' => 389000000,
            'status' => 'tersedia',
        ]);

        Mobil::create([
            'id_merek' => 3,
            'slug' => 'mazda-cx-9-2-5',
            'tipe' => 'Mazda CX-9 2.5',
            'tahun_keluar' => 2018,
            'warna' => 'Black',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa mollitia ullam voluptates tempora aliquam sed deleniti, commodi eaque optio laboriosam illo nam placeat a amet sunt rem! Provident, beatae dolorum.',
            'harga' => 554000000,
            'status' => 'tersedia',
        ]);

        Mobil::create([
            'id_merek' => 8,
            'slug' => 'mitsubishi-xpander-sport-1-5',
            'tipe' => 'XPANDER SPORT 1.5',
            'tahun_keluar' => 2018,
            'warna' => 'Silver',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa mollitia ullam voluptates tempora aliquam sed deleniti, commodi eaque optio laboriosam illo nam placeat a amet sunt rem! Provident, beatae dolorum.',
            'harga' => 219000000,
            'status' => 'tersedia',
        ]);

        Mobil::create([
            'id_merek' => 2,
            'slug' => 'honda-mobilio-e--1-5',
            'tipe' => 'MOBILIO E 1.5',
            'tahun_keluar' => 2019,
            'warna' => 'Silver',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa mollitia ullam voluptates tempora aliquam sed deleniti, commodi eaque optio laboriosam illo nam placeat a amet sunt rem! Provident, beatae dolorum.',
            'harga' => 204000000,
            'status' => 'tersedia',
        ]);

        Mobil::create([
            'id_merek' => 5,
            'slug' => 'nissan-livina-vl-1-5',
            'tipe' => 'LIVINA VL 1.5',
            'tahun_keluar' => 2019,
            'warna' => 'Grey',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa mollitia ullam voluptates tempora aliquam sed deleniti, commodi eaque optio laboriosam illo nam placeat a amet sunt rem! Provident, beatae dolorum.',
            'harga' => 218000000,
            'status' => 'tersedia',
        ]);

        Mobil::create([
            'id_merek' => 11,
            'slug' => 'suzuki-xl7-beta-1-5',
            'tipe' => 'XL7 BETA 1.5',
            'tahun_keluar' => 2020,
            'warna' => 'White',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa mollitia ullam voluptates tempora aliquam sed deleniti, commodi eaque optio laboriosam illo nam placeat a amet sunt rem! Provident, beatae dolorum.',
            'harga' => 214000000,
            'status' => 'tersedia',
        ]);
    }
}
