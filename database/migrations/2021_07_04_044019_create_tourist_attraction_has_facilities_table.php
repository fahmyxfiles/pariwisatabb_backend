<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristAttractionHasFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_attraction_has_facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('tourist_attraction_id');
            $table->unsignedBigInteger('facility_id');

            $table->foreign('tourist_attraction_id')->references('id')->on('tourist_attractions');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->primary(['tourist_attraction_id', 'facility_id'], 'tourist_attraction_has_facilities_tourist_attraction_id_facility_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourist_attraction_has_facilities');
    }
}
