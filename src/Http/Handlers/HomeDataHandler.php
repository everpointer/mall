<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-03-28 15:00
 */

namespace Notadd\Shop\Http\Handlers;

use Notadd\Shop\Models\Order;
use Notadd\Shop\Models\FreeProduct;
use Illuminate\Support\Facades\Auth;
use Notadd\Shop\Helpers\ProductsHelper;
use Notadd\Foundation\Passport\Abstracts\DataHandler;

class HomeDataHandler extends DataHandler
{
    public function code()
    {
        return 200;
    }

    public function errors()
    {
        return [
            '获取数据失败！',
        ];
    }

    public function messages()
    {
        return [
            '获取数据成功！'
        ];
    }

    public function data()
    {
        $helperProd = new ProductsHelper();

        $carousel   = $helperProd->suggest('carousel');
        $viewed     = $helperProd->suggest('viewed', 8);
        $categories = $helperProd->suggest('categories');
        $purchased  = $helperProd->suggest('purchased');

        $suggestion = [
            'carousel'   => $carousel,
            'viewed'     => $viewed,
            'categories' => $categories,
            'purchased'  => $purchased,
        ];

        $helperProd->resetHaystack(); // reseting session id validator

        $events = [];
        if (config('shop.offering_free_products')) {
            $events = FreeProduct::getNextEvents([
                'id',
                'description',
                'min_participants',
                'max_participants',
                'participation_cost',
                'start_date',
                'end_date',
            ], 4, date('Y-m-d'));
        }

        $tagsCloud = ProductHandler::getTopRated(0, 20, true);

        $allWishes = '';
        $user      = Auth::user();
        if ($user) {
            $allWishes = Order::ofType('wishlist')->where('user_id', $user->id)->where('description', '<>', '')->get();
        }

        $banner = [
            '/img/banner/01.png',
            '/img/banner/02.png',
            '/img/banner/03.png',
            '/img/banner/04.png',
        ];

        return compact('suggestion', 'allWishes', 'events', 'tagsCloud', 'banner');
    }
}
