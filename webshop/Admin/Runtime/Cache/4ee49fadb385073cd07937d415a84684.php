<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">

<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/menu.css">
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/vue.min.js"></script>
</head>
<body >

 <header>
   <div class="logo"><img src="<?php echo C('STATIC_RES');?>/images/logo.png"/></div>
   <div class="h_title">烈日后台管理系统</div>
 </header>

<nav>
	<ul>
		<li id="nav_a_box">
		
    <a href="__APP__/Admin/adminHome">用户管理</a>
    <a href="__APP__/Product/product">商品管理</a>
    <a href="__APP__/Broadcast/broadcast">轮播管理</a>
    <a href="javascript:voie(0)" style="color:#f00">菜单管理</a>
    <a href="__APP__/MyList/mylist">列表管理</a>
    <a href="__APP__/Order/order">订单管理</a>
		</li>
	</ul>
</nav>	
<div class="clearfix"></div>

<div id="wrap-box">
	<div class="left-side">
	 <ul>
	 	<li class="left-side-i">轮播左侧树状菜单</li>
	 </ul>
	</div>



    <div class="content">

       <h3>主菜单(最多九个主标题)</h3>
       
       <div class="cq">

       <span class="maintitle"><strong>第一个主标题</strong></span>
       <input type="text" value='<?php echo ($result[0]['maintitle']); ?>' class="mainvalue">
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       
       <div class="subtitle">
           <?php if(is_array($result)): $i = 0; $__LIST__ = array_slice($result,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
		       <input type="text" value="<?php echo ($result["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
		       <input type="text" value="<?php echo ($result["phoneid"]); ?>" class="myphoneid"><br><br>
		       <input type="hidden" class="hidvalue" value="<?php echo ($result["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
	   </div>
       

       </div>

       

       <div class="cq">

       <span class="maintitle"><strong>第二个主标题</strong></span>
       <input type="text" value='<?php echo ($result1[10]['maintitle']); ?>' class="mainvalue">
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       <div class="subtitle">
        <?php if(is_array($result1)): $i = 0; $__LIST__ = array_slice($result1,7,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result1): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
	      <input type="text" value="<?php echo ($result1["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
	       <input type="text" value="<?php echo ($result1["phoneid"]); ?>" class="myphoneid"><br><br>
	       <input type="hidden" class="hidvalue" value="<?php echo ($result1["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

       </div>


     <div class="cq">

       <span class="maintitle"><strong>第三个主标题</strong></span>
       <input type="text" value='<?php echo ($result2[19]['maintitle']); ?>' class="mainvalue">
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       <div class="subtitle">
        <?php if(is_array($result2)): $i = 0; $__LIST__ = array_slice($result2,14,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result2): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
	   <input type="text" value="<?php echo ($result2["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
	       <input type="text" value="<?php echo ($result2["phoneid"]); ?>" class="myphoneid"><br><br>
	       <input type="hidden" class="hidvalue" value="<?php echo ($result2["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

       </div>



        <div class="cq">

       <span class="maintitle"><strong>第四个主标题</strong></span>
       <input type="text" value='<?php echo ($result3[26]['maintitle']); ?>' class="mainvalue">
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       <div class="subtitle">
        <?php if(is_array($result3)): $i = 0; $__LIST__ = array_slice($result3,21,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result3): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
	      <input type="text" value="<?php echo ($result3["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
	       <input type="text" value="<?php echo ($result3["phoneid"]); ?>" class="myphoneid"><br><br>
	       <input type="hidden" class="hidvalue" value="<?php echo ($result3["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

       </div>



         <div class="cq">

       <span class="maintitle"><strong>第五个主标题</strong></span>
       <input type="text" value='<?php echo ($result4[33]['maintitle']); ?>' class="mainvalue">
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       <div class="subtitle">
        <?php if(is_array($result4)): $i = 0; $__LIST__ = array_slice($result4,28,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result4): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
	      <input type="text" value="<?php echo ($result4["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
	       <input type="text" value="<?php echo ($result4["phoneid"]); ?>" class="myphoneid"><br><br>
	       <input type="hidden" class="hidvalue" value="<?php echo ($result4["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

       </div>


         <div class="cq">

       <span class="maintitle"><strong>第六个主标题</strong></span>
       <input type="text" value='<?php echo ($result5[40]['maintitle']); ?>' class="mainvalue">
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       <div class="subtitle">
        <?php if(is_array($result5)): $i = 0; $__LIST__ = array_slice($result5,35,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result5): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
	      <input type="text" value="<?php echo ($result5["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
	       <input type="text" value="<?php echo ($result5["phoneid"]); ?>" class="myphoneid"><br><br>
	       <input type="hidden" class="hidvalue" value="<?php echo ($result5["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

       </div>



           <div class="cq">

       <span class="maintitle"><strong>第七个主标题</strong></span>
       <input type="text" value='<?php echo ($result6[46]['maintitle']); ?>' class="mainvalue">
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       <div class="subtitle">
        <?php if(is_array($result6)): $i = 0; $__LIST__ = array_slice($result6,42,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result6): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
	       <input type="text" value="<?php echo ($result6["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
	       <input type="text" value="<?php echo ($result6["phoneid"]); ?>" class="myphoneid"><br><br>
	       <input type="hidden" class="hidvalue" value="<?php echo ($result6["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

       </div>




             <div class="cq">

       <span class="maintitle"><strong>第八个主标题</strong></span>
       <input type="text" value='<?php echo ($result7[56]['maintitle']); ?>' class="mainvalue">
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       <div class="subtitle">
        <?php if(is_array($result7)): $i = 0; $__LIST__ = array_slice($result7,48,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result7): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
	    <input type="text" value="<?php echo ($result7["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
	       <input type="text" value="<?php echo ($result7["phoneid"]); ?>" class="myphoneid"><br><br>
	       <input type="hidden" class="hidvalue" value="<?php echo ($result7["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

       </div>


       <div class="cq">

       <span class="maintitle"><strong>第九个主标题</strong></span>
       <input type="text"  class="mainvalue" value='<?php echo ($result8[62]['maintitle']); ?>' >
       <div class="btn btn-danger sub">添加子标题</div>
       <div class="btn btn-danger tijiao">提交</div>
       <br><br>
       <div class="subtitle">
        <?php if(is_array($result8)): $i = 0; $__LIST__ = array_slice($result8,56,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result8): $mod = ($i % 2 );++$i;?><span>第<?php echo ($key+1); ?>个子标题</span>
	       <input type="text" value="<?php echo ($result8["subtitle"]); ?>" class="subvalue"><span>phoneid</span>
	       <input type="text" value="<?php echo ($result8["phoneid"]); ?>" class="myphoneid"><br><br>
	       <input type="hidden" class="hidvalue" value="<?php echo ($result8["id"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>

       </div>






    </div>




</div>

<script>
   $(".tijiao").click(function(e){

   	    var index  = $(".tijiao").index($(this));
   	    var mainvalue = $(".cq").eq(index).find(".mainvalue").val();
   	    var arr = [];
        var len = $(".cq").eq(index).find(".subvalue").size();  
   	    for(var i=0;i<len;i++){
             var a = $(".cq").eq(index).find(".subvalue").eq(i).val().trim();
             var b = $(".cq").eq(index).find(".myphoneid").eq(i).val().trim();
             var c = $(".cq").eq(index).find(".hidvalue").eq(i).val().trim();
             arr.push({"id":c,"maintitle":mainvalue,"subtitle":a,"phoneid":b});
   	    }
        var obj = JSON.stringify(arr);
   	    $.ajax({
   	    	type: "get",
   	    	url: "__APP__/Menu/saveMenuData/",
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




   $(".sub").click(function(e){

   	  var index  = $(".sub").index($(this));

   	  if($(".subtitle").eq(index).css("display")=="none"){
   	     $(".subtitle").eq(index).css("display","block");
   	  }else{
   	  	$(".subtitle").eq(index).css("display","none")
   	  }

   	  
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