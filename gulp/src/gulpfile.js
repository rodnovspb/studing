let {src, dest, parallel, series, watch} = require('gulp')
let concat = require('gulp-concat')
let cleanJs = require('gulp-uglify')
let del = require('del')

function func(cb) {
    return del('dir/*')
}

function func1(cb) {
    return src('js/*.js')
      .pipe(concat('bundle.js'))
      .pipe(cleanJs())
      .pipe(dest('dir'))
}
exports.default = function () {
        watch('js/*.js', series(func, func1))
}
