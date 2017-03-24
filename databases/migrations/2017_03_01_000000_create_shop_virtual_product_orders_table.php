<?php

/**
 * Notadd Shop - Data Base
 * Virtual Products Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopVirtualProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_virtual_product_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('virtual_product_id')->unsigned();
            $table->boolean('status')->default(0);
            $table->string('email')->nullable();
            // $table->foreign('order_id')->references('id')->on('shop_orders');
            // $table->foreign('virtual_product_id')->references('id')->on('shop_virtual_products');
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
        $this->schema->dropIfExists('shop_virtual_product_orders');
    }
}
