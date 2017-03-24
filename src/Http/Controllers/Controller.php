<?php

namespace Notadd\Shop\Http\Controllers;

use Notadd\Shop\Eloquent\Model;
use Notadd\Shop\Eloquent\Collection;
use Notadd\Foundation\Routing\Abstracts\Controller as BaseController;

abstract class Controller extends BaseController
{
    protected static function isAssoc($arr)
    {
        $len = count($arr);
        $keys = array_keys($arr);
        for ($i = 0; $i < $len; $i++) {
            if ($i !== $keys[$i]) {
                return true;
            }
        }

        return false;
    }

    protected function json_or_dd($data, $only_data = true)
    {
        if ($data instanceof Collection) {
            $array = $data->toArray();
        } elseif ($data instanceof Model) {
            $array = $data->toArray();
        } else {
            $array = $data;
        }
        if (\Request::wantsJson() || !env('APP_DEBUG', false)) {
            die(json_encode($array));
        }
        if ($only_data) {
            dd($array);
        }
        dd($data);
    }
}
