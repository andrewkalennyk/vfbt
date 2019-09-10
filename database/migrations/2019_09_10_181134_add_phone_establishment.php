<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneEstablishment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('regional_establishments', function (Blueprint $table) {
            $table->string('phone_second')->after('phone')->nullable();
            $table->string('phone_third')->after('phone_second')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regional_establishments', function (Blueprint $table) {
            $table->dropColumn('phone_second');
            $table->dropColumn('phone_third');
        });
    }
}
