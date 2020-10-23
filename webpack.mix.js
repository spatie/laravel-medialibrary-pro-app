const mix = require('laravel-mix');
const path = require('path');

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

mix.js('resources/js/vue/app.js', 'public/js/vue')
    .vue({ version: 2 })
    .ts('resources/js/react/app.tsx', 'public/js/react')
    .react()
    .js('resources/js/vapor/app.js', 'public/js/vapor');

mix.override((webpackConfig) => {
    delete webpackConfig.watchOptions;

    webpackConfig.resolve.symlinks = false;

    webpackConfig.resolve.alias = {
        ...webpackConfig.resolve.alias,
        react: path.resolve('./node_modules/react'),
        vue: path.resolve('./node_modules/vue'),
    };

    webpackConfig.resolve.modules = [`${__dirname}/vendor/spatie/laravel-medialibrary-pro/ui`, 'node_modules'];

    webpackConfig.resolve.extensions.push('.ts', '.tsx');
});

mix.postCss('resources/css/main.css', 'public/css', [require('tailwindcss')]);
