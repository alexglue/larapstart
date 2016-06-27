var elixir = require('laravel-elixir');
var bower  = {
    directory: 'vendor/assets'
}
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
    /* admin app scripts */
    mix.scripts([
        bower.directory + '/AdminLTE/plugins/select2/select2.min.js',
        bower.directory + '/AdminLTE/plugins/iCheck/icheck.min.js',
        bower.directory + '/AdminLTE/dist/js/app.js',
        bower.directory + '/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js',
        bower.directory + '/AdminLTE/plugins/fastclick/fastclick.min.js',

        bower.directory + '/bootstrap-select/dist/js/bootstrap-select.min.js',
        bower.directory + '/ajax-bootstrap-select/dist/js/ajax-bootstrap-select.min.js',
        bower.directory + '/AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
        bower.directory + '/AdminLTE/plugins/datepicker/locales/bootstrap-datepicker.ru.js',
        bower.directory + '/AdminLTE/plugins/daterangepicker/daterangepicker.js',
        bower.directory + '/bootbox.js/bootbox.js',
    ], 'public/admin/js/app.js','./');

    /* admin app styles */
    mix.styles([
        bower.directory + '/AdminLTE/dist/css/AdminLTE.css',
        bower.directory + '/AdminLTE/dist/css/skins/_all-skins.css',
        bower.directory + '/font-awesome/css/font-awesome.min.css',
        bower.directory + '/Ionicons/css/ionicons.min.css',
        bower.directory + '/AdminLTE/plugins/iCheck/all.css',

        bower.directory + '/bootstrap-select/dist/css/bootstrap-select.min.css',
        bower.directory + '/ajax-bootstrap-select/dist/css/ajax-bootstrap-select.min.css',
        bower.directory + '/AdminLTE/plugins/datepicker/datepicker3.css',
        bower.directory + '/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css',
    ], 'public/admin/css/app.css', './');

    mix.copy(bower.directory + '/jquery/dist/jquery.min.js', 'public/admin/js/');
    mix.copy(bower.directory + '/jquery-migrate/jquery-migrate.js', 'public/admin/js/');

    mix.copy(bower.directory + '/bootstrap/dist/js/bootstrap.min.js', 'public/admin/js/');
    mix.copy(bower.directory + '/bootstrap/dist/css/bootstrap.min.css', 'public/admin/css/');

    mix.copy(bower.directory + '/html5shiv/dist/html5shiv.min.js', 'public/admin/js/');
    mix.copy(bower.directory + '/respond/dest/respond.min.js', 'public/admin/js/');

    mix .copy(bower.directory + '/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js', 'public/admin/js/datatables')
        .copy(bower.directory + '/AdminLTE/plugins/datatables/images/**', 'public/admin/css/datatables/images')
        .copy(bower.directory + '/AdminLTE/plugins/datatables/jquery.dataTables.min.js', 'public/admin/js/datatables')
        .copy(bower.directory + '/AdminLTE/plugins/datatables/dataTables.bootstrap.css', 'public/admin/css/datatables')
        .copy(bower.directory + '/datatables-buttons/js/dataTables.buttons.js', 'public/admin/js/datatables')

    /* admin app fonts */
    mix .copy(bower.directory + '/AdminLTE/bootstrap/fonts/**', 'public/admin/fonts/')
        .copy(bower.directory + '/font-awesome/fonts/**', 'public/admin/fonts/')
        .copy(bower.directory + '/Ionicons/fonts/**', 'public/admin/fonts/')
    ;

    /* other resources */
    mix .copy('resources/assets/admin/img/**', 'public/admin/img/')
        .copy('resources/assets/admin/js/**', 'public/admin/js/')
        .copy('resources/assets/admin/css/**', 'public/admin/css/')
        .copy('resources/shared', 'public/')
        .copy('resources/index.php', 'public/')
    ;

    /* client-oriented app side: */
    mix.less('app.less', 'public/site/css');
    mix.sass('app.scss', 'public/site/css');
    mix.copy(bower.directory + '/jquery/dist/jquery.min.js', 'public/site/js/');

    mix.copy(bower.directory + '/AdminLTE/plugins/iCheck/all.css', 'public/site/css/');
    mix.copy(bower.directory + '/AdminLTE/plugins/iCheck/icheck.min.js', 'public/site/js/');

});
