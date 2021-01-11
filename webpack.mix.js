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
mix.scripts([
    	'https://cdn.bootcss.com/jquery/1.11.0/jquery.min.js',
    ], 'public/js/app.js')
    .autoload({
            jquery: ['$', 'window.jQuery', 'jQuery', 'Swiper'], // more than one
            moment: 'moment' // only one
    });
mix.styles([
    	'resources/asset/css/app.css',
    ], 'public/css/app.css');
