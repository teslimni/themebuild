// Gulp.js Config
'use strict'

// source and build folder

const
    dir = {
        src: 'src/',
        build: '../wordpress/uniabj/wp-content/themes/uni/'
    },

    // Gulp and Plugins
    gulp = require('gulp'),
    gutil = require('gulp-util'),
    newer = require('gulp-newer'),
    imagemin = require('gulp-imagemin'),
    sass = require('gulp-sass'),
    postcss = require('gulp-postcss'),
    deporder = require('gulp-deporder'),
    concat = require('gulp-concat'),
    stripdebug = require('gulp-strip-debug'),
    uglify = require('gulp-uglify');

// Browser-sync
var browsersync = false;

// php Settings

const php = {
    src: dir.src + 'template/**/*.php',
    build: dir.build
};

// copy php files

gulp.task('php', function () {
    return gulp.src(php.src)
        .pipe(newer(php.build))
        .pipe(gulp.dest(php.build));
});


// Image Settings
const images = {
    src: dir.src + 'img/**/*',
    build: dir.build + 'img/'
};

// Image processing

gulp.task('images', () => {
    return gulp.src(images.src)
        .pipe(newer(images.build))
        .pipe(imagemin())
        .pipe(gulp.dest(images.build));
});

// CSS Settings

var css = {
    src: dir.src + 'scss/style.scss',
    watch: dir.src + 'scss/**/*',
    build: dir.build,
    sassOptions: {
        outputStyle: 'nested',
        imagePath: images.build,
        precision: 3,
        errorLogToConsole: true
    },
    processors: [
        require('postcss-assets')({
            loadPath: ['img/'],
            basePath: dir.build,
            baseUrl: 'wp-content/themes/uni/'

        }),
        require('autoprefixer')({
            browsers: ['last 2 versions', '> 2%']
        }),
        require('css-mqpacker'),
        require('cssnano')
    ]
};

// CSS Processing

gulp.task('css', ['images'], () => {
    return gulp.src(css.src)
        .pipe(sass(css.sassOptions))
        .pipe(postcss(css.processors))
        .pipe(gulp.dest('src'))
        .pipe(gulp.dest(css.build))
        .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
});

// JavaScript Settings

const js = {
    src: dir.src + 'js/**/*',
    build: dir.build + 'js/',
    filename: 'scripts.js'
};

//JavaScript Processing

gulp.task('js', () => {
    return gulp.src(js.src)
        .pipe(deporder())
        .pipe(concat(js.filename))
        .pipe(stripdebug())
        .pipe(uglify())
        .pipe(gulp.dest(js.build))
        .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
});

// Run all tasks

gulp.task('build', ['php', 'css', 'js']);

// Browsersync options

const syncOpts = {
    proxy: 'localhost',
    files: dir.build + '**/*',
    open: false,
    notify: false,
    ghostMode: false,
    ui: {
        port: 8001
    }
};

// browser-sync

gulp.task('browsersync', () => {
    if (browsersync === false) {
        browsersync = require('browser-sync').create();
        browsersync.init(syncOpts);
    }
});

// watch for file changes

gulp.task('watch', ['browsersync'], () => {
    // Page changes
    gulp.watch(php.src, ['php'], browsersync ? browsersync.reload : {});

    //  Image changes

    gulp.watch(images.src, ['images']);

    // CSS Changes 
    gulp.watch(css.watch, ['css']);

    // JavaScript main chnages 
    gulp.watch(js.src, ['js']);

});


// Default task

gulp.task('default', ['build', 'watch']);