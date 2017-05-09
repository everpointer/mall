<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-04-24 17:11:52
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateMallCategoriesTable.
 */
class CreateMallProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('mall_product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('name', 60);
            $table->string('description', 100);
            $table->string('icon', 60)->nullable();
            $table->string('image', 100)->nullable();
            $table->boolean('status')->default(1);
            $table->enum('type', ['group', 'store'])->default('store');
            $table->foreign('category_id')->references('id')->on('categories');
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
        $this->schema->drop('mall_product_categories');
    }
}
