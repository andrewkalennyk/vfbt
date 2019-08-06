<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHouseCitizenFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses_citizens', function (Blueprint $table) {
            $table->string('entrance')->after('flat_number')->nullable();
            $table->string('floor')->after('entrance')->nullable();
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
            $table->dropColumn('entrance');
            $table->dropColumn('floor');
        });
    }
}
