"use strict";

var mix = require('laravel-mix');
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


var jsPath = 'resources/js';
mix.js(jsPath + '/app.js', 'public/js').js(jsPath + '/js/util.js', 'public/js').postCss('resources/css/app.css', 'public/css', [//
]).version();
mix.combine(['./node_modules/imagesloaded/imagesloaded.pkgd.js', './node_modules/jquery/dist/jquery.js', './node_modules/slick-carousel/slick/slick.js', './node_modules/picturefill/picturefill.js', './node_modules/swipebox/src/js/jquery.swipebox.js', './node_modules/moment/min/moment.min.js', './node_modules/jquery-pjax/jquery.pjax.js', jsPath + '/info-pane.js', jsPath + '/base.js'], 'web/assets_static/js/base.js');
mix.disableNotifications();