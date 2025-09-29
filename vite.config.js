import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/scss/login.scss', 'resources/typescript/login.ts'],
            refresh: true,
        }),
    ],
});
