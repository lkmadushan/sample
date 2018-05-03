let mix = require('laravel-mix')
require('laravel-mix-purgecss')

mix.js('resources/assets/js/app.js', 'public/js')
    .postCss('resources/assets/css/app.css', 'public/css')
    .copy('resources/assets/images', 'public/images')
    .options({
        postCss: [
            require('postcss-import')(),
            require('tailwindcss')('./tailwind.js'),
            require('postcss-cssnext')({
                // Mix adds autoprefixer already, don't need to run it twice
                features: {autoprefixer: false}
            }),
        ]
    })
    .purgeCss()
    .browserSync('localhost')

if (mix.inProduction()) {
    mix.version()
}
