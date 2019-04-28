<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralInfoCitizenPromotion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_info_citizens_promotions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('general_info_citizen_id')->nullable();
            $table->unsignedBigInteger('promotion_id')->nullable();

            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade');
            $table->foreign('general_info_citizen_id')->references('id')->on('general_info_citizens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_info_citizens_promotions');
    }
}
