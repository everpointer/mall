<?php

namespace Notadd\Shop\Models;

/*
 * Antvel - Type Preferences Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use Notadd\Shop\Eloquent\Model;

class TypePreference extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'type_preferences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'status',
    ];
}
