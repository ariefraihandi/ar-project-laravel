<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTroleTable extends Migration
{
    public function up()
    {
        Schema::create('menus_trole', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('role_name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Kunci asing untuk mengaitkan id_user dengan id di tabel users
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus_trole');
    }
};