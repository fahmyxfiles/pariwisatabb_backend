<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_houses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regency_id');
            $table->string('name');
            $table->text('address');
            $table->text('map_coordinate')->nullable();
            $table->text('map_center')->nullable();
            $table->string('postal_code');
            $table->text('description');
            $table->timestamps();

            $table->foreign('regency_id')->references('id')->on('regencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_houses');
    }
}
