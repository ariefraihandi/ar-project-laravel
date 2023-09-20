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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name'); // Kolom untuk merekam nama file
            $table->integer('file_size'); // Kolom untuk merekam ukuran file
            $table->string('mime_type'); // Kolom untuk merekam tipe MIME file
            $table->string('status'); // Kolom untuk merekam status file
            $table->unsignedBigInteger('id_user'); // Kolom untuk merekam ID pengguna
        
            $table->timestamps();
        
            // Menambahkan relasi ke tabel 'users' untuk merekam ID pengguna
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
