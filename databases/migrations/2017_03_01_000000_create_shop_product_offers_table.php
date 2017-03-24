<?php

/**
 * Notadd Shop - Data Base
 * Products Offers Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopProductOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_product_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->dateTime('day_start');
            $table->dateTime('day_end');
            $table->double('percentage', 2, 2);
            $table->double('price')->default(0);
            $table->integer('quantity')->default(0);
            // $table->foreign('product_id')->references('id')->on('shop_products');
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
        $this->schema->dropIfExists('shop_product_offers');
    }
}
