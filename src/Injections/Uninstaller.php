<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-22 16:13
 */

namespace Notadd\Shop\Injections;

use Notadd\Foundation\Module\Abstracts\Uninstaller as AbstractUninstaller;

class Uninstaller extends AbstractUninstaller
{
    /**
     * @return mixed
     */
    public function handle()
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function require()
    {
        return true;
    }
}
