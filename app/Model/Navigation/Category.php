<?php

namespace App\Model\Navigation;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 定义网站分类Model
 * Class Category
 * @package App\Model\Navigation
 */
class Category extends Model
{
    use ModelTree, AdminBuilder;

    protected $table = 'navigation_categories';

    /**
     * 定义有多个子Category
     * @return HasMany
     */
    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    /**
     * 定义一对多关系，一个分类下有多个地址索引
     */
    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
