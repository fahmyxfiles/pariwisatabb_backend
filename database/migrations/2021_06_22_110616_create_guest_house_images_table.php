<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestHouseImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_house_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guest_house_id');
            $table->unsignedBigInteger('guest_house_room_id')->nullable();
            $table->string('name');
            $table->string('image_filename');
            $table->enum('type', ['main', 'banner', 'common']);
            $table->timestamps();

            $table->foreign('guest_house_id')->references('id')->on('guest_houses');
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
        Schema::dropIfExists('guest_house_images');
    }
}
