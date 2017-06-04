var gulp = require('gulp'), //本地安装gulp所用到的地方
    less = require('gulp-less');
    minifycss = require("gulp-minify-css");
    // concat = require("gulp-concat");
    // uglify = require("gulp-uglify");
    // rename = require('gulp-rename'),

 
//定义一个testLess任务（自定义任务名称）
gulp.task('testLess', function () {
    gulp.src('./Index/Tpl/Public/css/shopcart.less') //该任务针对的文件
        .pipe(less()) //该任务调用的模块 
        .pipe(gulp.dest('./Public/css'))
        .pipe(minifycss())
        .pipe(gulp.dest('./Index/Tpl/Public/css')); //将会在src/css下生成index.css

 
});
gulp.watch('./Index/Tpl/Public/css/*.less' ,["testLess"]);
gulp.task('default',['testLess']); //定义默认任务 elseTask为其他任务，该示例没有定义elseTask任务