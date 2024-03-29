<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('region_id')->unsigned();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('visible')->default(0);
            $table->integer('district_id')->unsigned();

            $table->string('type_of_warehouse')->nullable();
            $table->string('storage_capacity')->nullable();
            $table->string('other_services')->nullable();
            $table->string('warehouse_certification')->nullable();
            $table->string('other_certification')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('warehouses');
    }
}
