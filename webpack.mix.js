const mix = require('laravel-mix');
const path = require('path');

const customConfig = {
    resolve: {
       alias:{
          '@': path.resolve('./resources'),
          '@app': path.resolve('./resources/js'),
       }
    }
 };
 
 mix.webpackConfig(customConfig);

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.browserSync({
    proxy: process.env.MIX_SENTRY_DSN_PUBLIC
});

if (mix.inProduction()) {
    mix.version();
}