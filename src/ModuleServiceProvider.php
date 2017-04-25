<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-03-22 16:02
 */
namespace Notadd\Mall;

use Illuminate\Events\Dispatcher;
use Notadd\Mall\Injections\Installer;
use Notadd\Mall\Injections\Uninstaller;
use Notadd\Mall\Listeners\RouteRegister;
use Notadd\Mall\Listeners\CsrfTokenRegister;
use Notadd\Foundation\Module\Abstracts\Module;

/**
 * Class ModuleServiceProvider.
 */
class ModuleServiceProvider extends Module
{
    /**
     * Boot module.
     */
    public function boot()
    {
        $this->app->make(Dispatcher::class)->subscribe(CsrfTokenRegister::class);
        $this->app->make(Dispatcher::class)->subscribe(RouteRegister::class);
        $this->publishes([
            realpath(__DIR__ . '/../resources/mixes/administration/dist/assets/mall/administration') => public_path('assets/mall/administration'),
        ], 'public');
    }

    /**
     * Register module extra providers.
     */
    public function register()
    {
    }

    /**
     * Description of module
     *
     * @return string
     */
    public static function description()
    {
        return 'Notadd 商城模块';
    }

    /**
     * Install for module.
     *
     * @return string
     */
    public static function install()
    {
        return Installer::class;
    }

    /**
     * Uninstall for module.
     *
     * @return string
     */
    public static function uninstall()
    {
        return Uninstaller::class;
    }

    /**
     * Name of module.
     *
     * @return string
     */
    public static function name()
    {
        return '商城';
    }

    /**
     * Version of module.
     *
     * @return string
     */
    public static function version()
    {
        return '1.0.0';
    }

    /**
     * Get script of extension.
     *
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function script()
    {
        return asset('assets/mall/administration/js/module.min.js');
    }

    /**
     * Get stylesheet of extension.
     *
     * @return array
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function stylesheet()
    {
        return [
            asset('assets/mall/administration/css/module.min.css'),
        ];
    }
}
