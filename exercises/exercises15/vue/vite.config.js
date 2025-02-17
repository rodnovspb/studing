import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [vue()],
    root: '.', // корневая папка проекта
    server: {
        open: true, // Автоматически открывать браузер при запуске сервера
    },
    build: {
        outDir: 'dist', // Папка для сборки
    },
});