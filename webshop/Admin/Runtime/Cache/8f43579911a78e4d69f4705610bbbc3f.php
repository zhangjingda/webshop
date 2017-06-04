<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/broadcast.css">
<style rel="stylesheet" type="text/css"></style>
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery.easing.min.js"></script>
</head>
<body>
 <header>
   <div class="logo"><img src="<?php echo C('STATIC_RES');?>/images/logo.png"/></div>
   <div class="h_title">烈日后台管理系统</div>
 </header>
 <nav>
<ul>
	<li id="nav_a_box">
		 <!-- href="javascript:voie(0)" style="color:#f00" -->
    <a href="__APP__/Admin/adminHome">用户管理</a>
    <a href="__APP__/Product/product">商品管理</a>
    <a href="javascript:void(0)" style="color:#f00">轮播管理</a>
    <a href="__APP__/Menu/menu">菜单管理</a>
    <a href="__APP__/MyList/mylist">列表管理</a>
    <a href="__APP__/Order/order">订单管理</a>
	</li>
</ul>
</nav>	

<div class="left-side">
 <ul>
 	<li class="left-side-i">轮播设置手机ID获取</li>
 	<li class="left-side-i">首页轮播管理</li>
 	<!-- <li class="left-side-i">手机销售分析</li> -->
 	<!-- <li class="left-side-i">智能设备信息上传</li> -->
 </ul>
</div>
<!-- 中部包围盒 -->

<div id="content-wrap">
<div id="content">
    <div class="basic-mes">
   <h4>商品ID是商品的唯一凭证，轮播图每一张图都要设置ID，该ID可以通过以下两种方式得到</h4>
    <div class="method">第一种方式(和第二种任选一种即可以)</div>
    <div class="id-wrap">
    <span class="f">直接输入手机的商品id</span>
    <input type="text" name="dataid" id="dataid">
    <input type="button" value="搜索" id="serach1">
    </div>

    <div class="method">第二种方式(和第一种任选一种即可以)</div>
     
     <div class="id-wrap">

    <span class="f">输入产品名称</span>
    <input type="text" name="pro_name" id="pro_name"><br><br>
    <span class="f">输入产品颜色</span>
    <input type="text" name="color" id="color"><br><br>
    <span class="f">选择内存大小</span>
     <select name="neicun" id="neicun">
    	<option value="500m">500M</option>
    	<option value="1g">1G</option>
    	<option value="2g">2G</option>
    	<option value="3g">3G</option>
    	<option value="4g">4G</option>
    	<option value="6g">6G</option>
    	<option value="8g">8G</option>
    </select><br><br>
    <span class="f">选择存储大小</span>
    <select name="cunchu" id="cunchu">
    	<option value="8g">8G</option>
    	<option value="16g">16G</option>
    	<option value="32g">32G</option>
    	<option value="64g">64G</option>
    	<option value="128g">128G</option>
    	<option value="256g">256G</option>
    </select><br><br>

    <input type="button" value="搜索" id="serach2"><br><br>

    <h4>可以使用商品的ID(复制粘贴到轮播要使用的商品ID处)&nbsp;:
    <span class="f" id="phoneid"></span></h4>
    <div></div>
    </div>
   

    </div>
    </div>

    <div id="content2" style="display: none">
       
       <div class="addpic">添加图片</div>

       <div class="addpicmes">
	        
	        <span>上传图片(图片要单独上传)</span><input type="file" id="file">
	        <span class="proupload">上传图片</span><br><br>
	        <form id="myform">
	            <span id="proid">产品ID</span><input type="text" class="phoneid" name="phoneid">
	            <input type="hidden" id="hid" name="myimg">
	        </form><br><br>
	        <input type="submit" value="提交设置" class="sub">
       </div>
       <h3>已经添加的图片</h3>

      <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?><div class="imgbox"><input type="hidden" value="<?php echo ($result["phoneid"]); ?>">
          <img src="__PUBLIC__/broadcast/<?php echo ($result["img"]); ?>"><br><span class="delmyimg">删除图片</span>
       </div><?php endforeach; endif; else: echo "" ;endif; ?>



    </div>
</div>



<!-- 中部包围盒结束 -->
<div style="height: 0px;clear: both;"></div>
<footer>
	欢迎访问烈日电子商务网站<br/>
	<a href="">联系我们</a><a href="">改善建议</a><br/>
	Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>

<script  type="text/javascript" charset="utf-8" >

$(".sub").click(function(e) {
	 var ss1 = $("#hid").val();
	 var dd = $('.phoneid').val();
	 $.get("__APP__/Broadcast/postData",$("#myform").serialize(),function(data){
         alert(data);
         if(data.trim() == "success"){
         $(".phoneid").val("");
         $(".addpicmes").css("display","none");
         var ss= '<div class="imgbox"><input type="hidden" value='+dd+'>'+
          '<img src="__PUBLIC__/broadcast/'+ss1+'"><br><span class="delmyimg">删除图片</span>'+
       '</div>';

         $("#content2").append(ss);

         }
        

	 })
});

$("#content2").delegate(".delmyimg" , "click" , function(e){

	   if(!confirm("确认删除吗?"))return;
       var ff = $(e.target).parent().find("input").val() 
       var ss = $(e.target).parent().parent();
	   var index  = $('.delmyimg').index($(e.target));
	   var that  = this;
	   var obj ={
	   	  index: index,
	   	  ss: ss,
	   }

       $.get("__APP__/Broadcast/imgDel",{phoneid: ff},function(data){

        if(data==1 || data=="1")
		   this.ss.find(".imgbox").eq(this.index).remove();
		else{
           alert("出错了");
		}

       }.bind(obj))
})

$(".proupload").click(function(e){

    if($("#file").val().trim()!=""){
	   var formData = new FormData(); 	
	   formData.append('file', $('#file')[0].files[0]);
	   $.ajax({
	      url: '__APP__/Broadcast/imgUpload',
	      type: 'POST',
	      cache: false,
	      data: formData,
	      processData: false,
	      contentType: false
	    }).done(function(res) {
	    	$("#file").val("");
            var ss= res.lastIndexOf("/");
            ss = res.substr(ss+1);
            $("#hid").val(ss);
	    }).fail(function(res) {});


    }else{
    	alert("请先选择文件");
    }
})


$(".addpic").click(function(e){
   if($(".addpicmes").css("display").trim()=="none"){
       $(".addpicmes").css("display","block");
   }else{
       $(".addpicmes").css("display","none");
   }
})


function getEle(id){
  return document.getElementById(id);
}

$("#serach1").click(function(event) {

 	 var node  = getEle('dataid');
	 if(node.value ==""){
	 	alert("ID不能为空");
	 	return;
	 }
     $.post("__APP__/Broadcast/getDataId1",{dataid : node.value},function(data){
         $("#phoneid").html(data);
         $("#dataid").val("");
     });

 }); 


$("#serach2").click(function(event) {

 	 if(getEle("pro_name").value==""){
 	 	alert("产品名称不能为空");
	 	return;
 	 }else if(getEle("color").value==""){
        alert("颜色不能为空");
	 	return;
 	 }
     $.post("__APP__/Broadcast/getDataId2",{
     	proname: getEle("pro_name").value.trim(),
     	color: getEle("color").value.trim(),
     	neicun: getEle("neicun").value.trim(),
     	cunchu: getEle("cunchu").value.trim(),
   
      },function(data){
      	for(var i in  data){
           $("#phoneid").html(data[i].phoneid);
      	} 
        $("#dataid").val("");
     },'json'); 

 }); 


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
		}else if(e.target == $(".left-side ul").children(":eq(0)")[0]){
            $("#content").css("display","block");
            $("#content2").css("display","none");
        }
    }
})
</script>
   
</body>
</html>