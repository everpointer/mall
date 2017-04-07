<?php

namespace Notadd\Shop\Http\Controllers;

/*
 * Antvel - Users Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use Illuminate\Http\Request;
use Notadd\Shop\Helpers\File;
use Notadd\Shop\Models\Order;
use Notadd\Shop\Models\Person;
use Notadd\Shop\Models\Product;
use Notadd\Shop\Models\Business;
use Notadd\Member\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Notadd\Shop\Http\Handlers\User\ShowHandler;

class UserController extends Controller
{
    private $form_rules = [
        'email'                 => 'required|email|unique:users,email,',
        'nickname'              => 'required|max:255|unique:users,nickname,',
        'old_password'          => 'required_with:password,password_confirmation',
        'password'              => 'required_with:old_password,password_confirmation|confirmed|different:old_password',
        'password_confirmation' => 'required_with:old_password,password|different:old_password|same:password',
    ];

    protected function filterFormRules()
    {
        $user = Auth::user();

        if ($user) {
            // Validacion de campos unique
            $this->form_rules['email']    .= $user->id;
            $this->form_rules['nickname'] .= $user->id;

            // Validaciones segun tipo de user
            if ($user->hasRole(['admin', 'person'])) {
                $form_rules['first_name'] = 'required|min:3|max:20|string';
                $form_rules['last_name']  = 'required|min:3|max:20|string';
            } else {
                $form_rules['business_name'] = 'required|min:5|max:30|string';
            }
        }
    }

    // Paneles por defecto Usuarios
    private $view_panel = [
        'left'   => ['width' => '2', 'class' => 'user-panel'],
        'center' => ['width' => '10'],
    ];

    /**
     * Sube imagen de perfil y background de usuario.
     *
     * @param Request $request [description]
     *
     * @return [String] [Url de la imagen]
     */
    public function upload(Request $request)
    {
        $v = Validator::make($request->all(), ['file' => 'image']);
        if ($v->fails()) {
            return $v->errors()->toJson();
        }

        return File::section('profile_img')->upload($request->file('file'));
    }

    /**
     * Vista de dashboard de usuario.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View [Vista de dashboard]
     */
    public function dashBoard()
    {
        $panel    = $this->view_panel;
        $query    = Product::where('user_id', Auth::id())->Free()->get();
        $products = ['active' => 0, 'inactive' => 0, 'lowStock' => 0, 'all' => $query->count()];
        foreach ($query as $row) {
            if ($row->status) {
                $products['active']++;
            } else {
                $products['inactive']++;
            }
            if ($row->stock <= $row->low_stock) {
                $products['lowStock']++;
            }
        }
        unset($query);
        $query  = Order::auth()->ofType('order')->get();
        $orders = ['closed' => 0, 'open' => 0, 'cancelled' => 0, 'all' => $query->count(), 'total' => 0, 'nopRate' => 0];
        foreach ($query as $row) {
            if ($row->status == 'cancelled') {
                $orders['cancelled']++;
            } elseif ($row->status == 'closed') {
                $orders['closed']++;
            } else {
                $orders['open']++;
            }
            foreach ($row->details as $deta) {
                $orders['total'] += ($deta->quantity * $deta->price);
                if ($row->status == 'closed' && ! $deta->rate) {
                    $orders['nopRate']++;
                }
            }
        }
        unset($query);
        $sales = null;
        if (Auth::check() && Auth::user()->hasRole(['business', 'admin'])) {
            $orders = Order::where('seller_id', Auth::user()->id)->ofType('order')->get();
            $sales  = ['closed' => 0, 'open' => 0, 'cancelled' => 0, 'all' => $orders->count(), 'total' => 0, 'rate' => 0, 'numRate' => 0, 'totalRate' => 0, 'nopRate' => 0];
            foreach ($orders as $row) {
                if ($row->status == 'cancelled') {
                    $sales['cancelled']++;
                } elseif ($row->status == 'closed') {
                    $sales['closed']++;
                } else {
                    $sales['open']++;
                }
                foreach ($row->details as $deta) {
                    $sales['total'] += ($deta->quantity * $deta->price);
                    if ($row->status == 'closed' && $deta->rate) {
                        $sales['numRate']++;
                        $sales['totalRate'] = $sales['totalRate'] + $deta->rate;
                    }
                    if ($row->status == 'closed' && ! $deta->rate) {
                        $sales['nopRate']++;
                    }
                }
            }
            if ($sales['numRate']) {
                $sales['rate'] = $sales['totalRate'] / $sales['numRate'];
            }
        }

        return view('user.dashboard', compact('panel', 'products', 'orders', 'sales'));
    }

    /**
     * MUestra el perfil del usuario.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(ShowHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Elimina el perfil del usuario(SOFT DELETE).
     *
     * @return string json
     */
    public function deleteAccount(Request $request)
    {
        $user = Member::findOrFail(Auth::id());
        $user->delete();

        if ($request->wantsJson()) {
            return \Response::json(['success' => true, 'message' => trans('shop::user.profile_disabled')]);
        }

        Session::flash('message', trans('shop::user.profile_disabled'));

        return redirect()->back();
    }

    /**
     * Desactiva el perfil del usuario.
     *
     * @return string json
     */
    public function disableProfile(Request $request)
    {
        $user = Auth::user();
        $date = \Carbon\Carbon::now();
        $user->update(['disabled_at' => $date]);

        if ($request->wantsJson()) {
            return \Response::json(['success' => true, 'message' => trans('shop::user.profile_disabled'), 'date' => $date->toDateTimeString()]);
        }

        Session::flash('message', trans('shop::user.profile_disabled'));

        return redirect()->back();
    }

    /**
     * Activa el perfil del usuario.
     *
     * @return string json
     */
    public function activeProfile(Request $request)
    {
        $user = Auth::user();
        $user->update(['disabled_at' => null]);

        if ($request->wantsJson()) {
            return \Response::json(['success' => true, 'message' => trans('shop::user.profile_enabled')]);
        }

        Session::flash('message', trans('shop::user.profile_enabled'));

        return redirect()->back();
    }

    /**
     * Guarda los cambio del usuario.
     *
     * @param Request $request peticion
     *
     * @return Laravel Redirect
     */
    public function saveProfile(Request $request)
    {
        try {
            $user = Auth::user();
            $this->filterFormRules();

            $v = Validator::make($request->all(), $this->form_rules);

            if ($v->fails()) {
                return response('Unvalidate', 402)->json([
                    'data' => $v->errors(),
                ]);
            }

            // user update
            $user->fill($request->all());
            $user->pic_url  = $request->get('pic_url');
            $user->password = bcrypt($request->get('password'));
            $user->save();

            // bussiness update
            if ($request->get('business_name') !== null && trim($request->get('business_name')) != '') {
                $business                = Business::find($user->id);
                $business->business_name = $request->get('business_name');
                $business->save();
            }

            // person update
            if ($request->get('first_name') !== null && trim($request->get('first_name')) != '') {
                $person             = Person::find($user->id);
                $person->first_name = $request->get('first_name');
                $person->last_name  = $request->get('last_name');
                $person->birthday   = $request->get('birthday');
                $person->sex        = $request->get('sex');
                $person->save();
            }

            return response('No Content', 204)->json([
                'messages' => 'No Content',
            ]);

        } catch (\Exception $e) {
            return response('Errors', 500)->json([
                'messages' => 'Errors'
            ]);
        }
    }

    public function getPoints()
    {
        $points = ['points' => '0'];
        $user   = Auth::user();
        if ($user) {
            $points = ['points' => $user->current_points];
        }

        return response()->json($points);
    }

    /**
     * accountVerification allows users account verification.
     *
     * @param [string] $token is the var sent to users email to validate if the account belongs to him or not.
     */
    public function accountVerification($token)
    {
        //validating if the token retrieved is valid
        $user = Member::select(['id'])
            ->where(\DB::raw('md5(concat(email, "_", "' . csrf_token() . '", "_", email))'), 'LIKE', $token)
            ->first();

        if ($user) {
            $name = $user->name . ' ' . $user->last_name;
            Session::put('message', str_replace('[name]', $name, trans('shop::user.account_verified_ok_message')));
        } else {
            Session::put('messageClass', 'alert alert-danger');
            Session::put('message', trans('shop::user.account_verified_error_message'));
        }

        Session::save();

        return redirect('/');
    }
}
