import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  server: {
    host: '0.0.0.0', // важно для Docker
    port: 5173,
    strictPort: true,
    hmr: {
      host: 'estet.local',
      protocol: 'wss', // secure WebSocket
      clientPort: 443,
      path: "@vite/ws"
    },
  },
  plugins: [
    laravel({
      input: ['resources/css/app.scss', 'resources/js/app.ts'],
      refresh: true,
    }),
  ],
});
