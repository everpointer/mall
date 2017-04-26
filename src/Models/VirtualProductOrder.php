<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-26 14:30
 */
namespace Notadd\Mall\Models;

use Notadd\Foundation\Database\Model;

/**
 * Class VirtualProductOrder.
 */
class VirtualProductOrder extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'email',
        'order_id',
        'virtual_product_id',
        'status',
    ];

    /**
     * @var string
     */
    protected $table = 'mall_virtual_product_orders';
}
