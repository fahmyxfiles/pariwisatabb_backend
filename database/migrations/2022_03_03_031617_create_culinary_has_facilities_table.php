<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinaryHasFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culinary_has_facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('culinary_id');
            $table->unsignedBigInteger('facility_id');

            $table->foreign('culinary_id')->references('id')->on('culinaries');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->primary(['culinary_id', 'facility_id'], 'c_has_facilities_c_id_f_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culinary_has_facilities');
    }
}
