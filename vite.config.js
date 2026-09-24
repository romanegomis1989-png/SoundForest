import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

        @vite(['resources/css/app.css',
         'resources/css/sf.css',
         'resources/css/style.css',
         'resources/js/app.js'])


export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/css/sf.css',
                    'resources/css/style.css',
                    'resources/js/app.js',
                    'resources/js/waveform.js'],
            refresh: true,
        }),
    ],
});
