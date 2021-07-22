<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinaryPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culinary_places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regency_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('address');
            $table->string('postal_code');
            $table->string('map_coordinate')->nullable();
            $table->string('map_center')->nullable();
            $table->text('description');
            $table->text('instagram_hashtags')->nullable();

            $table->foreign('regency_id')->references('id')->on('regencies');
            $table->foreign('category_id')->references('id')->on('culinary_place_categories');
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
        Schema::dropIfExists('culinary_places');
    }
}
