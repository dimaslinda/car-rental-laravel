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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tipe');
            $table->string('merk');
            $table->string('noplat');
            $table->string('warna');
            $table->string('tahun');
            $table->integer('status');
            $table->bigInteger('harga');
            $table->bigInteger('denda');
            $table->integer('ac');
            $table->integer('sopir');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
