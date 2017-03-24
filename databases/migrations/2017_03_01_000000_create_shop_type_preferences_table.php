<?php

/**
 * Notadd Shop - Data Base
 * Type Preferences Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopTypePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_type_preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type', array_keys(trans('shop::globals.type_preferences')));
            $table->boolean('status')->default(1);
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
        $this->schema->dropIfExists('shop_type_preferences');
    }
}
