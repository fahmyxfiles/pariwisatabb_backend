<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestHouseRoomPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_house_room_pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_house_room_id');
            $table->enum('type', ['Weekday', 'Weekend', 'Date']);
            $table->date('date')->nullable();
            $table->unsignedBigInteger('price');
            $table->timestamps();

            $table->foreign('guest_house_room_id')->references('id')->on('guest_house_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_house_room_pricings');
    }
}
