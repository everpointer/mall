<?php

/**
 * Notadd Shop - Data Base
 * Addresses Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->boolean('default')->default(1);
            $table->string('line1');
            $table->string('line2')->nullable();
            $table->string('phone', 20);
            $table->string('name_contact', 100);
            $table->string('zipcode', 10);
            $table->string('city');
            $table->string('country', 50);
            $table->string('state');
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->dropIfExists('shop_addresses');
    }
}
