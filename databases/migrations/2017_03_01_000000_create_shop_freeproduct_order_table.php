<?php

/**
 * Notadd Shop - Data Base
 * Free Products Orders Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopFreeproductOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_freeproduct_order', function (Blueprint $table) {
            $table->integer('freeproduct_id')->unsigned()->index();
            $table->integer('order_id')->unsigned()->index();

            // $table->foreign('order_id')->references('id')->on('shop_orders');
            // $table->foreign('freeproduct_id')->references('id')->on('shop_freeproducts');

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
        $this->schema->dropIfExists('shop_freeproduct_order');
    }
}
