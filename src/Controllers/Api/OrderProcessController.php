<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-05-08 15:07
 */
namespace Notadd\Mall\Controllers\Api;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Mall\Handlers\Order\Process\CreateHandler;
use Notadd\Mall\Handlers\Order\Process\PayHandler;

/**
 * Class OrderProcessController.
 */
class OrderProcessController extends Controller
{
    /**
     * @param \Notadd\Mall\Handlers\Order\Process\CreateHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function create(CreateHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param \Notadd\Mall\Handlers\Order\Process\PayHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function pay(PayHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
