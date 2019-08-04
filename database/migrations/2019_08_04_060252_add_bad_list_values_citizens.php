<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBadListValuesCitizens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->string('type_list')->after('is_in_black');
            $table->unsignedBigInteger('bad_list_reason_id')->nullable()->after('citizens_category_id');

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
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropColumn('type_list');
        });
    }
}
