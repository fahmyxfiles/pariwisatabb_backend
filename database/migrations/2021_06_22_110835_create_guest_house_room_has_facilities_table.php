<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestHouseRoomHasFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_house_room_has_facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('guest_house_room_id');
            $table->unsignedBigInteger('facility_id');

            $table->foreign('guest_house_room_id')->references('id')->on('guest_house_rooms');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->primary(['guest_house_room_id', 'facility_id'], 'guest_house_room_has_facilities_guest_house_room_id_facility_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_house_room_has_facilities');
    }
}
