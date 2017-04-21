<?php
/**
 * This file is part of Notadd.
 *
 * @author Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-06 17:38
 */

namespace Notadd\Shop\Http\Handlers\User;

use Notadd\Member\Models\Member;
use Illuminate\Support\Facades\Auth;
use Notadd\Foundation\Passport\Abstracts\DataHandler;

class ShowHandler extends DataHandler
{
    public function data()
    {
        $user  = Member::findOrFail(Auth::id())->relationsToArray();

        return compact('user');
    }

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
