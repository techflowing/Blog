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
mix.copyDirectory('resources/assets/layer', 'public/static-third/layer');
mix.copyDirectory('resources/assets/paginator', 'public/static-third/paginator');

// 公共资源 图片、字体文件等
mix.copyDirectory('resources/assets/common/img/', 'public/static-common/img');
mix.copyDirectory('resources/assets/common/font/', 'public/static-common/font');

// 公共资源-JS
mix.scripts([
    'resources/assets/common/js/jquery-1.11.1.min.js',
    'resources/assets/common/js/jquery.form.js',
    'resources/assets/common/js/TweenMax.min.js',
    'resources/assets/common/js/resizeable.js',
    'resources/assets/common/js/joinable.js',
    'resources/assets/common/js/bootstrap.min.js',
    'resources/assets/common/js/xenon-api.js',
    'resources/assets/common/js/xenon-toggles.js',
    'resources/assets/common/js/xenon-custom.js',
], 'public/static-common/js/common.js');

// 公共资源-CSS
mix.styles([
    'resources/assets/common/css/font-awesome.min.css',
    'resources/assets/common/css/linecons.css',
    'resources/assets/common/css/bootstrap.css',
    'resources/assets/common/css/xenon-components.css',
    'resources/assets/common/css/xenon-core.css',
    'resources/assets/common/css/xenon-forms.css',
    'resources/assets/common/css/xenon-skins.css',
    'resources/assets/common/css/common.css',
], 'public/static-common/css/common.css');

// 欢迎页资源
mix.styles([
    'resources/assets/welcome/css/app.css'
], 'public/static-welcome/css/app.css');

// 错误页
mix.styles([
    'resources/assets/errors/css/app.css'
], 'public/static-errors/css/app.css');

// 导航站资源
mix.styles([
    'resources/assets/navigation/css/app.css'
], 'public/static-navigation/css/app.css');

// 博客资源
mix.styles([
    'resources/assets/blog/css/app.css'
], 'public/static-blog/css/app.css');

mix.scripts([
    'resources/assets/blog/js/app.js'
], 'public/static-blog/js/app.js');

// wiki 资源
mix.styles([
    'resources/assets/wiki/css/app.css',
    'resources/assets/admin/wiki/css/custom.css'
], 'public/static-wiki/css/app.css');
mix.scripts([
    'resources/assets/wiki/js/ztree.config.js'
], 'public/static-wiki/js/app.js');
// Wiki 资源 - 复用部分 Wiki后台管理资源
mix.copyDirectory('resources/assets/admin/wiki/img/', 'public/static-wiki/img');

// 思维导图
mix.styles([
    'resources/assets/xmind/css/app.css'
], 'public/static-xmind/css/app.css');

mix.scripts([
    'resources/assets/xmind/js/app.js',
], 'public/static-xmind/js/app.js');

mix.copyDirectory('resources/assets/xmind/img/', 'public/static-xmind/img');

// 关于页面资源
mix.styles([
    'resources/assets/about/css/app.css'
], 'public/static-about/css/app.css');

// 留言板资源
mix.styles([
    'resources/assets/guestbook/css/app.css'
], 'public/static-guestbook/css/app.css');

// 后台管理 - Wiki 资源
mix.styles([
    'resources/assets/admin/wiki/css/custom.css'
], 'public/static-admin/wiki/css/app.css');

mix.scripts([
    'resources/assets/admin/wiki/js/ztree.config.js',
    'resources/assets/admin/wiki/js/editor.md.config.js'
], 'public/static-admin/wiki/js/app.js');

mix.styles([
    'resources/assets/admin/xmind/css/app.css'
], 'public/static-admin/xmind/css/app.css');

mix.scripts([
    'resources/assets/admin/xmind/js/app.js',
], 'public/static-admin/xmind/js/app.js');

mix.copyDirectory('resources/assets/admin/wiki/img/', 'public/static-admin/wiki/img');

mix.copyDirectory('resources/assets/test', 'public/static-test');

mix.version();

