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



// mix.js('resources/js/app.js', 'public/js/admin.js')
//     .sass('resources/sass/app.scss', 'public/css/admin.css');

mix.js('resources/js/app.js', 'public/js/admin.js');

mix.styles([
    'resources/assets/admin/plugins/bootstrap/dist/css/bootstrap.min.css',
    'resources/assets/admin/plugins/font-awesome/css/font-awesome.min.css',
    'resources/assets/admin/plugins/Ionicons/css/ionicons.min.css',
    'resources/assets/admin/plugins/iCheck/minimal/_all.css',
    'resources/assets/admin/plugins/datepicker/bootstrap-datepicker3.css',
    'resources/assets/admin/plugins/select2/dist/css/select2.min.css',
    'resources/assets/admin/plugins/datatables/dataTables.bootstrap.css',
    'resources/assets/admin/dist/css/AdminLTE.min.css',
    'resources/assets/admin/dist/css/skins/_all-skins.min.css',
], 'public/css/admin.css');

mix.js([
    // 'resources/assets/admin/plugins/jquery/dist/jquery.min.js',
    'resources/assets/admin/plugins/bootstrap/dist/js/bootstrap.min.js',
    'resources/assets/admin/plugins/select2/dist/js/select2.full.min.js',
    'resources/assets/admin/plugins/datepicker/bootstrap-datepicker.js',
    'resources/assets/admin/plugins/datatables/jquery.dataTables.min.js',
    'resources/assets/admin/plugins/datatables/dataTables.bootstrap.min.js',
    'resources/assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    'resources/assets/admin/plugins/fastclick/lib/fastclick.js',
    'resources/assets/admin/plugins/iCheck/icheck.min.js',
    'resources/assets/admin/dist/js/adminlte.min.js',
    'resources/assets/admin/dist/js/demo.js',
    'resources/assets/admin/dist/js/scripts.js',
], 'public/js/admin.js');
//
mix.copy('resources/assets/admin/plugins/bootstrap/fonts', 'public/fonts');
mix.copy('resources/assets/admin/plugins/font-awesome/fonts', 'public/fonts');
mix.copy('resources/assets/admin/dist/img', 'public/img');
mix.copy('resources/assets/admin/plugins/iCheck/minimal/blue.png', 'public/css');

