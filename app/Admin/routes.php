<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'DashboardController@index')->name('admin:dashboard');
    // 导航站分类管理
    $router->resource('navigation/categories', 'navigation\CategoryController');
    // 导航站网站地址管理
    $router->resource('navigation/sites', 'navigation\SiteController');
    // 文章管理
    $router->resource('article', 'article\ArticleController');
    // Wiki管理
    $router->resource('wiki', 'wiki\WikiController');
});
