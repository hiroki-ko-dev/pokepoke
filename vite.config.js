// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/scss/common/style.scss',
        'resources/scss/home/style.scss',
        'resources/js/roots/cards/index.tsx',
        'resources/js/roots/cards/create.tsx',
      ],
      refresh: true, // ファイル変更時にブラウザをリロード
    }),
    // react(),  @vitejs/plugin-reactと競合するのでコメントアウト
  ],
  resolve: {
    alias: {
      '@': '/resources/js',
    },
  },
  css: {
    modules: {
      scopeBehaviour: 'local', // CSSモジュールはローカルスコープ
    },
  },
  build: {
    outDir: 'public/build', // 出力ディレクトリ
    emptyOutDir: false, // 出力前にディレクトリを空にしない
  },
  server: {
    host: '0.0.0.0', // Docker コンテナ内で動作
    port: 5173, // Vite のデフォルトポート
    proxy: {
      '/assets': 'http://localhost',  // Laravel サーバーが提供する assets フォルダ
    },
    watch: {
      usePolling: true,  // ファイル監視をポーリングで行う
    },
    hmr: {
      host: 'localhost',
      port: 5173,
    },
  },
});
