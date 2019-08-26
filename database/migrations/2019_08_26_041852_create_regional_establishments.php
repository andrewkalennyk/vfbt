<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionalEstablishments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regional_establishments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('regional_establishment_type_id')->nullable();
            $table->unsignedBigInteger('street_id')->nullable();
            $table->unsignedBigInteger('house_id')->nullable();
            $table->string('title');
            $table->string('chief');
            $table->string('phone');
            $table->text('loyalty');


            $table->timestamps();

            $table->foreign('regional_establishment_type_id')->references('id')->on('regional_establishment_types')->onDelete('cascade');
            $table->foreign('street_id')->references('id')->on('streets')->onDelete('set null');
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
        Schema::dropIfExists('regional_establishments');
    }
}
