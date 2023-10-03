<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveNameFromFreeDownloader extends Migration
{
    public function up()
    {
        Schema::table('free_downloader', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    public function down()
    {
        // If you ever need to rollback, you can add the 'name' column back here
    }
}
