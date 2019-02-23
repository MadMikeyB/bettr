const mix = require('laravel-mix');

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

mix.webpackConfig({
    module: {
        rules: [{
            test: /\.scss$/,
            loader: "import-glob-loader"
        },
    ]}
});

mix.sass('./resources/sass/app.scss', './style.min.css')
    .js('./resources/js/**/*.js', './scripts.min.js')
    .sourceMaps()
    .options({ 
        processCssUrls: false
    }).browserSync({
        proxy: 'https://bettr.dev',
        host: 'bettr.dev',
        open: 'external',
        injectChanges: true,
        files: [
            'resources/js/**/*.js', 
            'resources/sass/**/*.scss', 
            'resources/views/**/*.blade.php'
        ],
        https: {
            key: "/Users/mikey/.valet/Certificates/bettr.dev.key",
            cert: "/Users/mikey/.valet/Certificates/bettr.dev.crt"
        },
    });
