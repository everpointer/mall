<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-04-24 17:14
 */
namespace Notadd\Mall\Models;

use Notadd\Foundation\Database\Model;

/**
 * Class Category.
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'icon',
        'image',
        'status',
        'type',
    ];

    /**
     * @var string
     */
    protected $table = 'mall_categories';

    /**
     * Returns a list of the children categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Returns a parent category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * Returns the products list for a given category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
