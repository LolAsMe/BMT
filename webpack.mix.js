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

 mix.browserSync({
    // proxy: 'http://192.168.1.17:8000',
    // host: 'http://192.168.1.17:8000',
    // open: 'external'
});

mix.js('resources/js/app.js', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]) .options({
        hmrOptions: {
            host: '192.168.1.10',
            port: 8080
        }
    })
    .webpackConfig(require('./webpack.config'));


if (mix.inProduction()) {
    mix.version();
}
