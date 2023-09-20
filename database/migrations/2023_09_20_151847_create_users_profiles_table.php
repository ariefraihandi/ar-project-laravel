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
        Schema::create('users_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Kolom untuk relasi dengan tabel 'users'
            $table->string('alamat')->default(''); // Kolom alamat dengan nilai default kosong
            $table->string('universitas')->default(''); // Kolom universitas dengan nilai default kosong
            $table->string('fakultas')->default(''); // Kolom fakultas dengan nilai default kosong
            $table->string('image')->default('default.jpg'); // Kolom image dengan nilai default 'default.jpg'
            $table->string('user_ig')->default(''); // Kolom user ig dengan nilai default kosong
            $table->string('user_tt')->default(''); // Kolom user tt dengan nilai default kosong
            $table->string('user_fb')->default(''); // Kolom user fb dengan nilai default kosong
            $table->timestamps();
        
            // Menambahkan relasi ke tabel 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_profiles');
    }
};
