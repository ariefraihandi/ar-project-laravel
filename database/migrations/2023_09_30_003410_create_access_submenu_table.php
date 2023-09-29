<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessSubmenuTable extends Migration
{
    public function up()
    {
        Schema::create('access_submenu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('submenu_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('access_submenu');
    }
}
