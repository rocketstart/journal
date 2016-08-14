var elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('app.scss');

    // CUSTOM SCRIPTS
    mix.scripts([
        'modernizr.js',
        'theme.js'
    ], 'public/js/lib.js', 'resources/assets/js/lib');

    mix.browserify('app.js');

    // CACHE BUSTING
    mix.version([
        'css/app.css',
        'js/lib.js',
        'js/app.js'
    ]);

    mix.browserSync({proxy: 'journal.rocketstart.dev'});
});
