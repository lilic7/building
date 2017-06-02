const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    })
    .copy('resources/assets/bower/font-awesome/fonts', 'public/fonts')
    .copy('resources/assets/bower/jquery/dist/jquery.min.js', 'public/js')
    .copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'public/js')
    .browserSync({
   	    proxy: "building.app"
    });
