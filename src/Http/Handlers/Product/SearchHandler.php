<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-03-29 17:58
 */

namespace Notadd\Shop\Http\Handlers\Product;

use Notadd\Shop\Models\Product;
use Notadd\Shop\Models\Category;
use Notadd\Shop\Helpers\Utility;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Cache;
use Notadd\Shop\Helpers\ProductsHelper;
use Notadd\Shop\Http\Handlers\UserHandler;
use Notadd\Foundation\Passport\Abstracts\DataHandler;

class SearchHandler extends DataHandler
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
        /**
         * $refine
         * array that contains all the information retrieved through the URL
         * array_unique is applied to avoid redundant variables.
         *
         * @var array
         */
        $refine = Utility::requestToArrayUnique($this->request->all());

        /**
         * $search
         * this var contains the information typed into search box.
         *
         * @var [type]
         */
        $search = $this->request->get('search');

        /**
         * $products
         * Filtered products list.
         *
         * @var [type]
         */
        $products = Product::select('id', 'category_id', 'name', 'price', 'description', 'condition', 'brand', 'rate_val', 'type', 'features', 'parent_id', 'tags')
            ->search($search)
            ->refine($refine)
            ->free()
            ->actives()
            ->orderBy('rate_val', 'desc');

        /**
         * $all_products
         * it is the product list refined, which will be used in each filter process below.
         *
         * @var [type]
         */
        $all_products = $products->get();

        /**
         * $suggestions
         * Array which contains the user product suggestions.
         *
         * @var array
         */
        $suggestions = [];
        if (count($all_products) < 28) {
            $suggestions = ProductsHelper::suggest('my_searches');
        }

        /*
         * $filters
         * it is the refine menu array, which is used to build the search options
         * @var [type]
         */
        $category_id = $this->request->get('category') ? $this->request->get('category') : 'mothers';
        $categories = Cache::remember('categories_' . $category_id, 25, function () use ($category_id) {
            return Category::select('id', 'name')
                ->childsOf($category_id)
                ->actives()
                ->get()
                ->toArray();
        });

        $filters = ProductsHelper::countingProductsByCategory($all_products, $categories);

        // condition
        $filters['conditions'] = array_count_values($all_products->pluck('condition')->toArray());

        // brand filter
        $filters['brands'] = array_count_values($all_products->pluck('brand')->toArray());

        // features
        $features = [];
        $irrelevant_features = ['images', 'dimensions', 'weight', 'brand']; //this has to be in company setting module
        foreach ($all_products->pluck('features') as $feature) {
            $feature = array_except($feature, $irrelevant_features);
            foreach ($feature as $key => $value) {
                $features[$key][] = $value;
            }
        }

        // products by feature
        foreach ($features as $key => $value) {
            foreach ($features[$key] as $row) {
                if (!is_array($row)) {
                    $filters[$key][$row] = !isset($filters[$key][$row]) ? 1 : $filters[$key][$row] + 1;
                }
            }
        }

        // prices filter
        $prices = $all_products->pluck('price', 'price')->toArray();

        sort($prices);

        // saving tags from searching products in users preferences
        if ($search != '') {
            $my_searches = [];
            $cont = 0;
            foreach ($all_products as $product) {
                if (trim($product->tags) != '') {
                    $my_searches = array_merge($my_searches, explode(',', $product->tags));
                }
                if ($cont++ == 10) {
                    break;
                }
            }

            if (count($my_searches) > 0) {
                UserHandler::setPreferences('my_searches', $my_searches);
            }
        }

        $products = $products->paginate(28);
        $products->each(function (&$item) {
            if ($item['rate_count'] > 0) {
                $item['num_of_reviews'] = $item['rate_count'].' '. Lang::choice('store.review', $item['rate_count']);
            }
        });

        return compact('filters', 'products', 'listActual', 'search', 'refine', 'suggestions');
    }

    /**
     * Errors for handler.
     *
     * @return array
     */
    public function errors()
    {
        return [
            '搜索产品失败！',
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
            '搜索产品成功！',
        ];
    }
}
