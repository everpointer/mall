<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-25 16:35
 */
namespace Notadd\Mall\Models;

use Notadd\Foundation\Database\Model;

/**
 * Class Order.
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address_id',
        'status',
        'type',
        'description',
        'end_date',
        'seller_id',
    ];

    /**
     * @var string
     */
    protected $table = 'mall_orders';
}
