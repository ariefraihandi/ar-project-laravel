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
        Schema::table('free_downloader', function (Blueprint $table) {
            $table->string('ig_user')->nullable();
        });
    }

    public function down()
    {
        Schema::table('free_downloader', function (Blueprint $table) {
            $table->dropColumn('ig_user');
        });
    }
};
