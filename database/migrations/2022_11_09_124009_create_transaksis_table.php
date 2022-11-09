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
            $table->foreignId('pesanan_id');
            $table->integer('biaya');
            $table->string('tipe_pembayaran');
            $table->string('transaksi_id');
            $table->string('status_transaksi');
            $table->string('bank')->nullable();
            $table->string('nomor_va')->nullable();
            $table->string('status_pembayaran');
            $table->string('pdf_url');
            $table->timestamps();
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
