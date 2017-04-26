<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-04-26 14:14:03
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateMallVirtualProductsTable.
 */
class CreateMallVirtualProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('mall_virtual_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('key')->nullable();
            $table->string('url')->nullable();
            $table->integer('amount')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->enum('status', array_keys(trans('globals.order_status')));
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
        $this->schema->drop('mall_virtual_products');
    }
}
