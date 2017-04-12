<?php

namespace Notadd\Shop\Http\Controllers;

/*
 * Antvel - Products Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use Illuminate\Http\Request;
use Notadd\Foundation\Passport\Responses\ApiResponse;
use Notadd\Shop\Helpers\File;
use Notadd\Shop\Models\Product;
use Notadd\Shop\Models\Category;
use Notadd\Shop\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Notadd\Shop\Models\ProductDetail;
use Notadd\Shop\Models\VirtualProduct;
use Notadd\Shop\Helpers\ProductsHelper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Notadd\Shop\Helpers\FeaturesHelper;
use Illuminate\Support\Facades\Validator;
use Notadd\Shop\Http\Handlers\Product\ShowHandler;
use Notadd\Shop\Http\Handlers\Product\CreateHandler;
use Notadd\Shop\Http\Handlers\Product\SearchHandler;
use Notadd\Shop\Http\Handlers\Product\ShowMyHandler;

class ProductsController extends Controller
{
    private $form_rules = [
        'amount'       => 'required|numeric|digits_between:1,11|min:0',
        'bar_code'     => 'max:255',
        'category_id'  => 'required',
        'condition'    => 'required',
        'description'  => 'required|max:500',
        'key'          => 'required',
        'key_software' => 'required',
        'type'         => 'required',
        'low_stock'    => 'numeric|digits_between:1,11|min:0',
        'name'         => 'required|max:100',
        'price'        => 'required|numeric|digits_between:1,10|min:1',
        'software'     => 'required',
        'software_key' => 'required',
        'stock'        => 'required|numeric|digits_between:1,11|min:0',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(SearchHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(ShowHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    public function myProducts(ShowMyHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(CreateHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            if (! $request->input('type')) {
                return response()->json([
                    'messages' => trans('shop::globals.error') . ' ' . trans('shop::globals.induced_error'),
                ]);
            }

            $rules = $this->rulesByTypes($request);
            $v     = Validator::make($request->all(), $rules);

            if ($v->fails()) {
                return response()->json(['data' => $v->errors()]);
            }

            $features = $this->validateFeatures($request->all());
            if (! is_string($features)) {
                return response()->json(['data' => $features]);
            }

            $product              = new Product();
            $product->name        = $request->input('name');
            $product->category_id = $request->input('category_id');
            $product->user_id     = Auth::id();
            $product->description = $request->input('description');
            $product->bar_code    = $request->input('bar_code');
            $product->brand       = $request->input('brand');
            $product->price       = $request->input('price');
            $product->condition   = $request->input('condition');
            $product->features    = $features;
            $product->type        = $request->input('type');
            if ($request->input('type') == 'item') {
                $product->stock     = $request->input('stock');
                $product->low_stock = $request->input('low_stock');
                if ($request->input('stock') > 0) {
                    $product->status = $request->input('status');
                } else {
                    $product->status = 0;
                }
            } else {
                $product->status = $request->input('status');
            }
            $product->save();
            $message = '';
            if ($request->input('type') != 'item') {
                switch ($request->input('type')) {
                    case 'key':
                        $num = 0;
                        if (! Storage::disk('local')->exists($request->input('key'))) {
                            return response()->json(['data' => [trans('shop::globals.file_does_not_exist')]]);
                        }

                        $contents                   = Storage::disk('local')->get($request->input('key'));
                        $contents                   = explode("\n", rtrim($contents));
                        $warning                    = false;
                        $len                        = 0;
                        $virtualProduct             = new virtualProduct();
                        $virtualProduct->product_id = $product->id;
                        $virtualProduct->key        = 'undefined';
                        $virtualProduct->status     = 'cancelled';
                        $virtualProduct->save();
                        foreach ($contents as $row) {
                            $virtualProduct             = new virtualProduct();
                            $virtualProduct->product_id = $product->id;
                            $virtualProduct->status     = 'open';
                            $virtualProduct->key        = $row;
                            $virtualProduct->save();
                            $num++;
                            if ($len == 0) {
                                $len = strlen(rtrim($row));
                            } elseif (strlen(rtrim($row)) != $len) {
                                $warning = true;
                            }
                        }
                        $product->stock = $num;
                        if ($num == 0) {
                            $product->status = 0;
                        }
                        $product->save();
                        $message = ' ' . trans('shop::product.controller.review_keys');
                        if ($warning) {
                            $message .= ' ' . trans('shop::product.controller.may_invalid_keys');
                        }
                        Storage::disk('local')->deleteDirectory('key_code/' . Auth::id());
                        break;
                    case 'software':
                        break;
                    case 'software_key':
                        break;
                    case 'gift_card':
                        break;
                }
            }

            return response()->json([
                'code'     => 201,
                'messages' => trans('shop::product.controller.saved_successfully') . $message,
                'data'     => [],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'code'    => 500,
                'message' => '500',
                'data'    => [],
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (Auth::id() != $product->user_id) {
            return redirect('products/' . $product->user_id)->withErrors(['not_access' => [trans('shop::globals.not_access')]]);
        }

        $typeItem = $product->type;
        $disabled = '';

        $order = OrderDetail::where('product_id', $id)
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->first();

        if ($order) {
            $disabled = 'disabled';
        }

        $features = ProductDetail::all()->toArray();

        $allCategoriesStore = Category::actives()->lightSelection()->get()->toArray();

        $categories = ['' => trans('shop::product.controller.select_category')];

        //categories drop down formatted
        ProductsHelper::categoriesDropDownFormat($allCategoriesStore, $categories);

        $condition = ['new' => trans('shop::product.controller.new'), 'refurbished' => trans('shop::product.controller.refurbished'), 'used' => trans('shop::product.controller.used')];

        $edit  = true;
        $panel = $this->panel;

        $oldFeatures = ProductDetail::oldFeatures($product->features);

        $productsDetails = new FeaturesHelper();

        return view('products.form', compact('product', 'panel', 'features', 'categories', 'condition', 'typeItem', 'disabled', 'edit', 'oldFeatures', 'productsDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        if (! $request->input('type')) {
            return redirect()->back()
                ->withErrors(['induced_error' => [trans('shop::globals.error') . ' ' . trans('shop::globals.induced_error')]])->withInput();
        }
        $rules = $this->rulesByTypes($request, true);
        $order = OrderDetail::where('product_id', $id)->join('orders', 'order_details.order_id', '=', 'orders.id')->first();
        if ($order) {
            unset($rules['name']);
            unset($rules['category_id']);
            unset($rules['condition']);
        }
        $v = Validator::make($request->all(), $rules);
        if ($v->fails()) {
            return redirect()->back()
                ->withErrors($v->errors())->withInput();
        }
        $features = $this->validateFeatures($request->all());
        if (! is_string($features)) {
            return redirect()->back()
                ->withErrors($features)->withInput();
        }
        $product = Product::find($id);
        if (Auth::id() != $product->user_id) {
            return redirect('products/' . $product->user_id)->withErrors(['feature_images' => [trans('shop::globals.not_access')]]);
        }
        if (! $order) {
            $product->name        = $request->input('name');
            $product->category_id = $request->input('category_id');
            $product->condition   = $request->input('condition');
        }
        $product->status      = $request->input('status');
        $product->description = $request->input('description');
        $product->bar_code    = $request->input('bar_code');
        $product->brand       = $request->input('brand');
        $product->price       = $request->input('price');
        $product->features    = $features;
        if ($request->input('type') == 'item') {
            $product->stock     = $request->input('stock');
            $product->low_stock = $request->input('low_stock');
            if ($request->input('stock') > 0) {
                $product->status = $request->input('status');
            } else {
                $product->status = 0;
            }
        } else {
            $product->status = $request->input('status');
        }
        $product->save();
        $message = '';
        if ($request->input('type') != 'item') {
            switch ($request->input('type')) {
                case 'key':
                    if ($request->input('key') != '' && Storage::disk('local')->exists('key_code' . $request->input('key'))) {
                        $contents = Storage::disk('local')->get('key_code' . $request->input('key'));
                        $contents = explode("\n", rtrim($contents));
                        $warning  = false;
                        $len      = 0;
                        foreach ($contents as $row) {
                            $virtualProduct             = new virtualProduct();
                            $virtualProduct->product_id = $product->id;
                            $virtualProduct->key        = $row;
                            $virtualProduct->status     = 'open';
                            $virtualProduct->save();
                            if ($len == 0) {
                                $len = strlen(rtrim($row));
                            } elseif (strlen(rtrim($row)) != $len) {
                                $warning = true;
                            }
                        }
                        $stock          = count(VirtualProduct::where('product_id', $product->id)->where('status', 'open')->get()->toArray());
                        $product->stock = $stock;
                        if ($stock == 0) {
                            $product->status = 0;
                        }
                        $product->save();
                        $message = ' ' . trans('shop::product.controller.review_keys');
                        if ($warning) {
                            $message .= ' ' . trans('shop::product.controller.may_invalid_keys');
                        }
                        Storage::disk('local')->deleteDirectory('key_code/' . Auth::id());
                    }
                    break;
                case 'software':

                    break;
                case 'software_key':

                    break;
                case 'gift_card':

                    break;
            }
        }
        Session::flash('message', trans('shop::product.controller.saved_successfully') . $message);

        return redirect('products/' . $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (Auth::id() != $product->user_id) {
            return redirect('products/' . $product->user_id)->withErrors(['feature_images' => [trans('shop::globals.not_access')]]);
        }
        $product->status = 0;
        $product->save();
        Session::flash('message', trans('shop::product.controller.saved_successfully'));

        return redirect('products/' . $product->id);
    }

    /**
     * Change status a Product.
     *
     * @param int $id
     */
    public function changeStatus(ApiResponse $response, $id)
    {
        $product = Product::select('id', 'user_id', 'features', 'status', 'type')->find($id);

        if (Auth::id() != $product->user_id) {
            return $response->withParams([
                'code'    => 403,
                'message' => trans('shop::globals.not_access'),
                'data'    => [],
            ]);
        }

        $product->status = ($product->status) ? 0 : 1;
        $product->save();

        return $response->withParams([
            'code'    => 204,
            'message' => trans('shop::product.controller.saved_successfully'),
            'data'    => [],
        ]);
    }

    /**
     *   upload image file.
     *
     * @param Resquest     file to upload
     *
     * @return string
     */
    public function upload(Request $request)
    {
        $v = Validator::make($request->all(), ['file' => 'image']);
        if ($v->fails()) {
            return $v->errors()->toJson();
        }

        return File::section('product_img')->upload($request->file('file'));
    }

    /**
     *   delete image file.
     *
     * @param Resquest     file to upload
     *
     * @return string
     */
    public function deleteImg(Request $request)
    {
        return File::deleteFile($request->get('file'));
    }

    /**
     *   upload the keys file in txt format.
     *
     * @param Resquest     file to upload
     *
     * @return string
     */
    public function upload_key(Request $request)
    {
        $v = Validator::make($request->all(), ['file' => 'mimes:txt']);
        if ($v->fails()) {
            return $v->errors()->toJson();
        }

        return File::section('product_key')->upload($request->file('file'));
    }

    /**
     *   upload the software file in txt format.
     *
     * @param Resquest     file to upload
     *
     * @return string
     */
    public function upload_software(Request $request)
    {
        $v = Validator::make($request->all(), ['file' => 'mimes:zip,rar']);
        if ($v->fails()) {
            return $v->errors()->toJson();
        }

        return 'README.7z';

        return File::section('product_software')->upload($request->file('file'));
    }

    /**
     *   dowload file txt example.
     *
     * @param Resquest     file to upload
     *
     * @return string
     */
    public function downloadExample()
    {
        return response()->download(storage_path() . '/files/key_code/example_keys.txt', 'file.txt');
    }

    /**
     *   validate product feature, as specified in the table of product details.
     *
     * @param  [array] $data all inputs
     *
     * @return [string|array]
     */
    private function validateFeatures($data)
    {
        $features       = ProductDetail::all()->toArray();
        $features_rules = [];
        $message_rules  = [];
        foreach ($features as $row) {
            if ($row['status'] == 'active' && $row['validationRulesArray']) {
                if ($row['max_num_values'] * 1 == 1) {
                    $features_rules['feature_' . $row['indexByName']] = $row['validationRulesArray'][$row['indexByName'] . '_1'] ? $row['validationRulesArray'][$row['indexByName'] . '_1'] : '';
                    $message_rules                                    = array_merge($message_rules, $this->validationMessagesFeatures($row['validationRulesArray'][$row['indexByName'] . '_1'], 'feature_' . $row['indexByName'], $row['upperName']));
                } else {
                    for ($i = 1; $i <= ($row['max_num_values'] * 1); $i++) {
                        $features_rules['feature_' . $row['indexByName'] . '_' . $i] = $row['validationRulesArray'][$row['indexByName'] . '_' . $i] ? $row['validationRulesArray'][$row['indexByName'] . '_' . $i] : '';
                        $message_rules                                               = array_merge($message_rules, $this->validationMessagesFeatures($row['validationRulesArray'][$row['indexByName'] . '_' . $i], 'feature_' . $row['indexByName'] . '_' . $i, $row['upperName']));
                    }
                }
            }
        }
        // dd($data, $features_rules,$message_rules);
        $v = Validator::make($data, $features_rules, $message_rules);
        if ($v->fails()) {
            $array  = [];
            $errors = $v->errors()->toArray();
            foreach ($errors as $error) {
                foreach ($error as $row) {
                    $array[] = $row;
                }
            }

            return array_unique($array);
        }
        $array = [];
        foreach ($features as $row) {
            $values = [];
            if (($row['max_num_values'] * 1) !== 1) {
                for ($i = 1; $i <= ($row['max_num_values'] * 1); $i++) {
                    if (! $data['feature_' . $row['indexByName'] . '_' . $i]) {
                        continue;
                    }
                    if ($row['help_message'] != '' && (strpos('video image document', $row['input_type']) === false)) {
                        $message = '';
                        if (isset($row['helpMessageArray']['general'])) {
                            $message = $row['helpMessageArray']['general'];
                        } elseif (isset($row['helpMessageArray']['specific'])) {
                            $message = $row['helpMessageArray']['specific'][$row['indexByName'] . '_' . $i];
                        } elseif (isset($row['helpMessageArray']['general_selection'])) {
                            $message = $data['help_msg_' . $row['indexByName']];
                        } elseif (isset($row['helpMessageArray']['specific_selection'])) {
                            $message = $data['help_msg_' . $row['indexByName'] . '_' . $i];
                        }
                        $values[] = [$data['feature_' . $row['indexByName'] . '_' . $i], $message];
                    } else {
                        $values[] = $data['feature_' . $row['indexByName'] . '_' . $i];
                    }
                }
            } else {
                if (isset($data['feature_' . $row['indexByName']]) && ! $data['feature_' . $row['indexByName']]) {
                    continue;
                }
                if ($row['help_message'] != '' && (strpos('video image document', $row['input_type']) === false)) {
                    $message = '';
                    if (isset($row['helpMessageArray']['general'])) {
                        $message = $row['helpMessageArray']['general'];
                    } elseif (isset($row['helpMessageArray']['general_selection'])) {
                        $message = $data['help_msg_' . $row['indexByName']];
                    }
                    $values = [$data['feature_' . $row['indexByName']], $message];
                } else {
                    $values = isset($data['feature_' . $row['indexByName']]) ? $data['feature_' . $row['indexByName']] : '';
                }
            }
            if ($values) {
                $array[$row['indexByName']] = $values;
            }
        }

        return json_encode($array);
    }

    /**
     * create the error message by taking the name feature, and validation rules.
     *
     * @param  [string] $rules Validation rules
     * @param  [string] $index name feature without spaces
     * @param  [string] $name  name feature
     *
     * @return [array] $return
     */
    private function validationMessagesFeatures($rules, $index, $name)
    {
        $return = [];
        if (strpos($rules, '|in') !== false) {
            $return[$index . '.in'] = $name . ' ' . trans('shop::features.is_invalid');
        }
        if (strpos($rules, '|numeric') !== false) {
            $return[$index . '.numeric'] = $name . ' ' . trans('shop::features.only_allows_numbers');
            if (strpos($rules, '|min') !== false) {
                $num                     = explode('min:', $rules);
                $num                     = explode('|', $num[1]);
                $return[$index . '.min'] = $name . ' ' . str_replace('*N*', $num[0], trans('shop::features.minimum_number'));
            } elseif (strpos($rules, '|max') !== false) {
                $num                     = explode('max:', $rules);
                $num                     = explode('|', $num[1]);
                $return[$index . '.max'] = $name . ' ' . str_replace('*N*', $num[0], trans('shop::features.maximum_number_2'));
            } elseif (strpos($rules, '|between') !== false) {
                $num                         = explode('between:', $rules);
                $num                         = explode('|', $num[1]);
                $num                         = explode(',', $num[0]);
                $return[$index . '.between'] = $name . ' ' . str_replace(['*N1*', '*N2*'], $num, trans('shop::features.between_n_and_n'));
            }
        } else {
            if (strpos($rules, '|alpha') !== false) {
                $return[$index . '.alpha'] = $name . ' ' . trans('shop::features.only_allows_letters');
            }
            if (strpos($rules, '|min') !== false) {
                $num                     = explode('min:', $rules);
                $num                     = explode('|', $num[1]);
                $return[$index . '.min'] = $name . ' ' . str_replace('*N*', $num[0], trans('shop::features.minimum_characters'));
            } elseif (strpos($rules, '|max') !== false) {
                $num                     = explode('max:', $rules);
                $num                     = explode('|', $num[1]);
                $return[$index . '.max'] = $name . ' ' . str_replace('*N*', $num[0], trans('shop::features.maximum_characters'));
            } elseif (strpos($rules, '|between') !== false) {
                $num                         = explode('between:', $rules);
                $num                         = explode('|', $num[1]);
                $num                         = explode(',', $num[0]);
                $return[$index . '.between'] = $name . ' ' . str_replace(['*N1*', '*N2*'], $num, trans('shop::features.between_n_and_n_characters'));
            }
        }
        if (strpos($rules, 'required_without_all') !== false) {
            $return[$index . '.required_without_all'] = $name . ' ' . trans('shop::features.one_is_required');
        } elseif (strpos($rules, 'required_with') !== false) {
            $return[$index . '.required_with'] = $name . ' ' . trans('shop::features.is_required');
        } elseif (strpos($rules, 'required') !== false) {
            $return[$index . '.required'] = $name . ' ' . trans('shop::features.is_required');
        }

        return $return;
    }

    private function rulesByTypes($request, $edit = false)
    {
        $rules = $this->form_rules;
        switch ($request->input('type')) {
            case 'item':
                unset($rules['amount']);
                unset($rules['key']);
                unset($rules['software']);
                unset($rules['key_software']);
                unset($rules['software_key']);
                break;
            case 'key':
                unset($rules['amount']);
                unset($rules['stock']);
                unset($rules['low_stock']);
                unset($rules['software']);
                unset($rules['key_software']);
                unset($rules['software_key']);
                if ($edit) {
                    unset($rules['key']);
                }
                break;
            case 'software':
                unset($rules['amount']);
                unset($rules['stock']);
                unset($rules['low_stock']);
                unset($rules['key']);
                unset($rules['key_software']);
                unset($rules['software_key']);
                if ($edit) {
                    unset($rules['software']);
                }
                break;
            case 'software_key':
                unset($rules['amount']);
                unset($rules['stock']);
                unset($rules['low_stock']);
                unset($rules['key']);
                unset($rules['software']);
                if ($edit) {
                    unset($rules['key_software']);
                    unset($rules['software_key']);
                }
                break;
            case 'gift_card':
                unset($rules['stock']);
                unset($rules['low_stock']);
                unset($rules['key']);
                unset($rules['software']);
                unset($rules['key_software']);
                unset($rules['software_key']);
                break;
            default:
                return redirect()->back()
                    ->withErrors(['induced_error' => [trans('shop::globals.error') . ' ' . trans('shop::globals.induced_error')]])->withInput();
                break;
        }

        return $rules;
    }

    /**
     * [Search products in auto complete fields].
     *
     * @param Request $request [Request laravel]
     *
     * @return [type] [json array]
     */
    public function searchAll(Request $request)
    {
        $crit                 = $request->get('crit');
        $suggest              = $request->get('suggest');
        $group                = $request->get('group');
        $response['products'] = ['results' => null, 'suggestions' => null];

        $crit = str_replace(' ', '%', trim($crit));
        $crit = str_replace('%%', '%', $crit);

        if ($crit != '') {
            if ($suggest) {
                $response['products']['categories'] = Category::select('id', 'name')
                    ->search($crit, null, true)
                    ->actives()
                    ->where('type', 'store')
                    ->orderBy('name')
                    ->take(3)
                    ->get();
            }

            $response['products']['results'] = Product::where(function ($query) use ($crit) {
                $query->where('name', 'like', '%' . $crit . '%')
                    ->orWhere('description', 'like', '%' . $crit . '%');
            })
                ->select('id', 'name', 'products_group')
                ->actives()
                ->free()
                ->orderBy('rate_val', 'desc');
            if ($group) {
                $response['products']['results']->where(function ($query) use ($group) {
                    $query->where('products_group', '<>', $group)
                        ->orWhereNull('products_group');
                })->where('id', '<>', $group);
            }

            $response['products']['results'] = $response['products']['results']->take(5)->get();

            $deep = '';
            if ($suggest) {
                $crit = str_replace('%', '', $crit);
                for ($i = 0; $i < strlen($crit); $i++) {
                    $deep .= ' ' . $crit[$i];
                }
            }

            if (! $response['products']['results']->count() && strlen($crit) > 2) {
                $response['products']['results'] = Product::select('id', 'name', 'products_group')
                    ->search($deep, null, true)
                    ->actives()
                    ->free()
                    ->orderBy('rate_val', 'desc');
                if ($group) {
                    $response['products']['results']->where(function ($query) use ($group) {
                        $query->where('products_group', '<>', $group)
                            ->orWhereNull('products_group');
                    })->where('id', '<>', $group);
                }

                $response['products']['results'] = $response['products']['results']->take(5)->get();
            }

            if ($suggest) {
                $response['products']['suggestions'] = self::getSuggestions([
                    'user_id'         => Auth::id(),
                    'preferences_key' => 'my_searches',
                    'limit'           => 3,
                    'select'          => ['id', 'name', 'features'],
                ]);

                if (! $response['products']['categories']->count() && strlen($crit) > 2) {
                    $response['products']['categories'] = Category::select('id', 'name')
                        ->search($deep, null, true)
                        ->actives()
                        ->where('type', 'store')
                        ->orderBy('name')
                        ->take(3)
                        ->get();
                }
            }
        }

        $response['products']['categories_title']  = trans('shop::globals.suggested_categories');
        $response['products']['suggestions_title'] = trans('shop::globals.suggested_products');
        $response['products']['results_title']     = trans('shop::globals.searchResults');

        if ($request->wantsJson()) {
            return json_encode($response);
        } else {
            if (env('APP_DEBUG', false)) {
                dd($response);
            }
        }
    }

    /**
     * getFeatures
     * Allows consulting products features. It can return either a required feature or a full array.
     *
     * @param array $data function setting
     *
     * @return [type] feature or a full array
     */
    public function getFeatures($data = [])
    {
        $options = [
            'product'    => [],
            'product_id' => '',
            'feature'    => '',
        ];

        $features = [];
        $data     = $data + $options;

        if (count($data['product']) > 0) {
            $features = $data['product']->features;
        } elseif (trim($data['product_id']) != '') {
            $product  = Product::find($data['product_id']);
            $features = $product->features;
        }

        return trim($data['feature']) != '' ? $features[$data['feature']] : $features;
    }
}
