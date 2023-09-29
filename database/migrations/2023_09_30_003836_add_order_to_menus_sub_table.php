<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderToMenusSubTable extends Migration
{
    public function up()
    {
        Schema::table('menus_sub', function (Blueprint $table) {
            $table->unsignedInteger('order')->default(0)->after('title');
        });
    }

    public function down()
    {
        Schema::table('menus_sub', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
