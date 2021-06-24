<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('num_of_guest');
            $table->unsignedBigInteger('room_size');
            $table->enum('bed_size', ['single', 'double', 'queen', 'king', 'twin']);
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_rooms');
    }
}
