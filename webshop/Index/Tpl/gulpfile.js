var gulp = require('gulp'), //���ذ�װgulp���õ��ĵط�
    less = require('gulp-less');
    minifycss = require("gulp-minify-css");
    // concat = require("gulp-concat");
    // uglify = require("gulp-uglify");
    // rename = require('gulp-rename'),

 
//����һ��testLess�����Զ����������ƣ�
gulp.task('testLess', function () {
    gulp.src('./Public/less/index.less') //��������Ե��ļ�
        .pipe(less()) //��������õ�ģ�� 
        // .pipe(gulp.dest('./Public/css'))
        // .pipe(minifycss())
        .pipe(gulp.dest('./Public/css')); //������src/css������index.css
});
gulp.watch('./Public/less/*.less' ,["testLess"]);
gulp.task('default',['testLess']); //����Ĭ������ elseTaskΪ�������񣬸�ʾ��û�ж���elseTask����