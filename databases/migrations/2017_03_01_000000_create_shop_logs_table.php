<?php

/**
 * Notadd Shop - Data Base
 * Logs Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('action_type_id')->unsigned();
            $table->integer('source_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('details');
            $table->timestamps();

            // $table->foreign('action_type_id')->references('id')->on('shop_action_types');
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
        $this->schema->dropIfExists('shop_logs');
    }
}
