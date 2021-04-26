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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/welcome.css', 'public/css')
    .postCss('resources/css/userview.css', 'public/css')
    .postCss('resources/css/navbar.css', 'public/css')
    .postCss('resources/css/sidebar.css', 'public/css/app.css')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
;
