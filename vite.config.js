import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/scss/index.scss',
                'resources/scss/login.scss',
                'resources/scss/profile.scss',
                'resources/scss/users.scss',
                'resources/typescript/login.ts',
                'resources/typescript/profile.ts',
            ],
            refresh: true,
        }),
    ],
});
