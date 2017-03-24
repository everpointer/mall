<?php

/**
 * Notadd Shop - Data Base
 * Free Products Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopFreeproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_freeproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('participation_cost');
            $table->integer('min_participants');
            $table->integer('max_participants');
            $table->integer('max_participations_per_user');
            $table->integer('draw_number');
            $table->date('draw_date');
            $table->boolean('status')->default(1);
            // $table->foreign('user_id')->references('id')->on('users');
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
        $this->schema->dropIfExists('shop_freeproducts');
    }
}
