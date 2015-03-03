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

var paths = {
    "assets": "./resources/assets/",
    "jquery": "./vendor/bower_components/jquery/",
    "bootstrap": "./vendor/bower_components/bootstrap-sass-official/assets/",
    "fontawesome": "./vendor/bower_components/font-awesome/",
    "jqueryui": "./vendor/bower_components/jquery-ui/",
    "jqueryuidatetime": "./vendor/bower_components/datetimepicker/"
}


elixir(function (mix) {

    mix.copy(paths.bootstrap + 'fonts/', 'public/fonts')
        .copy(paths.fontawesome + 'fonts/', 'public/fonts')
        .copy(paths.jqueryui + 'themes/base/images', 'public/img/ui')
        .sass("app.scss", "public/css/", {
            includePaths: [
                paths.bootstrap + 'stylesheets/',
                paths.fontawesome + 'scss/',
                paths.jqueryui + 'themes/base/'
            ]
        })
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "javascripts/bootstrap.js",
            paths.jqueryui + "jquery-ui.js",
            paths.jqueryuidatetime + "jquery.datetimepicker.js",
            paths.assets + "js/app.js"
        ], "public/js/app.js", "./")
        .version(["public/css/app.css", "public/js/app.js"])
        .phpUnit();

})
;
