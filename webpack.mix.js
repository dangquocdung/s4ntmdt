let mix = require('laravel-mix');
mix.pug = require('laravel-mix-pug');

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

mix
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/styles.scss', 'public/css')
    .version();

// mix.pug('resources/assets/html/index.pug', 'httrade')
//    .setPublicPath('dist');
   
mix.disableNotifications();
