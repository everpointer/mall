<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-25 16:46
 */
namespace Notadd\Mall\Models;

use Notadd\Foundation\Database\Model;

/**
 * Class Company.
 */
class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'website_name',
        'slogan',
        'logo',
        'css_file',
        'phone_number',
        'cell_phone',
        'address',
        'theme',
        'state',
        'city',
        'zip_code',
        'email',
        'contact_email',
        'sales_email',
        'support_email',
        'status',
        'twitter',
        'facebook',
        'facebook_app_id',
        'description',
        'keywords',
        'about_us',
        'refund_policy',
        'privacy_policy',
        'terms_of_service',
    ];

    /**
     * @var string
     */
    protected $table = 'mall_companies';
}
