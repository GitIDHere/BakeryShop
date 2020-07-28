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

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/style.scss', 'public/css');

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

// mix.scripts([
//     'resources/js/laravel_bootstrap.js',
//     'resources/js/jquery-ui.min.js',
//     'resources/js/jquery.magnific-popup.min.js',
//     'resources/js/mixitup.min.js',
//     'resources/js/jquery.countdown.min.js',
//     'resources/js/jquery.slicknav.js',
//     'resources/js/owl.carousel.min.js',
//     'resources/js/jquery.nicescroll.min.js',
//     'resources/js/bootstrap.min.js',
//     'resources/js/template_main.js',
//     'resources/js/app.js',
// ], 'public/js/app_js.js')
//     .extract(['jquery', 'popper.js'], 'js/vendor.js')
//     .version()
// ;

// mix.js('resources/js/app_package.js', 'public/js/app_js.js')
//     .extract(['jquery', 'popper.js'])
// ;