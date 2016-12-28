var gulp			= require('gulp'),
	sass			= require('gulp-sass'),
	browserSync		= require('browser-sync').create(),
	concat			= require('gulp-concat'),
	uglify			= require('gulp-uglify'),
	cleanCSS		= require('gulp-clean-css'),
	rename			= require('gulp-rename'),
	autoprefixer	= require('gulp-autoprefixer'),
	sourcemaps		= require('gulp-sourcemaps'),
	mainBowerFiles  = require("main-bower-files"),
	autoClose		= require('browser-sync-close-hook');

gulp.task('stop', function() {
    browserSync.exit();
});

gulp.task('browser-sync',function() {
	
	browserSync.use({
    	hooks: {
    		'client:js': autoClose, // <-- important part 
    	},
	});
		
	browserSync.init({
	    proxy: '127.0.0.1:8080',
		ui: {
			port: 8081,
			weinre: {
        		port: 8083
    		}
		},
		port: 8082,
		notify: false
	});
});

gulp.task('mainJS', function() {
    return gulp.src(mainBowerFiles('**/*.js'))
    .pipe(gulp.dest('public/bin/js'))
});

gulp.task('mainCSS', function() {
    return gulp.src(mainBowerFiles('**/*.css'))
    .pipe(gulp.dest('public/bin/css'))
});

gulp.task('sass', function() {
	return gulp.src('public/src/sass/**/*.sass')
	    .pipe(sourcemaps.init())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(rename({suffix: '.min', prefix : ''}))
		.pipe(autoprefixer(['last 15 versions']))
		.pipe(cleanCSS())
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('public/bin/css'))
		.pipe(browserSync.reload({stream: true}))
});

gulp.task('libs', function() {
	return gulp.src([
		//'app/libs/jquery/dist/jquery.js',
		])
		.pipe(sourcemaps.init())
		.pipe(concat('libs.min.js')) // объединяем
		.pipe(uglify()) // сжимаем
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest('public/bin/js'));
});

gulp.task('watch', ['sass', 'libs', 'browser-sync'], function() {
	gulp.watch('public/src/sass/**/*.sass', ['sass']);
	gulp.watch('public/src/**/*.php', browserSync.reload);
	gulp.watch('public/src/**/*.html', browserSync.reload);
	gulp.watch('public/src/js/**/*.js', browserSync.reload);
});

gulp.task('default', ['watch']);
