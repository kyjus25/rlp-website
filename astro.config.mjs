// @ts-check
import { defineConfig } from "astro/config";

import tailwindcss from "@tailwindcss/vite";

// https://astro.build/config
export default defineConfig({
  vite: {
    plugins: [tailwindcss()],
  },
  outDir: 'dist',
  site: import.meta.env.PROD ? 'https://kyjus25.github.io/rlp-website/' : undefined,
  base: import.meta.env.PROD ? '/rlp-website/' : undefined,
});
