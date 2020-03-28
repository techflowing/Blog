<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function () {

    Route::get('/', 'DashboardController@index')->name('admin:dashboard');
    // 导航站分类管理
    Route::resource('navigation/categories', 'navigation\CategoryController');
    // 导航站网站地址管理
    Route::resource('navigation/sites', 'navigation\SiteController');
    // 文章管理
    Route::resource('article', 'article\ArticleController');
    // Wiki管理
    Route::resource('wiki', 'wiki\WikiProjectController');

    // Wiki 文档编辑页
    Route::get('wiki/edit/{id}', 'WikiDocumentController@edit')
        ->name('wiki.document.edit')
        ->where('id', '[0-9]+');
});
