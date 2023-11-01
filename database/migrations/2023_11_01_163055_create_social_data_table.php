<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('social_data', function (Blueprint $table) {
        $table->id();
        $table->string('instagram_username');
        $table->string('file1_path')->nullable();
        $table->string('file2_path')->nullable();
        $table->string('file3_path')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_data');
    }
};
