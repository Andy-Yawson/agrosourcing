<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehouseCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouse_crops', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_id')->unsigned();
            $table->integer('crop_id')->unsigned();
            $table->string('currency');
            $table->double('price');
            $table->string('package_quantity');
            $table->string('quantity');
            $table->integer('organic');
            $table->integer('visible')->default(0);
            $table->string('crop_variety')->nullable();
            $table->string('moisture_content')->nullable();
            $table->date('available_start')->nullable();
            $table->date('available_end')->nullable();
            $table->string('total_stock_available')->nullable();
            $table->string('total_stock_available_unit')->nullable();
            $table->string('minimum_order_quantity')->nullable();
            $table->string('minimum_order_quantity_unit')->nullable();
            $table->text('delivery_cost_description')->nullable();
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouses');
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
        Schema::dropIfExists('warehouse_crops');
    }
}
