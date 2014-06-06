var gulp = require('gulp');
var less = require('gulp-less');
var autoprefix = require('gulp-autoprefixer');
var miniCSS = require('gulp-minify-css');
	
var root = __dirname;

gulp.task('default', ['styles', 
					  'watch',
					  'vendor-prefix',
					  'minify-css']);

//Keep an eye on them folders

gulp.task('watch', function() {
    gulp.watch(root + '/public/css/less/*.less', ['styles', 'vendor-prefix', 'minify-css']);
    gulp.watch(root + '/public/js/*.js', []);
});

//Compile LESS
gulp.task('styles', function(){
	gulp.src([root + '/public/css/less/styles.less'])
		.pipe(less())
		.pipe(gulp.dest(root + '/public/css/prod/'));
});

//Add vendor prefixes to CSS
gulp.task('vendor-prefix', function(){
	gulp.src(root + '/public/css/prod/*.css')
	  .pipe(autoprefix('last 2 versions'))
	  .pipe(gulp.dest(root + '/public/css/prod/'));
});

//Make it tiny
gulp.task('minify-css', function() {
  gulp.src(root + '/public/css/prod/*.css')
    .pipe(miniCSS({keepSpecialComments:0}))
    .pipe(gulp.dest(root + '/public/css/prod/'));
});
	
