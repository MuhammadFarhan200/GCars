<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role' => 'admin',
        ]);

        Role::create([
            'role' => 'pengguna',
        ]);

        $this->call([
            UserSeeder::class,
            MerekSeeder::class,
            MobilSeeder::class,
            PemesanSeeder::class,
            PesananSeeder::class,
        ]);
    }
}
