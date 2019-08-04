<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsHouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->text('entrances_number')->nullable()->after('title');
            $table->text('floors_number')->nullable()->after('entrances_number');
            $table->text('flat_number')->nullable()->after('floors_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn('entrances_number');
            $table->dropColumn('floors_number');
            $table->dropColumn('flat_number');
        });
    }
}
