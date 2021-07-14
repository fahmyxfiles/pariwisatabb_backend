<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culinaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regency_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();

            $table->foreign('regency_id')->references('id')->on('regencies');
            $table->foreign('category_id')->references('id')->on('culinary_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('culinaries');
    }
}
