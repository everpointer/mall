<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-05-03 16:07
 */
namespace Notadd\Mall\Controllers\Api;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Mall\Handlers\Configuration\Pay\GetHandler;
use Notadd\Mall\Handlers\Configuration\Pay\SetHandler;

/**
 * Class ConfigurationPayController.
 */
class ConfigurationPayController extends Controller
{
    /**
     * @param \Notadd\Mall\Handlers\Configuration\Pay\GetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function get(GetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param \Notadd\Mall\Handlers\Configuration\Pay\SetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function set(SetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
