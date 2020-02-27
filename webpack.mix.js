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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');

   mix.styles([
      'resources/css/libs/sb-admin-2.min.css',
      'resources/css/libs/all.min.css',
      'resources/css/libs/dataTables.bootstrap4.min.css',
      'resources/css/libs/customstyle.css',

   ], 'public/css/libs.css');
   
   mix.scripts([
      'resources/js/libs/jquery.min.js',
      'resources/js/libs/bootstrap.bundle.min.js',
      'resources/js/libs/jquery.easing.min.js',
      'resources/js/libs/sb-admin-2.min.js',
      'resources/js/libs/dataTables.bootstrap4.min.js',
      'resources/js/libs/jquery.dataTables.min.js',
      'resources/js/libs/Chart.min.js',  
   
   ], 'public/js/libs.js');