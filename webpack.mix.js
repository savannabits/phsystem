const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss')
require('laravel-mix-tailwind');
require('laravel-mix-merge-manifest')
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
// mix.browserSync(process.env.MIX_APP_URL);
mix.setResourceRoot(`${process.env.MIX_APP_URI || ''}`);
mix.webpackConfig({
    output: {
        chunkFilename: `js/[name].js`,
        filename: "[name].js",
        publicPath: `/${process.env.MIX_APP_URI ? process.env.MIX_APP_URI+'/' : ''}`
    }
});

mix
    .extract([
        // 'core-js/stable',
        // 'regenerator-runtime/runtime',
        'vue',
        'lodash',
        'jquery',
        // 'bootstrap',
        'bootstrap-vue',
        'vue-multiselect',
        'vue-quill-editor',
        'vue-notification',
        'vue-js-modal',
        'vue2-filters',
        'vue-form-wizard',
        'axios',
        'vue-loading-overlay',
        'vue-observe-visibility',
        'vue-bootstrap-typeahead',
        'vue-cookie',
        'moment',
        'craftable',
        'vue-tailwind',
    ]);
mix
    .js('resources/js/app.js', 'public/js')
    .js(['resources/js/admin/admin.js'], 'public/js')
    .js(['resources/js/web/web.js'],'public/js')
    .mergeManifest()

if (mix.inProduction()) {
  mix
      .version();
}
