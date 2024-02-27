import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    resolve: {
        alias: {
            '~laravel-medialibrary-pro': '/vendor/spatie/laravel-medialibrary-pro/resources/js'
        }
    },
    plugins: [
        laravel([
            'resources/css/main.css',
            // 'resources/js/react/app.tsx',
            // 'resources/js/vapor/app.js',
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