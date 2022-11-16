<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemesan');
            $table->unsignedBigInteger('id_mobil');
            $table->date('tanggal_pesan');
            $table->enum('status_pesanan', ['tertunda', 'diproses', 'gagal', 'berhasil']);
            $table->timestamps();

            $table->foreign('id_pemesan')->references('id')->on('pemesans')->onDelete('cascade');
            $table->foreign('id_mobil')->references('id')->on('mobils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
