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
        Schema::table('menus_subs_child', function (Blueprint $table) {
            $table->integer('order')->unsigned()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('menus_subs_child', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
