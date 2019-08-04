<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCitizenCitizenStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizen_citizen_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('citizen_id')->nullable();
            $table->unsignedBigInteger('citizen_status_id')->nullable();
            $table->unsignedBigInteger('citizen_sub_status_id')->nullable();


            $table->foreign('citizen_id')->references('id')->on('citizens')->onDelete('cascade');
            $table->foreign('citizen_status_id')->references('id')->on('citizens_statuses')->onDelete('cascade');
            $table->foreign('citizen_sub_status_id')->references('id')->on('citizens_sub_statuses')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizen_citizen_statuses');
    }
}
