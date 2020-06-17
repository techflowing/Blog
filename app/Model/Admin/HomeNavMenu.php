<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * 首页顶部菜单配置类
 * Class HomeNavModel
 * @package App\Model\Admin
 */
class HomeNavMenu extends Model
{
    /**
     * @var int 当前窗口打开
     */
    public static $TYPE_TARGET_SELF = 0;
    /**
     * @var int 新窗口打开
     */
    public static $TYPE_TARGET_BLANK = 1;

    protected $table = 'admin_nav_menu_config';

    /**
     * 获取菜单
     * @return HomeNavMenu[]|\Illuminate\Database\Eloquent\Collection
     */
    static function getNavMenu()
    {
        return HomeNavMenu::all()
            ->sortBy('order');
    }
}
