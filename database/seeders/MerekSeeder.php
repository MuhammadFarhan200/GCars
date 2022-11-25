<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Merek;

class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merek::create([
            'nama' => 'Toyota',
            'slug' => 'toyota',
        ]);

        Merek::create([
            'nama' => 'Honda',
            'slug' => 'honda',
        ]);

        Merek::create([
            'nama' => 'Mazda',
            'slug' => 'mazda',
        ]);

        Merek::create([
            'nama' => 'Daihatsu',
            'slug' => 'daihatsu',
        ]);

        Merek::create([
            'nama' => 'Nissan',
            'slug' => 'nissan',
        ]);

        Merek::create([
            'nama' => 'Ford',
            'slug' => 'ford',
        ]);

        Merek::create([
            'nama' => 'Hyundai',
            'slug' => 'hyundai',
        ]);

        Merek::create([
            'nama' => 'Mitsubishi',
            'slug' => 'mitsubishi',
        ]);

        Merek::create([
            'nama' => 'Lexus',
            'slug' => 'lexus',
        ]);

        Merek::create([
            'nama' => 'Isuzu',
            'slug' => 'isuzu',
        ]);

        Merek::create([
            'nama' => 'Suzuki',
            'slug' => 'suzuki',
        ]);
    }
}
