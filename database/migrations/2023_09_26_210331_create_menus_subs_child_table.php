<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusSubsChildTable extends Migration
{
    public function up()
    {
        Schema::create('menus_subs_child', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_submenu');
            $table->string('title');
            $table->string('url');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Kunci asing untuk mengaitkan id_submenu dengan id di tabel menus_sub
            $table->foreign('id_submenu')->references('id')->on('menus_sub')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus_subs_child');
    }
};