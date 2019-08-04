<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBadReasonId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bad_lists', function (Blueprint $table) {
            $table->dropColumn('message');
            $table->unsignedBigInteger('bad_list_reason_id')->nullable()->after('citizen_id');

            $table->foreign('bad_list_reason_id')->references('id')->on('bad_list_reasons')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bad_lists', function (Blueprint $table) {
            $table->text('message');
        });
    }
}
