<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-04-24 16:49:47
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateAddressesTable.
 */
class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('addresses', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->boolean('default')->default(1);
            $table->string('line1', 250);
            $table->string('line2', 250)->nullable();
            $table->string('phone', 20);
            $table->string('name_contact', 100);
            $table->string('zipcode', 20);
            $table->string('city', 100);
            $table->string('country', 100);
            $table->string('state', 100);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
        $this->schema->drop('addresses');
    }
}
