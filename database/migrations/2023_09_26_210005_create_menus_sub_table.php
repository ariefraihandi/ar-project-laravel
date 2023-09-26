<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusSubTable extends Migration
{
    public function up()
    {
        Schema::create('menus_sub', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->string('title');
            $table->string('url');
            $table->string('icon')->nullable();
            $table->integer('itemsub')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Kunci asing untuk mengaitkan menu_id dengan id di tabel menus
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus_sub');
    }
};
