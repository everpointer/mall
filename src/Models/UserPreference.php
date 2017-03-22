<?php

namespace Notadd\Shop\Models;

/*
 * Antvel - Users Preferences Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use Notadd\Shop\Eloquent\Model;

class UserPreference extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_preferences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'type_preference_id',
        'value',
    ];
}
