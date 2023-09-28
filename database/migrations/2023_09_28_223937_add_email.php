<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmail extends Migration
{
    public function up()
    {
        Schema::table('email_verification_tokens', function (Blueprint $table) {
            $table->string('email')->nullable();
        });
    }

    public function down()
    {
        Schema::table('email_verification_tokens', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
