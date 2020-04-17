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

        \DB::table('admin_menu')->insert(array(
            0 =>
                array(
                    'created_at' => NULL,
                    'icon' => 'fa-bar-chart',
                    'id' => 1,
                    'order' => 1,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => '仪表盘',
                    'updated_at' => '2020-04-14 01:12:34',
                    'uri' => '/',
                ),
            1 =>
                array(
                    'created_at' => NULL,
                    'icon' => 'fa-cogs',
                    'id' => 2,
                    'order' => 9,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => '后台管理',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => NULL,
                ),
            2 =>
                array(
                    'created_at' => NULL,
                    'icon' => 'fa-users',
                    'id' => 3,
                    'order' => 10,
                    'parent_id' => 2,
                    'permission' => NULL,
                    'title' => '用户',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'auth/users',
                ),
            3 =>
                array(
                    'created_at' => NULL,
                    'icon' => 'fa-user',
                    'id' => 4,
                    'order' => 11,
                    'parent_id' => 2,
                    'permission' => NULL,
                    'title' => '角色',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'auth/roles',
                ),
            4 =>
                array(
                    'created_at' => NULL,
                    'icon' => 'fa-ban',
                    'id' => 5,
                    'order' => 12,
                    'parent_id' => 2,
                    'permission' => NULL,
                    'title' => '权限',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'auth/permissions',
                ),
            5 =>
                array(
                    'created_at' => NULL,
                    'icon' => 'fa-bars',
                    'id' => 6,
                    'order' => 13,
                    'parent_id' => 2,
                    'permission' => NULL,
                    'title' => '菜单',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'auth/menu',
                ),
            6 =>
                array(
                    'created_at' => NULL,
                    'icon' => 'fa-history',
                    'id' => 7,
                    'order' => 14,
                    'parent_id' => 2,
                    'permission' => NULL,
                    'title' => '操作日志',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'auth/logs',
                ),
            7 =>
                array(
                    'created_at' => '2019-01-21 12:07:46',
                    'icon' => 'fa-archive',
                    'id' => 8,
                    'order' => 2,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => '导航-分类',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'navigation/categories',
                ),
            8 =>
                array(
                    'created_at' => '2019-01-21 14:39:27',
                    'icon' => 'fa-edge',
                    'id' => 9,
                    'order' => 3,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => '导航-网站',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'navigation/sites',
                ),
            9 =>
                array(
                    'created_at' => '2020-03-31 00:17:45',
                    'icon' => 'fa-wikipedia-w',
                    'id' => 12,
                    'order' => 5,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => 'Wiki 管理',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'wiki',
                ),
            10 =>
                array(
                    'created_at' => '2020-04-04 23:30:44',
                    'icon' => 'fa-file-text',
                    'id' => 14,
                    'order' => 4,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => '文章管理',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'article',
                ),
            11 =>
                array(
                    'created_at' => '2020-04-13 23:16:14',
                    'icon' => 'fa-medium',
                    'id' => 16,
                    'order' => 6,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => '媒体库',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'media',
                ),
            12 =>
                array(
                    'created_at' => '2020-04-14 01:10:44',
                    'icon' => 'fa-toggle-on',
                    'id' => 25,
                    'order' => 8,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => '配置管理',
                    'updated_at' => '2020-04-14 01:14:58',
                    'uri' => 'config',
                ),
            13 =>
                array(
                    'created_at' => '2020-04-14 01:11:52',
                    'icon' => 'fa-navicon',
                    'id' => 26,
                    'order' => 7,
                    'parent_id' => 0,
                    'permission' => NULL,
                    'title' => '首页菜单',
                    'updated_at' => '2020-04-14 01:18:19',
                    'uri' => 'nav',
                ),
        ));
    }
}
