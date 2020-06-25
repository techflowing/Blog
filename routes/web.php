<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');

// 导航站相关
Route::resource('/navigation', 'NavigationController');

// Wiki 相关
Route::group(['prefix' => 'wiki'], function () {
    // Wiki 首页
    Route::get('/', 'WikiController@index');
    // 获取指定文档内容
    Route::get('content/{project_id}/{doc_id}', 'WikiController@getContent')
        ->name('wiki.document.content')
        ->where('project_id', '[0-9]+')
        ->where('doc_id', '[0-9]+');
    // 文档列表展示
    Route::get('detail/{project_id}', 'WikiController@detail')
        ->name('wiki.document.detail')
        ->where('project_id', '[0-9]+');
});

// 博客配置
Route::group(['prefix' => 'blog'], function () {
    // 博客首页
    Route::get('/', 'BlogController@index');
    Route::get("/page/{page}", 'BlogController@getPageList')
        ->name('blog.page.list')
        ->where('page', '[0-9]+');
    // 博客详情页面
    Route::get("/detail/{title}", 'BlogController@getArticleDetail')
        ->name('blog.article.detail');
});

// 思维导图
Route::group(['prefix' => 'xmind'], function () {
    // 关于首页
    Route::get('/', 'XMindController@index');
    Route::get('/content/{name}', 'XMindController@getContent');
});

// 留言板
Route::group(['prefix' => 'guestbook'], function () {
    // 关于首页
    Route::get('/', 'GuestBookController@index');
});

// 关于页面配置
Route::group(['prefix' => 'about'], function () {
    // 关于首页
    Route::get('/', 'AboutController@index');
});


// 后台管理模块路由
Admin::routes();
Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function () {

    // 切换为带验证码的登录
    Route::get('auth/login', '\Encore\James\JamesController@getLogin');
    Route::post('auth/login', '\Encore\James\JamesController@postLogin');
    // 仪表盘
    Route::get('/', 'DashboardController@index')->name('admin:dashboard');
    // 导航站分类管理
    Route::resource('navigation/categories', 'Navigation\CategoryController');
    // 导航站网站地址管理
    Route::resource('navigation/sites', 'Navigation\SiteController');
    // 文章管理
    Route::resource('article', 'Article\ArticleController');
    // 首页菜单配置
    Route::resource('nav', 'Config\NavConfigController');
    // Wiki管理
    Route::resource('wiki', 'Wiki\WikiProjectController');
    Route::group([
        'prefix' => 'wiki',
        'namespace' => 'Wiki'
    ], function () {
        // Wiki 编辑页面
        Route::get('edit/{id}', 'WikiDocumentController@edit')
            ->name('wiki.document.edit')
            ->where('id', '[0-9]+');
        // 新建文件、文件夹
        Route::post('edit/create/{project_id}', 'WikiDocumentController@create')
            ->name('wiki.document.create')
            ->where('project_id', '[0-9]+');;
        // 文档排序
        Route::post('sort/{project_id}', 'WikiDocumentController@sort')
            ->name('wiki.document.sort')
            ->where('project_id', '[0-9]+');
        // 文档重命名
        Route::post('rename/{project_id}/{doc_id}', 'WikiDocumentController@rename')
            ->name('wiki.document.rename')
            ->where('project_id', '[0-9]+')
            ->where('doc_id', '[0-9]+');
        // 文档删除
        Route::post('delete/{project_id}', 'WikiDocumentController@delete')
            ->name('wiki.document.delete')
            ->where('project_id', '[0-9]+');
        // 文档保存
        Route::post('save/{project_id}', 'WikiDocumentController@save')
            ->name('wiki.document.save')
            ->where('project_id', '[0-9]+');
        // 图片附件上传
        Route::post('upload/img', 'WikiAssetUploadController@uploadImg')
            ->name('wiki.document.upload.img');
        // 文件附件上传
        Route::post('upload/file', 'WikiAssetUploadController@uploadFile')
            ->name('wiki.document.upload.file');
    });
    // LeetCode题解生成
    Route::get('leetcode', 'LeetCodeCreateController@index');
    // 思维导图
    Route::resource('xmind', 'XMind\XMindAdminController');
    Route::group([
        'prefix' => 'xmind',
        'namespace' => 'XMind'
    ], function () {
        // Wiki 编辑页面
        Route::get('edit/{id}', 'XMindAdminController@editXMind')
            ->name('xmind.edit')
            ->where('id', '[0-9]+');
        Route::post('save/{id}', 'XMindAdminController@save')
            ->name('xmind.save')
            ->where('id', '[0-9]+');
    });
});

// 测试
Route::get('test01', 'TestController@index');
Route::get('test/share', 'TestController@share');
