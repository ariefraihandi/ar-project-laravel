<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadLogsTable extends Migration
{
    public function up()
    {
        Schema::create('download_logs', function (Blueprint $table) {
            $table->id();
            $table->string('download_token', 10)->unique();
            $table->unsignedBigInteger('makalah_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('download_logs');
    }
};