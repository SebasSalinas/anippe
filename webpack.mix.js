const mix = require('laravel-mix');

/* BASE */
mix.scripts([
    'resources/adminLTE/bower_components/jquery/dist/jquery.min.js',
    'resources/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'resources/adminLTE/plugins/iCheck/icheck.min.js',
    'resources/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js',
    'resources/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'resources/adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
    'resources/adminLTE/bower_components/fastclick/lib/fastclick.js',
    'resources/adminLTE/plugins/jquerytoast/jquery.toast.min.js',
    'resources/adminLTE/dist/js/adminlte.min.js',
    'resources/js/app.js'
], 'public/base/js/app.js')
    .styles([
        'resources/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'resources/adminLTE/bower_components/font-awesome/css/font-awesome.min.css',
        'resources/adminLTE/bower_components/Ionicons/css/ionicons.min.css',
        'resources/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'resources/adminLTE/plugins/jquerytoast/jquery.toast.min.css',
        'resources/adminLTE/dist/css/AdminLTE.min.css',
        'resources/adminLTE/dist/css/skins/_all-skins.min.css',
        'resources/adminLTE/plugins/iCheck/square/blue.css'
    ], 'public/base/css/app.css')
    .sourceMaps();

/* ADMIN */
mix.scripts([
    'resources/adminLTE/bower_components/jquery/dist/jquery.min.js',
    'resources/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'resources/adminLTE/plugins/iCheck/icheck.min.js',
    'resources/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js',
    'resources/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'resources/adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
    'resources/adminLTE/bower_components/fastclick/lib/fastclick.js',
    'resources/adminLTE/plugins/jquerytoast/jquery.toast.min.js',
    'resources/adminLTE/dist/js/adminlte.min.js',
    'resources/js/app.js'
], 'public/admin/js/app.js')
    .styles([
        'resources/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'resources/adminLTE/bower_components/font-awesome/css/font-awesome.min.css',
        'resources/adminLTE/bower_components/Ionicons/css/ionicons.min.css',
        'resources/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'resources/adminLTE/plugins/jquerytoast/jquery.toast.min.css',
        'resources/adminLTE/dist/css/AdminLTE.min.css',
        'resources/adminLTE/dist/css/skins/_all-skins.min.css',
        'resources/adminLTE/plugins/iCheck/square/blue.css'
    ], 'public/admin/css/app.css')
    .sourceMaps();

/* PORTAL */
mix.scripts([
    'resources/adminLTE/bower_components/jquery/dist/jquery.min.js',
    'resources/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js',
    'resources/adminLTE/plugins/iCheck/icheck.min.js',
    'resources/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js',
    'resources/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'resources/adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
    'resources/adminLTE/bower_components/fastclick/lib/fastclick.js',
    'resources/adminLTE/plugins/jquerytoast/jquery.toast.min.js',
    'resources/adminLTE/dist/js/adminlte.min.js',
    'resources/js/app.js'
], 'public/portal/js/app.js')
    .styles([
        'resources/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'resources/adminLTE/bower_components/font-awesome/css/font-awesome.min.css',
        'resources/adminLTE/bower_components/Ionicons/css/ionicons.min.css',
        'resources/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'resources/adminLTE/plugins/jquerytoast/jquery.toast.min.css',
        'resources/adminLTE/dist/css/AdminLTE.min.css',
        'resources/adminLTE/dist/css/skins/_all-skins.min.css',
        'resources/adminLTE/plugins/iCheck/square/blue.css'
    ], 'public/portal/css/app.css')
    .sourceMaps();


