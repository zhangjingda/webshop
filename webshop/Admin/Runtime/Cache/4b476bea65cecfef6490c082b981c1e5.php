<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/product.css">

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
  #content2 span{
     min-width: 20px;
     padding: 5px 0;
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
    <a href="javascript:voie(0)" style="color:#f00">商品管理</a>
    <a href="__APP__/Broadcast/broadcast">轮播管理</a>
    <a href="__APP__/Menu/menu">菜单管理</a>
    <a href="__APP__/MyList/mylist">列表管理</a>
    <a href="__APP__/Order/order">订单管理</a>
  </li>
</ul>
</nav>  

<div class="left-side">
 <ul>
 	<li class="left-side-i">手机信息上传</li>
 	<li class="left-side-i">手机基本管理</li>
 	
 	<!-- <li class="left-side-i">智能设备信息上传</li> -->
 </ul>
</div>
<!-- 中部包围盒 -->
<div id="content-wrap">


<form method="post" action="__APP__/Product/productMes" autocomplete="off" 
onsubmit="return check()">
<div id="content">
  <div class="input-wrap">
   <span class="star">*</span><span class="f">商品Id(10):</span>
   <input type="text" name="phoneid" id="phoneid" value=<?php echo ($name1); ?> readonly="readonly" >
  </div>   

  <div class="input-wrap">
   <span class="star">*</span><span class="f">商品名:</span>
   <input type="text" name="proname" id="proname">
   <span class="help"></span>
  </div>

  <div class="input-wrap">
   <span class="star">*</span><span class="f">商品大标题:</span>
   <input type="text" name="protitle" id="protitle">
   <span class="help"></span>
  </div>

  <div class="input-wrap">
   <span class="star">*</span><span class="f">商品副标题:</span>
   <input type="text" name="provtitle" id="provtitle">
   <span class="help"></span>
  </div>

  <div class="input-wrap">
   <span class="star">*</span><span class="f">品牌:</span>
    <select id="brand" name="brand">
       <option value="苹果">苹果</option>
       <option value="华为">华为</option>
       <option value="OPPO">OPPO</option>
       <option value="VIVO">VIVO</option>
       <option value="三星">三星</option>
       <option value="小米">小米</option>
       <option value="魅族">魅族</option>
       <option value="乐视">乐视</option>
       <option value="努比亚">努比亚</option>
       <option value="其他">其他</option>
    </select>
   <span class="help"></span>
  </div>


<div class="input-wrap">
   <span class="star">*</span><span class="f">内存:</span>
   <select name="neicun" id="neicun">
   	<option value="500m">500M</option>
   	<option value="1g">1G</option>
   	<option value="2g">2G</option>
   	<option value="3g">3G</option>
   	<option value="4g">4G</option>
   	<option value="6g">6G</option>
   	<option value="8g">8G</option>    
   </select>
   <span class="help"></span>
</div>


  <div class="input-wrap">
   <span class="star">*</span><span class="f"> 存储:</span>
   <select name="cunchu" id="neicun">
   	<option value="8g">8G</option>
   	<option value="16g">16G</option>
   	<option value="32g">32G</option>
   	<option value="64g">64G</option>
   	<option value="128g">128G</option>
   	<option value="256g">256G</option> 
   </select>
   <span class="help"></span>
</div>

 
   <div class="input-wrap">
   <span class="star">*</span><span class="f">颜色:</span>
   <input type="text" name="color" id="color">
   <span class="help"></span>
  </div>

   <div class="input-wrap">
   <span class="star">*</span><span class="f">尺寸:</span>
   <input type="text" name="size" id="size" placeholder="不用写单位">英寸
   <span class="help"></span>
  </div>

   <div class="input-wrap">
   <span class="star">*</span><span class="f">电池:</span>
   <input type="text" name="dianchi" id="dianchi" placeholder="不用写单位">mAh
   <span class="help"></span>
  </div>

  <div class="input-wrap">
   <span class="star">*</span><span class="f">价格:</span>
   <input type="text" name="price" id="price">
   <span class="help"></span>
  </div>

  <div class="input-wrap">
   <span class="star">*</span><span class="f">数量:</span>
   <input type="text" name="number" id="number">
   <span class="help"></span>
  </div>

   <div class="input-wrap">
	   <span class="star">*</span>
     <span class="f">产品特点:</span>
	   <span class="tedian-wrap"></span>
     <input type="hidden" id="tedian" name="tedian">
	   <div id="addTeDian">添加特点 +</div>
	   <span class="help"></span>
  </div>

  <div class="input-wrap" style="min-height: 0;padding: 0;border: 0">
	   <input type="submit" value="上传商品信息">
  </div>

<input type="hidden" name="imgsrc1" id="imgsrc1">
<input type="hidden" name="imgsrc2" id="imgsrc2">
<input type="hidden" name="imgsrc3" id="imgsrc3">
<input type="hidden" name="imgsrc4" id="imgsrc4">
<input type="hidden" name="imgsrc5" id="imgsrc5">
<input type="hidden" name="imgsrc6" id="imgsrc6">

<input type="hidden"  id="filebox" name="filebox">

</form>

 <div class="input-wrap" style="position: relative">
   <span class="star">*</span><span class="f">一般图片(需要单独上传):</span>
   <span class="uploadimg">
   <img src="__PUBLIC__/img/upload.png" width="30px" height="30px" class="load"/></span>
   <span><input type="file" class="fileform" name="file" id="file"></span>
   <span class="help">待上传图片名:&nbsp;<span id="filename"></span></span>
   <input type="button" value="立即上传该图片" id="upload">
   <div style="margin-left: 60px" id="allfiles">上传成功的图片名:</div>
</div>

 <div class="input-wrap" style="position: relative">

   <span class="star">*</span><span class="f">大张图片(需要单独上传):</span>

   <span>

   <input type="file"  name="file1" id="file1"
   style=" display: inline-block; position: absolute;top: 11px; left: 180px;opacity: 1.0;width: 200px;">
   </span>

   <input type="button" value="立即上传该图片" id="upload1">

   <div style="overflow: hidden;width: 800px;" id="allfiles1">上传成功的图片名:</div>

   

</div>

<script>
$("#upload1").click(function(e){

     var arr = $("#filebox").val().split("@");
     if(arr.length-1>=4){
        alert("最大只能上传4张");
        return ;
     }


     var formData = new FormData();
     formData.append('file1', $('#file1')[0].files[0]);
     $.ajax({
      url: '__APP__/Product/fileUpload1',
      type: 'POST',
      cache: false,
      data: formData,
      processData: false,
      contentType: false
    }).done(function(res) {

      alert('文件保存位置'+res);
      var dd = res.lastIndexOf("/");
      var ss = res.substr(dd+1);
      if(ss.trim()!="文件格式不对(*.jpeg , *.gif)"){
        $("#filebox").val($("#filebox").val()+ss+"@");
         var aa = $("#allfiles1").html()+"&nbsp;&nbsp;";
         $("#allfiles1").html(aa+ss);
      }
      $("#file1").val("");

    }).fail(function(res) {
      alert(res)
    });

})
  
</script>

</div>
<div id="content2" style="border: none;">
<h4>这是手机的一些基本信息，可以根据需要查找信息或修改信息</h4>
 <div class="search-wrapper">
     <input type="text" name="sear" id="search"   v-model="searchVal">
     <button type="button" name="sear_btn" id="sear_btn" value="搜索">搜索</button>
</div>
  <!-- <span>id</span><span>phoneid</span><span>proname</span><span>protitle</span><span>provtitle</span> -->
 
   <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?><div class="c2-c">
       <span>id：</span><span class='c2-c-f-1'><?php echo ($result["id"]); ?></span><br>
       <span>产品id：</span><span class='c2-c-f-1'><?php echo ($result["phoneid"]); ?></span><br>
       <span>手机名：</span><span class='c2-c-f'><?php echo ($result["proname"]); ?></span><br>
       <span>大标题：</span><span class='c2-c-f'><?php echo ($result["protitle"]); ?></span><br>
       <span>副标题：</span><span class='c2-c-f'><?php echo ($result["provtitle"]); ?></span><br>
       <span>手机颜色：</span><span class='c2-c-f'><?php echo ($result["color"]); ?></span><br>
       <span>手机内存：</span><span class='c2-c-f'><?php echo ($result["neicun"]); ?></span><br>
       <span>手机存储：</span><span class='c2-c-f'><?php echo ($result["cunchu"]); ?></span><br>
       <span>手机尺寸：</span><span class='c2-c-f'><?php echo ($result["size"]); ?></span><br>
       <span>手机电池：</span><span class='c2-c-f'><?php echo ($result["dianchi"]); ?></span><br>
       <span>手机特点：</span><span class='c2-c-f'><?php echo ($result["tedian"]); ?></span><br>
       <span>手机价格：</span><span class='c2-c-f'><?php echo ($result["price"]); ?></span><br>
       <button class="changbtn">编辑</button><br><br>  
     </div><?php endforeach; endif; else: echo "" ;endif; ?> 

     <script>

     //全局的数据数组，用于存储原始表单数据，当表单修改又取消时使用
     var data = data || [];

     //点击编辑按钮时触发的函数
     $("#content2").delegate(".changbtn","click",function(e){
        var index = $(".changbtn").index($(this));
        var temp = $(".changbtn").eq(index).siblings().filter(".c2-c-f");
        $("<button class='cerbtn' style='margin-left:30px'>提交</button><button class='canbtn'"+
         " style='margin-left:30px'>取消</button>").insertBefore($(".changbtn").eq(index));
        $(".changbtn").eq(index).hide();
        for(var i=0;i<temp.length;i++){
          var text = temp.eq(i).text().trim(); 
          data.push(text);
          temp.eq(i).replaceWith("<input type='text' style='width:500px' value='"+text+"'>")
        } 
     })
     //点击取消按钮时调用的函数
     $("#content2").delegate(".canbtn","click",function(e){
         var index = index = $(".c2-c").index($(this).parent());
         var tt = $('.canbtn').index($(this));
         var temp = $(".c2-c").eq(index).find("input");
         for(var i=0;i<temp.length;i++){
            temp.eq(i).replaceWith("<span class='c2-c-f'>"+data[i]+"</span>");
         }
         $(".canbtn").eq(tt).remove();
         $(".cerbtn").eq(tt).remove();
         $(".changbtn").eq(index).show();
     })

      $("#content2").delegate(".cerbtn","click",function(e){
         var index = $(".c2-c").index($(this).parent());
         var tt = $('.cerbtn').index($(this));
         var temp = $(".c2-c").eq(index).find("input");
         var obj = {};
         var arr = [];
         for(var i=0;i<temp.length;i++){
            var text = temp.eq(i).val().trim();
            temp.eq(i).replaceWith("<span class='c2-c-f'>"+text+"</span>");
            arr.push(text)

         }
         
         

      
         obj.phoneid = $(".c2-c").eq(index).find(".c2-c-f-1").eq(1).text().trim();
         obj.id = $(".c2-c").eq(index).find(".c2-c-f-1").eq(0).text().trim();


         //如果字段有变化，这里需要修改
         obj.proname = arr[0];
         obj.protitle = arr[1];
         obj.provtitle = arr[2];
         obj.color = arr[3];
         obj.neicun = arr[4];
         obj.cunchu = arr[5];
         obj.size = arr[6];
         obj.dianchi = arr[7];
         obj.tedian = arr[8];
         obj.price = arr[9];

         $.get("__APP__/Product/changeProduce/",obj,function(data){
             alert(data);
         })

         $(".canbtn").eq(tt).remove();
         $(".cerbtn").eq(tt).remove();
         $(".changbtn").eq(index).show();
     })




     </script>

  <div class="myPage"><?php echo ($pagestr); ?></div>
</div>
</div>

<div style="height: 200px;clear: both;"></div>
<footer>
	欢迎访问烈日电子商务网站<br/>
	<a href="">联系我们</a><a href="">改善建议</a><br/>
	Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>
<div class="mask"></div>
<script  type="text/javascript" charset="utf-8" >

//表单不空的验证
///////////////////
function getEle(id){
  return document.getElementById(id);
}

var filecheck = window.filecheck || {};
filecheck ={
   allDataName: 
   ['proname','protitle','provtitle','brand','neicun','cunchu','color','size','dianchi','price','number'],
   getEle:function(id){
      return document.getElementById(id);
   },
   isEmpty:function(value){
      return value == "" ? true : false;
   },
   checkEmpty:function(){
      for(var i=0;i<this.allDataName.length;i++){
         if(this.isEmpty(this.getEle(this.allDataName[i]).value)){
             $(".help").eq(i).text("不能为空");
             break;
         }
      }
      return i;
   },
   addEvent:function(){

         var  that = this;
         for(var i=0;i<this.allDataName.length;i++){
              (function(i){
                 $(that.getEle(that.allDataName[i])).blur(function(event) {
                     $(".help").eq(i).text("");
                     if(that.isEmpty(this.value)){    
                        $(".help").eq(i).text("不能为空");
                     }
                 });
              })(i) 
         }

         return i;
        
   }

}
filecheck.addEvent();

function check(){

    $("#tedian").val("");
    var tt = "";
    var len = tedian.tedian.length; 
    tedian.tedian.forEach(function(item,i){
              if(i!=len-1)tt+=item+"@";
              else  tt+=item;
    })
    $("#tedian").val(tt);

    if($("#tedian").val()==""){
        alert("产品特点不能为空");
        return false;
    }

    if($("#allfiles").text().trim()=="上传成功的图片名:"){
       alert("上传的图片不能为空!");
       return false;
    }
    if($("#filebox").val().trim()==""){
       alert("上传的大图片不能为空!");
       return false;
    }
  
    var i = filecheck.checkEmpty();
    if(i == filecheck.allDataName.length){
        return true;
    }else {
      alert("字段都不能为空,包括产品特点，图片在表单提交之前先上传，否则失效");
      return false;
    }
   

   return false;
}

//////////////////////
/////表单不空的验证结束



var file = window.file || file;
file={
  maxfiles: 6,
  nownum: 0,
	getEle:function(id){
        return document.getElementById(id);
	},
	uploadFile:function(){
       
	},
	addEvent:function(){
   var that = this;


$(".fileform").change(function(){
  var index = $(this).val().trim().lastIndexOf("\\");
  $("#filename").text($(this).val().trim().substr(index+1));
})


 $("#upload").click(function(e){
   if(that.nownum < that.maxfiles){
   var formData = new FormData();
   formData.append('file', $('#file')[0].files[0]);
   $.ajax({
      url: '__APP__/Product/fileUpload',
      type: 'POST',
      cache: false,
      data: formData,
      processData: false,
      contentType: false
    }).done(function(res) {

      alert('文件保存位置'+res);
      
      var dd = res.lastIndexOf("/");
      
      if(res.substr(dd+1).trim()!="文件格式不对(*.jpeg , *.gif)"){
          that.nownum =  that.nownum+1;
          getEle('imgsrc'+that.nownum).value =res.substr(dd+1);
      }
      
     
      var ss = $("#filename").text();
      var aa = $("#allfiles").html()+"&nbsp;&nbsp;";
      $("#allfiles").html(aa+ss);
      $("#filename").text("");
      $("#file").val("");

    }).fail(function(res) {});


   }else{
    alert("最多只能上传6张图");
   }
  

})


	}
}

file.addEvent();
file.uploadFile()


var tedian = window.tedian || {};
tedian = {
	allnum: 4,//特点总数
	thisnum: 0,//当前特点序号
	tedian: [],//特点数组，存放特点文字 
	setMask:function(){ //设置遮罩位置
       $(".mask").css({
       	  width: document.body.scrollWidth+"px",
       	  height: document.body.scrollHeight+"px"
       })
	},
	addEvent:function(){
		var self = this;

    //在屏幕上append添加特点的对话框
	  var node = document.createElement("div");
		node.id="tediandiv";
		node.innerHTML = "<div id='tediandiv1'>"+
			      	     "<input type='text' placeholder='请输入产品特点'>"+
			             "<span id='addcertain'>确认</span><span id='addcancel'>取消</span>"+
		  	             "</div>";
		node.style.display = "none";
		document.body.appendChild(node);
		//在屏幕上append添加特点的对话框end

	  var isbind = true; //避免重复绑定的标识字段, 构成了闭包
	  return function(self){

         //特点大于最大数，请删除后再添加
	   	   $("#addTeDian").click(function(e) {

  	      	if(self.thisnum>=self.allnum){
    	    		alert("最多添加5个,请先删除其中的一部分");
    	    		return;
	    	    }
         

          node.style.display = "block";//显示对话框
          $(".mask").css("display","block");//显示遮罩
          self.setMask();//设置遮罩位置

           //一开始为true
          if(isbind){

             	 isbind = false; //下次不再绑定

               $("#addcertain").click(function(e){

    				 	      e.stopPropagation();   
    			      	  node.style.display = "none"; 
                    
                    //判断输入的特点是否为空，为空的话直接退出
    			      	  var tt = $(this).parent().find("input").val().trim();
    			      	  if(tt==""){ 
                       $(".mask").css("display","none");   
                       return;
                    }
                    
                    //判断添加的特点是不是已经存在
    			      	  var ss = self.tedian.some(function(item){return item === tt;});

    			      	  if(!ss){

                      //特点不存在，应用中添加特点
    			      	     self.tedian.push(tt);
    			      	  	 self.add();//屏幕上增加显示特点
    			             self.thisnum  =  self.thisnum+1;//特点数量增加一


    			      	  }else{
                      //特点存在，提示并退出
    			      	  	alert("特点已经重复，请重新输入");	  	
    			      	  } 
                    //重置输入框为空，下次添加特点时不会有上次的特点文字
                    $(this).parent().find("input").val("");
                    $(".mask").css("display","none");//关闭遮罩
	  	          })


      			    $("#addcancel").click(function(e){node.style.display = "none"; 
      			      	  $(".mask").css("display","none");
      			     })

           }
			 
	      })
	   } 
      	
 
	},
	add:function(){
        
        if(this.thisnum<this.allnum){

        	var self = this;

        	var tem = this.tedian[this.tedian.length-1];//取到最后一个特点

          //尾部添加特点
        	$(".tedian-wrap").append("<span>"+tem+"<span class='quxiao'>X</span></span>");
          
        	var len = $(".tedian-wrap").find('.quxiao').length;//计算出一共有多少个取消X按钮
          
          //为最后一个取消按钮添加单击事件
        	$(".tedian-wrap").find('.quxiao').eq(len-1).click(function(e){
                    
                   //获得要取消的特点的文字
        		       var temp = $(this).parent().text().trim();
                   temp = temp.slice(0,temp.length-1);
                   
                   $(this).parent().css("display","none");//单击取消的符号后隐藏该按钮
                   $(this).parent().html("");//消除该特点的所有内容
                   self.thisnum = self.thisnum -1;//特点减少1
                   
                   //重新设置特点数组,使用要取消的特点文字进行对比
                   self.tedian = self.tedian.filter(function(item) {
                   	   return item === temp ? false:true;
                   });
        	})

        }  
	},

}


tedian.addEvent()(tedian);


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
  
 <script type="text/javascript">
 if(window.location.href.indexOf("page")>=0){
    $(".left-side ul li").eq(1).trigger("click");
 }
 </script> 

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
                window.location.href = "__APP__/Product/product/page/"+text+"/searchval/"+searchval;
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
                    window.location.href = "__APP__/Product/product/page/"+(--ss)+
                    "/searchval/"+searchval;     
                }else if(i==1){
                    window.location.href = "__APP__/Product/product/page/"+(++ss)+
                    "/searchval/"+searchval;
                } 
            }
    })(i)
  }

   

})()



$(function(){

    if(sessionStorage["searchval"])
      $("#search").val(sessionStorage["searchval"]);

    $("#sear_btn").click(function(e){
      sessionStorage["searchval"] = $("#search").val().trim();
      if($(".page")[0])
         $(".page").eq(0).trigger('click');
      else {
        window.location.href="__APP__/Product/product/page/1/searchval/"+sessionStorage["searchval"];
      }
    })


})
</script> 
</body>
</html>