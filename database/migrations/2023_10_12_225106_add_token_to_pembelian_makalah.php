<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTokenToPembelianMakalah extends Migration
{
    public function up()
    {
        Schema::table('pembelian_makalah', function (Blueprint $table) {
            $table->string('token', 40)->nullable();
        });
    }

    public function down()
    {
        Schema::table('pembelian_makalah', function (Blueprint $table) {
            $table->dropColumn('token');
        });
    }
};