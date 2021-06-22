<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelHasFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_has_facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('facility_id');

            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->primary(['hotel_id', 'facility_id'], 'hotel_has_facilities_hotel_id_facility_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_has_facilities');
    }
}
