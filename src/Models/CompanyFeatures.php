<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-25 16:49
 */
namespace Notadd\Mall\Models;

use Notadd\Foundation\Database\Model;

/**
 * Class CompanyFeatures.
 */
class CompanyFeatures extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'company_id',
        'description',
    ];

    /**
     * @var string
     */
    protected $table = 'mall_company_features';
}
