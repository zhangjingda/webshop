<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>烈日电子商务有限公司</title>
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/css/common.min.css">
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="__PUBLIC__/css/index.css">
<link rel="stylesheet" href="__PUBLIC__/css/showProduct.css">
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>

<style type="text/css">

.good{
  cursor: pointer;

}
.good:hover{
   color: #f00;
}
.toRed{
  color: #f00;
}
</style>
</head>
<body>


<?php if(is_array($color_config)): $i = 0; $__LIST__ = $color_config;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$color_config): $mod = ($i % 2 );++$i;?><input type="hidden" class="a_color" value=<?php echo ($color_config["color"]); ?>@<?php echo ($color_config["phoneid"]); ?>><?php endforeach; endif; else: echo "" ;endif; ?>

<?php if(is_array($neicun_cunchu)): $i = 0; $__LIST__ = $neicun_cunchu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$neicun_cunchu): $mod = ($i % 2 );++$i;?><input type="hidden" class="neicun_cunchu" value=<?php echo ($neicun_cunchu["neicun"]); ?>@<?php echo ($neicun_cunchu["cunchu"]); ?>@<?php echo ($neicun_cunchu["phoneid"]); ?>><?php endforeach; endif; else: echo "" ;endif; ?>



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
<div class="product_link">
<a href="/webshop/index.php/Index/showProduct/?phoneid=5g5fdg25a4">苹果7</a>
<a href="/webshop/index.php/Index/showProduct/?phoneid=5443g5gg55">华为p10</a>
<a href="/webshop/index.php/Index/showProduct/?phoneid=ags5g21441">荣耀8</a>
<a href="/webshop/index.php/Index/showProduct/phoneid/1g32f4aa35">小米6</a>
</div>

</div>





<div class="showProduct">

  <div class="leftBar">

  	<div class="big_img_box">
      <!-- <img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc1); ?>"> -->
      <?php if($imgsrc1 != ''): ?><img width="100%" height="100%" 
       src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc1); ?>">
       <?php else: ?>
       <img  width="100%" height="100%" 
       src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc2); ?>"><?php endif; ?>
    </div>

  	<div class="imgBox">
    <div style="position:absolute;top:0;left:0" id="img_box_c">
     
      <?php if($imgsrc1 != ''): ?><div class="small_img_box"><img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc1); ?>"></div>
       <?php else: endif; ?>


       <?php if($imgsrc2 != ''): ?><div class="small_img_box"><img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc2); ?>"></div>
       <?php else: endif; ?>

        <?php if($imgsrc3 != ''): ?><div class="small_img_box"><img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc3); ?>"></div>
       <?php else: endif; ?>


        <?php if($imgsrc4 != ''): ?><div class="small_img_box"><img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc4); ?>"></div>
       <?php else: endif; ?>

        <?php if($imgsrc5 != ''): ?><div class="small_img_box"><img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc5); ?>"></div>
       <?php else: endif; ?>

        <?php if($imgsrc6 != ''): ?><div class="small_img_box"><img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($imgsrc6); ?>"></div>
       <?php else: endif; ?>



      
    </div>
  	</div>

    <div class="arr">&lt;</div>
    <div class="arr1">&gt;</div>
 
    <script>


    (function(){
      
       var allpic = <?php echo ($picnum); ?>;
       var leftIndex = 0;

       $("#img_box_c").click(function(e){

           $("#img_box_c .small_img_box").css({
              border: "1px solid transparent"
           })

           $(e.target).parent().css({
              border: "1px solid #f00"
           })
           $(".imgBox").css({ border: "none"})
           var src = $(e.target).attr("src") ;
           $(".big_img_box").find("img").attr("src",src);
       })

       function setIndex(num){
           var  ss = $("#img_box_c").css("left").trim();
           var dd = ss.indexOf("px");
           ss = parseInt(ss.substring(0,dd));
           ss = ss+num;
           ss = ss+"px";
           $("#img_box_c").css("left",ss);
       }

       $(".arr").click(function(e){
           if(leftIndex<allpic-4){
             setIndex(-100);
             leftIndex++;
           }
    
       })
       $(".arr1").click(function(e){
           if(leftIndex>0){
              setIndex(100);
              leftIndex--;
           }
       })



    })()


    </script>


  </div>
  <div class="rightBar">
  <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i;?><h3><?php echo ($result["protitle"]); ?></h3>
    <h5><?php echo ($result["provtitle"]); ?></h5>

  	<div class="price">
      <div class="pri">价格:</div>
      <h3>￥<?php echo ($result["price"]); ?>.00</h3>
    </div>

  	<div class="smallMes"> 

  	   <span class="minwidth">商品编号:&nbsp;</span><span id='phoneid'><?php echo ($result["phoneid"]); ?></span><br>
       <span class="minwidth">品牌:&nbsp;</span><span id=''><?php echo ($result["brand"]); ?></span><br>
       <span class="minwidth">运费:&nbsp;</span><span id=''>满77元包邮</span><br>
       <span class="minwidth">剩余数量:&nbsp;</span><span id='leftnum'>
        <?php if(is_array($number)): $i = 0; $__LIST__ = $number;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$number): $mod = ($i % 2 );++$i; echo ($number["num"]); endforeach; endif; else: echo "" ;endif; ?>
       </span><br>
      
       <span class="minwidth">总评论:&nbsp;</span><span id=''><?php echo ($allcomment); ?></span><br>
       <span class="minwidth">颜色:&nbsp;</span>
      <span id='color' style="color: #f00"><?php echo ($result["color"]); ?></span>
         

       <br>
       <span class="minwidth">配置:&nbsp;</span><span id='config'
       style="color: #f00"><?php echo ($result["neicun"]); ?>+<?php echo ($result["cunchu"]); ?></span><br>
       <span>数量&nbsp;</span>
       <button id="dnum">-</button><input type="text" readonly="readonly" value="1" id="mybuynum"><button id="anum">+</button><br><br>
       <br>
       <div class="btn btn-danger disabled" id="buynow">立即购买</div>
       <span class="col"></span>
       <div class="btn btn-danger" id="addshopcart">加入购物车</div>
       <input type="hidden" value="<?php echo ($phoneid); ?>" id="hide_phoneid">
     
  	</div><?php endforeach; endif; else: echo "" ;endif; ?>
    
    <script>

    (function(){
        
        if($("#leftnum").text().trim()=="0"){
            $("#buynow").addClass("disabled");
            $("#addshopcart").addClass("disabled");

        }else{
          if( $("#buynow").hasClass("disabled")){
            $("#buynow").removeClass("disabled");
          }
          if($("#addshopcart").hasClass("disabled")){
             $("#addshopcart").removeClass("disabled");
          }
        }


    })()

    $("#dnum").click(function(){
         var tt = $("#mybuynum").val();
         tt = parseInt(tt);
         tt--;
         if(tt<1)return;
         $("#mybuynum").val(tt); 
    })
    $("#anum").click(function(){
         var tt = $("#mybuynum").val();
         tt = parseInt(tt);
         tt++;
         var leftnum = parseInt($("#leftnum").text().trim());
         if(tt>leftnum)return ;
         $("#mybuynum").val(tt); 
    })


   $("#buynow").click(function(e) {
        if($("#buynow").hasClass("disabled"))return;
        var phoneid = $("#phoneid").text().trim();
        var num = $("#mybuynum").val();
        window.location.href= "__APP__/ShopCart/money/phoneid/"+phoneid+"/num/"+num;

   });

    (function(){

     function Color(){}
     Color.prototype.add = function(){
         for(var i=0;i<$(".a_color").size();i++){
              var val = $(".a_color")[i].value.trim().split("@");
              var hh = true;
              $(".a_button").each(function(i,item){if(item.value.trim() == val[0]){hh = false;}})
              if(hh)
              $("#color").after("<input type='button' title='"+val[1]+"'"+
               "class='a_button' value='"+val[0]+"'>");
         }
         return this;
     }
     Color.prototype.setColor  = function(){
         $(".a_button").click(function(e){
              var ss = $(this).attr("title");
              var ff = $("#config").text().trim().split("+");
              var tt = $(this)[0].value;
              window.location.href=
        "__APP__/Index/showProduct/phoneid/"+ss+"/neicun/"+ff[0]+"/cunchu/"+ff[1]+"/color/"+tt;  
         })
         return this;
     }

     new Color().add().setColor();
      
      function Config(){}
      Config.prototype.add = function(){
           for(var i=0;i<$(".neicun_cunchu").size();i++){
              var val = $(".neicun_cunchu")[i].value.trim().split("@");
              $("#config").after("<input type='button' title='"+val[2]+"'"+
            "class='b_button' value='"+val[0]+"+"+val[1]+"'>");

           }
           return this;
      }

      Config.prototype.setConfig = function(){
             $(".b_button").click(function(e){
                 var ss = $(this).attr("title");
                 var ff = $("#config").text().trim().split("+");
                 var tt = $("#color").text().trim();
                 window.location.href=
               "__APP__/Index/showProduct/phoneid/"+ss+
          "/neicun/"+ff[0]+"/cunchu/"+ff[1]+"/color/"+tt;   
             })
             return this;
       }

        new Config().add().setConfig();

        $("#addshopcart").click(function(e){
             if($("#addshopcart").hasClass("disabled"))return;
              var phoneid = $("#phoneid").text();
              var username  =  "<?php echo $_SESSION['username']; ?>";
              $.post("__APP__/ShopCart/saveUserShopCart",
                {phoneid: phoneid,username:username},function(data){
                     alert(data);
              })
        })


    })();


    </script>

  </div>

</div>

<div style="width: 100px; height: 0;clear: both"></div>

<div class="Message">

	<div class="leftSuggest">
     <?php if(is_array($recommend)): $i = 0; $__LIST__ = array_slice($recommend,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recommend): $mod = ($i % 2 );++$i;?><div class="item">
        <a href="/webshop/index.php/Index/showProduct/phoneid/<?php echo ($recommend["phoneid"]); ?>">
           <img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($recommend["imgsrc1"]); ?>" width="170px" height="160px">
        </a>
       <div></div>
       <span style="margin-left: 30px;"><?php echo ($recommend["proname"]); ?></span>
       <span style="margin-left: 10px;"><?php echo ($recommend["color"]); ?></span>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
		
	</div>

    <div class="rightMes">
    
    <div class="pro_detail">商品详情</div>
    <div class="comment">商品评论</div>
    <div class="service" style="border-right:1px solid #ccc;">售后服务</div>

   <div style="width: 1px; height: 0;clear: both"></div>


    <div class="mesbox">

      <div class="mes">
         <div class="btn-group-sm">
          <div class="btn btn-default">图片信息</div>
          <div class="btn btn-default">基本信息</div>
         </div>
         <div class="mes_a">



          <?php if(is_array($result1)): $i = 0; $__LIST__ = $result1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i; if($result["bigimg1"] != null): ?><img src="/webshop/Admin/Tpl/Public/upload1/<?php echo ($result["bigimg1"]); ?>" 
              width="600px" height="500px"><?php endif; ?>
             <?php if($result["bigimg2"] != null): ?><img src="/webshop/Admin/Tpl/Public/upload1/<?php echo ($result["bigimg2"]); ?>" 
              width="600px" height="500px"><?php endif; ?>
              <?php if($result["bigimg3"] != null): ?><img src="/webshop/Admin/Tpl/Public/upload1/<?php echo ($result["bigimg3"]); ?>" 
              width="600px" height="500px"><?php endif; ?>
              <?php if($result["bigimg4"] != null): ?><img src="/webshop/Admin/Tpl/Public/upload1/<?php echo ($result["bigimg4"]); ?>" 
              width="600px" height="500px"><?php endif; ?>
                <?php if($result["bigimg5"] != null): ?><img src="/webshop/Admin/Tpl/Public/upload1/<?php echo ($result["bigimg5"]); ?>" 
              width="600px" height="500px"><?php endif; ?>
              <?php if($result["bigimg6"] != null): ?><img src="/webshop/Admin/Tpl/Public/upload1/<?php echo ($result["bigimg6"]); ?>" 
              width="600px" height="500px"><?php endif; ?>
              <?php if($result["bigimg7"] != null): ?><img src="/webshop/Admin/Tpl/Public/upload1/<?php echo ($result["bigimg7"]); ?>" 
              width="600px" height="500px"><?php endif; endforeach; endif; else: echo "" ;endif; ?>
             

         </div>
         <div class="mes_a">

         <span>商品名:</span><span><?php echo ($result["proname"]); ?></span><br>
         <span>品牌:</span><span><?php echo ($result["brand"]); ?></span><br>
         <span>颜色:</span><span><?php echo ($result["color"]); ?></span><br>
         <span>内存:</span><span><?php echo ($result["neicun"]); ?></span><br>
         <span>存储:</span><span><?php echo ($result["cunchu"]); ?></span><br>
         <span>电池:</span><span><?php echo ($result["dianchi"]); ?>mAh</span><br>
         <span>大小:</span><span><?php echo ($result["size"]); ?>英寸</span><br>

         </div>
      </div>

      <div class="mes">
      	<div class="mes_comment_top">
      		<div class="good_img">
          <img src="/webshop/Admin/Tpl/Public/upload/<?php echo ($result["imgsrc1"]); ?>" 
          width="120px" height="120px"></div>

      		<div class="good_something">
      			<span>
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            </span><span class="percent"><?php echo ($goodrate); ?>%</span><br>


      			<span>
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star1.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star1.png" width="20px" height="20px">
            </span><span class="percent"><?php echo ($mediumrate); ?>%</span><br>

      			<span>
            <img src="__PUBLIC__/images/star.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star1.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star1.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star1.png" width="20px" height="20px">
            <img src="__PUBLIC__/images/star1.png" width="20px" height="20px">
            </span><span class="percent"><?php echo ($badrate); ?>%</span><br>


      		</div>
      	</div>

      	<div class="mes_comment_cont">

      	<label class="checkbox-inline">
<input type="radio" name="optionsRadiosinline" id="optionsRadios3" value="good" checked>好评(<span><?php echo ($goodcomment); ?></span>)
        </label>
        <label class="checkbox-inline">
<input type="radio" name="optionsRadiosinline" id="optionsRadios4" value="object">中评(<span><?php echo ($mediumcomment); ?></span>)
</label>
         <label class="checkbox-inline">
<input type="radio" name="optionsRadiosinline" id="optionsRadios4" value="critical">差评(<span><?php echo ($badcomment); ?></span>)
        </label>

        <div style="clear:both;width:1px;height:0"></div>

        <div class="comment1" id="comment1">
             <div class="box"></div>
        </div>
        <div class="comment1" id="comment2"></div>
        <div class="comment1" id="comment3"></div>


      	</div>
      </div>
      <div class="mes service"><p>本产品全国联保，享受三包服务，质保期为：一年质保
如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7天内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！</p>
<p>售后服务电话：400-830-8300</p></div>
    </div>

    	
    </div>
</div>


<div style="width:1px ;height: 1px ;opacity: 0;clear: both;"></div>
<footer style="margin-top: 200px">
	欢迎访问烈日电子商务网站<br/>
	<a href="">联系我们</a><a href="">改善建议</a><br/>
	Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>
<script type='text/javascript' src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js">
</script>
<script type="text/javascript">
  
  $(function(){

  	 //用于下面三个按钮选项卡信息的交换
     $('.pro_detail').css("borderTopColor","#F00");
     $(".mesbox .mes").eq(0).show();

  	 $('.pro_detail').click(function(e){
      	 	$('.comment').css("borderTopColor","#ccc");
      	 	$('.service').css("borderTopColor","#ccc");
      	 	$(this).css("borderTopColor","#F00");
      	 	$(".mesbox .mes").eq(0).show();
      	 	$(".mesbox .mes").eq(1).hide();
      	 	$(".mesbox .mes").eq(2).hide();
     })
     $(".comment").click(function(e){
      	 	$('.pro_detail').css("borderTopColor","#ccc");
      	 	$('.service').css("borderTopColor","#ccc");
      	 	$(this).css("borderTopColor","#F00");
      	 	$(".mesbox .mes").eq(0).hide();
      	 	$(".mesbox .mes").eq(1).show();
      	 	$(".mesbox .mes").eq(2).hide();
          // var phoneid = "<?php echo ($result["phoneid"]); ?>";
          // initGetCommentMes(phoneid);

     })
     $('.service').click(function(e){
      	 	$('.comment').css("borderTopColor","#ccc");
      	 	$('.pro_detail').css("borderTopColor","#ccc");
      	 	$(this).css("borderTopColor","#F00");
      	 	$(".mesbox .mes").eq(0).hide();
      	 	$(".mesbox .mes").eq(1).hide();
      	 	$(".mesbox .mes").eq(2).show();
     })


     function pagination(){
        this.page = 0;
        this.allpage = 0;
        this.index = 5;
     }
     pagination.prototype.getPageNum= function(){
         var ss = "<?php echo ($result["phoneid"]); ?>";
         var that = this;
         $.get("__APP__/Index/getPageNum",{phoneid:ss,page:0,index:that.index },function(data){
              that.allpage = Math.ceil(parseInt(data.trim())/5);
              if(that.allpage>0)that.page = 1;
         })
     }
     pagination.prototype.create = function(){

             var str = "<div class='discuss'>";
              str+=" <button class='page1'>上一页</button>";
               str+=" <button class='page first'>1</button>";
               str+=" <button class='page'>2</button>";
               str+=" <button class='page'>3</button>";
               str+=" <button class='page2 pagemore' disabled='disabled'>...</button>";
               str+=" <button class='page'>4</button>";
               str+=" <button class='page'>5</button>";
               str+=" <button class='page'>6</button>";
               str+=" <button class='page'>7</button>";
               str+=" <button class='page1'>下一页</button> ";
               str+=" <button class='page1'>尾页</button> ";
      str+=" <span>第 </span><span class='nowpage'>"+this.page+"</span>页,共"+this.allpage+"页";
             str+=" </div>";
             return str;
     }

     pagination.prototype.addPagination = function(id){
        var str = this.create();
        $("#"+id).append(str);
     }
     pagination.prototype.showPagination = function(){

             if(this.page <=1)
               $(".page1").eq(0).hide();
             else $(".page1").eq(0).show();
             if(this.page == this.allpage){
                 $(".page1").eq(1).hide();
                 $(".page1").eq(2).hide();   
             }else{
                $(".page1").eq(1).show();
                $(".page1").eq(2).show(); 
             }
             if(this.allpage<=1){
                 $(".page1").hide();
             }

             $(".page").hide();
             var tt = this.allpage>7 ? 7:this.allpage
             for(var i=0;i<tt;i++){
                  $(".page").eq(i).show();
             }
             if(this.allpage==0) $(".page").hide();

             if(this.allpage>7){
                 if(this.page>7){
                    $(".page2").show();
                    $(".page").eq(3).text(this.page-3);
                    $(".page").eq(4).text(this.page-2);
                    $(".page").eq(5).text(this.page-1);
                    $(".page").eq(6).text(this.page);             
                 }else{
                    $(".page2").hide();
                    for(var i=0;i<7;i++){
                       $(".page").eq(i).text(i+1);
                    }
                 }
             }

            $(".page").css({
                borderColor: "#ccc",
                color: "#000"
            });
          
            
            var that = this;
            $(".page").each(function(i,item){
                var ss = parseInt($(item).text().trim());
                if(ss == that.page){
                    $(".page").eq(i).css({
                        borderColor: "#f00",
                        color: "#f00"
                    })
                }
            })


     }
     pagination.prototype.setNowPage = function(){
          $(".nowpage").text(this.page);
     }

     function initSetComment(data){


           $(".comment1").eq(0).find(".box").empty();

     
           for(var i in data){
              if(typeof data[i]==="object"){
                
                    var str = " <div class='one_com'>";
                   str+="<div class='lef_user_img_pro'>";
                    str+="     <div class='img'>";
                str+="<img width='120px' height='120px' ";
                str+=" src='/webshop/Admin/Tpl/Public/upload/"+data[i].img+"'>";
              str+="</div>";
             str+=" <div class='font'>"+data[i].proname+"\t"+data[i].color+"<br/>"
             str+=data[i].neicun+"+"+data[i].cunchu+"</div>";
           str+=" </div>";
           str+=" <div class='rig_user_com'>";
                 str+="  <div class='username'>"+data[i].username+"</div>";
                str+="   <div class='usercomment'>"+data[i].content+"</div>";
                str+="    <div class='time'>";
                 str+="   <span class='glyphicon glyphicon-thumbs-up good'></span>";
              str+="<span style='color: #F00;padding-right:30px;' class='goodnum'>";
              str+=data[i].goodnum+"</span>";
               str+="      <input type='hidden' class='mybuyid' value="+data[i].buyid+">";
              str+=data[i].time;
             str+="       </div>";
            str+=" </div>";
          str+=" </div>";

                  
              $(".comment1").eq(0).find(".box").prepend(str); 
                 
              }
          }

     }

     function user(index,page,phoneid,that){
         
        $.ajax({
          type: "post",
          url: "__APP__/Index/showComment",
          data: {index:index,page:page,phoneid:phoneid},
          dataType: "json",
          success:function(data){
              initSetComment(data);
          },
          error:function(error){
             console.log("评论信息获取失败");
             console.log(error)
          }
         })

     }

    pagination.prototype.addEvent = function(){
        var that = this;
        var phoneid = "<?php echo ($result["phoneid"]); ?>";
        $(".page1").eq(0).click(function(e){
             that.page--;
             that.showPagination();
             that.setNowPage();
             user(that.index,that.page,phoneid,that);

        })
        $(".page1").eq(1).click(function(e){
             that.page++;
             that.showPagination();
             that.setNowPage();
             user(that.index,that.page,phoneid,that);
        })
        $(".page1").eq(2).click(function(e){
             that.page = that.allpage;
             that.showPagination();
             that.setNowPage();
             user(that.index,that.page,phoneid,that);
        })
        $(".page").click(function(e){
             var index= $(".page").index($(this));
             that.page = parseInt($(".page").eq(index).text().trim());
             that.showPagination();
             that.setNowPage();
             user(that.index,that.page,phoneid,that);
        })
        $(".page").hover(function(event) {
            var index = $(".page").index($(this));
            $(".page").eq(index).css({borderColor: "#f00",color: "#f00"})
            setPageHover()
        },function(){setPageHover();});

        var setPageHover = function(){
            $(".page").css({
                borderColor: "#ccc",
                color: "#000"
            })
            $(".page").each(function(i,item){
                var ss = parseInt($(item).text().trim());
                if(ss == that.page){
                    $(".page").eq(i).css({
                        borderColor: "#f00",
                        color: "#f00"
                    })
                }
            })
        }



     }

     pagination.prototype.main = function(){

           var phoneid = "<?php echo ($result["phoneid"]); ?>";
           this.getPageNum();
           var that = this;
           setTimeout(function(){
              user(that.index,that.page,phoneid,that);
              that.create();
              that.addPagination("comment1");
              that.addEvent();
              that.showPagination();      
           },400)
          
     }

     var mypage = new pagination();
     mypage.main();


 



     //用于商品详情里面的按钮切换
       $(".mes .btn-group-sm .btn").eq(0).css('backgroundColor','#ddd');
       $(".mes_a").eq(1).hide();
       $(".mes .btn-group-sm .btn").click(function(e){
       	  var index  = $(".mes .btn-group-sm .btn").index($(this));
       	  $(".mes .btn-group-sm .btn").css('backgroundColor','#fff').eq(index)
       	  .css('backgroundColor','#ddd');
       	  $(".mes_a").hide().eq(index).show();

       })

       //用于设置商品评论中的好评，中评，差评的选项
       $(".mes_comment_cont .comment1").hide().eq(0).show();
       $(".checkbox-inline").find("[type=radio]").change(function(e){
             if($(this).val() == "good"){
                mypage.index = 5;
                mypage.page = 0;
                mypage.allpage = 0;
                $("#comment1").empty();
                $("#comment1").html("<div class='box'></div>");
                mypage.main();

             }else if($(this).val() == "object"){
               mypage.index = 3;
               mypage.page = 0;
               mypage.allpage = 0;

               $("#comment1").empty();
               $("#comment1").html("<div class='box'></div>");
               mypage.main();	
             }else if($(this).val() == "critical"){
               mypage.index = 1;
               mypage.page = 0;
               mypage.allpage = 0;

               $("#comment1").empty();
               $("#comment1").html("<div class='box'></div>");
               mypage.main();

             }
       })


  })



$(".box").delegate(".good","click",function(e){
    var index = $(".good").index($(this));
    var value = $(".mybuyid").eq(index).val().trim();
    
    $.get("__APP__/Index/addGoodNum/",{buyid: value},function(data){
        alert(data);
        if(data=="success"){
           $(".good").eq(index).addClass("toRed");
           var aa = parseInt($(".goodnum").eq(index).text().trim());
           $(".goodnum").eq(index).text(aa+1);
        }
    }) 
})

  
</script>
</body>
</html>