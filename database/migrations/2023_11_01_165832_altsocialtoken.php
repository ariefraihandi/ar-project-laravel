<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AltSocialToken extends Migration
{
    public function up()
    {
        Schema::table('social_data', function (Blueprint $table) {
            $table->string('token')->nullable();
        });
    }

    public function down()
    {
        Schema::table('social_data', function (Blueprint $table) {
            $table->dropColumn('token');
        });
    }
}
