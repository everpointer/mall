<?php

namespace Notadd\Shop\Helpers;

/*
 * Antvel - App Menus Helper
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use Notadd\Shop\Models\Order;
use Notadd\Shop\Models\Product;

class Menu
{
    /**
     * [Menu Dashboard ].
     *
     * @param  bool para indicar el tipo de salida, json o array
     *
     * @return [json o array]
     *               Nota: el contenido del array interno de contener al menos route y text lo demas es opcional
     *               //[route,text,cont(para badge), divider, class, icon  ]
     */
    public static function dashboard($returnArray = false)
    {
        $menu = [
            ['route' => '/user/dashboard', 'text' => trans('shop::user.dashboard'), 'icon' => 'glyphicon glyphicon-dashboard'],
            ['route' => '/user/profile', 'text' => trans('shop::user.profile'), 'icon' => 'glyphicon glyphicon-user'],
            ['route' => '/user/address', 'text' => trans('shop::user.address_book'), 'icon' => 'glyphicon glyphicon-map-marker', 'divider' => 1],
        ];
        //Menu para empresas
        if (\Auth::user()->hasRole(['business', 'admin'])) {
            $products = Product::where('user_id', \Auth::id())->get();
            $productsLowStock = 0;
            foreach ($products as $row) {
                if ($row->stock <= $row->low_stock) {
                    $productsLowStock++;
                }
            }

            $salesOpen = Order::where('seller_id', \Auth::user()->id)
                ->ofType('order')
                ->whereNotIn('status', ['cancelled', 'closed'])
                ->get()
                ->count();

            $menu = array_merge($menu, [
                ['route' => '/products/myProducts', 'text' => trans('shop::user.your_products'), 'icon' => 'glyphicon glyphicon-briefcase', 'cont' => $productsLowStock],
                ['route' => '/orders/usersOrders', 'text' => trans('shop::user.your_sales'), 'icon' => 'glyphicon glyphicon-piggy-bank', 'cont' => $salesOpen],
            ]);
        }

        if (\Auth::user()->hasRole(['person', 'admin'])) {
            $menu[] = ['route' => '/user/orders', 'text' => trans('shop::user.your_orders'), 'icon' => 'glyphicon glyphicon-shopping-cart', 'divider' => 1, 'cont' => 0];
        }

        if (\Auth::user()->isTrusted() && config('app.offering_free_products')) {
            $menu[] = ['route' => '/user/myFreeProducts', 'text' => trans('shop::user.your_free_products'), 'icon' => 'glyphicon glyphicon-star'];
        }

        return $returnArray ? $menu : json_encode($menu);
    }

    /**
     * [Menu Top ].
     *
     * @param  bool para indicar el tipo de salida, json o array
     *
     * @return [json o array]
     *               Nota: el contenido del array interno de contener al menos route y text lo demas es opcional
     *               //[route,text,cont(para badge), divider, class, icon  ]
     *               Este menu carga el menu del Dashboard
     */
    public static function top($returnArray = false)
    {
        if (\Auth::guest()) { // invidados
            $menu = [
                ['route' => '/login', 'text' => trans('shop::user.login'), 'divider' => 1],
                ['route' => '/register', 'text' => trans('shop::user.register')],
            ];
        } else {  // logeado
            $menu = self::dashboard(true);

            //-- Web Panel(Only for admim) --
            if (\Auth::check() && \Auth::user()->isAdmin()) {
                $menu = array_merge($menu, [
                    ['route' => '/wpanel', 'text' => trans('shop::user.wpanel'), 'icon' => 'glyphicon glyphicon-cog', 'divider' => 1],
                ]);
            }
        }

        return $returnArray ? $menu : json_encode($menu);
    }

    /**
     * [Menu backend ].
     *
     * @param  bool para indicar el tipo de salida, json o array
     *
     * @return [json o array]
     *               Nota: el contenido del array interno de contener al menos route y text lo demas es opcional
     *               //[route,text,cont(para badge), divider, class, icon  ]
     */
    public static function backend($returnArray = false)
    {
        //Menu para empresas
        if (\Auth::user()->hasRole(['business', 'admin'])) {
            $menu = [
                ['route' => '/wpanel',            'text' => trans('shop::user.dashboard'),              'icon' => 'glyphicon glyphicon-dashboard'],
                ['route' => '/wpanel/profile',    'text' => trans('shop::company.store_config'),        'icon' => 'glyphicon glyphicon-cog'],
                ['route' => '/wpanel/categories', 'text' => trans('shop::categories.product_category'), 'icon' => 'glyphicon glyphicon-tasks'],
                ['route' => '/wpanel/features',   'text' => trans('shop::features.product_features'),   'icon' => 'glyphicon glyphicon-th-list'],
            ];
        }

        return $returnArray ? $menu : json_encode($menu);
    }

    /**
     * [Menu help ].
     *
     * @param  bool para indicar el tipo de salida, json o array
     *
     * @return [json o array]
     *               Nota: el contenido del array interno de contener al menos route y text lo demas es opcional
     *               //[route,text,cont(para badge), divider, class, icon  ]
     */
    public static function help($returnArray = false)
    {
        //Menu para empresas

            $menu = [
                // ['route' =>'#',      'text'=> trans('shop::globals.faq'),   ],
                ['route' => '/about', 'text' => trans('shop::company.about_us')],
                ['route' => '/refunds', 'text' => trans('shop::company.refund_policy')],
                ['route' => '/privacy', 'text' => trans('shop::company.privacy_policy')],
                ['route' => '/terms', 'text' => trans('shop::company.terms_of_service'), 'divider' => 1],
                ['route' => '/contact', 'text' => trans('shop::about.contact_us')],
            ];

        return $returnArray ? $menu : json_encode($menu);
    }
}
