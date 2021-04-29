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
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

/**
    * Importar Semantic Ui JS AND CSS Copy;
*/

mix.copy(
    [
        'resources/semantic-ui/js/semantic.min.js', 'public/semantic-ui/js',
        'resources/semantic-ui/css/semantic.min.css', 'public/semantic-ui/css'
    ]
);
