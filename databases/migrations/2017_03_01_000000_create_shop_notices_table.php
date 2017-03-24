<?php

/**
 * Notadd Shop - Data Base
 * Notices Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_notices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('sender_id')->unsigned();
            $table->integer('action_type_id')->unsigned();
            $table->integer('source_id')->unsigned();
            $table->enum('status', ['new', 'unread', 'read']);
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('sender_id')->references('id')->on('users');
            // $table->foreign('action_type_id')->references('id')->on('shop_action_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('shop_notices');
    }
}
