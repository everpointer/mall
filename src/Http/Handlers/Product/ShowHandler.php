<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-29 18:21
 */

namespace Notadd\Shop\Http\Handlers\Product;

use Notadd\Shop\Models\Order;
use Notadd\Shop\Models\Product;
use Illuminate\Support\Facades\DB;
use Notadd\Shop\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Notadd\Shop\Models\ProductDetail;
use Illuminate\Support\Facades\Session;
use Notadd\Shop\Helpers\FeaturesHelper;
use Notadd\Shop\Helpers\ProductsHelper;
use Notadd\Shop\Models\FreeProductOrder;
use Notadd\Shop\Http\Controllers\UserController;
use Notadd\Foundation\Passport\Abstracts\DataHandler;

class ShowHandler extends DataHandler
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
        $id    = intval(collect($route->parametersWithoutNulls())->get('id', 0));
        $user  = $this->request->user();

        $allWishes = '';

        if ($user) {
            $allWishes = Order::ofType('wishlist')
                ->where('user_id', $user->id)
                ->where('description', '<>', '')
                ->orderBy('id', 'desc')
                ->take(5)
                ->get();
        }

        $product = Product::select([
            'id', 'category_id', 'user_id', 'name', 'description',
            'price', 'stock', 'features', 'condition', 'rate_val',
            'rate_count', 'low_stock', 'status', 'type', 'tags', 'products_group', 'brand',
        ])->with([
            'group' => function ($query) {
                $query->select(['id', 'products_group', 'features']);
            },
        ])->with('categories')->find($id);

        if ($product) {

            // retrieving products features
            $features = ProductDetail::all()->toArray();

            // increasing product counters, in order to have a suggestion orden
            $this->setCounters($product, ['view_counts' => trans('shop::globals.product_value_counters.view')], 'viewed');

            // saving the product tags into users preferences
            if (trim($product->tags) != '') {
                UserController::setPreferences('product_viewed', explode(',', $product->tags));
            }

            // receiving products user reviews & comments
            $reviews = OrderDetail::where('product_id', $product->id)
                ->whereNotNull('rate_comment')
                ->select('rate', 'rate_comment', 'updated_at')
                ->orderBy('updated_at', 'desc')
                ->take(5)
                ->get();

            // If it is a free product, we got to retrieve its package information
            if ($product->type == 'freeproduct') {
                $order       = OrderDetail::where('product_id', $product->id)->first();
                $freeproduct = FreeProductOrder::where('order_id', $order->order_id)->first();
            }

            $freeproductId = isset($freeproduct) ? $freeproduct->freeproduct_id : 0;

            // products suggestions control
            // saving product id into suggest-listed, in order to exclude products from suggestions type "view"
            Session::push('suggest-listed', $product->id);
            $suggestions = $this->getSuggestions(['preferences_key' => $product->id, 'limit' => 4]);
            Session::forget('suggest-listed');

            // retrieving products groups of the product shown
            if (count($product->group)) {
                $featuresHelper = new FeaturesHelper();
                $product->group = $featuresHelper->group($product->group);
            }

            return compact('product', 'allWishes', 'reviews', 'freeproductId', 'features', 'suggestions');
        } else {
            return [];
        }
    }

    /**
     * Increase the product counters.
     *
     * @param [object] $product is the object which contain the product evaluated
     * @param [array]  $data    is the method config that has all the info requeried (table field, amount to be added)
     * @param [string] $wrapper is the products session array position key.
     */
    protected function setCounters($product = null, $data = [], $wrapper = '')
    {
        if (Auth::user() && $product != '' && count($data) > 0) {
            $_array = Session::get('products.' . $wrapper); //products already evaluated
            if (count($_array) == 0 || ! in_array($product->id, $_array)) {
                //looked up to make sure the product is not in $wrapper array already
                foreach ($data as $key => $value) {
                    if ($key != '' && $data[$key] != '') {
                        $product->$key = $product->$key + intval($data[$key]);
                        $product->save();
                    }
                }
                Session::push('products.' . $wrapper, $product->id); // build product list to not increase a product more than one time per day
                Session::save();
            }
        }
    }

    /**
     * To get the products suggestion, taking in account either the preference key, such as
     * (product_viewed, product_purchased, product_shared, product_categories, my_searches), or all of them.
     *
     * @param  [array] $data, which is the suggest configuration
     *
     * @return [array] $products, which will contain all the suggestion for the user either in session or suggested
     */
    protected function getSuggestions($data)
    {
        $options = [
            'user_id'         => '',
            'preferences_key' => '',
            'limit'           => '4',
            'category'        => '',
            'select'          => '*', //array with items to select
        ];

        $suggest_listed = Session::get('suggest-listed');

        if (count($suggest_listed)) {
            $suggest_listed = array_unique($suggest_listed);
        } else {
            $suggest_listed = [];
        }

        $data           = $data + $options;
        $diff           = 0;
        $productsHelper = new ProductsHelper();
        $needle['tags'] = [];

        // the suggestions based on one id (one product)
        if (is_int($data['preferences_key'])) {
            $data['preferences_key'] = [$data['preferences_key']];
        }

        // the suggestions based on a list of products
        if (is_array($data['preferences_key'])) {
            foreach ($data['preferences_key'] as $id) {
                $needleAux = Product::select('tags', 'name')
                    ->where('id', $id)
                    ->free()
                    ->orderBy('rate_count', 'desc')
                    ->first()
                    ->toArray();

                //extraction of tags and name of products
                $needle['tags'] = array_merge($needle['tags'],
                    explode(',', trim($needleAux['tags'])),
                    explode(' ', trim($needleAux['name'])));
            }
        } else {
            $needle = UserController::getPreferences($data['preferences_key']); //getting the user preferences
        }

        if (count($needle['tags']) > 0) {
            //by preferences
            if ($data['preferences_key'] == 'product_categories') {
                //look up by categories. If we want to get a specific category, we have to add "category" to data array
                DB::enableQueryLog();
                $products[0] = Product::select($data['select'])
                    ->free()
                    ->whereNotIn('id', $suggest_listed)
                    ->inCategories('category_id', $needle['tags'])
                    ->orderBy('rate_count', 'desc')
                    ->take($data['limit'])
                    ->get()
                    ->toArray();
            } else {
                // look up by products tags and name
                $products[0] = Product::select($data['select'])
                    ->free()
                    ->whereNotIn('id', $suggest_listed)
                    ->like(['tags', 'name'], $needle['tags'])
                    ->orderBy('rate_count', 'desc')
                    ->take($data['limit'])
                    ->get()
                    ->toArray();
            }
        }

        $diff = $data['limit'] - (isset($products[0]) ? count($products[0]) : 0); //limit control

        // if we get suggestion results, we save those id
        if (isset($products[0])) {
            $productsHelper->setToHaystack($products[0]);
        }

        // by rate
        if ($diff > 0 && $diff <= $data['limit']) {
            $products[1] = Product::select($data['select'])
                ->where($productsHelper->getFieldToSuggestions($data['preferences_key']), '>', '0')
                ->whereNotIn('id', $suggest_listed)
                ->free()
                ->orderBy($productsHelper->getFieldToSuggestions($data['preferences_key']), 'DESC')
                ->take($diff)
                ->get()
                ->toArray();

            $diff = $diff - count($products[1]); //limit control
        }

        //if we get suggestion results, we save those id
        if (isset($products[1])) {
            $productsHelper->setToHaystack($products[1]);
        }

        //by rand
        if ($diff > 0 && $diff <= $data['limit']) {
            $products[2] = Product::select($data['select'])
                ->free()
                ->whereNotIn('id', $suggest_listed)
                ->orderByRaw('RAND()')
                ->take($diff)
                ->get()
                ->toArray();
        }

        //if we get suggestion results, we save those id
        if (isset($products[2])) {
            $productsHelper->setToHaystack($products[2]);
        }

        //making one array to return
        $array    = [];
        $products = array_values($products);
        for ($i = 0; $i < count($products); $i++) {
            if (count($products[$i]) > 0) {
                $array = array_merge($array, $products[$i]);
            }
        }

        return $array;
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
