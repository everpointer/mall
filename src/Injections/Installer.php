<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-22 16:10
 */

namespace Notadd\Shop\Injections;

use Notadd\Foundation\Module\Abstracts\Installer as AbstractInstaller;

class Installer extends AbstractInstaller
{
    /**
     * @return bool
     */
    public function handle()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function require()
    {
        return true;
    }
}
