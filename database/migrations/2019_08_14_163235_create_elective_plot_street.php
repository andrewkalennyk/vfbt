<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectivePlotStreet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elective_plots_streets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('elective_plot_id')->nullable();
            $table->unsignedBigInteger('street_id')->nullable();

            $table->foreign('elective_plot_id')->references('id')->on('elective_plots')->onDelete('cascade');
            $table->foreign('street_id')->references('id')->on('streets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elective_plots_streets');
    }
}
