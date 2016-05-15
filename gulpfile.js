var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
    mix.less('admin-lte/AdminLTE.less');
    mix.less('bootstrap/bootstrap.less');

    mix.copy('resources/shared/favicon.ico', 'public/favicon.ico')
        .copy('resources/index.php', 'public/index.php')
        .copy('resources/shared/robots.txt', 'public/robots.txt')
        .copy('resources/assets/admin/**', 'public/admin/');
});
