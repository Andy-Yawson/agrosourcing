<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('shipping_id')->unsigned()->nullable();
            $table->integer('payment_id')->unsigned()->nullable();
            $table->double('total')->nullable();
            $table->integer('status')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();

            $table->foreign('shipping_id')
                ->references('id')
                ->on('shippings');

            $table->foreign('payment_id')
                ->references('id')
                ->on('payments');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
