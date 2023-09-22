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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Menambahkan kolom user_id
            $table->string('name'); // Nama pembeli
            $table->string('email'); // Email pembeli
            $table->string('whatsapp'); // Nomor WhatsApp pembeli
            $table->string('product_name'); // Nama barang
            $table->decimal('product_price', 10, 2); // Harga barang
            $table->string('code_barang'); // Kode barang
            $table->tinyInteger('status_payment')->default(0); // Kolom status_payment dengan default 1
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users'); // Menambahkan kunci asing ke tabel users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
