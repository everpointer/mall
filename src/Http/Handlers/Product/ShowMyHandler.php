<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-06 12:26
 */

namespace Notadd\Shop\Http\Handlers\Product;

use Notadd\Shop\Models\Product;
use Notadd\Shop\Http\Handlers\ProductHandler;

class ShowMyHandler extends ProductHandler
{
    /**
     * Http code.
     *
     * @return int
     */
    public function code()
    {
        return 200;
    }

    public function data()
    {
        $filter = $this->request->get('filter');
        if ($filter && $filter != '') {
            switch ($filter) {
                case 'active':
                    $products = Product::auth()->actives()->where('type', '<>', 'freeproduct')->paginate(12);
                    break;
                case 'inactive':
                    $products = Product::auth()->inactives()->where('type', '<>', 'freeproduct')->paginate(12);
                    break;
                case 'low':
                    $products = Product::auth()->whereRaw('stock <= low_stock')->where('type', '<>', 'freeproduct')->paginate(12);
                    break;
                default:
                    $products = Product::auth()->where('type', '<>', 'freeproduct')->paginate(12);
                    break;
            }
        } else {
            $products = Product::auth()->where('type', '<>', 'freeproduct')->paginate(12);
        }

        return compact('products', 'filter');
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
