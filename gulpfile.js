var elixir = require('laravel-elixir');
var postStylus = require('poststylus');
require('laravel-elixir-stylus');
require('laravel-elixir-vueify');

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

elixir.config.js.browserify.transformers.push({name: 'browserify-shim'});

elixir(function(mix) {
    mix.stylus('app.styl', null, {
        use: [postStylus(['lost'])]
    });

    mix.browserify('app.js');
});
