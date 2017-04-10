<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-22 16:50
 */

namespace Notadd\Shop\Listeners;

use Notadd\Shop\Http\Controllers\HomeController;
use Notadd\Shop\Http\Controllers\UserController;
use Notadd\Shop\Http\Controllers\OrdersController;
use Notadd\Shop\Http\Controllers\ProductsController;
use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;

class RouteRegister extends AbstractRouteRegister
{
    public function handle()
    {
        $this->router->group(['middleware' => ['api'], 'prefix' => 'api/shop'], function () {

            // home control
           $this->router->get('/', HomeController::class . '@index');

            // Product list
            $this->router->get('products', ProductsController::class . '@index');
            $this->router->get('products/{id}', ProductsController::class . '@show');

            /*
             * WISH LISTS
             * here you will be able to find all the routes related to users wish list
             */
            $this->router->group(['prefix' => 'wishes'], function () {

                // add into a specific wish list by id
                // $this->router->get('/{id}/products', ['uses' => 'OrdersController@showWishList', 'as' => 'orders.show_wish_list_by_id']);

                // list
                $this->router->get('/', OrdersController::class . '@showWishList');

                // user directory
                $this->router->get('/directory', OrdersController::class . '@wishListDirectory');

                // store
                $this->router->post('/store', OrdersController::class . '@storeWishList');
            });

            // Companies Routes
            $this->router->group(['middleware' => ['roles']], function () {
                // $this->router->resource('productsGroup', 'ProductsGroupController');

                $this->router->get('products/create', ProductsController::class . '@create');

                // $this->router->get('products/{id}/edit', ['uses' => 'ProductsController@edit', 'as' => 'products.edit']);

                // $this->router->get('products/downloadExample', ['uses' => 'ProductsController@downloadExample', 'as' => 'products.downloadExample']);

                $this->router->post('products', ProductsController::class . '@store');

                // $this->router->post('products/upload', ['uses' => 'ProductsController@upload', 'as' => 'products.upload']);

                // $this->router->post('products/upload_key', ['uses' => 'ProductsController@upload_key', 'as' => 'products.upload_key']);

                // $this->router->post('products/upload_software', ['uses' => 'ProductsController@upload_software', 'as' => 'products.upload_software']);

                // $this->router->put('products/{id}', ['uses' => 'ProductsController@update', 'as' => 'products.update']);

                // $this->router->get('modalAllKeys', ['uses' => 'VirtualProductsController@modalAllKeys', 'as' => 'virtualproducts.modalAllKeys']);

                // $this->router->get('showAllKeys/{id}', ['uses' => 'VirtualProductsController@showAllKeys', 'as' => 'virtualproducts.showAllKeys']);

                // $this->router->get('deleteKey/{id}', ['uses' => 'VirtualProductsController@deleteKey', 'as' => 'virtualproducts.deleteKey']);

                // $this->router->post('products/change/status/{id}', ['uses' => 'ProductsController@changeStatus', 'as' => 'products.change_status']);

                // $this->router->get('orders/usersOrders', ['uses' => 'OrdersController@usersOrders', 'as' => 'orders.pendingOrders']);

                // filtered by dates
                // $this->router->post('orders/usersOrders', ['uses' => 'OrdersController@usersOrders', 'as' => 'orders.pendingOrders']);

                // $this->router->get('orders/start/{order_id}', ['uses' => 'OrdersController@startOrder', 'as' => 'orders.start']);

                // $this->router->get('orders/send/{order_id}', ['uses' => 'OrdersController@sendOrder', 'as' => 'orders.send']);

                // $this->router->get('virtualDelivery/{orderId}/{productId}', ['uses' => 'OrdersController@deliveryVirtualProduct', 'as' => 'orders.virtualDelivery']);

                // $this->router->get('freeproducts/{OrderId}/create', ['uses' => 'FreeProductsController@create', 'as' => 'freeproducts.create']);

                // $this->router->post('freeproducts', ['uses' => 'FreeProductsController@store', 'as' => 'freeproducts.store']);

                $this->router->get('products/myProducts', ProductsController::class . '@myProducts');

                // $this->router->post('/products/delete_img', ['uses' => 'ProductsController@deleteImg', 'as' => 'products.deleteImg']);
            });

           //  //Orders Reports
           // $this->router->get('orders/report/{type}/{filter}', ['uses' => 'OrdersController@reports', 'as' => 'orders.report']);
           //
           //  //Busqueda General
           // $this->router->get('search/', 'ProductsController@searchAll');
           //
           // $this->router->get('categories', 'CategoriesController@index');

            // Acceso Usuario General(Admin,Persona,Empresa)
            $this->router->group(['prefix' => 'user'], function () {
                // $this->router->get('dashboard', 'UserController@dashBoard');

                $this->router->get('/', UserController::class . '@profile');

                $this->router->get('profile', UserController::class . '@profile');

                $this->router->post('profile/save', UserController::class . '@saveProfile');

                // $this->router->post('profile/disable', 'UserController@disableProfile');
                //
                // $this->router->post('profile/enable', 'UserController@activeProfile');
                //
                // $this->router->post('upload', 'UserController@upload');
                //
                // //Address
                // $this->router->get('address/', 'AddressesController@index'); //list
                //
                // $this->router->post('address/default', 'AddressesController@setDefault'); //set default
                //
                // $this->router->get('address/create', 'AddressesController@create');  //create form
                //
                // $this->router->get('address/{id}/edit', 'AddressesController@edit'); //edit form
                //
                // $this->router->put('address/store', 'AddressesController@store'); //store
                //
                // $this->router->put('address/{id}', 'AddressesController@update'); //update
                //
                // $this->router->post('address/delete', 'AddressesController@destroy'); //delete
                //
                // //Store Cart
                //
                // $this->router->get('user/orders/updateQuantity/{orderId}/{orderDetailId}/{newValue}', ['uses' => 'OrdersController@updateQuantity', 'as' => 'orders.update_order_quantity']);
                //
                // $this->router->get('product/save/{product}', ['uses' => 'OrdersController@saveForLater', 'as' => 'orders.save_for_later']);

                $this->router->get('orders/moveFrom/{origin}/to/{destination}/{productId}', OrdersController::class . '@moveFromOrder');

                // $this->router->get('orders/addToOrder/{orderId}/{productId}', ['uses' => 'OrdersController@addToOrderById', 'as' => 'orders.add_to_order_by_id']);
                //
                // $this->router->get('orders/checkOut/', ['uses' => 'OrdersController@checkOut', 'as' => 'orders.check_out']);
                //
                // $this->router->get('orders/checkOut/address/{addressId}', ['uses' => 'OrdersController@checkOutResume', 'as' => 'orders.check_out_address']);
                //
                // $this->router->get('orders/placeOrder/{type}', ['uses' => 'OrdersController@placeOrder', 'as' => 'orders.place_order']);
                //
                // $this->router->get('orders', ['uses' => 'OrdersController@usersOrders', 'as' => 'orders.show_orders']);
                //
                // //filtered by dates
                // $this->router->post('orders', ['uses' => 'OrdersController@usersOrders', 'as' => 'orders.show_orders']);
                //
                // $this->router->get('orders/cancel/{orderId}', ['uses' => 'OrdersController@cancel', 'as' => 'orders.cancel']);
                //
                // $this->router->get('orders/showSeller/{orderId}', ['uses' => 'OrdersController@showSellerOrder', 'as' => 'orders.show_seller_order']);
                //
                // $this->router->get('orders/show/{orderId}', ['uses' => 'OrdersController@showOrder', 'as' => 'orders.show_order']);
                //
                // $this->router->get('orders/rate/{orderId}', ['uses' => 'OrdersController@rateOrder', 'as' => 'orders.rate_order']);
                //
                // //Route used to login an user and send it back to the product show
                //
                // $this->router->get('logAndShow/{productId}', ['uses' => 'ProductsController@show', 'as' => 'products.log_and_show']);
                //
                // $this->router->get('orders/close/{order_id}', ['uses' => 'OrdersController@closeOrder', 'as' => 'orders.close']);
                //
                // $this->router->get('modalSeeKeysPurchased', ['uses' => 'VirtualProductOrdersController@modalSeeKeysPurchased', 'as' => 'VirtualProductOrders.modalSeeKeysPurchased']);
                //
                // $this->router->get('showKeyVirtualProductPurchased/{idProduct}/{idOrder}', ['uses' => 'VirtualProductOrdersController@showKeyVirtualProductPurchased', 'as' => 'VirtualProductOrders.showKeyVirtualProductPurchased']);
                //
                // $this->router->get('orders/comment/{order_id}', ['uses' => 'OrdersController@commentOrder', 'as' => 'orders.comment']);
                //
                // $this->router->post('orders/storeComment', ['uses' => 'OrdersController@storeComment', 'as' => 'orders.store_comment']);
                //
                // $this->router->get('orders/delete/{order_id}/{type}', ['uses' => 'OrdersController@destroy', 'as' => 'orders.delete']);
                //
                // //Rates
                // $this->router->post('rates/seller', ['uses' => 'OrdersController@rateSeller', 'as' => 'orders.rate_seller']);
                //
                // $this->router->post('rates/product', ['uses' => 'OrdersController@rateProduct', 'as' => 'orders.rate_product']);
                //
                // //Freeproducts
                // $this->router->put('freeproducts/subscribe/{id}', ['uses' => 'FreeProductsController@subscribe', 'as' => 'freeproducts.subscribe']);
                //
                // $this->router->get('myFreeProducts', ['uses' => 'FreeProductsController@myFreeProducts', 'as' => 'freeproducts.my_free_products']);
            });


           //
           //  //Wpanel Routes
           // $this->router->group(['prefix' => 'wpanel', 'roles' => 'admin', 'middleware' => ['auth', 'roles']], function () {
           //     $this->router->resource('/', 'WpanelController');
           //
           //     $this->router->resource('category', 'CategoriesController');
           //
           //     $this->router->post('category/upload', ['uses' => 'CategoriesController@upload', 'as' => 'category.upload']);
           //
           //     $this->router->get('categories', ['uses' => 'CategoriesController@showList', 'as' => 'categories']);
           //
           //     $this->router->resource('productsdetails', 'ProductDetailsController');
           //
           //     $this->router->get('features', ['uses' => 'ProductDetailsController@index', 'as' => 'features']);
           //
           //     $this->router->resource('profile', 'CompanyController');
           //  });

           //  // Acceso sin login Cambios para poder crear carrito y listas
           //
           // $this->router->get('user/orders/addTo/{destination}/{productId}', ['uses' => 'OrdersController@addToOrder', 'as' => 'orders.add_to_order']);

           $this->router->get('user/orders/removeFrom/{orderName}/{productId}/{idOrder?}', OrdersController::class . '@removeFromOrder');

           // $this->router->put('user/orders/addTo/{destination}/{productId}', ['uses' => 'OrdersController@addToOrder', 'as' => 'orders.add_to_order']);

           $this->router->get('user/cart', OrdersController::class . '@showCart');

           // $this->router->put('user/orders/updateQuantity/{detailId}/{newQuantity}', ['uses' => 'OrdersController@updateQuantity', 'as' => 'orders.update_quantity']);
           //
           //  // points push notifications
           // $this->router->get('getPoints', 'UserController@getPoints');
           //
           // $this->router->get('modalDetailsProductCart/', ['uses' => 'OrdersController@modalDetailsProductCart', 'as' => 'orders.modalDetailsProductCart']);
           //
           // $this->router->get('showDetailsProductCart/{id}', ['uses' => 'OrdersController@showDetailsProductCart', 'as' => 'orders.showDetailsProductCart']);
           //
           // $this->router->post('editKeyVirtualProductsOrders/{id}', ['uses' => 'VirtualProductOrdersController@editKey', 'as' => 'virtualProductOrdersController.editKey']);
           //
           // $this->router->resource('virtualproducts', 'VirtualProductsController');

           // $this->router->get('img/{file?}', 'FileController@img')->where('file', '(.*)');
           //
           // $this->router->get('freeproducts/{id}', ['uses' => 'FreeProductsController@show', 'as' => 'freeproducts.show']);
           //
           // $this->router->get('freeproducts/show/all', ['uses' => 'FreeProductsController@index', 'as' => 'freeproducts.search']);
           //
           // $this->router->get('logs', 'LogController@index');
           //
           // $this->router->resource('log', 'LogController');
           //
           // $this->router->get('user/notices/check/{id?}', 'NoticesController@check');
           //
           // $this->router->get('user/notices/list/{num?}', 'NoticesController@index');
           //
           // $this->router->get('user/notices/{type?}', 'NoticesController@push');
           //
           // $this->router->resource('user/notices', 'NoticesController');
           //
           //  // Rutas Resource de los modelos basicos generados
           // $this->router->resource('freeproductparticipants', 'FreeProductParticipantsController');
           //
           // $this->router->resource('orderdetails', 'OrderDetailsController');
           //
           // $this->router->resource('orders', 'OrdersController');
           //
           // $this->router->resource('productsoffers', 'ProductOffersController');
           //
           // $this->router->resource('typepreferences', 'TypePreferencesController');
           //
           // $this->router->resource('virtualproductorders', 'VirtualProductOrdersController');
           //
           // $this->router->get('mailTest', 'OrdersController@mailtest');
           //
           //  // About Controller
           // $this->router->get('contact', ['as' => 'contact', 'uses' => 'AboutController@create']);
           // $this->router->post('contact', ['as' => 'contact_store', 'uses' => 'AboutController@store']);
           // $this->router->get('about', ['as' => 'about', 'uses' => 'AboutController@about']);
           // $this->router->get('refunds', ['as' => 'refunds', 'uses' => 'AboutController@refunds']);
           // $this->router->get('privacy', ['as' => 'privacy', 'uses' => 'AboutController@privacy']);
           // $this->router->get('terms', ['as' => 'terms', 'uses' => 'AboutController@terms']);
        });
    }
}
