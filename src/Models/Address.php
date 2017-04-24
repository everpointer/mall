<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-24 16:54
 */
namespace Notadd\Mall\Models;

use Notadd\Foundation\Database\Model;
use Notadd\Foundation\Member\Member;

/**
 * Class Address.
 */
class Address extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'line1',
        'line2',
        'phone',
        'country',
        'state',
        'user_id',
        'name_contact',
        'zipcode',
        'city',
    ];

    /**
     * @var string
     */
    protected $table = 'mall_addresses';

    /**
     * Get the user who owns the address.
     */
    public function user() {
        $this->belongsTo(Member::class);
    }
}
