const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 const webpack = require('webpack');
 
 mix.webpackConfig({
     plugins: [
         new webpack.ProvidePlugin({
             $: 'jquery',
             jQuery: 'jquery',
             'window.jQuery': 'jquery',
             'window.$': 'jquery'
         })
     ]
 });

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
