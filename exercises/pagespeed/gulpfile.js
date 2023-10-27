const gulp = require('gulp');
const less = require('gulp-less');
const gcmq = require('gulp-group-css-media-queries');

/* function critical(done){

	done();
}
 */
function html(){
	return gulp.src('./src/*.html')
				.pipe(gulp.dest('./dist'));
}

function css(){
	return gulp.src('./src/css/main.less')
				.pipe(less())
				.pipe(gcmq())
				.pipe(gulp.dest('./dist/css'));
}

function images(){
	return gulp.src('./src/img/*')
				.pipe(gulp.dest('./dist/img'));
}



gulp.task('html', html);
gulp.task('css', css);
gulp.task('images', images);

gulp.task('build',
	gulp.parallel(html, css)
);