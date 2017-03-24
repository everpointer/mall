<?php

/**
 * Notadd Shop - Data Base
 * Person Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_persons', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday')->nullable();
            $table->enum('sex', array_keys(trans('shop::globals.person_sex')));
            $table->string('home_phone')->nullable();
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('shop_persons');
    }
}
