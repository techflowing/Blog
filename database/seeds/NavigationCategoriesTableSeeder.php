<?php

use Illuminate\Database\Seeder;

class NavigationCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('navigation_categories')->delete();

        \DB::table('navigation_categories')->insert(array(
            0 =>
                array(
                    'created_at' => '2019-01-21 12:48:58',
                    'icon' => 'fa-star-o',
                    'id' => 1,
                    'order' => 1,
                    'parent_id' => 0,
                    'title' => '常用推荐',
                    'updated_at' => '2019-01-21 12:52:02',
                ),
            1 =>
                array(
                    'created_at' => '2019-01-21 12:50:17',
                    'icon' => 'fa-bullhorn',
                    'id' => 2,
                    'order' => 2,
                    'parent_id' => 0,
                    'title' => '社区资讯',
                    'updated_at' => '2019-01-21 13:46:19',
                ),
            2 =>
                array(
                    'created_at' => '2019-01-21 13:53:10',
                    'icon' => 'fa-lightbulb-o',
                    'id' => 3,
                    'order' => 3,
                    'parent_id' => 0,
                    'title' => '灵感采集',
                    'updated_at' => '2019-01-21 13:53:34',
                ),
            3 =>
                array(
                    'created_at' => '2019-01-21 13:53:31',
                    'icon' => 'fa-star-o',
                    'id' => 4,
                    'order' => 4,
                    'parent_id' => 3,
                    'title' => '发现产品',
                    'updated_at' => '2019-01-21 13:53:34',
                ),
            4 =>
                array(
                    'created_at' => '2019-01-21 13:53:49',
                    'icon' => 'fa-star-o',
                    'id' => 5,
                    'order' => 5,
                    'parent_id' => 3,
                    'title' => '界面灵感',
                    'updated_at' => '2019-01-21 13:55:42',
                ),
            5 =>
                array(
                    'created_at' => '2019-01-21 13:54:00',
                    'icon' => 'fa-star-o',
                    'id' => 6,
                    'order' => 6,
                    'parent_id' => 3,
                    'title' => '网页灵感',
                    'updated_at' => '2019-01-21 13:55:42',
                ),
            6 =>
                array(
                    'created_at' => '2019-01-21 13:54:42',
                    'icon' => 'fa-thumbs-o-up',
                    'id' => 7,
                    'order' => 7,
                    'parent_id' => 0,
                    'title' => '素材资源',
                    'updated_at' => '2019-01-21 13:55:42',
                ),
            7 =>
                array(
                    'created_at' => '2019-01-21 13:54:59',
                    'icon' => 'fa-star-o',
                    'id' => 8,
                    'order' => 8,
                    'parent_id' => 7,
                    'title' => '图标素材',
                    'updated_at' => '2019-01-21 14:12:01',
                ),
            8 =>
                array(
                    'created_at' => '2019-01-21 13:55:11',
                    'icon' => 'fa-star-o',
                    'id' => 9,
                    'order' => 9,
                    'parent_id' => 7,
                    'title' => 'LOGO设计',
                    'updated_at' => '2019-01-21 13:55:42',
                ),
            9 =>
                array(
                    'created_at' => '2019-01-21 13:55:25',
                    'icon' => 'fa-star-o',
                    'id' => 10,
                    'order' => 10,
                    'parent_id' => 7,
                    'title' => '平面素材',
                    'updated_at' => '2019-01-21 13:55:42',
                ),
            10 =>
                array(
                    'created_at' => '2019-01-21 13:55:31',
                    'icon' => 'fa-star-o',
                    'id' => 11,
                    'order' => 11,
                    'parent_id' => 7,
                    'title' => 'UI资源',
                    'updated_at' => '2019-01-21 13:55:42',
                ),
            11 =>
                array(
                    'created_at' => '2019-01-22 01:00:51',
                    'icon' => 'fa-star-o',
                    'id' => 12,
                    'order' => 12,
                    'parent_id' => 7,
                    'title' => 'Sketch资源',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            12 =>
                array(
                    'created_at' => '2019-01-22 01:01:02',
                    'icon' => 'fa-star-o',
                    'id' => 13,
                    'order' => 13,
                    'parent_id' => 7,
                    'title' => '字体资源',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            13 =>
                array(
                    'created_at' => '2019-01-22 01:01:12',
                    'icon' => 'fa-star-o',
                    'id' => 14,
                    'order' => 14,
                    'parent_id' => 7,
                    'title' => 'Mockup',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            14 =>
                array(
                    'created_at' => '2019-01-22 01:01:23',
                    'icon' => 'fa-star-o',
                    'id' => 15,
                    'order' => 15,
                    'parent_id' => 7,
                    'title' => '摄影图库',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            15 =>
                array(
                    'created_at' => '2019-01-22 01:01:33',
                    'icon' => 'fa-star-o',
                    'id' => 16,
                    'order' => 16,
                    'parent_id' => 7,
                    'title' => 'PPT资源',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            16 =>
                array(
                    'created_at' => '2019-01-22 01:02:04',
                    'icon' => 'fa-cogs',
                    'id' => 17,
                    'order' => 17,
                    'parent_id' => 0,
                    'title' => '常用工具',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            17 =>
                array(
                    'created_at' => '2019-01-22 01:02:14',
                    'icon' => 'fa-star-o',
                    'id' => 18,
                    'order' => 18,
                    'parent_id' => 17,
                    'title' => '图形创意',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            18 =>
                array(
                    'created_at' => '2019-01-22 01:02:24',
                    'icon' => 'fa-star-o',
                    'id' => 19,
                    'order' => 19,
                    'parent_id' => 17,
                    'title' => '界面设计',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            19 =>
                array(
                    'created_at' => '2019-01-22 01:02:32',
                    'icon' => 'fa-star-o',
                    'id' => 20,
                    'order' => 20,
                    'parent_id' => 17,
                    'title' => '交互动效',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            20 =>
                array(
                    'created_at' => '2019-01-22 01:02:40',
                    'icon' => 'fa-star-o',
                    'id' => 21,
                    'order' => 21,
                    'parent_id' => 17,
                    'title' => '在线配色',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            21 =>
                array(
                    'created_at' => '2019-01-22 01:02:49',
                    'icon' => 'fa-star-o',
                    'id' => 22,
                    'order' => 22,
                    'parent_id' => 17,
                    'title' => '在线工具',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            22 =>
                array(
                    'created_at' => '2019-01-22 01:02:58',
                    'icon' => 'fa-star-o',
                    'id' => 23,
                    'order' => 23,
                    'parent_id' => 17,
                    'title' => 'Chrome插件',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            23 =>
                array(
                    'created_at' => '2019-01-22 01:03:17',
                    'icon' => 'fa-pencil',
                    'id' => 24,
                    'order' => 24,
                    'parent_id' => 0,
                    'title' => '学习教程',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            24 =>
                array(
                    'created_at' => '2019-01-22 01:03:29',
                    'icon' => 'fa-star-o',
                    'id' => 25,
                    'order' => 25,
                    'parent_id' => 24,
                    'title' => '设计规范',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            25 =>
                array(
                    'created_at' => '2019-01-22 01:03:36',
                    'icon' => 'fa-star-o',
                    'id' => 26,
                    'order' => 26,
                    'parent_id' => 24,
                    'title' => '视频教程',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            26 =>
                array(
                    'created_at' => '2019-01-22 01:03:44',
                    'icon' => 'fa-star-o',
                    'id' => 27,
                    'order' => 27,
                    'parent_id' => 24,
                    'title' => '设计文章',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            27 =>
                array(
                    'created_at' => '2019-01-22 01:03:52',
                    'icon' => 'fa-star-o',
                    'id' => 28,
                    'order' => 28,
                    'parent_id' => 24,
                    'title' => '设计电台',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            28 =>
                array(
                    'created_at' => '2019-01-22 01:04:03',
                    'icon' => 'fa-star-o',
                    'id' => 29,
                    'order' => 29,
                    'parent_id' => 24,
                    'title' => '交互设计',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
            29 =>
                array(
                    'created_at' => '2019-01-22 01:05:39',
                    'icon' => 'fa-user',
                    'id' => 30,
                    'order' => 30,
                    'parent_id' => 0,
                    'title' => 'UED团队',
                    'updated_at' => '2019-01-22 01:07:04',
                ),
        ));
    }
}
