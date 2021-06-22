<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomHasFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_room_has_facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('hotel_room_id');
            $table->unsignedBigInteger('facility_id');

            $table->foreign('hotel_room_id')->references('id')->on('hotel_rooms');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->primary(['hotel_room_id', 'facility_id'], 'hotel_room_has_facilities_hotel_room_id_facility_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_room_has_facilities');
    }
}
