<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCitizens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->unsignedBigInteger('citizens_category_id')->nullable()->after('id');
            $table->string('certificate_number')->after('date_birth');

            $table->foreign('citizens_category_id')->references('id')->on('citizens_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropColumn('certificate_number');
            $table->dropForeign('citizens_category_id');
        });
    }
}
