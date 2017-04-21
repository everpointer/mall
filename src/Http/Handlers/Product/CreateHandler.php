<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-06 15:43
 */

namespace Notadd\Shop\Http\Handlers\Product;

use Notadd\Shop\Models\Product;
use Notadd\Shop\Models\Category;
use Notadd\Shop\Models\ProductDetail;
use Notadd\Shop\Helpers\FeaturesHelper;
use Notadd\Shop\Helpers\ProductsHelper;
use Notadd\Shop\Http\Handlers\ProductHandler;

class CreateHandler extends ProductHandler
{
    public function data()
    {
        $product         = Product::find(-50);
        $features        = ProductDetail::all()->toArray();
        $arrayCategories = Category::actives()
            ->lightSelection()
            ->get()
            ->toArray();

        $categories = [
            '' => trans('shop::product.controller.select_category'),
        ];

        $condition = [
            'new'         => trans('shop::product.controller.new'),
            'refurbished' => trans('shop::product.controller.refurbished'),
            'used'        => trans('shop::product.controller.used'),
        ];

        $typesProduct = [
            'item' => trans('shop::product.controller.item'),
            'key'  => trans('shop::product.globals.digital_item') . ' ' . trans('shop::product.globals.key'),
        ];

        $typeItem = 'item';

        // categories drop down formatted
        ProductsHelper::categoriesDropDownFormat($arrayCategories, $categories);

        $oldFeatures     = ProductDetail::oldFeatures([]);
        $productsDetails = new FeaturesHelper();

        return compact('product', 'features', 'categories', 'condition', 'typeItem', 'typesProduct', 'oldFeatures', 'productsDetails');
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
