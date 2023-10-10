<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianMakalahTable extends Migration
{
    public function up()
    {
        Schema::create('pembelian_makalah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_makalah');
            $table->string('judul_makalah');
            $table->string('format');
            $table->string('harga'); // Mengubah tipe data harga menjadi string
            $table->string('email'); // Menambah kolom email
            $table->string('nomor_hp'); // Menambah kolom nomor_hp
            $table->timestamps();

            // Definisikan hubungan ke tabel makalah jika diperlukan
            // $table->foreign('id_makalah')->references('id')->on('makalah')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembelian_makalah');
    }
};