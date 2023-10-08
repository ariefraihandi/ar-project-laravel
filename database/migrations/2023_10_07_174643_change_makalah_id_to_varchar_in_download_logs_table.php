<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMakalahIdToVarcharInDownloadLogsTable extends Migration
{
    public function up()
    {
        Schema::table('download_logs', function (Blueprint $table) {
            $table->string('makalah_id', 255)->change(); // Ubah menjadi VARCHAR dengan panjang 255 karakter
        });
    }

    public function down()
    {
        Schema::table('download_logs', function (Blueprint $table) {
            $table->integer('makalah_id')->change(); // Jika Anda ingin mengembalikannya menjadi integer
        });
    }
};