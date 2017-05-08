<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-05-08 15:23
 */
namespace Notadd\Mall\Controllers\Api;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Mall\Handlers\Order\Refund\AskHandler;

/**
 * Class OrderRefundController.
 */
class OrderRefundController extends Controller
{
    /**
     * @param \Notadd\Mall\Handlers\Order\Refund\AskHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function ask(AskHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
