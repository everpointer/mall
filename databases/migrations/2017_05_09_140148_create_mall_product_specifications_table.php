<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-05-09 14:01:48
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateMallProductSpecificationsTable.
 */
class CreateMallProductSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('mall_product_specifications', function (Blueprint $table) {
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
        $this->schema->drop('mall_product_specifications');
    }
}
