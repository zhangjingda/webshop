<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>烈日电子商务有限公司</title>
	<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/css/common.min.css">
	<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="__PUBLIC__/css/index.css">
	<link rel="stylesheet" href="__PUBLIC__/css/login.css">
	<style type="text/css" media="screen">
    .help-block{
        margin-bottom: -18px;
        color: #f00;
        min-height: 20px;
    }
  </style>

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
  <div class="search" style="visibility: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
              <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search" style="padding: 0 20px;">
              </span></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="product_link"><a href="">苹果7</a><a href="">华为p10</a>
<a href="">荣耀8</a><a href="">小米6</a>
</div> -->

</div>


<div id="box">
<div class="main">


  <div class="login">
    <div class="log-font label-default">欢迎登录</div>
    <div class="container">
    <div class="row"><div class="col-md-3">
    <form method="post" action="" autocomplete="off" id="login">  
    
    <div class="input-group">
        <span class="input-group-addon">
        	<span class="glyphicon glyphicon-user"></span></span>
        <input type="text"  id="username" name="username" class="form-control" placeholder="用户名或电话号码 6-16 位">
    </div>
     <!--用户名出错输入框  -->
     <div class="help-block" id="us">
     
     </div>
     <!-- end -->
    <div class="input-group">
        <span class="input-group-addon">
        	<span class="glyphicon glyphicon-lock"></span></span>
        <input type="password" id="password" name="password" class="form-control" placeholder="密码 6-16 位">
    </div>
     <!--密码出错输入框  -->
     <div class="help-block" id="pw"></div>
     <!-- end -->
    <div class="checkbox">
        <label>
          <input type="checkbox" id="autologin">自动登录
        </label>
         <label class="pwd-font">
          <a href="__APP__/Form/handlePwd">忘记密码</a>
        </label>
    </div>

    <div class="form-group">
        <input type="submit" value="立即登录" 
        class="btn btn-danger btn-block form-control" />
    </div>

    <div class="toEnroll">  
        <span class="glyphicon glyphicon-circle-arrow-right"></span>
        <span><a href="__APP__/Form/handleEnroll">前往注册</a></span>
    </div>
    
    <div class="weixinEnroll">
          <span>
             <img src="/webshop/Public/images/weixinLogo.jpg"/>
          </span>
          <span>
              <a href="">微信</a>
          </span>
    </div>
   
	</form>
    </div></div></div>
    </div>
  </div>


<footer>

	欢迎访问烈日电子商务网站<br/>
	<a href="">联系我们</a><a href="">改善建议</a><br/>
	Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>


</div> 
<script type="text/javascript" src="<?php echo C('STATIC_RES');?>/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">



function getEle(id){return document.getElementById(id)};
var data  = data || {};   
data.username =  {
    
    username: getEle("username"),
    user_error: getEle("us"),
    error_mes: "",
    error_type:{
       empty: function(){
            if(data.username.username.value == ""){
                  data.username.error_mes = "用户名不能为空";
                  return true;
            }
            return false;
        },
       isWrong: function(){
            if(/^[\w\d_]{6,16}$/.test(data.username.username.value)){
                return false;
            }else {
               data.username.error_mes = "用户名或电话格式错误";
              return true;
            }
        }
    },
       
    showmes:function(){

        var error_type = this.error_type;
        for(var i in error_type){
              var ss = error_type[i]();
              if( ss=== true){
                  break;
              }
        }
        this.user_error.innerHTML  = "";
        if(this.error_mes != ""){
          this.user_error.innerHTML = "<img src='__PUBLIC__/images/danger.png' "+
          "width='20px' height='10px'/>"+this.error_mes;
        }
        this.error_mes ="";
    },
    bind:function(){
        var that = this;
        this.username.addEventListener(
          "blur" ,function(){this.showmes()}.bind(that), false);
    },
    init:function(){
       this.bind();
    }

};

data.username.init();

data.password = {
    password: getEle("password"),
    password_error: getEle("pw"),
    error_mes: "",
    error_type:{
       
       empty: function(){
            if(data.password.password.value == ""){
                  data.password.error_mes = "密码不能为空";
                  return true;
            }
            return false;
        },
        isWrong: function(){
            if(/^[\w\d_]{6,16}$/.test(data.password.password.value)){
                return false;
            }else{
                data.password.error_mes = "密码格式错误";
                return true;
            }
            
        }
    },
       
    showmes:function(){

        var error_type = this.error_type;
        for(var i in error_type){
              var ss = error_type[i]();
              if( ss === true){
                  break;
              }
        }
        this.password_error.innerHTML  = "";
        if(this.error_mes != ""){
          this.password_error.innerHTML = "<img src='__PUBLIC__/images/danger.png' "+
          "width='20px' height='10px'/>"+this.error_mes;
        }
        this.error_mes ="";
    },
    bind:function(){
        var that = this;
        this.password.addEventListener(
          "blur" ,function(){this.showmes()}.bind(that), false);
    },
    init:function(){
       this.bind();
    }

}

data.password.init();

//表单提交判断
(function formSubmit(id){
  if(id && typeof id === "string"){
     var formEle =getEle(id);
     formEle.onsubmit = function(){
         var issubmit = true;
         for(var i in data){
              for(var k in data[i].error_type){
                   if(data[i].error_type[k]()){
                      issubmit = false;
                      break;
                   }
              }
         }
        
         $.ajax({
            url:"__APP__/Form/handleForm",
            type: "post",
            data: $("#login").serialize(),
            success:function(data){
               if(data.info == "success"){
                  var autologin =  getEle("autologin");
                  if(autologin.checked){
                      localStorage.username=getEle("username").value;
                      localStorage.password=getEle("password").value;
                      // setCookie('username',getEle("username").value , 60*15);
                      // setCookie('password',getEle("password").value , 60*15);
                  }
                  window.location.href="__APP__/Index/index";
               }else{

                  if(data.trim()=="frozen")alert("账号被锁定");
                  else alert("用户名或密码出错");
               }
            },
            error:function(err){
                alert("出错");
            }
        })
        return false;
        return issubmit === true ? true:false;
     }

   }else{
    return false;
   }
   return false;
})("login");


//取得cookie
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