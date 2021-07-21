<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinaryHasCulinaryPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culinary_has_culinary_place', function (Blueprint $table) {
            $table->unsignedBigInteger('culinary_id');
            $table->unsignedBigInteger('culinary_place_id');

            $table->foreign('culinary_id')->references('id')->on('culinaries');
            $table->foreign('culinary_place_id')->references('id')->on('culinary_places');
            $table->primary(['culinary_id', 'culinary_place_id'], 'c_has_cp_ta_c_f_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culinary_has_culinary_place');
    }
}
