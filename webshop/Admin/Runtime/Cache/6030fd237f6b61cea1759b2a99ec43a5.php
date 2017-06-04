<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
        <style type="text/css" media="screen">

            form{
            	width: 400px;
            	margin: 200px auto;
            }
        	input[type=password]{
        		height: 30px;
        		padding-left: 5px;
        	}
        </style>
    </head>
    <body>
    
    <form method="post" action="__APP__/Admin/changPwd1" id="form" name="form">

       <input type="hidden" value="<?php echo ($username); ?>" name="username">
       <span>新密码:&nbsp;</span>
       <input type="password" name="password" id="password" placeholder="6-16位数字或者字母">
       &nbsp;<span style="color:#f00" class="pll"></span><br>

       <input type="submit" value="提交" class="btn btn-primary" 
       style="display: inline-block;margin-top: 30px">

    </form>
    <script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
    <script>

    $("#password").blur(function(){
		$(".pll").html("");
		if($(this).val() ==""){
	       $(".pll").html("不能为空");
		}else if(!/[\d\w]{6,16}/.test($(this).val())){
	       $(".pll").html("密码格式错误");
		}
   })


    $("#form").submit(function(e) {

	if($("#password").val()==""){
        alert("密码不能为空");
		 $(".pll").html("不能为空");
		 return false;
	}else if(!/[\d\w]{6,16}/.test($("#password").val())){
         alert("密码格式错误");
		 $(".pll").html("密码格式错误");
		 return false;
	}
	return true;
});

    </script>
    </body>
</html>