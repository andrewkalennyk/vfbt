<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToCitizensStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizens_statuses', function (Blueprint $table) {
            $table->string('type')->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizens_statuses', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
