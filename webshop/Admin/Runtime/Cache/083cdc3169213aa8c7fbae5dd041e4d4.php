<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">

<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/list.css">

<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
<!-- <script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/vue.min.js"></script> -->
</head>
<body >

 <header>
   <div class="logo"><img src="<?php echo C('STATIC_RES');?>/images/logo.png"/></div>
   <div class="h_title">烈日后台管理系统</div>
 </header>

<nav>
	<ul>
		<li id="nav_a_box">
			<a href="#"  style="color:#f00">用户管理</a>
			<a href="__APP__/Product/product">商品上传</a>
			<a href="__APP__/Broadcast/broadcast">轮播管理</a>
			<a href="__APP__/Menu/menu">菜单管理</a>
			<a href="#">测试5</a>
			<a href="#">测试6</a>
			<a href="#">测试7</a>
			<a href="#">测试8</a>
		</li>
	</ul>
</nav>	
<div class="clearfix"></div>

<div id="wrap-box">
	<div class="left-side">
	 <ul>
	 	<li class="left-side-i">轮播左侧树状菜单</li>
	 	<li class="left-side-i">管理员账号管理</li>
	 </ul>
	</div>




<script>
 

</script>


<div style="width:1px;height: 400px;clear: both;"></div>
<footer>
	欢迎访问烈日电子商务网站<br/>
	<a href="">联系我们</a><a href="">改善建议</a><br/>
	Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>

<script>
//处理左侧列表导航的代码
$(".left-side ul").click(function(e){
	if(e.target.nodeName == "LI"){
		 $(this).find("li").css({
		 	'borderLeft' : "3px solid #ccc",
			'backgroundColor': "#fff"
		 })
		 $(e.target).css({
		 	'borderLeft' : "3px solid #f00",
			'backgroundColor': "#ccc"
		 })

		if(e.target == $(".left-side ul").children(":eq(1)")[0]){
			$("#content").css("display","none");
            $("#content2").css("display","block");
            $("footer").css("marginTop","400px");
		}else if(e.target == $(".left-side ul").children(":eq(0)")[0]){
            $("#content").css("display","block");
            $("#content2").css("display","none");
            $("footer").css("marginTop","80px");
        }
    }
})
</script>
</body>
</html>