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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sourceMaps();


mix.styles([
"resources/css/admin/assets/vendor_components/bootstrap/bootstrap.css",
"resources/css/admin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css",
"resources/css/admin/assets/vendor_components/morris.js/morris.css",
"resources/css/admin/css/bootstrap-extend.css",
"resources/css/admin/css/main-nav.css",
"resources/css/admin/css/master_style.css",
],"public/admin/css/main.css");

mix.js([
        "resources/js/app.js",
        "resources/js/admin/vendor_components/screenfull/screenfull.js",
        "resources/js/admin/vendor_components/jquery-ui/jquery-ui.js",
        "resources/js/admin/vendor_components/popper/dist/popper.min.js",
        "resources/js/admin/vendor_components/bootstrap/dist/js/bootstrap.js",
        // "resources/js/admin/vendor_components/moment/min/moment.min.js",
        "resources/js/admin/vendor_components/bootstrap-daterangepicker/daterangepicker.js",
        "resources/js/admin/vendor_components/jquery-slimscroll/jquery.slimscroll.js",
        "resources/js/admin/vendor_components/fastclick/lib/fastclick.js",
        "resources/js/admin/vendor_components/raphael/raphael.min.js",
        "resources/js/admin/vendor_components/morris.js/morris.min.js",
        "resources/js/admin/vendor_components/jquery.peity/jquery.peity.js",
        "resources/js/admin/vendor_components/echarts/dist/echarts-en.min.js",
        "resources/js/admin/vendor_components/apexcharts-bundle/irregular-data-series.js",
        "resources/js/admin/vendor_components/apexcharts-bundle/dist/apexcharts.js",
        "resources/js/admin/vendor_components/Flot/jquery.flot.js",
        "resources/js/admin/vendor_components/Flot/jquery.flot.resize.js",
        "resources/js/admin/vendor_components/Flot/jquery.flot.pie.js",
        "resources/js/admin/vendor_components/Flot/jquery.flot.categories.js",
        "resources/js/admin/js/jquery.smartmenus.js",
        "resources/js/admin/js/menus.js",
        "resources/js/admin/js/template.js",
        "resources/js/admin/js/pages/dashboard.js",
        "resources/js/admin/js/demo.js",
    ],"public/admin/js/main.js"
    );
mix.copyDirectory('resources/fonts','public/admin/css/fonts');
mix.copyDirectory('resources/css/admin/css/icons','public/admin/css/icons');
mix.copyDirectory('resources/images','public/admin/images');
//
