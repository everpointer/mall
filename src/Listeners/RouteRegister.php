<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-22 16:50
 */

namespace Notadd\Shop\Listeners;

use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;

class RouteRegister extends AbstractRouteRegister
{
    public function handle()
    {
        $this->router->group(['middleware' => ['api'], 'prefix' => 'api/shop'], function () {

        });
    }
}
