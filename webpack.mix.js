let mix = require("laravel-mix");
require("laravel-mix-purgecss");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").vue()
    .postCss("resources/css/main.css", "public/css", [
        require("tailwindcss"),
    ])
    .copy("resources/img/", "public/img");

if (mix.inProduction()) {
    mix.version();
}
