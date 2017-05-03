<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-05-03 12:23
 */
namespace Notadd\Mall\Controllers\Api;

use Notadd\Mall\Handlers\Configuration\Image\GetHandler;
use Notadd\Mall\Handlers\Configuration\Image\SetHandler;

/**
 * Class ConfigurationImageController.
 */
class ConfigurationImageController
{
    /**
     * @param \Notadd\Mall\Handlers\Configuration\Image\GetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function get(GetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param \Notadd\Mall\Handlers\Configuration\Image\SetHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function set(SetHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
