<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-04-25 16:20:33
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateMallProductDetailsTable.
 */
class CreateMallProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('mall_product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->enum('input_type', ['text', 'select', 'radio', 'checkbox', 'image', 'document']);
            $table->json('default_values');
            $table->json('validation_rules');
            $table->json('help_message');
            $table->string('type_products');
            $table->smallInteger('max_num_values')->default(1);
            $table->enum('status', ['active', 'inactive']);
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
        $this->schema->drop('mall_product_details');
    }
}
