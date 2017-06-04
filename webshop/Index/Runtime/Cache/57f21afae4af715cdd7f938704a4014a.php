<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/css/common.min.css">
		<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="__PUBLIC__/css/index.css">
		<link rel= "stylesheet" href="__PUBLIC__/css/money2.css">
		<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>


    </head>

<body>



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

<div class="wrapper">

  <h3>全部清单</h3>
  <span>商品名</span>
  <span>颜色</span>
  <span>内存</span>
  <span>存储</span>
  <span>单价</span>
  <span>数量</span>
  <span>金额</span>
  <br/><br/>
<?php
 for($i=0;$i<count($result);$i++){ ?>

<span style="display: none" class="phoneid"><?php echo $result[$i][0]['phoneid']; ?></span>
<span><?php echo $result[$i][0]['proname']; ?></span>
<span><?php echo $result[$i][0]['color']; ?></span>
<span><?php echo $result[$i][0]['neicun']; ?></span>
<span><?php echo $result[$i][0]['cunchu']; ?></span>
<span class="price"><?php echo $result[$i][0]['price']; ?></span>
<span class="num"><?php echo $num[$i]; ?></span>
<span class="singleprice"></span>
<?php  echo "<br/><br/>" ;} ?>
<span>送货地址</span><span id="addr"><?php echo ($address); ?></span><br><br>
<span>支付方式</span><span class="pay">银联</span><span class="pay">支付宝</span><br><br>
<span>总额 :</span><span id="allprice">1454.00</span><br/><br>
<span>给卖家留言 :</span><br>
<textarea rows='5' cols='50' style="padding:10px;" id="content"></textarea><br><br><br>
<div class="btn btn-danger" id="certain">确认信息并付款</div>
</div>
<script>
$(function(){
  var allprice=0;
  $(".price").each(function(i,item){
      var price = parseFloat($(item).text().trim());
      var num = parseFloat($(".num").eq(i).text().trim());
      var singleprice  = price*num;
      $(".singleprice").eq(i).text(singleprice );
      allprice+=singleprice;
  })

if(allprice.toString().indexOf(".")>=0){
          var hh = allprice.toString().indexOf(".");
          var str = allprice.toString().substr(hh+1);
          if(str.length==1)$("#allprice").html("￥"+allprice+"0");
          else if(str.length==2)$("#allprice").html("￥"+allprice);
          else if(str.length>2){
             var str1 = str.substr(0,2);
             $("#allprice").html("￥"+parseInt(allprice)+"."+str1);
          }
        }
 else $("#allprice").html("￥"+allprice+".00");


})
  $(".pay").click(function(e){
      $(".pay").css({
           borderColor: "#ccc",
           color: "#666"
      });
      $(this).css({
            borderColor: "#f00",
            color: "#f00"
      })
  })

  $("#certain").click(function(e){
      if($(".pay").eq(0).css("borderColor") != "rgb(255, 0, 0)" &&  
            $(".pay").eq(1).css("borderColor") != "rgb(255, 0, 0)"){
               alert("请先选择支付方式");
             return;
      }
      if(!confirm("确认信息并且提交吗？"))return;
      else{

          var ss ="";
          var num = "";
          
          $(".phoneid").each(function(i,item){
               ss=ss+$(item).text().trim()+"@";
          })

          $(".num").each(function(i,item){
               num=num+$(item).text().trim()+"@";
          })

          ss = ss.substr(0,ss.length-1);
          num = num.substr(0,num.length-1);

          var addr = $("#addr").text().trim();
          var content = $("#content").val().trim();

          $.post("__APP__/ShopCart/buySuccess",{
            phoneid: ss, num: num,addr:addr,content:content},function(data){
               alert(data);
               window.location.href="/webshop/index.php/Index/index";
          })
      }
  })
</script>

<footer>
  欢迎访问烈日电子商务网站<br/>
  <a href="">联系我们</a><a href="">改善建议</a><br/>
  Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>
</body>
</html>