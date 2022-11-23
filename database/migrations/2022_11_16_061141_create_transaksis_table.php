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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesanan');
            $table->date('tanggal_bayar');
            $table->bigInteger('total_bayar');
            $table->enum('status_transaksi', ['Menunggu Pembayaran', 'Lunas', 'Pembayaran Sebagian']);
            $table->string('kode_transaksi')->unique();
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id')->on('pesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
