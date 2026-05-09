import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: './resources/assets/particles',
                    dest: './public'
                }
            ]
        })
    ],
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler',
                silenceDeprecations: ['import', 'if-function', 'global-builtin'],
            },
        },
    },
    resolve: {
        alias: {
            '~/fontawesome': path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free'),
        }
    }
});
