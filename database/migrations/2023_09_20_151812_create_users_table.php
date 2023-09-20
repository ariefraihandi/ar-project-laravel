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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Kolom nama
            $table->string('email')->unique(); // Kolom email dengan nilai unik
            $table->boolean('status')->default(false); // Kolom status dengan default false
            $table->timestamp('activated_at')->nullable(); // Kolom kapan diaktifkan dengan nilai null (nullable)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
