<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-26 14:39
 */
namespace Notadd\Mall\Controllers\Api;

use Notadd\Mall\Handlers\VirtualOrder\ListHandler;

/**
 * Class VirtualOrderController.
 */
class VirtualOrderController
{
    /**
     * @param \Notadd\Mall\Handlers\VirtualOrder\ListHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function list(ListHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
