<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AltSocialData extends Migration
{
    public function up()
    {
        Schema::table('social_data', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('id_makalah')->nullable();
        });
    }

    public function down()
    {
        Schema::table('social_data', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('id_makalah');
        });
    }
}
