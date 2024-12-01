import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'; // React用プラグイン（必要に応じて）

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/scss/home/style.scss',
        'resources/scss/images/index.scss',
        'resources/ts/images/index.ts', // TypeScriptに変更
      ],
      refresh: true,
    }),
    react(), // 必要に応じてReactプラグインを追加
  ],
  publicDir: 'public',
  resolve: {
    alias: {
      '@': '/resources/js', // TypeScript用エイリアス
    },
  },
  build: {
    outDir: 'public', // ビルド出力ディレクトリ
  },
});
