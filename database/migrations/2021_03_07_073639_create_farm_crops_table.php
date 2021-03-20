<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_crops', function (Blueprint $table) {
            $table->id();
            $table->integer('farm_id')->unsigned();
            $table->integer('crop_id')->unsigned();
            $table->string('currency');
            $table->double('price');
            $table->double('size');
            $table->string('package_quantity');
            $table->string('quantity');
            $table->string('image');
            $table->integer('organic');
            $table->integer('visible');
            $table->timestamps();

            $table->foreign('farm_id')->references('id')->on('farms');
            $table->foreign('crop_id')->references('id')->on('crops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farm_crops');
    }
}
