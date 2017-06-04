<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>烈日电子商务有限公司</title>
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/css/common.min.css">
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/index.css">
<link rel="stylesheet" href="__PUBLIC__/css/proCategory.css">
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>

<script>
var query = window.location.search;;
if(query.indexOf("size")!=-1 ||
  query.indexOf("neicun")!=-1 || 
  query.indexOf("cunchu")!=-1 || 
  query.indexOf("color")!=-1 ||
  query.indexOf("price")!=-1 ||
  query.indexOf("dianchi")!=-1){
     
}else{
   window.sessionStorage.clear();
}

</script>
<!-- <script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery.easing.min.js"></script> -->

</head>
<body>

<!-- 这是首部共用部分的开始部分 -->
 <!-- 这是网页的头部主要包括两个部分，分别是顶端导航栏和下方的搜索栏 -->

 <!-- 头部导航栏相关内容 -->
<header>
   <div class="navSection">
      <div>
          <ul class="nav_lef">
              <li><a href="__APP__/Index/index">首页</a><span>|</span></li>
              <?php  if(session("username")){ echo '<li>
                    <a href="__APP__/Form/handleLogin" style="padding: 0" id="abc">欢迎'.session("username").'</a>|</li>'; } else{ echo '<li><a href="__APP__/Form/handleLogin" style="padding: 0" id="abc">立即登录</a>|</li>'; } ?>

              
              <li><a href="__APP__/Form/handleEnroll" style="padding: 0">立即注册</a></li>
          </ul>
           <ul class="nav_rig">
           <li><a href="">商品导航</a><span></span></li>
              <li><a href="__APP__/ShopCart/shopcart/?key=4">我的足迹</a><span>|</span></li>
              <li><a href="__APP__/ShopCart/shopcart/?key=3">我的收藏</a>|</li>
              <li><a href="__APP__/ShopCart/shopcart/?key=2">已购商品</a>|</li>
              <li><a href="__APP__/ShopCart/shopcart/?key=1">购物车</a>|</li>
          </ul>

      </div>
   </div>
</header>
<!-- 搜索相关内容 -->
<div class="sear">
       <div class="logo">

          <a href="__APP__/Index/index"><img src="<?php echo C('STATIC_RES');?>/images/logo.png"></a>

       </div>
  <div class="search">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="search">
                    <span class="input-group-btn">
              <button class="btn btn-default" type="button" id="searchbtn">
              <span class="glyphicon glyphicon-search" style="padding: 0 20px;">
              </span></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

$("#searchbtn").click(function(e){
    if($("#search").val().trim()!=""){
         var ss = $("#search").val().trim();
         location.href="/webshop/index.php/Search/search/?key="+ss;
    }
})



</script>
<div class="product_link">
<a href="/webshop/index.php/Index/showProduct/?phoneid=5g5fdg25a4">苹果7</a>
<a href="/webshop/index.php/Index/showProduct/?phoneid=5443g5gg55">华为p10</a>
<a href="/webshop/index.php/Index/showProduct/?phoneid=ags5g21441">荣耀8</a>
<a href="/webshop/index.php/Index/showProduct/phoneid/1g32f4aa35">小米6</a>
</div>

</div>
<!-- 导航相关内容 -->
<nav>
   <div>
      <ul>

        <li><a href="__APP__/Index/proCategory/?brand=苹果">苹果</a></li>
        <li><a href="__APP__/Index/proCategory/?brand=华为">华为</a></li>
        <li><a href="__APP__/Index/proCategory/?brand=OPPO">OPPO</a></li>
        <li><a href="__APP__/Index/proCategory/?brand=VIVO">VIVO</a></li>
        <li><a href="__APP__/Index/proCategory/?brand=三星">三星</a></li>
        <li><a href="__APP__/Index/proCategory/?brand=小米">小米</a></li>
        <li><a href="__APP__/Index/proCategory/?brand=魅族">魅族</a></li>
        <li><a href="__APP__/Index/proCategory/?brand=乐视">乐视</a></li>
        <li><a href="__APP__/Index/proCategory/?brand=努比亚">努比亚</a></li>

      </ul>
   </div>
</nav>

<!-- 这是首部共用部分的结束部分 -->


<div class="nowlocation">
  <span>当前位置-&gt;</span>
  <span><strong><?php echo ($brand); ?></strong>
  </span>&nbsp;&nbsp;&gt;&nbsp;&nbsp;
  <div class="choice-box" style="display: inline">
    <span class="item" id="item-1"><span class="close">X</span></span>
    <span class="item" id="item-2"><span class="close">X</span></span>
    <span class="item" id="item-3"><span class="close">X</span></span>
    <span class="item" id="item-4"><span class="close">X</span></span>
    <span class="item" id="item-5"><span class="close">X</span></span>
    <span class="item" id="item-6"><span class="close">X</span></span>
  </div>
</div>


<div class="prolist">

   
   <div class="prolist_box">
       <div class="prolist_box_l">尺寸</div>
       <div class="prolist_box_r">
	       <ul>
	         <li><a href="">5英寸以下</a></li>
	         <li><a href="">5-5.2英寸</a></li>
           <li><a href="">5.3-5.4英寸</a></li>
	         <li><a href="">5.5-5.9英寸</a></li>
	         <li><a href="">6.0英寸以上</a></li>
	       </ul>
       </div>
   </div>

    <div class="prolist_box">
       <div class="prolist_box_l">内存</div>
       <div class="prolist_box_r">
	       <ul>
	         <li><a href="">1G</a></li>
	         <li><a href="">2G</a></li>
	         <li><a href="">3G</a></li>
	         <li><a href="">4G</a></li>
	         <li><a href="">6G</a></li>
	         <li><a href="">8G</a></li>
	       </ul>
       </div>
   </div>

       <div class="prolist_box">
       <div class="prolist_box_l">存储</div>
       <div class="prolist_box_r">
	       <ul>
	         <li><a href="">8G</a></li>
	         <li><a href="">16G</a></li>
	         <li><a href="">32G</a></li>
	         <li><a href="">64G</a></li>
	         <li><a href="">128G</a></li>
	         <li><a href="">256G</a></li>
	       </ul>
       </div>
   </div>

       <div class="prolist_box">
       <div class="prolist_box_l">颜色</div>
       <div class="prolist_box_r">
	       <ul>
             <?php if(is_array($color)): $i = 0; $__LIST__ = $color;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$color): $mod = ($i % 2 );++$i;?><li><a href=""><?php echo ($color["color"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	       </ul>
       </div>
   </div>

        <div class="prolist_box">
       <div class="prolist_box_l">电池(mAh)</div>
       <div class="prolist_box_r">
         <ul>
           <li><a href="">2000-2999</a></li>
           <li><a href="">3000-3999</a></li>
           <li><a href="">>4000</a></li>
         </ul>
       </div>
   </div>

       <div class="prolist_box">
       <div class="prolist_box_l">价格(元)</div>
       <div class="prolist_box_r">
	       <ul>
	         <li><a href="">&lt;1000</a></li>
	         <li><a href="">1000-1999</a></li>
	         <li><a href="">2000-2999</a></li>
	         <li><a href="">3000-3999</a></li>
	         <li><a href="">&gt;4000</a></li>
	       </ul>
       </div>
   </div>

</div>


<script>
  

  $(".choice-box span").hide();
  $(".prolist_box_r a").click(function(e){e.preventDefault();})
  $(".prolist_box_r").click(function(e){
      var index  = $(".prolist_box_r").index($(this));
      if(e.target.nodeName=="A"){
          var temp = $(".choice-box span").not('.close').eq(index);
          var htm = "<span class='close' style='display:none'>X</span>";
          if(index==1){
             temp.show().html("内存:"+$(e.target).text().trim()+htm);
             reqUrl();
          }else if(index==2){
             temp.show().html("存储:"+$(e.target).text().trim()+htm);
             reqUrl();
          }else if(index==4){
             temp.show().html("电池容量:"+$(e.target).text().trim()+htm);
             reqUrl();
          }else if(index==5){
            temp.show().html("价格:"+$(e.target).text().trim()+htm);
            reqUrl();
          }else{
            temp.show().html($(e.target).text().trim()+htm);
            reqUrl();
          }   
      }
  })

  $(".choice-box .item").hover(function(e){
      var index  = $(".choice-box .item").index($(this));
      $(".close").eq(index).show();
  },function(e){
      var index  = $(".choice-box .item").index($(this));
      $(".close").eq(index).hide();
  })


 $(".choice-box .item").click(function(e){
       var index  = $(".choice-box .item").index($(this));
       if($(e.target).hasClass("close")){
           $(".choice-box .item").eq(index).hide();
           reqUrl();
       }
       
 })
 


function getReqData(){

    var size="";
    var neicun="";
    var cunchu="";
    var color="";
    var dianchi="";
    var price="";


    var temp = $(".choice-box #item-1");
    if(temp.css("display").trim()!="none"){
        var temp1 = temp.text().trim();
        temp1= temp1.substr(0,temp1.length-1);
        if(temp1=="5英寸以下"){
            size="5";
        }else if(temp1=="5-5.2英寸"){
           size="5_5.2";
        }else if(temp1=="5.3-5.4英寸"){
           size = "5.3_5.4";
        }else if(temp1=="5.5-5.9英寸"){
           size = "5.5_5.9";
        }else if(temp1=="6.0英寸以上"){
           size = "6";
        }
    }

    temp = $(".choice-box #item-2");
    if(temp.css("display").trim()!="none"){
         var temp1 = temp.text().trim();
         temp1= temp1.substr(0,temp1.length-1);
         if(temp1=="内存:1G"){
            neicun = "1g";
         }else if(temp1=="内存:2G"){
            neicun = "2g";
         }else if(temp1=="内存:3G"){
            neicun = "3g";
         }else if(temp1=="内存:4G"){
           neicun = "4g";
         }else if(temp1=="内存:6G"){
            neicun = "6g";
         }else if(temp1=="内存:8G"){
           neicun = "8g";
         }

    }


    temp = $(".choice-box #item-3");
    if(temp.css("display").trim()!="none"){
         var temp1 = temp.text().trim();
         temp1= temp1.substr(0,temp1.length-1);
         if(temp1=="存储:8G"){
            cunchu = "8g";
         }else if(temp1=="存储:16G"){
            cunchu = "16g";
         }else if(temp1=="存储:32G"){
            cunchu = "32g";
         }else if(temp1=="存储:64G"){
            cunchu = "64g";
         }else if(temp1=="存储:128G"){
            cunchu = "128g";
         }else if(temp1=="存储:256G"){
            cunchu = "256g";
         }

    }

    temp = $(".choice-box #item-4");
    if(temp.css("display").trim()!="none"){
         var temp1 = temp.text().trim();
         temp1= temp1.substr(0,temp1.length-1);
         color = temp1;
    }


    temp = $(".choice-box #item-5");
    if(temp.css("display").trim()!="none"){
         var temp1 = temp.text().trim();
         temp1= temp1.substr(0,temp1.length-1);
         if(temp1=="电池容量:2000-2999"){
              dianchi ="2000_2999";
         }else if(temp1=="电池容量:3000-3999"){
            dianchi ="3000_3999";
         }else if(temp1=="电池容量:>4000"){
            dianchi ="4000";
         }

    }

    temp = $(".choice-box #item-6");
    if(temp.css("display").trim()!="none"){
         var temp1 = temp.text().trim();
         temp1= temp1.substr(0,temp1.length-1);
         if(temp1=="价格:<1000"){
            price = "1000"
         }else if(temp1=="价格:1000-1999"){
            price = "1000_1999";
         }else if(temp1=="价格:2000-2999"){
            price = "2000_2999";
         }else if(temp1=="价格:3000-3999"){
            price='3000_3999';
         }else if(temp1=="价格:>4000"){
            price='4000';
         }

    }

  
  return {
    size: size,
    neicun:neicun,
    cunchu:cunchu,
    color:color,
    dianchi:dianchi,
    price:price
  }
  
  
}

function reqUrl(){

     sessionStorage.clear();
    
     var obj = getReqData();
     for(var i in obj){
        if(obj[i]!="")sessionStorage[i] = obj[i];
     }

    location.href = "http://localhost/webshop/index.php/Index/proCategory/"+"?brand=<?php echo ($brand); ?>"
      +"&size="+obj.size+"&neicun="
      +obj.neicun+"&cunchu="+obj.cunchu+"&color="+obj.color
      +"&price="+obj.price+"&dianchi="+obj.dianchi

}

// $(function(){
   
   (function setChoice(){
       var htm = "<span class='close' style='display:none'>X</span>";
       if(sessionStorage.getItem("size")){
           var temp = sessionStorage['size'];
           if(temp==5)
              $(".choice-box #item-1").show().html("5英寸以下"+htm);
           else if(temp=='5_5.2'){
              $(".choice-box #item-1").show().html("5-5.2英寸"+htm);
           }else if(temp=="5.3_5.4"){
              $(".choice-box #item-1").show().html("5.3-5.4英寸"+htm); 
           }else if(temp=="5.5_5.9"){
              $(".choice-box #item-1").show().html("5.5-5.9英寸"+htm);  
           }else{
              $(".choice-box #item-1").show().html("6.0英寸以上"+htm);
           }
       }
       if(sessionStorage.getItem("neicun")){
          var temp = sessionStorage['neicun'];
          var ss = temp.indexOf("g");
          temp = temp.substr(0,ss);
          $(".choice-box #item-2").show().html("内存:"+temp+"G"+htm);
          
       }
       if(sessionStorage.getItem("cunchu")){
          var temp = sessionStorage['cunchu'];
          var ss = temp.indexOf("g");
          temp = temp.substr(0,ss);
          $(".choice-box #item-3").show().html("存储:"+temp+"G"+htm);
         
       } 
       if(sessionStorage.getItem("color")){
          var temp = sessionStorage['color'];
          $(".choice-box #item-4").show().html(temp+""+htm);
       }  

       if(sessionStorage.getItem("dianchi")){
           var temp = sessionStorage['dianchi'];
           if(temp=="2000_2999")
              $(".choice-box #item-5").show().html("电池容量:2000-2999"+htm);
            else if(temp=="3000_3999"){
               $(".choice-box #item-5").show().html("电池容量:3000-3999"+htm);
            }else{
              $(".choice-box #item-5").show().html("电池容量:>4000"+htm);
            }

       }

       if(sessionStorage.getItem("price")){
          var temp = sessionStorage['price'];
          if(temp=="1000")
               $(".choice-box #item-6").show().html("价格:<1000"+htm);
           else if(temp=="1000_1999"){
               $(".choice-box #item-6").show().html("价格:1000-1999"+htm);  
           } else if(temp=="2000_2999"){
               $(".choice-box #item-6").show().html("价格:2000-2999"+htm);
           }else if(temp=="3000_3999"){
               $(".choice-box #item-6").show().html("价格:3000-3999"+htm);
           }else if(temp=="4000"){
               $(".choice-box #item-6").show().html("价格:>4000"+htm);
           }
       }


   })()
// })



</script>


<div class="content_lef">
  <div class="cont_lef">

    <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?><div class="showpro">
          <div class="img_top">
          <a href="http://localhost/webshop/index.php/Index/showProduct/?phoneid=<?php echo ($result["phoneid"]); ?>">
          <img width='180px' height="200px" 
          src='/webshop/Admin/Tpl/Public/upload/<?php echo ($result["imgsrc1"]); ?>'></a>
          </div>
          <div class="price">￥<?php echo ($result["price"]); ?>
          <a href="javascript:void(0)">
           <span class="glyphicon glyphicon-heart heart" 
           style='float:right;margin-right: 10px;margin-top:5px;font-size: 16px;'></span></a>
           </div> 

          <div><?php echo ($result["proname"]); ?>&nbsp;&nbsp;<?php echo ($result["color"]); ?>
          &nbsp;<?php echo ($result["neicun"]); ?>+<?php echo ($result["cunchu"]); ?><br><br></div>
          <div class="title"><?php echo ($result["provtitle"]); ?></div>
           <div class="comment">
           
           </div>
          <div class="buy"><div class="btn btn-danger btn-block btn-xs">加入购物车</div></div>  
          <input type="hidden" value="<?php echo ($result["phoneid"]); ?>" class="phoneidData">
     </div><?php endforeach; endif; else: echo "" ;endif; ?>

   

   <script>

   $(".buy").click(function(e){
       var index = $(".buy").index($(this));
       $.post("__APP__/ShopCart/saveUserShopCart",
        {
          phoneid: $(".phoneidData").eq(index).val()
        },
        function(data){
           alert(data);
       })
   })

   $(".heart").click(function(e){

       var index = $(".heart").index($(this));
       var that = $(this);
       $.get("__APP__/ShopCart/storeProduct",
        {
          phoneid: $(".phoneidData").eq(index).val()
        },
        function(data){
          that.css("color","#f00");
          $(".heart").eq(index).unbind("click");
          alert(data);
       })

   })
    
   



   </script>

   


  </div>



</div>

<div class="content_rig">

     

     <?php if(is_array($recommend)): $i = 0; $__LIST__ = array_slice($recommend,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recommend): $mod = ($i % 2 );++$i;?><div class="rig_item">
        <div class="item">
        <a href="/webshop/index.php/Index/showProduct/phoneid/<?php echo ($recommend["phoneid"]); ?>">
           <img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($recommend["imgsrc1"]); ?>" width="190px" height="170px">
        </a>
       <div></div>
       <span style="margin-left: 30px;"><?php echo ($recommend["proname"]); ?></span>
       <span style="margin-left: 10px;"><?php echo ($recommend["color"]); ?></span>
        </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>


<span id="test"></span>
<footer>
	欢迎访问烈日电子商务网站<br/>
	<a href="">联系我们</a><a href="">改善建议</a><br/>
	Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>

<script>

</script>
</body>
</html>