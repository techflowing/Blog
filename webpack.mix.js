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
// 导航站
// mix.styles([
//     'resources/assets/web-stack/css/font/linecons/css/linecons.css',
//     'resources/assets/web-stack/css/font/fontawesome/css/font-awesome.min.css',
//     'resources/assets/web-stack/css/bootstrap.css',
//     'resources/assets/web-stack/css/xenon-core.css',
//     'resources/assets/web-stack/css/xenon-components.css',
//     'resources/assets/web-stack/css/xenon-skins.css',
//     'resources/assets/web-stack/css/nav.css'
// ], 'public/static-navigation/css/app.css');
//
// mix.copyDirectory('resources/assets/web-stack/css/font/fontawesome/font', 'public/static-navigation/font');
// mix.copyDirectory('resources/assets/web-stack/css/font/linecons/font', 'public/static-navigation/font');

// mix.scripts([
//     'resources/assets/web-stack/js/jquery-1.11.1.min.js',
//     'resources/assets/web-stack/js/bootstrap.min.js',
//     'resources/assets/web-stack/js/TweenMax.min.js',
//     'resources/assets/web-stack/js/resizeable.js',
//     'resources/assets/web-stack/js/joinable.js',
//     'resources/assets/web-stack/js/xenon-api.js',
//     'resources/assets/web-stack/js/xenon-toggles.js',
//     'resources/assets/web-stack/js/xenon-custom.js',
// ], 'public/static-navigation/js/app.js');


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

mix.version();

