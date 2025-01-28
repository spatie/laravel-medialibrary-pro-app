import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    resolve: {
        alias: {
            'laravel-medialibrary-pro': '/vendor/spatie/laravel-medialibrary-pro/resources/js',
            'media-library-pro-vue3-attachment': '/vendor/spatie/laravel-medialibrary-pro/resources/js/media-library-pro-vue3-attachment',
            'media-library-pro-vue3-collection': '/vendor/spatie/laravel-medialibrary-pro/resources/js/media-library-pro-vue3-collection',
            'media-library-pro-react-attachment': '/vendor/spatie/laravel-medialibrary-pro/resources/js/media-library-pro-react-attachment',
            'media-library-pro-react-collection': '/vendor/spatie/laravel-medialibrary-pro/resources/js/media-library-pro-react-collection',
            'vue': 'vue/dist/vue.esm-bundler.js',
        }
    },
    plugins: [
        laravel([
            'resources/css/main.css',
            'resources/js/react/app.tsx',
            'resources/js/vapor/app.js',
            'resources/js/vue/app.js',
        ]),
        react(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
