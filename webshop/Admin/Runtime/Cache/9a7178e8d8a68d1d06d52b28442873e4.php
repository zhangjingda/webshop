<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/adminHome.css">
<style>
.setBtn1 { 
  width: 70px; color: #fff; 
  margin-left: 40px; 
  padding: 5px 10px; 
  font-size: 12px; 
  background-color: #f00; 
  cursor: pointer 
} 
.setBtn2 { 
  width:70px;
  color:#fff;
  margin-left:40px;
  padding:5px 10px;
  font-size: 12px;
  background-color:#00f;
  cursor:pointer 
} 
.frozenBtn{ 
   background-color: rgba(255,0,0,0.7);
   color: #f00; 
 } 
   
</style>
<!-- 分页相关 -->
<style type="text/css">
   #pagebox{
     width: 823px;
     height: 30px;
     margin-left: 100px;
  }
  .page,.page1,.page2{
    height:30px;
    min-width:50px;
    line-height: 30px;
    text-align: center;
    border:none;
    outline: none;
    margin-left:5px;
    border-radius: 5px;
    transition: all .5s;
  }
  #content2 .page2{
     min-width: 20px;
     padding: 0;
     margin:0;

  }
  .page:hover,.page1:hover{
    background-color: #f00;
    color:#fff;
    cursor: pointer;
  }

 .page:disabled{
  background-color: #f00;
  color:#fff;
  cursor: auto;
 }
 .page1:disabled{
  background-color: #ccc;
  opacity: 0.3;
  color:#000;
  cursor: auto;
 }
 .myPage{
    margin:40px auto;
 }
</style>

<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
</head>
<body >


 <!-- 头部相关内容 -->
 <header>
   <img src="<?php echo C('STATIC_RES');?>/images/logo.png"/>
   <h1>烈日后台管理系统</h1>
 </header>



 <nav>
<ul>
	<li id="nav_a_box">
    <!-- href="javascript:voie(0)" style="color:#f00" -->
		<a href="javascript:voie(0)" style="color:#f00" >用户管理</a>
		<a href="__APP__/Product/product">商品管理</a>
		<a href="__APP__/Broadcast/broadcast">轮播管理</a>
		<a href="__APP__/Menu/menu">菜单管理</a>
		<a href="__APP__/MyList/mylist">列表管理</a>
		<a href="__APP__/Order/order">订单管理</a>
	</li>
</ul>
</nav>	

<div class="left-side">
 <ul>
 	<li class="left-side-i">用户账号管理</li>
 	<li class="left-side-i">管理员账号管理</li>
 </ul>
</div>

 <!-- 头部相关内容结束 -->

 <div id="content">
 
    <div class="search-wrapper">
     <input type="button" name="sear_btn" id="sear_btn" value="搜索">
     <input type="text" name="sear" id="search" placeholder="请输入用户关键字"  v-model="searchVal">  
    </div>

   <div class="title-wrapper">
      <span>id</span>
      <span>用户名</span>
      <span>电话号码</span>
      <span>冻结状态</span>
      <span>注册时间</span>
      <span>是否冻结</span>

   </div>


   <!-- vue的根节点 -->
   <div id="vue_app_root_node">
	   
      <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="content-wrapper" >
  	       <span class="setid"><?php echo ($item["id"]); ?></span>
  	       <span class="setusername"><?php echo ($item["username"]); ?></span>
  	       <span class="setphone"><?php echo ($item["phone"]); ?></span>
  	       <span class="tip"><?php echo ($item["frozen"]); ?></span>
  	       <span><?php echo ($item["time"]); ?></span>

           <?php if($item["frozen"] == 1 ): ?><button disabled style="color:#f00;background-color: #fff" class='hasFrozen'>已冻结</button>
           <button class='cancelFrozen'>取消冻结</button>
              <?php else: ?><button class='frozen'>冻结</button><?php endif; ?>
  	     </div><?php endforeach; endif; else: echo "" ;endif; ?>
 
   </div>


   
   <div class="myPage"><?php echo ($pagestr); ?></div>
   <!-- vue的根节点结束 -->

<div style="height: 30px"></div>


 </div>

 <div id="content2">
   <div class="tit">请先输入用户名和验证码</div>
   <form action="__APP__/Admin/handlePwdChange" method="post" id="form" name="form" autocomplete="off">
      <span class="user">用户名</span><input type="text" name="username" id="username">
   &nbsp;<span style="color:#f00" class="userTip"></span><br>
   <span class="pwd">密码</span><input type="password" name="pass" id="pass">
   &nbsp;<span style="color:#f00" class="pwdTIp"></span><br/>
   <input type="submit" class="btn btn-primary" value="下一步">
   </form>
    
 </div>


<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/vue.min.js"></script>
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/vue-resource.min.js"></script>
<script>
var page = "<?php echo ($page); ?>";
(function bindEvent(){

  var len = document.querySelectorAll(".page").length;
  for(var i=0;i<len;i++){
    (function(i){
            document.querySelectorAll(".page")[i].onclick = function(e){
                var searchval = $("#search").val().trim() || "";
                var text = parseInt(e.target.textContent.trim());
                var ss = location.href.lastIndexOf("\\");
                ss = window.location.href.substr(ss);
                window.location.href = "__APP__/Admin/adminHome/page/"+text+"/searchval/"+searchval;
            }
    })(i)
  }

    var len = document.querySelectorAll(".page1").length;
    for(var i=0;i<len;i++){
    (function(i){
            document.querySelectorAll(".page1")[i].onclick = function(e){
                var searchval = $("#search").val().trim()||"";
                var ss = page;
                if(ss=="")ss="1";
                ss = parseInt(ss.trim());
                if(i==0){
                    window.location.href = "__APP__/Admin/adminHome/page/"+(--ss)+
                    "/searchval/"+searchval;     
                }else if(i==1){
                    window.location.href = "__APP__/Admin/adminHome/page/"+(++ss)+
                    "/searchval/"+searchval;
                } 
            }
    })(i)
  }

   
   function frozenUser(){
       var searchval = $("#search").val().trim()||"";
       $("#vue_app_root_node").delegate(".frozen","click",function(e){
           var index  = $("#vue_app_root_node .frozen").index($(this));
           var id = $(this).parent().find(".setid").text().trim();
           var that = this;
           $.get("__APP__/Admin/frozenUser",{'id':id,'searchval':searchval},function(data){
              if(data=="success"){
                 alert(data);
                 var temp = $(that).parent().find(".tip");
                 if(temp.text().trim()=="0"){
                     temp.text("1"); 
                 }else{
                     temp.text("0"); 
                 }
                 $("#vue_app_root_node .frozen").eq(index).replaceWith(
                  "<button disabled style='color:#f00;background-color: #fff' "+
                  "class='hasFrozen'>已冻结</button>"+
                  "<button class='cancelFrozen'>取消冻结</button>");
              }
                

           })
       })
   }
   frozenUser()

   function cancelFrozenUser(){
       var searchval = $("#search").val().trim()||"";
       $("#vue_app_root_node").delegate(".cancelFrozen","click",function(e){  
          var index  = $("#vue_app_root_node .cancelFrozen").index($(this));
          var id = $(this).parent().find(".setid").text().trim();
          var that = this;
          $.get("__APP__/Admin/frozenUser",{'id':id,'searchval':searchval},function(data){
                if(data=="success"){
                     alert(data);
                     var temp = $(that).parent().find(".tip");
                     if(temp.text().trim()=="0"){
                         temp.text("1"); 
                     }else{
                         temp.text("0"); 
                     }
                    $(that).remove();
                    $("#vue_app_root_node .hasFrozen").eq(index).replaceWith(
                     "<button class='frozen'>冻结</button>");
                 }
                

           })


       })
   }
   cancelFrozenUser()

   

})()



$(function(){

    if(sessionStorage["searchval"])
      $("#search").val(sessionStorage["searchval"]);

    $("#sear_btn").click(function(e){
      sessionStorage["searchval"] = $("#search").val().trim();
      if($(".page")[0])
         $(".page").eq(0).trigger('click');
      else {
        window.location.href="__APP__/Admin/adminHome/page/1/searchval/"+sessionStorage["searchval"];
      }
    })


})
</script>
<script>



 



//管理员账号修改用户名和密码验证代码
$("#username").blur(function(){
	$(".userTip").html("");
	if($(this).val() ==""){
       $(".userTip").html("不能为空");
	}else if(!/[\d\w]{6,16}/.test($(this).val())){
       $(".userTip").html("用户名错误");
	}
})

$("#pass").blur(function(){
	$(".pwdTIp").html("");
	if($(this).val() ==""){
       $(".pwdTIp").html("不能为空");
	}else if(!/[\d\w]{6,16}/.test($(this).val())){
       $(".pwdTIp").html("密码错误");
	}
})
$("#form").submit(function(e) {
	if($("#username").val()==""){
		 alert("用户名不能为空");
		 $(".userTip").html("不能为空");
		 return false;
	}else if(!/[\d\w]{6,16}/.test($("#username").val())){
		 alert("用户名格式错误");
		 $(".userTip").html("用户名错误");
		 return false;
	}else if($("#pass").val()==""){
        alert("密码不能为空");
		 $(".pwdTip").html("不能为空");
		 return false;
	}else if(!/[\d\w]{6,16}/.test($("#pass").val())){
         alert("密码格式错误");
		 $(".pwdTip").html("密码错误");
		 return false;
	}
	return true;
});


//排序选择替换上下图标的js代码
$(".c_bt:not(:first)").filter(":not(:last)").click(function(e){
   $(".c_bt:not(:first)").css({
   	     backgroundColor: "#eee",
   	     color: '#000'
   });
   var index = $(".c_bt:not(:first)").filter(":not(:last)").index($(this));
   if($(".ch1")[index].className === "glyphicon glyphicon-arrow-down ch1")
       $(".ch1")[index].className = "glyphicon glyphicon-arrow-up ch1";
	else{
       $(".ch1")[index].className = "glyphicon glyphicon-arrow-down ch1";
	}
   $(this).css({
   	    backgroundColor: "rgba(255,0,0,0.4)",
   	    color: '#fff'
   }) 
})

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

//处理导航菜单点击变红色的代码
$("#nav_a_box a").click(function(e){
	// e.preventDefault();
	$("#nav_a_box a").css('color', "#000");
	$(this).css({
		'color':"#f00",
		'textDecoration': "none"
	});
})



</script>

</body>
</html>