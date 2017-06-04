<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>烈日电子商务有限公司</title>
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/css/common.min.css">
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/index.css">
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
<style type="text/css">
.shopcartnum{
  position: absolute;
  color:#fff;
  top:-10px;
  left:63px;
  font-size: 12px;
  background-color:#f00;
  border-radius:50%;
  min-width: 15px;
  text-align: center;
  padding: 0 2px;
}
.myproduct{
   position: absolute;
   left: 5px;
   top: 20px;
   width: 370px;
   z-index: 999999;
   background-color: #fff;
   padding-right: 20px;
  display: none;
  max-height: 350px;
  overflow: hidden;
}
.myproduct-i  a{
  float: right;
  padding: 5px 10px;
  background-color: #000;
  color:#fff;
  border: none;
  outline: none;
  opacity:0.6;
  display: inline-block;
  margin-top: 20px;
  transition: opacity .5s;
  text-decoration: none;

}
.myproduct-i  a:hover{
 
  opacity:1.0;
  text-decoration: none;

}



</style>
</head>
<body>

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

              <li style="position: relative" id="myshopcart">
              
              <?php if($account): ?><span class="shopcartnum"><?php echo ($account); ?></span><?php endif; ?>

              <div class="myproduct">
                <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?><div class="myproduct-i">
                      <img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($res["imgsrc1"]); ?>" 
                      width="70px" height="70px" />
                      <span><?php echo ($res["proname"]); ?>/</span>
                      <span><?php echo ($res["color"]); ?>/</span>
                      <span><?php echo ($res["neicun"]); ?>+</span>
                      <span><?php echo ($res["cunchu"]); ?></span> 
                      <a href="__APP__/Index/showProduct/?phoneid=<?php echo ($res["phoneid"]); ?>">
                         立即购买
                      </a>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
              </div>

              <a href="__APP__/ShopCart/shopcart/?key=1" >购物车</a>|</li>
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
    //购物车相关      
          $("#myshopcart").mouseover(function(event) {
             $(".myproduct").show();
          }); 
          $("#myshopcart").mouseout(function(event) {
             $(".myproduct").hide();
          });


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
<!-- 商品展示相关内容 -->
<div class="product_show">
    <div class="leftSide">
    
       <div class="proList">
           <ul>
              <li class="prolist_single">

                   <span class="shouji"><?php echo ($menu[0]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu)): $i = 0; $__LIST__ = array_slice($menu,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i; if($menu['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu["phoneid"]); ?>"><?php echo ($menu["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul>


              </li>
              <li class="prolist_single">

                  <span class="shouji"><?php echo ($menu1[7]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu1)): $i = 0; $__LIST__ = array_slice($menu1,7,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu1): $mod = ($i % 2 );++$i; if($menu1['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu1["phoneid"]); ?>"><?php echo ($menu1["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul>

              </li>
              <li class="prolist_single" >

                   <span class="shouji"><?php echo ($menu2[14]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu2)): $i = 0; $__LIST__ = array_slice($menu2,14,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu2): $mod = ($i % 2 );++$i; if($menu2['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu2["phoneid"]); ?>"><?php echo ($menu2["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul>


               </li>
         <li class="prolist_single">

                  <span class="shouji"><?php echo ($menu3[21]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu3)): $i = 0; $__LIST__ = array_slice($menu3,21,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu3): $mod = ($i % 2 );++$i; if($menu3['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu3["phoneid"]); ?>"><?php echo ($menu3["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul>

         </li>
         <li class="prolist_single">
                 <span class="shouji"><?php echo ($menu4[28]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu4)): $i = 0; $__LIST__ = array_slice($menu4,28,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu4): $mod = ($i % 2 );++$i; if($menu4['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu4["phoneid"]); ?>"><?php echo ($menu4["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul> 
         </li>
         <li class="prolist_single">
                  <span class="shouji"><?php echo ($menu5[35]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu5)): $i = 0; $__LIST__ = array_slice($menu5,35,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu5): $mod = ($i % 2 );++$i; if($menu5['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu5["phoneid"]); ?>"><?php echo ($menu5["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul>
             </li>
         <li class="prolist_single">
                 <span class="shouji"><?php echo ($menu6[42]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu6)): $i = 0; $__LIST__ = array_slice($menu6,42,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu6): $mod = ($i % 2 );++$i; if($menu6['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu6["phoneid"]); ?>"><?php echo ($menu6["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul>
         </li>
           <li class="prolist_single">
                     <span class="shouji"><?php echo ($menu7[48]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu7)): $i = 0; $__LIST__ = array_slice($menu7,48,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu7): $mod = ($i % 2 );++$i; if($menu7['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu7["phoneid"]); ?>"><?php echo ($menu7["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul>
         </li>
           <li class="prolist_single">
                 <span class="shouji"><?php echo ($menu8[56]['maintitle']); ?></span ><span class="fr">></span>
                   <ul>
                     <?php if(is_array($menu8)): $i = 0; $__LIST__ = array_slice($menu8,56,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu8): $mod = ($i % 2 );++$i; if($menu8['phoneid'] != null): ?><li><a href="__APP__/Index/showProduct/?phoneid=<?php echo ($menu8["phoneid"]); ?>"><?php echo ($menu8["subtitle"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   </ul>
         </li>
        </ul>
       </div>

    </div>



    <div class="centerSide">

       <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?><a href="__APP__/Index/showProduct"><img src="/webshop/Admin/Tpl/Public/broadcast/<?php echo ($result["img"]); ?>" width="100%" height="100%" 
       data-title="<?php echo ($result["phoneid"]); ?>" alt="hello" class="fp show"></a><?php endforeach; endif; else: echo "" ;endif; ?>
      

      <div class="lefarrow"><img src="__PUBLIC__/images/lefArrow.png" class="show"></div>
      <div class="rigarrow"><img src="__PUBLIC__/images/rigArrow.png" class="show"></div>

      <div class="circle">
        <?php
 for($i=1; $i <= $num; $i++){ echo "<div class='circle-single'>".$i."</div>"; } ?>
      </div>

    </div>
    <div class="rightSide">
         <div class="sanwei"><a href="/webshop/index.php/Index/showProduct/?phoneid=5g4d5fsssg">
         <img src="/webshop/Index/Tpl/Index/images/a1.jpg" style="border-bottom:1px solid #ccc"/></a></div>
         <div class="sanwei"><a href="/webshop/index.php/Index/showProduct/phoneid/135435d12d/">
         <img src="/webshop/Index/Tpl/Index/images/a2.jpg" style="border-bottom:1px solid #ccc"/></a></div>
         <div class="sanwei"><a href="/webshop/index.php/Index/showProduct/?phoneid=5ggssdg3a2">
         <img src="/webshop/Index/Tpl/Index/images/a3.jpg"/></a></div>
    </div>
</div>

<div class="pop_pro_show">
   <div class="pop_pro">
  

      <div class="pro_pro_r">
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/5g5fdg25a4">
        <img src="/webshop/Public/productimgs/show1.jpg"></a>
        <h4>Apple 7</h4>
        <h6>￥4899.00</h6>
        </div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/f3g141sff1">
        <img src="/webshop/Public/productimgs/show2.jpg"></a><h4>华为 p10</h4>
         <h6>￥3799.00</h6></div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/3a1s445ga3">
        <img src="/webshop/Public/productimgs/show3.jpg"></a><h4>OPPO R9s</h4>
         <h6>￥2799.00</h6></div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/sd14fga5g1">
        <img src="/webshop/Public/productimgs/show4.jpg"></a><h4>VIVO X9</h4>
         <h6>￥2798.00</h6></div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/f3g2g33ag3">
        <img src="/webshop/Public/productimgs/show5.jpg"></a><h4>Galaxy S7</h4>
         <h6>￥3788.00</h6></div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/1g32f4aa35">
        <img src="/webshop/Public/productimgs/show6.jpg"></a><h4>小米6</h4>
         <h6>￥2400.00</h6></div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/a153512321">
        <img src="/webshop/Public/productimgs/show7.jpg"></a><h4>魅族 PRO6S</h4>
        <h6>￥2499.00</h6></div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/4agf23daa4">
        <img src="/webshop/Public/productimgs/show8.jpg"></a><h4>荣耀V8</h4>
        <h6>￥2499.00</h6></div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/s151d4a5a5">
        <img src="/webshop/Public/productimgs/show9.jpg"></a><h4>荣耀6x</h4>
        <h6>￥1299.00</h6></div>
        <div class="item1"><a href="__APP__/Index/showProduct/phoneid/ags5g21441">
        <img src="/webshop/Public/productimgs/show10.jpg"></a><h4>荣耀8</h4>
        <h6>￥2099.00</h6></div>
      </div>
        
       
   </div>
   <div class="clearfix"></div>
   <div class="pop_pro1">
        <h2>热门商品</h2>
        <div class="pro_pro1_pro_list">

        <a href="http://localhost/webshop/index.php/Index/proCategory/?brand=苹果">苹果
        </a>
         
        </div>
        <div class="pro_pro1_pro_list">
        <a href="http://localhost/webshop/index.php/Index/proCategory/?brand=华为">华为</a></div>
        <div class="pro_pro1_pro_list">
        <a href="http://localhost/webshop/index.php/Index/proCategory/?brand=小米">小米</a></div>
        <div class="pro_pro1_pro_list">
        <a href="http://localhost/webshop/index.php/Index/proCategory/?brand=魅族">魅族</a></div>
        <div class="pro_pro1_pro_list">
        <a href="http://localhost/webshop/index.php/Index/proCategory/?brand=三星">三星</a></div>
        <!-- <div class="pro_pro1_pro_list" style="float:right"><a href="">查看更多&gt;&gt;</a></div> -->
   </div>
   <div class="pop_pro2">
        <div class="item2"><a href="__APP__/Index/showProduct/?phoneid=5ggssdg3a2">
        <img src="/webshop/Public/hotproduct/h1.jpg"></a></div>
        <div class="item2"><a href="__APP__/Index/showProduct/?phoneid=ags5g21441">
        <img src="/webshop/Public/hotproduct/h2.jpg"></a></div>
        <div class="item2"><a href="__APP__/Index/showProduct/?phoneid=s151d4a5a5">
        <img src="/webshop/Public/hotproduct/h3.jpg"></a></div>
        <div class="item2"><a href="__APP__/Index/showProduct/?phoneid=4f3asf1ggd">
        <img src="/webshop/Public/hotproduct/h4.jpg"></a></div>
        <div class="item2"><a href="__APP__/Index/showProduct/?phoneid=4agf23daa4">
        <img src="/webshop/Public/hotproduct/h5.jpg"></a></div>

   </div>

</div>

<?php if(is_array($listdata)): $i = 0; $__LIST__ = $listdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listdata): $mod = ($i % 2 );++$i; echo ($listdata["proname"]); endforeach; endif; else: echo "" ;endif; ?>
<div class="category_pro">
<!-- <?php echo ($listdata1[0]['brand']); ?> -->
<!-- <?php echo ($listdata2[5]['brand']); ?>
<?php echo ($listdata3[10]['brand']); ?>
<?php echo ($listdata4[15]['brand']); ?>
<?php echo ($listdata5[20]['brand']); ?> -->
  

  <div class="category_pro_list">

        <h2><?php echo ($listdata1[0]['brand']); ?></h2><div class="more">
        <a href="__APP__//Index/proCategory/?brand=<?php echo ($listdata1[0]['brand']); ?>">更多>></a></div>

        <div class="category_pro_cont">

         <?php if(is_array($listdata1)): $i = 0; $__LIST__ = array_slice($listdata1,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listdata1): $mod = ($i % 2 );++$i;?><div class="list">
              <a href="__APP__/Index/showProduct/?phoneid=<?php echo ($listdata1["phoneid"]); ?>">
              <img src="__PUBLIC__/images/mylist/a<?php echo ($key+1); ?>.jpg" width="200px" height="250px"/></a>
              <span class="proname"><?php echo ($listdata1["proname"]); ?></span><br>
              <span class="proprice">￥<?php echo ($listdata1["price"]); ?>.00</span>
              <div class="slide_cont">
                  <span>颜色:&nbsp;&nbsp;<?php echo ($listdata1["color"]); ?></span><br>
                  <span>内存+存储:&nbsp;&nbsp;<?php echo ($listdata1["neicun"]); ?>+<?php echo ($listdata1["cunchu"]); ?></span><br>
                  <span>尺寸:&nbsp;&nbsp;<?php echo ($listdata1["size"]); ?>&nbsp;英寸</span><br>
                  <span>电池容量:&nbsp;&nbsp;<?php echo ($listdata1["dianchi"]); ?>&nbsp;mAh</span>

              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
         
        </div>
  </div>


<div class="category_pro_list">

        <h2><?php echo ($listdata2[5]['brand']); ?></h2><div class="more">
        <a href="__APP__//Index/proCategory/?brand=<?php echo ($listdata2[5]['brand']); ?>">更多>></a></div>

        <div class="category_pro_cont">

         <?php if(is_array($listdata2)): $i = 0; $__LIST__ = array_slice($listdata2,5,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listdata2): $mod = ($i % 2 );++$i;?><div class="list">
              <a href="__APP__/Index/showProduct/?phoneid=<?php echo ($listdata2["phoneid"]); ?>">
              <img src="__PUBLIC__/images/mylist/a<?php echo ($key+1); ?>.jpg" width="200px" height="250px"/></a>
                <span class="proname"><?php echo ($listdata2["proname"]); ?></span><br>
                <div class="proprice">￥<?php echo ($listdata2["price"]); ?>.00</div>
              <div class="slide_cont">

                  <span>颜色:&nbsp;&nbsp;<?php echo ($listdata2["color"]); ?></span><br>
                  <span>内存+存储:&nbsp;&nbsp;<?php echo ($listdata2["neicun"]); ?>+<?php echo ($listdata2["cunchu"]); ?></span><br>
                  <span>尺寸:&nbsp;&nbsp;<?php echo ($listdata2["size"]); ?>&nbsp;英寸</span><br>
                  <span>电池容量:&nbsp;&nbsp;<?php echo ($listdata2["dianchi"]); ?>&nbsp;mAh</span>

              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
         
        </div>
  </div>



  <div class="category_pro_list">

        <h2><?php echo ($listdata3[10]['brand']); ?></h2><div class="more">
        <a href="__APP__//Index/proCategory/?brand=<?php echo ($listdata3[10]['brand']); ?>">更多>></a></div>

        <div class="category_pro_cont">

         <?php if(is_array($listdata3)): $i = 0; $__LIST__ = array_slice($listdata3,10,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listdata3): $mod = ($i % 2 );++$i;?><div class="list">
              <a href="__APP__/Index/showProduct/?phoneid=<?php echo ($listdata3["phoneid"]); ?>">
              <img src="__PUBLIC__/images/mylist/a<?php echo ($key+1); ?>.jpg" width="200px" height="250px"/></a>
                <span class="proname"><?php echo ($listdata3["proname"]); ?></span><br>
                <div class="proprice">￥<?php echo ($listdata3["price"]); ?>.00</div>
              <div class="slide_cont">

                  <span>颜色:&nbsp;&nbsp;<?php echo ($listdata3["color"]); ?></span><br>
                  <span>内存+存储:&nbsp;&nbsp;<?php echo ($listdata3["neicun"]); ?>+<?php echo ($listdata3["cunchu"]); ?></span><br>
                  <span>尺寸:&nbsp;&nbsp;<?php echo ($listdata3["size"]); ?>&nbsp;英寸</span><br>
                  <span>电池容量:&nbsp;&nbsp;<?php echo ($listdata3["dianchi"]); ?>&nbsp;mAh</span>

              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
         
        </div>
  </div>


  <div class="category_pro_list">

        <h2><?php echo ($listdata4[15]['brand']); ?></h2><div class="more">
        <a href="__APP__//Index/proCategory/?brand=<?php echo ($listdata4[15]['brand']); ?>">更多>></a></div>

        <div class="category_pro_cont">

         <?php if(is_array($listdata4)): $i = 0; $__LIST__ = array_slice($listdata4,15,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listdata4): $mod = ($i % 2 );++$i;?><div class="list">
              <a href="__APP__/Index/showProduct/?phoneid=<?php echo ($listdata4["phoneid"]); ?>">
              <img src="__PUBLIC__/images/mylist/a<?php echo ($key+1); ?>.jpg" width="200px" height="250px"/></a>
                <span class="proname"><?php echo ($listdata4["proname"]); ?></span><br>
                <div class="proprice">￥<?php echo ($listdata4["price"]); ?>.00</div>
              <div class="slide_cont">
                    <span>颜色:&nbsp;&nbsp;<?php echo ($listdata4["color"]); ?></span><br>
                  <span>内存+存储:&nbsp;&nbsp;<?php echo ($listdata4["neicun"]); ?>+<?php echo ($listdata4["cunchu"]); ?></span><br>
                  <span>尺寸:&nbsp;&nbsp;<?php echo ($listdata4["size"]); ?>&nbsp;英寸</span><br>
                  <span>电池容量:&nbsp;&nbsp;<?php echo ($listdata4["dianchi"]); ?>&nbsp;mAh</span>
              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
         
        </div>
  </div>

    <div class="category_pro_list">

        <h2><?php echo ($listdata5[20]['brand']); ?></h2><!-- <div class="more">
        <a href="__APP__//Index/proCategory/?brand=<?php echo ($listdata5[20]['brand']); ?>">更多>></a></div> -->

        <div class="category_pro_cont">

         <?php if(is_array($listdata5)): $i = 0; $__LIST__ = array_slice($listdata5,20,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$listdata5): $mod = ($i % 2 );++$i;?><div class="list">
              <a href="__APP__/Index/showProduct/?phoneid=<?php echo ($listdata5["phoneid"]); ?>">
              <img src="__PUBLIC__/images/mylist/a<?php echo ($key+1); ?>.jpg" width="200px" height="300px"/></a>
              <div class="slide_cont"></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
         
        </div>
  </div>






</div>


<footer>
	欢迎访问烈日电子商务网站<br/>
	<a href="">联系我们</a><a href="">改善建议</a><br/>
	Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>


</div> 
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery.easing.min.js">
</script>

<script>

$("#searchbtn").click(function(e){
    if($("#search").val().trim()!=""){
         var ss = $("#search").val().trim();
         location.href="/webshop/index.php/Search/search/?key="+ss;
    }
})


 $(function(){

      var query = window.location.search.substr(1);
      var query = query.split("=");
    
      switch(query[1]){

        case '1': 
        $(".shopcart-title-i").eq(0).trigger("click");

        break;
        case '2':
        $(".shopcart-title-i").eq(1).trigger("click");

        break;
        case '3':

        $(".shopcart-title-i").eq(2).trigger("click");


        break;
        case '4':
        $(".shopcart-title-i").eq(3).trigger("click");


        break;
        default: 
        $(".shopcart-title-i").eq(0).trigger("click");


      }
 }) 

</script>

<script>
      
        //轮播控制
        function broadcast(){
           this.index = 0;
           this.allnum = <?php echo ($num); ?>;
        }

        broadcast.prototype.setCenterImg = function(){
             $(".fp").each(function(index, el) {
                if($(el).hasClass("show")){
                    $(el).removeClass("show");
                } 
            });
            $(".fp").stop(true,true).fadeOut(400);
            $(".fp").eq(this.index).stop(true,true).fadeIn(400);
        }
        broadcast.prototype.leftArrow = function(){
            this.index--;
            if(this.index<0)this.index=this.allnum-1;
            this.setCenterImg();
        }

        broadcast.prototype.rightArrow = function(){
            this.index++;
            if(this.index>=this.allnum)this.index = 0;
            this.setCenterImg();
        }

        broadcast.prototype.setCircle = function(){
            $(".circle").find(".circle-single").css({
              color: '#FFF',
              backgroundColor: '#000'
            }).eq(this.index).css({
               color: '#000',
               backgroundColor: '#fff'
            });

        }


        var bro = new broadcast();
        bro.setCircle();
        bro.setCenterImg();
    
        $(".lefarrow img").click(function(){
              bro.leftArrow();
              bro.setCircle();
        })
        $(".rigarrow img").click(function(event) {
              bro.rightArrow();
              bro.setCircle();
        });
        $(".circle").delegate(".circle-single","mouseover",function(e){
            var i = $(".circle .circle-single").index($(e.target))
            bro.index = i;
            bro.setCircle();
            bro.setCenterImg();
        })

        window.setInterval(function(){
              bro.rightArrow();
              bro.setCircle();
        },10000);

        $(".fp").click(function(e){
           e.preventDefault();
           var src = $(this).parent().attr("href");
           var phoneid = $(this).attr("data-title");
           window.location.href = src+"/?phoneid="+phoneid;
        })


      </script>
<script>

$(function(){
  
   if(getCookie('username')){
        document.querySelector("#abc").innerHTML ="欢迎"+getCookie('username') ;
   }
   
   //设置头部商品展示懒得内容，触动左边的li ,会遮挡住中间的轮播图
   $(".prolist_single").hover(function(){
       var aa = $(".prolist_single").find('ul');
       aa.hide();
       var index  = $(".prolist_single").index($(this));
       aa.eq(index).show();
   },function(){
         var index  = $(".prolist_single").index($(this));
         $(".prolist_single").find('ul').eq(index).hide();
   })

   //商品展示中，鼠标放上之后向上画出商品的描述和价格
   $(".category_pro_list .list").hover(function(e){
      var self = this;
      var index = $(".category_pro_list .list").index($(this));  
      var aa = $(".category_pro_list .list").eq(index).find('.slide_cont');
      aa.stop(true).slideDown(300,"easeOutBack",function(){});
   },function(e1){
      var index = $(".category_pro_list .list").index($(this));  
      $(".category_pro_list .list").eq(index).
      find('.slide_cont').stop(true).slideUp(300,"easeOutBack",function(){});
   })

    


})


function getCookie(name) {
 var nameEQ = name + "=";
 var ca = document.cookie.split(';'); //把cookie分割成组
 for(var i=0;i < ca.length;i++) {
 var c = ca[i]; //取得字符串
 while (c.charAt(0)==' ') { //判断一下字符串有没有前导空格
 c = c.substring(1,c.length); //有的话，从第二位开始取
 }
 if (c.indexOf(nameEQ) == 0) { //如果含有我们要的name
 return unescape(c.substring(nameEQ.length,c.length)); //解码并截取我们要值
 }
 }
 return false;
}
//清除cookie
function clearCookie(name) {
 setCookie(name, "", -1);
}
//设置cookie
function setCookie(name, value, seconds) {
 seconds = seconds || 0; //seconds有值就直接赋值，没有为0，这个根php不一样。
 var expires = "";
 if (seconds != 0 ) { //设置cookie生存时间
 var date = new Date();
 date.setTime(date.getTime()+(seconds*1000));
 expires = "; expires="+date.toGMTString();
 }
 document.cookie = name+"="+escape(value)+expires+"; path=/"; //转码并赋值
}

</script>
</body>
</html>