<?php

namespace Notadd\Shop\Models;

/*
 * Antvel - Log Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use Notadd\Shop\Eloquent\Model;

class Log extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shop_logs';

    protected $fillable = ['action_type_id', 'details', 'source_id', 'user_id'];

    protected $appends = ['source_type', 'action_type'];

    protected $hidden = ['action', 'source'];

    public function action()
    {
        return $this->hasOne('App\ActionType', 'id', 'action_type_id');
    }

    public function source()
    {
        //here we validate the type of sources and return de parent reference
        //return $this->belongTo('App\xxx');
        return [];
    }

    public function getSourceTypeAttribute()
    {
        return $this->action->source_type;
    }

    public function getActionTypeAttribute()
    {
        return $this->action->action;
    }
}
