<?php

namespace Notadd\Shop\Http\Controllers;

use Notadd\Member\Models\Member;
use Notadd\Shop\Models\Order;
use Notadd\Shop\Models\Product;
use Notadd\Shop\Models\FreeProduct;
use Illuminate\Support\Facades\Auth;
use Notadd\Shop\Helpers\ProductsHelper;

class HomeController extends Controller
{
    public function index()
    {
        $seeder = new \DatabaseSeeder();
        dd($seeder->run());

        // $members = Member::with('profile')->get()->toArray();
        // dd($members);

        $helperProd = new ProductsHelper();

        $carousel = $helperProd->suggest('carousel');
        $viewed = $helperProd->suggest('viewed', 8);
        $categories = $helperProd->suggest('categories');
        $purchased = $helperProd->suggest('purchased');

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

        $tagsCloud = ProductsController::getTopRated(0, 20, true);

        $allWishes = '';
        $user = Auth::user();
        if ($user) {
            $allWishes = Order::ofType('wishlist')->where('user_id', $user->id)->where('description', '<>', '')->get();
        }

        $banner = [
            '/img/banner/01.png',
            '/img/banner/02.png',
            '/img/banner/03.png',
            '/img/banner/04.png',
        ];

        return response()->json(compact('suggestion', 'allWishes', 'events', 'tagsCloud', 'banner'));
    }

    private function createTags()
    {
        $product = Product::select(['id', 'name'])->get();

        foreach ($product as $value) {
            $prod = Product::find($value->id);

            $prod->tags = str_replace(' ', ',', $value->name);

            $prod->save();
        }
    }
}
