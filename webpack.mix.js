const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
// 三方库直接copy
mix.copyDirectory('resources/assets/ztree', 'public/static-third/ztree');
mix.copyDirectory('resources/assets/editormd', 'public/static-third/editormd');

// 公共资源 图片、字体文件等
mix.copyDirectory('resources/assets/img/', 'public/static-common/img');
mix.copyDirectory('resources/assets/font/', 'public/static-common/font');

// 公共资源-JS
mix.scripts([
    'resources/assets/js/jquery-1.11.1.min.js',
    'resources/assets/js/TweenMax.min.js',
    'resources/assets/js/resizeable.js',
    'resources/assets/js/joinable.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/xenon-api.js',
    'resources/assets/js/xenon-toggles.js',
    'resources/assets/js/xenon-custom.js',
], 'public/static-common/js/common.js');

// 公共资源-CSS
mix.styles([
    'resources/assets/css/common.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/linecons.css',
    'resources/assets/css/bootstrap.css',
    'resources/assets/css/xenon-components.css',
    'resources/assets/css/xenon-core.css',
    'resources/assets/css/xenon-forms.css',
    'resources/assets/css/xenon-skins.css',
], 'public/static-common/css/common.css');

// 导航站资源
mix.styles([
    'resources/assets/navigation/css/app.css'
], 'public/static-navigation/css/app.css');

// 后台管理 - Wiki 资源
mix.styles([
    'resources/assets/admin/wiki/css/custom.css'
], 'public/static-admin/wiki/css/app.css');

mix.scripts([
    'resources/assets/admin/wiki/js/ztree.config.js',
    'resources/assets/admin/wiki/js/editor.md.config.js'
], 'public/static-admin/wiki/js/app.js');

mix.copyDirectory('resources/assets/admin/wiki/img/', 'public/static-admin/wiki/img');

mix.version();

