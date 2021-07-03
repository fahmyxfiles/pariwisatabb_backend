<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestHouseRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_house_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_house_id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('num_of_guest');
            $table->unsignedBigInteger('room_size');
            $table->enum('bed_size', ['single', 'double', 'queen', 'king', 'twin']);
            $table->timestamps();

            $table->foreign('guest_house_id')->references('id')->on('guest_houses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_house_rooms');
    }
}
