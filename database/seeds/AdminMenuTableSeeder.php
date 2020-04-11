<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 1,
                'title' => '仪表盘',
                'icon' => 'fa-bar-chart',
                'uri' => '/',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-04-04 23:28:56',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 9,
                'title' => '后台管理',
                'icon' => 'fa-cogs',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-04-11 16:15:32',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 10,
                'title' => '用户',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-04-11 16:15:32',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 11,
                'title' => '角色',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-04-11 16:15:32',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 12,
                'title' => '权限',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-04-11 16:15:32',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 13,
                'title' => '菜单',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-04-11 16:15:32',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 14,
                'title' => '操作日志',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-04-11 16:15:32',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 13,
                'order' => 3,
                'title' => '分类管理',
                'icon' => 'fa-archive',
                'uri' => 'navigation/categories',
                'permission' => NULL,
                'created_at' => '2019-01-21 12:07:46',
                'updated_at' => '2020-04-04 23:31:02',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 13,
                'order' => 4,
                'title' => '网站管理',
                'icon' => 'fa-edge',
                'uri' => 'navigation/sites',
                'permission' => NULL,
                'created_at' => '2019-01-21 14:39:27',
                'updated_at' => '2020-04-04 23:31:02',
            ),
            9 => 
            array (
                'id' => 11,
                'parent_id' => 0,
                'order' => 7,
                'title' => '站点配置',
                'icon' => 'fa-connectdevelop',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2019-08-23 03:28:35',
                'updated_at' => '2020-04-11 16:15:56',
            ),
            10 => 
            array (
                'id' => 12,
                'parent_id' => 0,
                'order' => 6,
                'title' => 'Wiki 管理',
                'icon' => 'fa-wikipedia-w',
                'uri' => 'wiki',
                'permission' => NULL,
                'created_at' => '2020-03-31 00:17:45',
                'updated_at' => '2020-04-11 16:16:43',
            ),
            11 => 
            array (
                'id' => 13,
                'parent_id' => 0,
                'order' => 2,
                'title' => '导航站管理',
                'icon' => 'fa-external-link-square',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => '2020-04-04 23:29:26',
                'updated_at' => '2020-04-04 23:31:02',
            ),
            12 => 
            array (
                'id' => 14,
                'parent_id' => 0,
                'order' => 5,
                'title' => '文章管理',
                'icon' => 'fa-file-text',
                'uri' => 'article',
                'permission' => NULL,
                'created_at' => '2020-04-04 23:30:44',
                'updated_at' => '2020-04-04 23:31:02',
            ),
            13 => 
            array (
                'id' => 15,
                'parent_id' => 11,
                'order' => 8,
                'title' => '顶部菜单',
                'icon' => 'fa-navicon',
                'uri' => 'config/nav',
                'permission' => NULL,
                'created_at' => '2020-04-11 16:15:07',
                'updated_at' => '2020-04-11 16:19:40',
            ),
        ));
        
        
    }
}