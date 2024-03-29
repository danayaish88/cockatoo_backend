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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);

mix.sass('resources/sass/stories.scss', 'public/css');
mix.sass('resources/sass/shared-story.scss', 'public/css');

mix.js('resources/js/leafletMap.js', 'public/js');
mix.js('resources/js/stories.js', 'public/js');
mix.js('resources/js/shared-story.js', 'public/js');
mix.js('resources/js/dashboard.js', 'public/js');