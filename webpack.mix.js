const mix = require('laravel-mix');

mix.browserSync({
    proxy: 'http://uitzendbureauevent.test/'
})

let scssOptions = {
    processCssUrls: false,
    autoprefixer: {
        options: {
            grid: 'autoplace'
        }
    },
    sourceComments: true
};

mix.setPublicPath('./');

mix.sass('assets/sass/style.scss', 'assets/css/main.css').options(scssOptions);
mix.sass('assets/sass/includes.scss', 'assets/css/includes.css').options(scssOptions);

mix.sourceMaps(true, 'source-map');