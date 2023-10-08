<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlToDownloadLogsTable extends Migration
{
    public function up()
    {
        Schema::table('download_logs', function (Blueprint $table) {
            $table->string('url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('download_logs', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
}
