'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
 
sass.compiler = require('node-sass');
 
gulp.task('sass', function () {
  return gulp.src('SCSS/testSASS.scss')
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(gulp.dest('CSS'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('SCSS/testSASS.scss', ['sass']);
});