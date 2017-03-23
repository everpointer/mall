<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-22 16:02
 */

namespace Notadd\Shop;

use Illuminate\Events\Dispatcher;
use Notadd\Shop\Injections\Installer;
use Notadd\Shop\Injections\Uninstaller;
use Notadd\Shop\Listeners\RouteRegister;
use Notadd\Shop\Listeners\CsrfTokenRegister;
use Notadd\Foundation\Module\Abstracts\Module;

class ModuleServiceProvider extends Module
{
    public function boot()
    {
        $this->app->make(Dispatcher::class)->subscribe(CsrfTokenRegister::class);
        $this->app->make(Dispatcher::class)->subscribe(RouteRegister::class);

        $this->loadMigrationsFrom(realpath(__DIR__ . '/../databases/migrations'));

        $this->publishes([
            realpath(__DIR__ . '/../databases/seeds/') => database_path('seeds/')
        ], 'seeds');
    }

    public static function description()
    {
        return 'Notadd 商城模块';
    }

    public static function install()
    {
        return Installer::class;
    }

    public static function uninstall()
    {
        return Uninstaller::class;
    }

    public static function name()
    {
        return '商城';
    }

    public static function version()
    {
        return '1.0.0';
    }
}
