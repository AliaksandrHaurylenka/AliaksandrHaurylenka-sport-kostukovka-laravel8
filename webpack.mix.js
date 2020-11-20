const mix = require('laravel-mix');

mix
  .setPublicPath('public/build')
  .setResourceRoot('/build/')
  .js('resources/assets/js/app.js', 'js')
  .sass('resources/assets/sass/app.scss', 'css')
  .sass('resources/assets/sass/my_style.scss', 'css')
  .version();
