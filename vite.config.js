import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/scss/home/style.scss',
        'resources/scss/images/index.scss',
        'resources/js/images/index.jsx',
      ],
      refresh: true, // ファイル変更時にブラウザをリロード
    }),
    react(),
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
    },
  },
  build: {
    outDir: 'public/build', // 出力ディレクトリ
    emptyOutDir: false, // 出力前にディレクトリを空にしない
  },
  server: {
    host: '0.0.0.0', // Docker コンテナ内で動作
    port: 5173, // Vite のデフォルトポート
    watch: {
      usePolling: true, // ファイル監視をポーリングで行う
    },
    hmr: {
      host: 'localhost', // ホスト側の名前
      port: 5173,
    },
  },
});
