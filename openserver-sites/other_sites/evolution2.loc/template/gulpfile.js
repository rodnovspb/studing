var gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    browserSync = require('browser-sync'),
    uglify = require('gulp-uglify'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    autoprefixer = require('gulp-autoprefixer'),
    gcmq = require('gulp-group-css-media-queries');



gulp.task('browser-sync', function() { // Создаем таск browser-sync
    browserSync({ // Выполняем browserSync
        server: { // Определяем параметры сервера
            baseDir: '/', // Директория для сервера
            index: "index.html"
        },
        online: true,
        notify: true // Отключаем уведомления
    });
});



gulp.task('html', function() {
    return gulp.src('*.html')
        .pipe(browserSync.reload({ stream: true }))
});


gulp.task('scss', function() {
    return gulp.src('scss/*.scss')
        .pipe(sass())
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
        .pipe(gcmq())
        .pipe(cssnano())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('css/'))
        .pipe(browserSync.reload({ stream: true }))
});




gulp.task('watch', function() {
    gulp.watch('app/scss/*.scss', gulp.parallel('scss')); // Наблюдение за sass файлами
    gulp.watch('app/*.html', gulp.parallel('html')); // Наблюдение за HTML файлами в корне проекта
});
gulp.task('sass', function() {
    gulp.watch('app/scss/*.scss', gulp.parallel('scss')); // Наблюдение за sass файлами
});
gulp.task('default', gulp.parallel('browser-sync', 'watch'));