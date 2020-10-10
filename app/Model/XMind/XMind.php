<?php

namespace App\Model\XMind;

use Illuminate\Database\Eloquent\Model;

/**
 * 思维导图Model
 * Class XMind
 * @package App\Model\XMind
 */
class XMind extends Model
{
    public static $TYPE_PRIVATE = 0;
    public static $TYPE_PUBLIC = 1;

    protected $table = 'xmind_map';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
