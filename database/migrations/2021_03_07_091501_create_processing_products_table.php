<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processing_products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->double('price');
            $table->string('materials');
            $table->string('image');
            $table->text('wastes');
            $table->string('currency');
            $table->string('quantity');
            $table->integer('visible');
            $table->timestamps();

            $table->foreign('product_id')->on('products')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processing_products');
    }
}
