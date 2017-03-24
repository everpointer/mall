<?php

/**
 * Notadd Shop - Data Base
 * Virtual Products Table.
 */
use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

class CreateShopVirtualProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('shop_virtual_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('key')->nullable(); /*key de software (esto se recibe por un archivo .txt)*/
            $table->string('url')->nullable(); /*url del archivo al cual le hizo upload (.rar .zip), esto se descarga dentro de antvel*/
            $table->integer('amount')->nullable(); /*puntos a recibir en la venta de puntos y gift card*/
            $table->dateTime('expiration_date')->nullable(); /*fecha de expiracion del producto, despues de esta fecha se coloca inactivo el producto*/
            $table->enum('status', array_keys(trans('shop::globals.order_status')));
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
        $this->schema->dropIfExists('shop_virtual_products');
    }
}
