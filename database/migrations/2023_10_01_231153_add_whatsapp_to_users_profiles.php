<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWhatsappToUsersProfiles extends Migration
{
    public function up()
    {
        Schema::table('users_profiles', function (Blueprint $table) {
            $table->string('whatsapp')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users_profiles', function (Blueprint $table) {
            $table->dropColumn('whatsapp');
        });
    }
};