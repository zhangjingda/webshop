var gulp = require('gulp'), //���ذ�װgulp���õ��ĵط�
    less = require('gulp-less');
    minifycss = require("gulp-minify-css");
    // concat = require("gulp-concat");
    // uglify = require("gulp-uglify");
    // rename = require('gulp-rename'),

 
//����һ��testLess�����Զ����������ƣ�
gulp.task('testLess', function () {
    gulp.src('./Index/Tpl/Public/css/shopcart.less') //��������Ե��ļ�
        .pipe(less()) //��������õ�ģ�� 
        .pipe(gulp.dest('./Public/css'))
        .pipe(minifycss())
        .pipe(gulp.dest('./Index/Tpl/Public/css')); //������src/css������index.css

 
});
gulp.watch('./Index/Tpl/Public/css/*.less' ,["testLess"]);
gulp.task('default',['testLess']); //����Ĭ������ elseTaskΪ�������񣬸�ʾ��û�ж���elseTask����