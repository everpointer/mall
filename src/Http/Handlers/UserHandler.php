<?php
/**
 * This file is part of Notadd.
 *
 * @author        Qiyueshiyi <qiyueshiyi@outlook.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime      2017-03-31 11:54
 */

namespace Notadd\Shop\Http\Handlers;

use Notadd\Shop\Helpers\UserHelper;
use Illuminate\Support\Facades\Auth;
use Notadd\Foundation\Passport\Abstracts\DataHandler;

class UserHandler extends DataHandler
{
    /**
     * Save the user preferences.
     *
     * @param [String] $index user preference key array
     * @param [Array]  $tags  products tags
     */
    public static function setPreferences($index = '', $tags = [])
    {
        $user = Auth::user();
        if ($user) {
            $userHelper        = new UserHelper();
            $categories        = ProductsController::getTagsCategories($tags);
            $user->preferences = $userHelper->preferencesToJson($user->preferences, $index, $tags, $categories);
            $user->save();
        }
    }

    /**
     * Return the users preferences taking in account the key requered.
     *
     * @param  [interger] $user_id         user id
     * @param  [string]   $preferences_key user preferences array key
     *
     * @return [Array] info to evaluate user products suggestion
     */
    public static function getPreferences($preferences_key = '')
    {
        $preferences = (Auth::user()) ? Auth::user()->preferences : '';

        //getting the needle
        $userHelper = new UserHelper();

        return $userHelper->getPreferencesNeedle($preferences, $preferences_key);
    }
}
