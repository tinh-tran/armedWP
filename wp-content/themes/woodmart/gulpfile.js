var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync').create(),
    autoprefixer = require('gulp-autoprefixer'),
    cssmin = require('gulp-cssmin'),
    rename = require('gulp-rename'),
    csscomb = require('gulp-csscomb')

gulp.task('sass', function () {
    return gulp.src('inc/sass/index.sass')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(csscomb())
        .pipe(rename('main.css'))
        .pipe(gulp.dest('css'))
        .pipe(browserSync.reload({stream: true}))
});

gulp.task('liveReload', function() {
    browserSync.init({
        proxy: "armedwp"
    });
});

gulp.task('default', ['liveReload', 'sass'], function () {
    gulp.watch('inc/sass/**/*.sass', ['sass']);
});