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

mix.sass('resources/access/scss/style.scss', 'public/css');
mix.sass('resources/access/scss/header.scss','public/css');
mix.sass('resources/access/scss/home.scss','public/css');
mix.sass('resources/access/scss/DetailProduct.scss','public/css');
mix.sass('resources/access/scss/footer.scss','public/css');
mix.sass('resources/access/scss/category.scss','public/css');
mix.sass('resources/access/scss/cart.scss','public/css');
mix.sass('resources/access/scss/search.scss','public/css');
