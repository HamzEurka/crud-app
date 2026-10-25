import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react' // أو أي plugin آخر تستخدمه

export default defineConfig({
  plugins: [react()],
  server: {
    watch: {
      usePolling: true,
      interval: 100,
    },
    hmr: {
      host: 'localhost',
    },
  },
})