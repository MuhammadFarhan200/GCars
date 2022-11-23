<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pesanan::create([
            'id_pemesan' => 1,
            'id_mobil' => 1,
            'tanggal_pesan' => \Carbon\Carbon::createFromDate(2022,11,23)->toDateTimeString(),
            'status_pesanan' => 'tertunda',
        ]);
    }
}
