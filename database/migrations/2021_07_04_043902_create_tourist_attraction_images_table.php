<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristAttractionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_attraction_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tourist_attraction_id');
            $table->string('name');
            $table->string('image_filename');
            $table->enum('type', ['main', 'banner', 'common']);
            $table->timestamps();

            $table->foreign('tourist_attraction_id')->references('id')->on('tourist_attractions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourist_attraction_images');
    }
}
