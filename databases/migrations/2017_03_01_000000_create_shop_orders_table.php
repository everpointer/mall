<?php

/**
 * Notadd Shop - Data Base
 * Orders Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('address_id')->unsigned()->nullable();
            $table->integer('seller_id')->unsigned()->nullable();
            $table->enum('status', array_keys(trans('shop::globals.order_status')));
            $table->enum('type', ['cart', 'wishlist', 'order', 'later', 'freeproduct']);
            $table->string('description')->nullable();
            $table->dateTime('end_date')->nullable(); //cancelled or paid
            $table->integer('rate')->nullable();
            $table->string('rate_comment')->nullable();
            $table->boolean('rate_mail_sent')->default(false);
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('address_id')->references('id')->on('shop_addresses');
            // $table->foreign('seller_id')->references('id')->on('users');
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
        $this->schema->dropIfExists('shop_orders');
    }
}
