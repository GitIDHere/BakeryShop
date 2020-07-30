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

mix.js('resources/js/app.js', 'public/js');

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/style.scss', 'public/css').version();

mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/elegant-icons.css',
    'resources/css/font-awesome.min.css',
    'resources/css/jquery-ui.min.css',
    'resources/css/magnific-popup.css',
    'resources/css/owl.carousel.min.css',
    'resources/css/slicknav.min.css',
    'resources/css/style.css',
], 'public/css/app_css.css');
