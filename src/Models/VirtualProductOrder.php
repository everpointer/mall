<?php

namespace Notadd\Shop\Models;

/*
 * Antvel - Virtual Products Order Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use Notadd\Shop\Eloquent\Model;

class VirtualProductOrder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'virtual_product_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'virtual_product_id',
        'status',
        'email',
    ];
}
