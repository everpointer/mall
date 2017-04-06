<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-04-06 15:43
 */

namespace Notadd\Shop\Http\Handlers\Product;

use Notadd\Shop\Http\Handlers\ProductHandler;

class CreateHandler extends ProductHandler
{
    public function data()
    {

    }

    /**
     * Http code.
     *
     * @return int
     */
    public function code()
    {
        return 200;
    }

    /**
     * Errors for handler.
     *
     * @return array
     */
    public function errors()
    {
        return [
            '查看产品失败！',
        ];
    }

    /**
     * Messages for handler.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '查看产品成功！',
        ];
    }
}
