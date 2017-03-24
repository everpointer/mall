<?php

/**
 * Notadd Shop - Data Base
 * Free Products Participants Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopFreeproductParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_freeproduct_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('freeproduct_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->enum('status', array_keys(trans('shop::globals.participant_status')));

            // $table->foreign('user_id')->references('id')->on('shop_users');
            // $table->foreign('freeproduct_id')->references('id')->on('shop_freeproducts');

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
        $this->schema->dropIfExists('shop_freeproduct_participants');
    }
}
