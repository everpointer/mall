<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-24 18:41
 */
namespace Notadd\Mall\Controllers\Api;

use Notadd\Foundation\Routing\Abstracts\Controller;
use Notadd\Mall\Handlers\Upload\UploadHandler;

/**
 * Class UploadController.
 */
class UploadController extends Controller
{
    /**
     * @param \Notadd\Mall\Handlers\Upload\UploadHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function handle(UploadHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
