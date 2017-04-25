<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-25 16:36
 */
namespace Notadd\Mall\Models;

use Notadd\Foundation\Database\Model;

/**
 * Class OrderDetail.
 */
class OrderDetail extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'status',
        'delivery_date',
        'rate',
        'rate_comment',
    ];

    /**
     * @var string
     */
    protected $table = 'mall_order_details';
}
