const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .copy("node_modules/leaflet/dist/leaflet.css", "public/css")
    .copy("node_modules/leaflet/dist/images", "public/css/images");
