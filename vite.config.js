import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/main.css",
                "resources/css/layout.css",
                "resources/css/auth.css",
                "resources/css/component.css",
                "resources/css/home.css",
                "resources/css/product.css",
                "resources/css/productDetail.css",
                "resources/css/cart.css",
                "resources/css/layout.css",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
