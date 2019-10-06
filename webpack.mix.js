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

mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'node_modules/jquery.easing/jquery.easing.min.js',
    'resources/vendor/sb-admin-2/js/sb-admin-2.min.js'
], 'public/js/admin.all.js');

mix.styles([
    'node_modules/@fortawesome/fontawesonme-free/css/all.min.css',
    'resources/vendor/sb-admin-2/css/sb-admin-2.min.css'
], 'public/css/admin.all.css');

// mix.styles([
//     'node_modules/bootstrap/dist/css/bootstrap.min.css',
//     'resources/vendor/startbootstrap-heroic/css/heroic-features.css'
// ], 'public/css/user.all.css');

mix.js('resources/js/app.js', 'public/js/user.all.js')
    .sass('resources/sass/app.scss', 'public/css/user.all.css');
// mix.js([
//     'node_modules/jquery/dist/jquery.js',
//     'node_modules/bootstrap/dist/js/bootstrap.min.js',
// ], 'public/js/user.all.js');

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/sprites', 'public/sprites');
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/svgs', 'public/svgs');
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
