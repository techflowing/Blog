<?php

namespace App\Model\XMind;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

/**
 * 定义导图分类Model
 * Class Category
 * @package App\Model\Navigation
 */
class Category extends Model
{
    use ModelTree, AdminBuilder;

    protected $table = 'xmind_categories';

    /**
     * 定义一对多关系，一个分类下有多个地址索引
     */
    public function xminds()
    {
        return $this->hasMany(XMind::class);
    }
}
