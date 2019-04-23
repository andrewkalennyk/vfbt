<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revision_logs', function (Blueprint $table) {
            $table->string('class_name')->after('model_id');
            $table->string('link')->after('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revision_logs', function (Blueprint $table) {
            $table->dropColumn('class_name');
            $table->dropColumn('link');
        });
    }
}
