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

mix.js('resources/js/vue/app.js', 'public/js/vue')
    .ts('resources/js/react/app.tsx', 'public/js/react')
    .js('resources/js/vapor/app.js', 'public/js/vapor');

// Needed for local development with React as external library in medialibrary-pro-react
mix.webpackConfig({
    resolve: {
        symlinks: false,
        alias: {
            react: path.resolve('./node_modules/react'),
        },
    },
});

mix.postCss('resources/css/main.css', 'public/css', [require('tailwindcss')]);
