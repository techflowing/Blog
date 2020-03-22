<?php

namespace App\Model\navigation;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'navigation_sites';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
