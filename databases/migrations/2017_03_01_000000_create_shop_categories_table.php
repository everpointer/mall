<?php

/**
 * Notadd Shop - Data Base
 * Categories Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('name', 50);
            $table->string('description', 100);
            $table->string('icon');
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->enum('type', array_keys(trans('shop::globals.type_categories')));

            // $table->foreign('category_id')->references('id')->on('shop_categories');

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
        $this->schema->dropIfExists('shop_categories');
    }
}
