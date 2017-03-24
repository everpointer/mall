<?php

/**
 * Notadd Shop - Data Base
 * Businesses Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_businesses', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->primary();
            $table->string('business_name');
            $table->date('creation_date');
            $table->string('local_phone')->nullable();
            $table->integer('rate_val')->nullable();
            $table->integer('rate_count')->nullable();
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
        $this->schema->dropIfExists('shop_businesses');
    }
}
