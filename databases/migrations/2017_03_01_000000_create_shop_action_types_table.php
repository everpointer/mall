<?php

/**
 * Notadd Shop - Data Base
 * Actions Type Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopActionTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_action_types', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary();
            $table->enum('source_type', array_keys(trans('shop::globals.source_types')));
            $table->string('action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('shop_action_types');
    }
}
