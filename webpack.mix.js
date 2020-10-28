const mix = require('laravel-mix');
const path = require('path');

mix.js('resources/js/vue/app.js', 'public/js/vue')
    .vue({ version: 3 })
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

    webpackConfig.resolve.modules = [`${__dirname}/vendor/spatie/laravel-medialibrary-pro/resources/js`, 'node_modules'];

    webpackConfig.resolve.extensions.push('.ts', '.tsx');
});

if (mix.inProduction()) {
    const ASSET_URL = process.env.ASSET_URL + '/';

    mix.webpackConfig((webpack) => {
        return {
            plugins: [
                new webpack.DefinePlugin({
                    'process.env.ASSET_PATH': JSON.stringify(ASSET_URL),
                }),
            ],
            output: {
                publicPath: ASSET_URL,
            },
        };
    });
} else {
    mix.postCss('resources/css/main.css', 'public/css', [require('tailwindcss')]);
}
