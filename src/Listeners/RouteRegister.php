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
use Notadd\Mall\Controllers\Api\UploadController;

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
            $this->router->post('order/list', OrderController::class . '@list');
            $this->router->post('upload', UploadController::class . '@handle');
        });
    }
}
