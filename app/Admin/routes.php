<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'DashboardController@index')->name('admin:dashboard');
    $router->resource('navigation/categories', 'navigation\CategoryController');
    $router->resource('navigation/sites', 'navigation\SiteController');
    $router->resource('article', 'article\ArticleController');
});
