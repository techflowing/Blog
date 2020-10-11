
此项目为个人站源码项目，线上可以访问：[http://techflowing.cn/](http://techflowing.cn/) 查看效果，欢迎fork & star，不合理的地方也欢迎批评指正，求大佬轻喷 ......，
更多详细介绍可参考 [个人站记录](http://techflowing.cn/wiki/detail/8)

## 站点简介

##### 缘起

闲逛 GitHub 时发现一个网址导航网站项目 [WebStack-Laravel](https://github.com/hui-ho/WebStack-Laravel "WebStack-Laravel")，觉着这项目有意思，搞下试试，折腾尝试部署，成功；然后顺带看了眼 Laravel 官方文档，哎，这框架牛逼，好好看看。与此同时，我正在找一款能支持无限分级、目录和文件同时存在的，可云端同步的笔记应用，无果，对比多家后都不是很满意。算了，自己写一个吧，正好把之前的 Hexo 博客也一波给干掉，搞起！

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

## 功能模块

#### 欢迎页面

![](http://techflowing.cn/media-store/wiki/img/202010/5f83017ed0f96_5f83017e.png)

#### 博客站

![](http://techflowing.cn/media-store/wiki/img/202010/5f8307efc0167_5f8307ef.png)

博客文章列表根据知识库单篇文章自动生成，非单独书写，功能包含：文章列表，文章分类列表，个人信息展示，文章数量统计，列表分页等

#### 知识库

![](http://techflowing.cn/media-store/wiki/img/202010/5f83094ecdf98_5f83094e.png)

知识库模块为本网站的核心功能，也是完成此站点的最初目的，之前也曾尝试过一些类似 hexo 的静态博客站点，但苦于知识难成体系脉络，分布比较杂乱；笔记应用也曾经尝试过很多，也都有些不满意的地方，比如印象笔记不能无限分级之类的，所以才有了此站点，用于作者的知识学习、记录、积累、分享

#### 思维导图

![](http://techflowing.cn/media-store/wiki/img/202010/5f830468ca01d_5f830468.png)

思维导图模块基于百度开源的 [KityMinder](https://github.com/fex-team/kityminder)，满足在线编辑、云端同步的功能

#### 导航站

![](http://techflowing.cn/media-store/wiki/img/202010/5f8306074b0c6_5f830607.png)

导航站模块类似一个网络收藏夹，会记录一些自己常用的地址，以及非常酷的站点

#### 留言板

![](http://techflowing.cn/media-store/wiki/img/202010/5f830974e8c7c_5f830974.png)

留言板模块主要是提供一个可交流的窗口&平台，知识库和博客站单篇文章未开发评论系统，所以基于 [Valine](https://valine.js.org/) 最小成本的添加了此模块以便于提供可能需要的交流方式

#### 关于

![](http://techflowing.cn/media-store/wiki/img/202010/5f830999ed0f3_5f830999.png)

关于模块用于设置一些网站信息，例如：关于我、关于本站、联系作者等，还包含了简单的页面访问统计

#### 后台管理

配置导航站地址分类
![](http://techflowing.cn/media-store/wiki/img/202010/5f83157880731_5f831578.png)

配置导航站地址列表
![](http://techflowing.cn/media-store/wiki/img/202010/5f8315a45929c_5f8315a4.png)

管理Wiki项目列表
![](http://techflowing.cn/media-store/wiki/img/202010/5f8315d5326a6_5f8315d5.png)

具体 Wiki 项目内容编辑页面，支持拖动排序、文章组织位置变更等
![](http://techflowing.cn/media-store/wiki/img/202010/5f831b5bad4cc_5f831b5b.png)

配置思维导图
![](http://techflowing.cn/media-store/wiki/img/202010/5f8316045254e_5f831604.png)

生成LeetCode题解项目，需要基于一个 LeetCode 爬虫项目生成的 result.json 文件
![](http://techflowing.cn/media-store/wiki/img/202010/5f8316407d6b5_5f831640.png)

媒体资源管理，文章的图片也会上传存储到这里
![](http://techflowing.cn/media-store/wiki/img/202010/5f83166f21d6a_5f83166f.png)

站点顶部菜单配置，包含名称、顺序、打开方式等
![](http://techflowing.cn/media-store/wiki/img/202010/5f83169f6b8d2_5f83169f.png)

网站其它配置，如个人信息、关于页面数据等
![](http://techflowing.cn/media-store/wiki/img/202010/5f8319287b805_5f831928.png)


## 致谢

* [Laravel 7](https://learnku.com/docs/laravel/7.x "Laravel 7")
* [WebStack-Laravel](https://github.com/hui-ho/WebStack-Laravel "WebStack-Laravel")
* [Laravel-admin](https://laravel-admin.org/ "Laravel-admin")
* [Editor.md](http://editor.md.ipandao.com/ "Editor.md")
* [Layer ](https://layer.layui.com/ "Layer ")
* [zTree](http://www.treejs.cn/v3/main.php#_zTreeInfo "zTree")
* [SmartWiki](https://github.com/lifei6671/SmartWiki "SmartWiki")
* [Valine](https://valine.js.org/)
* [KityMinder](https://github.com/fex-team/kityminder)
