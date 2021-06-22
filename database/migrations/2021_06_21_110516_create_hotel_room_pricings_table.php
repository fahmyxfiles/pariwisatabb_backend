<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_room_pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_room_id');
            $table->enum('type', ['Weekday', 'Weekend', 'Date']);
            $table->date('date')->nullable();
            $table->unsignedBigInteger('price');
            $table->timestamps();

            $table->foreign('hotel_room_id')->references('id')->on('hotel_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_room_pricings');
    }
}
