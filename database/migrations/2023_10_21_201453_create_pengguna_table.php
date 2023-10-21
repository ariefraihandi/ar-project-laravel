<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id(); // Kolom id (kunci utama)
            $table->string('instansi');
            $table->string('alamat');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('api_key');
            $table->boolean('status')->default(true); // Kolom status dengan default true
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
};