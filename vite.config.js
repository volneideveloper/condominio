import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        // Permite que o servidor Vite seja acessado de qualquer IP na rede local
        host: '0.0.0.0', 
        // Habilita o HMR (Hot Module Replacement)
        hmr: {
            host: 'localhost',
        },
        // Adicione esta configuração de CORS
        cors: {
            // Especifique a origem da sua aplicação Laravel
            origin: process.env.APP_URL || 'http://localhost',
        }
    },
});
