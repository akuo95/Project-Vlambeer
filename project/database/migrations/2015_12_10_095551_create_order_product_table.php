<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('order_product_id')->length(10);
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('size', 20);
            $table->string('color', 20);
            $table->integer('quantity')->length(20);
            $table->decimal('price')->length(5,2);
            $table->timestamps();
        });

        Schema::table('order_product', function($table) {
            $table->foreign('order_id')->references('id')->on('order');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_product');
    }
}
