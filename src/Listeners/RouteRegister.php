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
use Notadd\Mall\Controllers\Api\ConfigurationAdvertisementController;
use Notadd\Mall\Controllers\Api\ConfigurationAdvertisementPositionController;
use Notadd\Mall\Controllers\Api\ConfigurationController;
use Notadd\Mall\Controllers\Api\ConfigurationImageController;
use Notadd\Mall\Controllers\Api\ConfigurationImageDefaultController;
use Notadd\Mall\Controllers\Api\ConfigurationMessageController;
use Notadd\Mall\Controllers\Api\ConfigurationPayController;
use Notadd\Mall\Controllers\Api\ConfigurationSearchController;
use Notadd\Mall\Controllers\Api\ConfigurationSearchHotController;
use Notadd\Mall\Controllers\Api\OrderController;
use Notadd\Mall\Controllers\Api\OrderProcessController;
use Notadd\Mall\Controllers\Api\OrderRateController;
use Notadd\Mall\Controllers\Api\OrderRefundController;
use Notadd\Mall\Controllers\Api\ProductController;
use Notadd\Mall\Controllers\Api\ShopController;
use Notadd\Mall\Controllers\Api\SpecificationController;
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
            $this->router->post('category/restore', CategoryController::class . '@restore');
            $this->router->post('configuration/get', ConfigurationController::class . '@get');
            $this->router->post('configuration/set', ConfigurationController::class . '@set');
            $this->router->post('configuration/advertisement/create', ConfigurationAdvertisementController::class . '@create');
            $this->router->post('configuration/advertisement/edit', ConfigurationAdvertisementController::class . '@edit');
            $this->router->post('configuration/advertisement/list', ConfigurationAdvertisementController::class . '@list');
            $this->router->post('configuration/advertisement/remove', ConfigurationAdvertisementController::class . '@remove');
            $this->router->post('configuration/advertisement/position/create', ConfigurationAdvertisementPositionController::class . '@create');
            $this->router->post('configuration/advertisement/position/edit', ConfigurationAdvertisementPositionController::class . '@edit');
            $this->router->post('configuration/advertisement/position/list', ConfigurationAdvertisementPositionController::class . '@list');
            $this->router->post('configuration/advertisement/position/remove', ConfigurationAdvertisementPositionController::class . '@remove');
            $this->router->post('configuration/image/get', ConfigurationImageController::class . '@get');
            $this->router->post('configuration/image/set', ConfigurationImageController::class . '@set');
            $this->router->post('configuration/image/default/get', ConfigurationImageDefaultController::class . '@get');
            $this->router->post('configuration/image/default/set', ConfigurationImageDefaultController::class . '@set');
            $this->router->post('configuration/message/create', ConfigurationMessageController::class . '@create');
            $this->router->post('configuration/message/edit', ConfigurationMessageController::class . '@edit');
            $this->router->post('configuration/message/list', ConfigurationMessageController::class . '@list');
            $this->router->post('configuration/message/remove', ConfigurationMessageController::class . '@remove');
            $this->router->post('configuration/pay/get', ConfigurationPayController::class . '@get');
            $this->router->post('configuration/pay/set', ConfigurationPayController::class . '@set');
            $this->router->post('configuration/search/get', ConfigurationSearchController::class . '@set');
            $this->router->post('configuration/search/set', ConfigurationSearchController::class . '@set');
            $this->router->post('configuration/search/hot/create', ConfigurationSearchHotController::class . '@create');
            $this->router->post('configuration/search/hot/edit', ConfigurationSearchHotController::class . '@edit');
            $this->router->post('configuration/search/hot/list', ConfigurationSearchHotController::class . '@list');
            $this->router->post('configuration/search/hot/remove', ConfigurationSearchHotController::class . '@remove');
            $this->router->post('order/create', OrderController::class . '@create');
            $this->router->post('order/edit', OrderController::class . '@edit');
            $this->router->post('order/list', OrderController::class . '@list');
            $this->router->post('order/remove', OrderController::class . '@remove');
            $this->router->post('order/restore', OrderController::class . '@restore');
            $this->router->post('order/rate/list', OrderRateController::class . '@list');
            $this->router->post('order/refund/ask', OrderRefundController::class . '@ask');
            $this->router->post('order/refund/confirm', OrderRefundController::class . '@confirm');
            $this->router->post('order/refund/finish', OrderRefundController::class . '@finish');
            $this->router->post('order/refund/send', OrderRefundController::class . '@send');
            $this->router->post('order/process/confirm', OrderProcessController::class . '@confirm');
            $this->router->post('order/process/create', OrderProcessController::class . '@create');
            $this->router->post('order/process/finish', OrderProcessController::class . '@finish');
            $this->router->post('order/process/pay', OrderProcessController::class . '@pay');
            $this->router->post('order/process/send', OrderProcessController::class . '@send');
            $this->router->post('product/create', ProductController::class . '@create');
            $this->router->post('product/edit', ProductController::class . '@edit');
            $this->router->post('product/list', ProductController::class . '@list');
            $this->router->post('product/remove', ProductController::class . '@remove');
            $this->router->post('product/restore', ProductController::class . '@restore');
            $this->router->post('shop/create', ShopController::class . '@create');
            $this->router->post('shop/edit', ShopController::class . '@edit');
            $this->router->post('shop/list', ShopController::class . '@list');
            $this->router->post('shop/remove', ShopController::class . '@remove');
            $this->router->post('shop/restore', ShopController::class . '@restore');
            $this->router->post('specification/create', SpecificationController::class . '@create');
            $this->router->post('specification/edit', SpecificationController::class . '@edit');
            $this->router->post('specification/list', SpecificationController::class . '@list');
            $this->router->post('specification/remove', SpecificationController::class . '@remove');
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
