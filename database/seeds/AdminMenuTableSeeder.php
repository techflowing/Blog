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
                'created_at' => NULL,
                'icon' => 'fa-bar-chart',
                'id' => 1,
                'order' => 1,
                'parent_id' => 0,
                'permission' => NULL,
                'title' => '仪表盘',
                'updated_at' => '2020-04-04 23:28:56',
                'uri' => '/',
            ),
            1 => 
            array (
                'created_at' => NULL,
                'icon' => 'fa-cogs',
                'id' => 2,
                'order' => 8,
                'parent_id' => 0,
                'permission' => NULL,
                'title' => '后台管理',
                'updated_at' => '2020-04-04 23:30:53',
                'uri' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'icon' => 'fa-users',
                'id' => 3,
                'order' => 9,
                'parent_id' => 2,
                'permission' => NULL,
                'title' => '用户',
                'updated_at' => '2020-04-04 23:30:53',
                'uri' => 'auth/users',
            ),
            3 => 
            array (
                'created_at' => NULL,
                'icon' => 'fa-user',
                'id' => 4,
                'order' => 10,
                'parent_id' => 2,
                'permission' => NULL,
                'title' => '角色',
                'updated_at' => '2020-04-04 23:30:53',
                'uri' => 'auth/roles',
            ),
            4 => 
            array (
                'created_at' => NULL,
                'icon' => 'fa-ban',
                'id' => 5,
                'order' => 11,
                'parent_id' => 2,
                'permission' => NULL,
                'title' => '权限',
                'updated_at' => '2020-04-04 23:30:53',
                'uri' => 'auth/permissions',
            ),
            5 => 
            array (
                'created_at' => NULL,
                'icon' => 'fa-bars',
                'id' => 6,
                'order' => 12,
                'parent_id' => 2,
                'permission' => NULL,
                'title' => '菜单',
                'updated_at' => '2020-04-04 23:30:53',
                'uri' => 'auth/menu',
            ),
            6 => 
            array (
                'created_at' => NULL,
                'icon' => 'fa-history',
                'id' => 7,
                'order' => 13,
                'parent_id' => 2,
                'permission' => NULL,
                'title' => '操作日志',
                'updated_at' => '2020-04-04 23:30:53',
                'uri' => 'auth/logs',
            ),
            7 => 
            array (
                'created_at' => '2019-01-21 12:07:46',
                'icon' => 'fa-archive',
                'id' => 8,
                'order' => 3,
                'parent_id' => 13,
                'permission' => NULL,
                'title' => '分类管理',
                'updated_at' => '2020-04-04 23:31:02',
                'uri' => 'navigation/categories',
            ),
            8 => 
            array (
                'created_at' => '2019-01-21 14:39:27',
                'icon' => 'fa-edge',
                'id' => 9,
                'order' => 4,
                'parent_id' => 13,
                'permission' => NULL,
                'title' => '网站管理',
                'updated_at' => '2020-04-04 23:31:02',
                'uri' => 'navigation/sites',
            ),
            9 => 
            array (
                'created_at' => '2019-08-23 03:28:35',
                'icon' => 'fa-connectdevelop',
                'id' => 11,
                'order' => 7,
                'parent_id' => 0,
                'permission' => NULL,
                'title' => '站点配置',
                'updated_at' => '2020-04-04 23:30:53',
                'uri' => 'setting',
            ),
            10 => 
            array (
                'created_at' => '2020-03-31 00:17:45',
                'icon' => 'fa-bars',
                'id' => 12,
                'order' => 6,
                'parent_id' => 0,
                'permission' => NULL,
                'title' => 'Wiki 管理',
                'updated_at' => '2020-04-04 23:30:53',
                'uri' => 'wiki',
            ),
            11 => 
            array (
                'created_at' => '2020-04-04 23:29:26',
                'icon' => 'fa-external-link-square',
                'id' => 13,
                'order' => 2,
                'parent_id' => 0,
                'permission' => NULL,
                'title' => '导航站管理',
                'updated_at' => '2020-04-04 23:31:02',
                'uri' => NULL,
            ),
            12 => 
            array (
                'created_at' => '2020-04-04 23:30:44',
                'icon' => 'fa-file-text',
                'id' => 14,
                'order' => 5,
                'parent_id' => 0,
                'permission' => NULL,
                'title' => '文章管理',
                'updated_at' => '2020-04-04 23:31:02',
                'uri' => 'article',
            ),
        ));
        
        
    }
}