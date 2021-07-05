<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristAttractionPricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_attraction_pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tourist_attraction_id');
            $table->enum('type', ['Weekday', 'Weekend', 'Date']);
            $table->date('date')->nullable();
            $table->enum('category', ['person', 'vehicle']);
            $table->enum('category_type', ['all', 'adult', 'child', 'car', 'bus', 'motorbike']);
            $table->unsignedInteger('age_min')->nullable();
            $table->unsignedInteger('age_max')->nullable();
            $table->unsignedBigInteger('price');
            $table->string('note')->nullable();
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
        Schema::dropIfExists('tourist_attraction_pricings');
    }
}
