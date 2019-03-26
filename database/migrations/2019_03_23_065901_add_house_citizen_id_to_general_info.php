<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHouseCitizenIdToGeneralInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_info_citizens', function (Blueprint $table) {
            $table->unsignedBigInteger('house_citizen_id')->nullable()->after('flat_number');

            $table->foreign('house_citizen_id')->references('id')->on('houses_citizens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_info_citizens', function (Blueprint $table) {
            //
        });
    }
}
