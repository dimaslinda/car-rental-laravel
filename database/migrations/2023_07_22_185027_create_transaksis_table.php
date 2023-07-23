<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_customer');
            $table->integer('id_mobil');
            $table->date('tgl_rental');
            $table->date('tgl_kembali');
            $table->bigInteger('harga');
            $table->bigInteger('denda');
            $table->bigInteger('total_denda');
            $table->date('tgl_pengembalian');
            $table->string('status_pengembalian');
            $table->string('status_rental');
            $table->string('bukti_pembayaran');
            $table->integer('status_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
