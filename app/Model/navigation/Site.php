<?php

namespace App\Model\navigation;

use Illuminate\Database\Eloquent\Model;

/**
 * 定义具体网址信息
 * Class Site
 * @package App\Model\navigation
 */
class Site extends Model
{
    protected $table = 'navigation_sites';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
