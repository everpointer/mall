<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-31 11:42
 */

namespace Notadd\Shop\Http\Handlers;

use Notadd\Shop\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Notadd\Shop\Helpers\ProductsHelper;
use Illuminate\Support\Facades\Session;
use Notadd\Foundation\Passport\Abstracts\DataHandler;

class ProductHandler extends DataHandler
{
    /**
     * Get the category id from tags array.
     *
     * @param [array] $tags, tags list to find out their categories
     *
     * @return [array] $categories, category id array
     */
    public static function getTagsCategories($tags = [])
    {
        $categories = Product::like('tags', $tags)
            ->groupBy('category_id')
            ->free()
            ->get(['category_id']);

        return $categories;
    }

    /**
     * Increase the product counters.
     *
     * @param [object] $product is the object which contain the product evaluated
     * @param [array]  $data    is the method config that has all the info requeried (table field, amount to be added)
     * @param [string] $wrapper is the products session array position key.
     */
    public static function setCounters($product = null, $data = [], $wrapper = '')
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
    public static function getSuggestions($data)
    {
        $options = [
            'user_id'         => '',
            'preferences_key' => '',
            'limit'           => '4',
            'category'        => '',
            'select'          => '*', // array with items to select
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

                // extraction of tags and name of products
                $needle['tags'] = array_merge($needle['tags'],
                    explode(',', trim($needleAux['tags'])),
                    explode(' ', trim($needleAux['name'])));
            }
        } else {
            $needle = UserHandler::getPreferences($data['preferences_key']); //getting the user preferences
        }

        if (count($needle['tags']) > 0) {
            // by preferences
            if ($data['preferences_key'] == 'product_categories') {
                // look up by categories. If we want to get a specific category, we have to add "category" to data array
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

        // if we get suggestion results, we save those id
        if (isset($products[1])) {
            $productsHelper->setToHaystack($products[1]);
        }

        // by rand
        if ($diff > 0 && $diff <= $data['limit']) {
            $products[2] = Product::select($data['select'])
                ->free()
                ->whereNotIn('id', $suggest_listed)
                ->orderByRaw('RAND()')
                ->take($diff)
                ->get()
                ->toArray();
        }

        // if we get suggestion results, we save those id
        if (isset($products[2])) {
            $productsHelper->setToHaystack($products[2]);
        }

        // making one array to return
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
     * To get a existing category id from products.
     *
     * @return [integer] $category_id [product category id field]
     */
    public static function getRandCategoryId()
    {
        $product = Product::select(['category_id'])
            ->free()
            ->orderByRaw('RAND()')
            ->take(1)
            ->first();

        return ($product) ? $product->id : 1;
    }

    /**
     * This method is able to return the higher rate product list, everything will depends of $point parameter.
     *
     * @param [integer] $point [it is the rate evaluates point, which allows get the products list required]
     * @param [integer] $limit [num of records to be returned]
     * @param [boolean] $tags  [it sees if we want to return a product list or a product tags list]
     *
     * @return [array or laravel collection] $_tags, $products [returning either products tags array or products collection]
     */
    public static function getTopRated($point = '5', $limit = 5, $tags = false)
    {
        if ($tags == true) {
            $products = Product::select(['id', 'tags', 'rate_count', 'rate_val'])
                ->WhereNotNull('tags')
                ->free()
                ->orderBy('rate_count', 'desc')
                ->orderBy('rate_val', 'desc')
                ->take($limit)
                ->get();

            $_tags = [];
            $products->each(function ($prod) use (&$_tags) {
                $array = explode(',', $prod->tags);
                foreach ($array as $value) {
                    if (trim($value) != '') {
                        $_tags[] = trim($value);
                    }
                }
            });

            return array_unique($_tags, SORT_STRING);
        } else {
            $products = Product::select(['id', 'name', 'description', 'features', 'price', 'type', 'stock'])
                ->free()
                ->orderBy('rate_count', 'desc')
                ->orderBy('rate_val', 'desc')
                ->take($limit)
                ->get();

            return $products;
        }
    }
}
