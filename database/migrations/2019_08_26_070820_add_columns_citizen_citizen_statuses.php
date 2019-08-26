<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCitizenCitizenStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizen_citizen_statuses', function (Blueprint $table) {
            $table->unsignedBigInteger('street_id')->nullable()->after('citizen_sub_status_id');
            $table->unsignedBigInteger('house_id')->nullable()->after('street_id');

            $table->unsignedBigInteger('regional_establishment_type_id')->nullable()->after('house_id');
            $table->unsignedBigInteger('regional_establishment_id')->nullable()->after('regional_establishment_type_id');

            $table->string('entrance')->after('flat_number')->nullable()->after('regional_establishment_type_id');

            $table->foreign('street_id')->references('id')->on('streets')->onDelete('set null');
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('set null');
            $table->foreign('regional_establishment_type_id')->references('id')->on('regional_establishment_types')->onDelete('set null');
            $table->foreign('regional_establishment_id')->references('id')->on('regional_establishments')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizen_citizen_statuses', function (Blueprint $table) {
            //
        });
    }
}
