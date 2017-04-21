<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-03-31 12:20
 */

namespace Notadd\Shop\Http\Handlers;

use Illuminate\Support\Facades\Session;
use Notadd\Foundation\Passport\Abstracts\DataHandler;

class OrderHandler extends DataHandler
{
    /**
     * fromGuestToUser
     * This method is able to transfer all the guest shopping cart user to an user cart order.
     * It happens when a guest user has a shopping cart and press in checkout button.
     *
     * @param [object] $ordersController. Order controller object, which is passed through Authentication middleware.
     */
    public static function fromGuestToUser($ordersController)
    {
        /**
         * $cart_content contains the guest shopping cart information.
         *
         * @var [array]
         */
        $cart_content = Session::get('user.cart_content');

        //dd($cart_content, Session::get('user.cart'));

        foreach (Session::get('user.cart_content') as $product => $value) {
            $ordersController->addToOrder(
                'cart',
                $product,
                new Request(
                    [
                        'quantity'    => $cart_content[$product] != '' ? $cart_content[$product] : 1,
                        'guestToUser' => 1,
                    ]
                )
            );
        }

        Session::forget('user.cart');
        Session::forget('user.cart_content');
        Session::save();
    }
}
