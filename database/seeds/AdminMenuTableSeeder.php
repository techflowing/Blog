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
                'updated_at' => '2020-04-14 01:12:34',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => 0,
                'order' => 12,
                'title' => '后台管理',
                'icon' => 'fa-cogs',
                'uri' => NULL,
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-10-09 00:21:04',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 2,
                'order' => 13,
                'title' => '用户',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-10-09 00:21:04',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 14,
                'title' => '角色',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-10-09 00:21:04',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 2,
                'order' => 15,
                'title' => '权限',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-10-09 00:21:04',
            ),
            5 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 16,
                'title' => '菜单',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-10-09 00:21:04',
            ),
            6 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 17,
                'title' => '操作日志',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
                'permission' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-10-09 00:21:04',
            ),
            7 => 
            array (
                'id' => 8,
                'parent_id' => 0,
                'order' => 2,
                'title' => '导航-分类',
                'icon' => 'fa-archive',
                'uri' => 'navigation/categories',
                'permission' => NULL,
                'created_at' => '2019-01-21 12:07:46',
                'updated_at' => '2020-04-14 01:14:58',
            ),
            8 => 
            array (
                'id' => 9,
                'parent_id' => 0,
                'order' => 3,
                'title' => '导航-网站',
                'icon' => 'fa-edge',
                'uri' => 'navigation/sites',
                'permission' => NULL,
                'created_at' => '2019-01-21 14:39:27',
                'updated_at' => '2020-04-14 01:14:58',
            ),
            9 => 
            array (
                'id' => 12,
                'parent_id' => 0,
                'order' => 5,
                'title' => 'Wiki 管理',
                'icon' => 'fa-wikipedia-w',
                'uri' => 'wiki',
                'permission' => NULL,
                'created_at' => '2020-03-31 00:17:45',
                'updated_at' => '2020-04-14 01:14:58',
            ),
            10 => 
            array (
                'id' => 14,
                'parent_id' => 0,
                'order' => 4,
                'title' => '文章管理',
                'icon' => 'fa-file-text',
                'uri' => 'article',
                'permission' => NULL,
                'created_at' => '2020-04-04 23:30:44',
                'updated_at' => '2020-04-14 01:14:58',
            ),
            11 => 
            array (
                'id' => 16,
                'parent_id' => 0,
                'order' => 9,
                'title' => '媒体库',
                'icon' => 'fa-medium',
                'uri' => 'media',
                'permission' => NULL,
                'created_at' => '2020-04-13 23:16:14',
                'updated_at' => '2020-10-09 00:21:04',
            ),
            12 => 
            array (
                'id' => 25,
                'parent_id' => 0,
                'order' => 11,
                'title' => '配置管理',
                'icon' => 'fa-toggle-on',
                'uri' => 'config',
                'permission' => NULL,
                'created_at' => '2020-04-14 01:10:44',
                'updated_at' => '2020-10-09 00:21:04',
            ),
            13 => 
            array (
                'id' => 26,
                'parent_id' => 0,
                'order' => 10,
                'title' => '首页菜单',
                'icon' => 'fa-navicon',
                'uri' => 'nav',
                'permission' => NULL,
                'created_at' => '2020-04-14 01:11:52',
                'updated_at' => '2020-10-09 00:21:04',
            ),
            14 => 
            array (
                'id' => 27,
                'parent_id' => 0,
                'order' => 8,
                'title' => 'LeetCode',
                'icon' => 'fa-sort-numeric-asc',
                'uri' => 'leetcode',
                'permission' => NULL,
                'created_at' => '2020-04-21 02:14:45',
                'updated_at' => '2020-10-09 00:21:04',
            ),
            15 => 
            array (
                'id' => 28,
                'parent_id' => 0,
                'order' => 7,
                'title' => '思维导图',
                'icon' => 'fa-sitemap',
                'uri' => 'xmind/detail',
                'permission' => NULL,
                'created_at' => '2020-06-20 15:20:02',
                'updated_at' => '2020-10-09 00:31:53',
            ),
            16 => 
            array (
                'id' => 29,
                'parent_id' => 0,
                'order' => 6,
                'title' => '导图分类',
                'icon' => 'fa-certificate',
                'uri' => 'xmind/categories',
                'permission' => NULL,
                'created_at' => '2020-10-09 00:20:53',
                'updated_at' => '2020-10-09 00:21:27',
            ),
        ));
        
        
    }
}