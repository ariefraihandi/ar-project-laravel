<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRoleTable extends Migration
{
    public function up()
    {
        Schema::create('users_role', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_role');
    }
}
