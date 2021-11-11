<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('no_of_stock')->nullable();
            $table->string('min_order_qty')->nullable();
            $table->string('currency')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('image')->nullable();
            $table->text('delivery_desc')->nullable();
            $table->integer('status')->default(0);
            $table->foreignId('animal_id')->references('id')->on('animals');
            $table->integer('farm_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('farm_id')->references('id')->on('farms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_infos');
    }
}
