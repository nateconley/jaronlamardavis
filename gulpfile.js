const gulp 			= require('gulp');
const sass 			= require('gulp-sass');
const cleanCSS 		= require('gulp-clean-css');
const maps 			= require('gulp-sourcemaps');
const browserSync 	= require('browser-sync');
const autoprefixer 	= require('gulp-autoprefixer');

gulp.task('browser-sync', () => {
	browserSync.init({
		proxy: 'jaronlamardavis.dev',
	});
});

gulp.task('sass', () => {
	return gulp.src('sass/styles.scss')
		.pipe(maps.init())
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(cleanCSS())
		.pipe(maps.write('./'))
		.pipe(gulp.dest('css/'))
		.pipe(browserSync.stream());
});

gulp.task('watch', () => {
	gulp.watch('./sass/**/*.scss', ['sass']);
	gulp.watch('./js/**/*.js').on('change', browserSync.reload);
	gulp.watch('./*.php').on('change', browserSync.reload);
});

gulp.task('default', ['browser-sync', 'watch']);