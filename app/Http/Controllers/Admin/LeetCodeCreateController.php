<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Forms\LeetCodeCreator;
use App\Http\Controllers\BaseController;
use Encore\Admin\Layout\Content;

/**
 * LeetCode 题解生成器
 * Class LeetCodeCreateController
 * @package App\Http\Controllers\Admin
 */
class LeetCodeCreateController extends BaseController
{
    public function index(Content $content)
    {
        return $content->title("LeetCode")
            ->body(new LeetCodeCreator());
    }
}
