<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStreetIdInHouseCitizens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses_citizens', function (Blueprint $table) {

            $table->unsignedBigInteger('street_id')->nullable()->after('id');

            $table->foreign('street_id')->references('id')->on('streets')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses_citizens', function (Blueprint $table) {
            //
        });
    }
}
