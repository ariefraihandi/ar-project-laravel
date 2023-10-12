<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIdMakalahTypeInPembelianMakalah extends Migration
{
    public function up()
    {
        Schema::table('pembelian_makalah', function (Blueprint $table) {
            $table->string('id_makalah')->change();
        });
    }

    public function down()
    {
        Schema::table('pembelian_makalah', function (Blueprint $table) {
            $table->bigInteger('id_makalah')->change();
        });
    }
};