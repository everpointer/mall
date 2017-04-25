<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-04-25 16:24:38
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateMallOrderDetailsTable.
 */
class CreateMallOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('mall_order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('price', 10, 2);
            $table->integer('quantity');
            $table->boolean('status')->default(1);
            $table->dateTime('delivery_date')->nullable();
            $table->integer('rate')->nullable();
            $table->string('rate_comment')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('order_id')->references('id')->on('orders');
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
        $this->schema->drop('mall_order_details');
    }
}
