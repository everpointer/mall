<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-03-22 16:50
 */
namespace Notadd\Mall\Listeners;

use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;
use Notadd\Mall\Controllers\Api\AddressController;
use Notadd\Mall\Controllers\Api\CategoryController;
use Notadd\Mall\Controllers\Api\ConfigurationController;
use Notadd\Mall\Controllers\Api\ConfigurationSearchController;
use Notadd\Mall\Controllers\Api\OrderController;
use Notadd\Mall\Controllers\Api\ProductController;
use Notadd\Mall\Controllers\Api\UploadController;
use Notadd\Mall\Controllers\Api\VirtualOrderController;
use Notadd\Mall\Controllers\Api\VirtualProductController;

/**
 * Class RouteRegister.
 */
class RouteRegister extends AbstractRouteRegister
{
    /**
     * Handle Route Registrar.
     */
    public function handle()
    {
        $this->router->group(['middleware' => ['auth:api', 'cross', 'web'], 'prefix' => 'api/mall'], function () {
            $this->router->post('address', AddressController::class . '@address');
            $this->router->post('address/edit', AddressController::class . '@edit');
            $this->router->post('address/list', AddressController::class . '@list');
            $this->router->post('category/create', CategoryController::class . '@create');
            $this->router->post('category/edit', CategoryController::class . '@edit');
            $this->router->post('category/list', CategoryController::class . '@list');
            $this->router->post('category/remove', CategoryController::class . '@remove');
            $this->router->post('configuration/get', ConfigurationController::class . '@get');
            $this->router->post('configuration/set', ConfigurationController::class . '@set');
            $this->router->post('configuration/search/get', ConfigurationSearchController::class . '@set');
            $this->router->post('configuration/search/set', ConfigurationSearchController::class . '@set');
            $this->router->post('order/create', OrderController::class . '@create');
            $this->router->post('order/edit', OrderController::class . '@edit');
            $this->router->post('order/list', OrderController::class . '@list');
            $this->router->post('order/remove', OrderController::class . '@remove');
            $this->router->post('product/create', ProductController::class . '@create');
            $this->router->post('product/edit', ProductController::class . '@edit');
            $this->router->post('product/list', ProductController::class . '@list');
            $this->router->post('product/remove', ProductController::class . '@remove');
            $this->router->post('upload', UploadController::class . '@handle');
            $this->router->post('virtual-order/create', VirtualOrderController::class . '@create');
            $this->router->post('virtual-order/edit', VirtualOrderController::class . '@edit');
            $this->router->post('virtual-order/list', VirtualOrderController::class . '@list');
            $this->router->post('virtual-order/remove', VirtualOrderController::class . '@remove');
            $this->router->post('virtual-order/restore', VirtualOrderController::class . '@restore');
            $this->router->post('virtual-product/create', VirtualProductController::class . '@create');
            $this->router->post('virtual-product/edit', VirtualProductController::class . '@edit');
            $this->router->post('virtual-product/list', VirtualProductController::class . '@list');
            $this->router->post('virtual-product/remove', VirtualProductController::class . '@remove');
            $this->router->post('virtual-product/restore', VirtualProductController::class . '@restore');
        });
    }
}
