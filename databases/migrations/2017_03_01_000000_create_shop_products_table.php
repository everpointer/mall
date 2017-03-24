<?php

/**
 * Notadd Shop - Data Base
 * Products Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('parent_id')->nullable();    //for combos
            $table->integer('products_group')->unsigned()->nullable();
            $table->boolean('status')->default(1);
            $table->enum('type', array_keys(trans('shop::globals.product_types')));
            $table->string('name', 100);
            $table->string('description', 500);
            $table->double('price', 10, 2);
            $table->integer('stock');
            $table->integer('low_stock')->default(0);
            $table->string('bar_code')->nullable();
            $table->string('brand', 30)->nullable();
            $table->enum('condition', array_keys(trans('shop::globals.product_conditions')));
            $table->json('tags')->nullable();
            $table->json('features');
            $table->double('rate_val', 10, 2)->nullable();
            $table->integer('rate_count')->nullable();
            $table->integer('sale_counts')->unsigned();
            $table->integer('view_counts')->unsigned();
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('category_id')->references('id')->on('shop_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('shop_products');
    }
}
