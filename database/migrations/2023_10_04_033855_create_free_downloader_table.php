<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreeDownloaderTable extends Migration
{
    public function up()
    {
        Schema::create('free_downloader', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('file3')->nullable();
            $table->string('id_makalah')->nullable();
            $table->string('status')->default('0');
            $table->timestamps();
        });

       
    }

    public function down()
    {
        Schema::dropIfExists('free_downloader');
    }
};