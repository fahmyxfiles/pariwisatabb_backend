<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinaryPlaceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culinary_place_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('culinary_place_id');
            $table->string('name');
            $table->string('image_filename');
            $table->enum('type', ['main', 'banner', 'common']);

            $table->foreign('culinary_place_id')->references('id')->on('culinary_places');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culinary_place_images');
    }
}
