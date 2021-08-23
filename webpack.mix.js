let mix = require("laravel-mix");
let tailwindcss = require("tailwindcss");
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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/main.scss", "public/css")
    .options({
        processCssUrls: false,
        postCss: [tailwindcss("tailwind.js")]
    })
    .purgeCss()
    .copy("resources/img/", "public/img");

if (mix.inProduction()) {
    mix.version();
}
