const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/alpine.js', 'public/js')

    .styles([
        'resources/css/mdui.css',
        'resources/css/app.css',
    ], 'public/css/app.css')

    .copy('node_modules/mdui/dist/js/mdui.esm.js.map', 'public/js')
    .copy('node_modules/mdui/dist/css/mdui.min.css.map', 'public/css')

    .version()

    .disableNotifications();
