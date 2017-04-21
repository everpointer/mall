<?php

namespace Notadd\Shop\Collection;

use Notadd\Shop\Models\Category;
use Notadd\Shop\Eloquent\Collection;

/**
 * Class Categories.
 */
class Categories extends Collection
{
    /**
     * @param string $parent_id
     * @param string $children
     * @param null   $list
     *
     * @return \Notadd\Shop\Eloquent\Collection
     */
    public function buildTree($parent_id = 'category_id', $children = 'children', $list = null)
    {
        return parent::buildTree($parent_id, $children, $list ?: Category::get());
    }
}
