<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">

<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/mylist.css">

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
		 <!--  -->
    <a href="__APP__/Admin/adminHome">用户管理</a>
    <a href="__APP__/Product/product">商品管理</a>
    <a href="__APP__/Broadcast/broadcast">轮播管理</a>
    <a href="__APP__/Menu/menu">菜单管理</a>
    <a href="javascript:voie(0)" style="color:#f00">列表管理</a>
    <a href="__APP__/Order/order">订单管理</a>
		</li>
	</ul>
</nav>	
<div class="clearfix"></div>

<div id="wrap-box">
	<div class="left-side">
	 <ul>
	 	<li class="left-side-i">底部列表管理</li>
	 	
	 </ul>
	</div>


<div class="wrapper">


  <div class="cq"> 
	  <span>第一个大标题</span>
	  <input type="text" class="tit" value="<?php echo ($result1[0]['maintitle']); ?>"><div class="btn btn-danger tijiao">确认</div>
	  <br>
	  <span style="display: inline-block;margin-bottom: 10px">phoneid</span><br>
      <?php if(is_array($result1)): $i = 0; $__LIST__ = array_slice($result1,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result1): $mod = ($i % 2 );++$i;?><input type="text" class="a1" value="<?php echo ($result1["phoneid"]); ?>"><br>
	     <input type="hidden" value="<?php echo ($result1["id"]); ?>" class="b1"><?php endforeach; endif; else: echo "" ;endif; ?>

  </div>

    <div class="cq"> 
	  <span>第二个大标题</span>
	  <input type="text" class="tit" value="<?php echo ($result2[5]['maintitle']); ?>"><div class="btn btn-danger tijiao">确认</div>
	  <br>
	  <span style="display: inline-block;margin-bottom: 10px">phoneid</span><br>
      <?php if(is_array($result2)): $i = 0; $__LIST__ = array_slice($result2,5,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result2): $mod = ($i % 2 );++$i;?><input type="text" class="a1" value="<?php echo ($result2["phoneid"]); ?>"><br>
	     <input type="hidden" value="<?php echo ($result2["id"]); ?>" class="b1"><?php endforeach; endif; else: echo "" ;endif; ?>

  </div>

    <div class="cq"> 
	  <span>第三个大标题</span>
	  <input type="text" class="tit" value="<?php echo ($result3[10]['maintitle']); ?>"><div class="btn btn-danger tijiao">确认</div>
	  <br>
	  <span style="display: inline-block;margin-bottom: 10px">phoneid</span><br>
      <?php if(is_array($result3)): $i = 0; $__LIST__ = array_slice($result3,10,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result3): $mod = ($i % 2 );++$i;?><input type="text" class="a1" value="<?php echo ($result3["phoneid"]); ?>"><br>
	     <input type="hidden" value="<?php echo ($result3["id"]); ?>" class="b1"><?php endforeach; endif; else: echo "" ;endif; ?>

  </div>



   <div class="cq"> 
	  <span>第四个大标题</span>
	  <input type="text" class="tit" value="<?php echo ($result4[15]['maintitle']); ?>"><div class="btn btn-danger tijiao">确认</div>
	  <br>
	  <span style="display: inline-block;margin-bottom: 10px">phoneid</span><br>
      <?php if(is_array($result4)): $i = 0; $__LIST__ = array_slice($result4,15,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result4): $mod = ($i % 2 );++$i;?><input type="text" class="a1" value="<?php echo ($result4["phoneid"]); ?>"><br>
	     <input type="hidden" value="<?php echo ($result4["id"]); ?>" class="b1"><?php endforeach; endif; else: echo "" ;endif; ?>

  </div>

    <div class="cq"> 
	  <span>第五个大标题</span>
	  <input type="text" class="tit" value="<?php echo ($result5[20]['maintitle']); ?>">
	  <div class="btn btn-danger tijiao">确认</div>
	  <br>
	  <span style="display: inline-block;margin-bottom: 10px">phoneid</span><br>
      <?php if(is_array($result5)): $i = 0; $__LIST__ = array_slice($result5,20,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result5): $mod = ($i % 2 );++$i;?><input type="text" class="a1" value="<?php echo ($result5["phoneid"]); ?>"><br>
	     <input type="hidden" value="<?php echo ($result5["id"]); ?>" class="b1"><?php endforeach; endif; else: echo "" ;endif; ?>

  </div>





</div>


</div>
<script>
 
 $(".tijiao").click(function(e){

 	  var index  = $(".tijiao").index($(this));
 	  var maintitle =$(".cq").eq(index).find(".tit").val().trim();
      var arr = [];
 	  var len = $(".cq").eq(index).find(".a1").length;

 	  for(var i=0;i<len;i++){
 	  	   var a = $(".cq").eq(index).find(".a1") .eq(i).val().trim();
 	  	   var b= $(".cq").eq(index).find(".b1") .eq(i).val().trim();
 	  	   arr.push({"id":b,"maintitle":maintitle,"phoneid":a});
 	  }

 	  var obj = JSON.stringify(arr);
    console.log(obj)
   	    $.ajax({
   	    	type: "get",
   	    	url: "__APP__/MyList/saveMyListData/",
   	    	data: {"obj":obj},
   	    	// dataType:"json",
   	    	success:function(data){
                alert(data);
   	    	},
   	    	error:function(err){
               alert(err);
   	    	}
   	    })

 })


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