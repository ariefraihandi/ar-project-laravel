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
        Schema::table('pembelian_makalah', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Anda dapat mengganti default status sesuai kebutuhan
        });
    }

    public function down()
    {
        Schema::table('pembelian_makalah', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
