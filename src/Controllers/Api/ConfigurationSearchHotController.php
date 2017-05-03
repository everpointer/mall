<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-05-03 11:41
 */
namespace Notadd\Mall\Controllers\Api;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Mall\Handlers\Configuration\Search\Hot\CreateHandler;
use Notadd\Mall\Handlers\Configuration\Search\Hot\ListHandler;

/**
 * Class ConfigurationSearchHotController.
 */
class ConfigurationSearchHotController extends Controller
{
    /**
     * @param \Notadd\Mall\Handlers\Configuration\Search\Hot\CreateHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function create(CreateHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param \Notadd\Mall\Handlers\Configuration\Search\Hot\ListHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function list(ListHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
