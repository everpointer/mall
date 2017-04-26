<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-04-26 14:17:41
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateMallVirtualProductOrdersTable.
 */
class CreateMallVirtualProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('mall_virtual_product_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('virtual_product_id')->unsigned();
            $table->boolean('status')->default(0);
            $table->string('email')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('virtual_product_id')->references('id')->on('virtual_products');
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
        $this->schema->drop('mall_virtual_product_orders');
    }
}
