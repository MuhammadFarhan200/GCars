<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'id_role' => 1,
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'foto_profil' => 'admin2.jpeg',
            'password' => Hash::make('admin123'),
        ]);
    }
}
