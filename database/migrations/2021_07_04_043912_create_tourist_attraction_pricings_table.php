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
            $table->enum('age_type', ['all', 'adult', 'child']);
            $table->unsignedInteger('age_min')->nullable();
            $table->unsignedInteger('age_max')->nullable();
            $table->unsignedBigInteger('price');
            $table->string('note');
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
