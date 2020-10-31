<?php

use Illuminate\Database\Seeder;

class AdminConfigTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_config')->delete();
        
        \DB::table('admin_config')->insert(array (
            0 => 
            array (
                'created_at' => '2020-05-31 15:10:40',
                'description' => '用户头像',
                'id' => 1,
                'name' => 'user_avatar',
                'updated_at' => '2020-05-31 15:10:40',
                'value' => 'https://upload.jianshu.io/users/upload_avatars/16750626/131a68d1-c1b7-4942-b60e-6671ddcc7df9.jpg',
            ),
            1 => 
            array (
                'created_at' => '2020-05-31 15:11:05',
                'description' => 'Slogin',
                'id' => 2,
                'name' => 'user_slogin',
                'updated_at' => '2020-05-31 15:11:05',
                'value' => 'Coding For Fun，代码改变世界',
            ),
            2 => 
            array (
                'created_at' => '2020-05-31 15:11:22',
                'description' => '作者',
                'id' => 3,
                'name' => 'username',
                'updated_at' => '2020-05-31 15:11:22',
                'value' => 'techflowing',
            ),
            3 => 
            array (
                'created_at' => '2020-06-18 17:20:44',
                'description' => 'GitHub地址',
                'id' => 4,
                'name' => 'user_github',
                'updated_at' => '2020-06-18 17:20:44',
                'value' => 'https://github.com/techflowing',
            ),
            4 => 
            array (
                'created_at' => '2020-06-18 17:21:17',
                'description' => '邮箱地址',
                'id' => 5,
                'name' => 'user_email',
                'updated_at' => '2020-06-18 17:21:17',
                'value' => 'techflowing@gmail.com',
            ),
            5 => 
            array (
                'created_at' => '2020-06-18 17:26:58',
                'description' => '微信图片地址',
                'id' => 6,
                'name' => 'user_wechat',
                'updated_at' => '2020-06-18 17:27:17',
                'value' => 'http://techflowing.cn/media-store/wechat.jpeg',
            ),
            6 => 
            array (
                'created_at' => '2020-06-19 16:28:53',
                'description' => '关于我',
                'id' => 7,
                'name' => 'about_me',
                'updated_at' => '2020-06-24 14:10:39',
                'value' => '一条啥都不会还不想学习的咸鱼，等待翻身',
            ),
            7 => 
            array (
                'created_at' => '2020-06-19 16:29:11',
                'description' => '关于本站',
                'id' => 8,
                'name' => 'about_site',
                'updated_at' => '2020-10-20 09:12:19',
                'value' => '##### 缘起

闲逛 GitHub 时发现一个网址导航网站项目 [WebStack-Laravel](https://github.com/hui-ho/WebStack-Laravel "WebStack-Laravel")，觉着这项目有意思，搞下试试，折腾尝试部署，成功；然后顺带看了眼 Laravel 官方文档，哎，这框架牛逼，得好好看看。与此同时，我正在找一款能支持无限分级、目录和文件同时存在的，可云端同步的笔记应用，无果，对比多家后都不是很满意。算了，自己写一个吧，正好把之前的 Hexo 博客也一波给干掉，搞起！

理想很丰满，现实很骨感，PHP、大前端技能基本为零，项目写起来基本处于写一行查一行的状况，各种找示例参考，痛并快乐着！


##### 大事记

* 2020/10/11，开源
* 2020/06/25，添加留言板模块
* 2020/06/24，添加思维导图模块
* 2020/06/19，完成关于模块
* 2020/05/31，添加首页
* 2020/05/30，完成博客模块
* 2020/04/16，整体修改为黑色主题
* 2020/04/13，完成 Wiki 模块
* 2020/03/22，完成导航站模块
* 2020/03/21，初始化项目

##### 已知问题

1. 浏览器适配（当前仅适配 Chrome）

##### 致谢

* [Laravel 7](https://learnku.com/docs/laravel/7.x "Laravel 7")
* [WebStack-Laravel](https://github.com/hui-ho/WebStack-Laravel "WebStack-Laravel")
* [Laravel-admin](https://laravel-admin.org/ "Laravel-admin")
* [Editor.md](http://editor.md.ipandao.com/ "Editor.md")
* [Layer ](https://layer.layui.com/ "Layer ")
* [zTree](http://www.treejs.cn/v3/main.php#_zTreeInfo "zTree")
* [SmartWiki](https://github.com/lifei6671/SmartWiki "SmartWiki")
* [Valine](https://valine.js.org/)
* [KityMinder](https://github.com/fex-team/kityminder)',
            ),
            8 => 
            array (
                'created_at' => '2020-06-25 14:29:05',
                'description' => 'valine_app_id',
                'id' => 9,
                'name' => 'valine_app_id',
                'updated_at' => '2020-06-25 14:29:05',
                'value' => 'Qbo9OXrWmbsahg21m7A4VKIx-gzGzoHsz',
            ),
            9 => 
            array (
                'created_at' => '2020-06-25 14:29:32',
                'description' => 'valine_app_key',
                'id' => 10,
                'name' => 'valine_app_key',
                'updated_at' => '2020-06-25 14:29:32',
                'value' => 'DMbLvtMz659xtt1skJwTK6UG',
            ),
        ));
        
        
    }
}