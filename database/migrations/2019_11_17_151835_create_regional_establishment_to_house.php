<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionalEstablishmentToHouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regional_establishment_house', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('regional_establishment_id')->nullable();
            $table->unsignedBigInteger('house_id')->nullable();

            $table->foreign('regional_establishment_id')->references('id')->on('regional_establishment_types')->onDelete('cascade');
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regional_establishment_house');
    }
}
