<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('longitude');
            $table->string('latitude');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('size');

            $table->integer('region_id')->unsigned();
            $table->integer('visible')->default(0);
            $table->integer('district_id')->unsigned();
            $table->timestamps();

            /*$table->foreign('crop_id')
                ->references('id')
                ->on('crops');*/

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('region_id')
                ->references('id')
                ->on('regions');

            $table->foreign('district_id')
                ->references('id')
                ->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farms');
    }
}
