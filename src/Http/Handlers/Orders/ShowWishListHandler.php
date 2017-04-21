<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-01 12:10
 */

namespace Notadd\Shop\Http\Handlers\Orders;

use Illuminate\Http\Request;
use Notadd\Shop\Models\Order;
use Notadd\Shop\Helpers\ProductsHelper;
use Illuminate\Support\Facades\Session;
use Notadd\Shop\Http\Handlers\OrderHandler;
use Notadd\Shop\Http\Handlers\ProductHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShowWishListHandler extends OrderHandler
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

    /**
     * Data for handler.
     *
     * @return array
     */
    public function data()
    {
        $route = app(\Illuminate\Routing\Route::class);
        $id    = intval(collect($route->parametersWithoutNulls())->get('id', null));

        /*
         * Checking if there is a product in flashWishList, if so, it will be saved into the basic wish list.
         * This process happens just before the user add a product to wishlist being not logged.
         * flashWishList will be deleted after being used into addToOrder method
         */
        if (Session::get('flashWishList') !== null) {
            $this->addToOrder('wishlist', Session::get('flashWishList.productId'), new Request());
            Session::forget('flashWishList');
            Session::save();
        }

        // saving added to wishlist message (it happens when the product is added to wishlist, and the method call this one)
        Session::forget('suggest-listed');
        if (Session::has('message')) {
            Session::push('message', Session::get('message'));
        }

        $user = $this->request->user();

        $productsHelper = new ProductsHelper();

        $suggestions = [];

        $hasWishList = true;

        $hasLaterCart = true;

        $wishListName = trans('shop::store.basic_wish_list');

        if ($user) {
            /*
             * it is used to verify whether the order required exist or not.
             * if the order exists, its content is returned, otherwise,
             * the basic wish list is retrieved
             * @var string
             */
            $order = '';

            /*
             * validating if there's a order requested.
             * if it fails, there will be an 404 exception threw
             */
            try {
                $order = Order::findOrFail($id);
            } catch (ModelNotFoundException $e) {
                if (trim($id) != '') {
                    return [];
                }
            }

            // if the user requires a specific wish list, its details will be provided
            if ($order) {
                $cart = Order::ofType('wishlist')
                    ->with('details')
                    ->where('user_id', $user->id)
                    ->where('id', $order->id)
                    ->first();

                /**
                 * $wishListName will have the wish list name to be showed in the view.
                 *
                 * @var string
                 */
                $wishListName = $cart ? $cart->description : $wishListName;
            }

            // if the required wish list does not exist, the default one  will beprovided
            else {
                $cart = Order::ofType('wishlist')
                    ->with('details')
                    ->where('user_id', $user->id)
                    ->first();
            }

            /*
             * listing the user wish lists saved in his account.
             * if there was a specific wish list requiered, it will be excluded from the directory list
             */

            $wishLists = Order::select(['id', 'user_id', 'description'])
                ->ofType('wishlist')
                ->with('details')
                ->where('description', '<>', '')
                ->where('user_id', $user->id)
                ->where('id', '<>', $cart ? $cart->id : '')
                ->take(5)
                ->get();

            // products list saved for later
            $laterCart = Order::ofType('later')
                ->with('details')
                ->where('user_id', $user->id)
                ->first();

            // evaluating wish list
            if ($cart) {
                if ($cart->details && $cart->details->count() > 0) {
                    // saving the ids selected to not include them into suggestions.
                    $productsHelper->setToHaystack($cart->details, 'product_id');
                } else {
                    $hasWishList = false;
                }
            } else {
                $hasWishList = false;
            }

            // evaluating wish list
            if ($laterCart) {
                if ($laterCart->details && $laterCart->details->count() > 0) {
                    // saving the ids selected to not include them into suggestions.
                    $productsHelper->setToHaystack($laterCart->details, 'product_id');
                } else {
                    $hasLaterCart = false;
                }
            } else {
                $hasLaterCart = false;
            }
        } // if ($user)

        else {
            return [];
        }

        // suggestions based on cart content
        $suggestions = ProductHandler::getSuggestions(['preferences_key' => Session::get('suggest-listed'), 'limit' => 4]);

        Session::forget('suggest-listed');

        return compact(
            'cart',
            'user',
            'suggestions',
            'cart',
            'laterCart',
            'wishLists',
            'wishListName',
            'hasWishList',
            'hasLaterCart'
        );
    }

    /**
     * Errors for handler.
     *
     * @return array
     */
    public function errors()
    {
        return [
            '查看心愿单失败！',
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
            '查看心愿单成功！',
        ];
    }
}
