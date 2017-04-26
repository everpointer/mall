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
