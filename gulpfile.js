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

elixir(function(mix)
{
    mix.less('app.less', 'public/adm/css');
    mix.less('bootstrap/bootstrap.less', 'public/adm/css');
    mix.less('admin-lte/AdminLTE.less', 'public/adm/css');

    mix.copy('resources/shared/favicon.ico', 'public/favicon.ico')
        .copy('resources/index.php', 'public/index.php')
        .copy('resources/shared/robots.txt', 'public/robots.txt')

        .copy('resources/assets/admin/font-awesome/css/**', 'public/adm/css/')
        .copy('resources/assets/admin/font-awesome/fonts/**', 'public/adm/fonts/')

        .copy('resources/assets/admin/ionicons/css/**', 'public/adm/css/')
        .copy('resources/assets/admin/ionicons/fonts/**', 'public/adm/fonts/')

        .copy('resources/assets/admin/css/**', 'public/adm/css')
        .copy('resources/assets/admin/fonts/**', 'public/adm/fonts/')
        .copy('resources/assets/admin/img/**', 'public/adm/img/')
        .copy('resources/assets/admin/js/**', 'public/adm/js/')
        .copy('resources/assets/admin/plugins/**', 'public/adm/plugins/');
});
