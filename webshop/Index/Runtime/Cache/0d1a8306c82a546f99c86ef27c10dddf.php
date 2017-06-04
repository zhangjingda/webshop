<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>烈日电子商务有限公司</title>
	<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/css/common.min.css">
	<link rel="stylesheet" 
	href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="__PUBLIC__/css/enroll.css">
    <link rel="stylesheet" href="__PUBLIC__/css/index.css">
	   <style>
         .help-block{
        margin-bottom: -18px;
        color: #f00;
        min-height: 14px;
        padding-left: 80px;
    }

    .shiftPad{
        margin-left: -15px;
    }
    .shiftPad1{
        margin-left: -25px;
    }

    .setLogo{
        position: absolute;
        top: 60px;

    }
    h1{
        width: 200px;
        margin: 30px auto;
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

<!-- <div style="height: 60px;">注册界面</div> -->
<h1>欢迎注册</h1>
<!-- <div class="btn">
<a href="__APP__/Index/index"><img src="__PUBLIC__/images/ret.png" width="40px" height="20px" />
</a></div> -->
<!-- <div id="box"> -->

<!-- 头部logo部分 -->

<a href="#" class="setLogo"><img src="<?php echo C('STATIC_RES');?>/images/logo.png"></a>
   

<div class="center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="__APP__/Form/handleEnrollOk" autocomplete="off" class="form-inline" id="issuccess" onsubmit="return vm.checkagree() ">
                <!-- vm.checkagree() -->

                    <div class="form-group">
                        <label class="marginRight20">电话号码</label>
                        <input type="text" id="tel" v-model="tel" 
                        v-on:blur="checkTel"
                        class="form-control"placeholder="请输入你的电话号码" name="phone"> 
                         <div class="help-block" id="tel1">{{ tel1 }}</div>
                          <div class="help-block" id="tel2"></div>

                    </div>

                    <div></div>
                     <div class="form-group" style="margin-right:110px;">
                         <label class="marginRight20">验证码</label> 
	                     <div class="input-group" >
				            <input type="text" id="checkcode" v-model="checkcode" v-on:blur="tcheckcode"
                            class="form-control" placeholder="请输入验证码" name="checkcode">
				            <span class="input-group-addon" style="cursor: pointer">获取验证码</span>
				        </div>
                         <div class="help-block shiftPad" id="checkcode1">{{checkcode1}}</div>
                    </div>
                     <div></div>
                    <div class="form-group">
                        <label  class="marginRight20">用户名</label>
                        <input type="text" name="username" class="form-control" placeholder="请输入用户名(10个字以内)" id="username" v-model="username" v-on:blur="checkusername">
                         <div class="help-block shiftPad" id="username1">{{username1}}</div>
                         <div class="help-block shiftPad" id="username2"></div>
                    </div>
                     <div></div>
                    <div class="form-group">
                        <label  class="marginRight20">密码</label>
                        <input type="password" id="pwd" v-model="pwd" v-on:blur="checkpwd"
                        class="form-control" placeholder="请输入密码(8-16位)" name="password">
                         <div class="help-block shiftPad1" id="pwd1">{{pwd1}}</div>
                    </div>
                    <div></div>
                     <div class="form-group">
                        <label  class="marginRight20">确认密码</label>
                        <input type="password" id="cpwd" v-on:blur="checkcpwd"
                        class="form-control" placeholder="请重复输入一次密码(8-16位)" v-model="cpwd">
                        <div class="help-block" id="cpwd1">{{cpwd1}}</div>
                    </div>
                    <div></div>
                     <div class="checkbox"><label>
                        <input type="checkbox" v-model="agree" name="item">同意<a href=""><烈日注册条例></a>
                        <a href=""><隐私条例></a></label>
                    </div>

                    <div></div>
                     <div class="form-group">
                       <input type="submit" value="立即注册"
                       class="btn btn-danger btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<footer>
	欢迎访问烈日电子商务网站<br/>
	<a href="">联系我们</a><a href="">改善建议</a><br/>
	Copyright © 2017-2020  烈日lieri.com 版权所有
</footer>


</div> 
<script src="<?php echo C('STATIC_RES');?>/js/jQuery-2.1.1.min.js"></script>
<script src="<?php echo C('STATIC_RES');?>/js/vue.min.js"></script>
<script type="text/javascript">
   var vm = new Vue({
     el: "#issuccess",
     data:{  
         tel: "",
         tel1: "",
         checkcode: "",
         checkcode1: "",
         username: "",
         username1: '',
         pwd: "",
         pwd1: "",
         cpwd: "",
         cpwd1: "",
         agree: false
     },
     methods:{
    
        checkTel:function(){
            if(this.tel == ""){
                this.tel1 ="电话号码不能为空";
                return false;
            }else if(!/^\d{11}$/.test(this.tel)){
                this.tel1 ="电话号码格式错误";
                return false;
            }else{
                this.tel1 ="";
                return true;
            }
        },
        tcheckcode:function(){
            if(this.checkcode == ""){
                this.checkcode1 ="验证码不能为空";
                return false;
            }else if(!/^\d{4}$/.test(this.checkcode)){
                this.checkcode1 ="验证码格式或位数错误";
                return false;
            }else{
               this.checkcode1 =""; 
               return true;
            }
        },
        checkusername:function(){
            if(this.username == ""){
                this.username1 ="用户名不能为空";
                return false;
            }else if(!/^[\w\d_]{6,16}$/.test(this.username)){
                this.username1 ="用户名格式或位数错误";
                return false;
            }else{
               this.username1 ="";
               return true;  
            }
             
        },
        checkpwd:function(){
           if(this.pwd == ""){
                this.pwd1 ="密码不能为空";
                return false;
            }else if(!/^[\w\d_]{6,16}$/.test(this.pwd)){
                this.pwd1 ="密码格式或位数错误";
                return false;
            }else{
               this.pwd1 ="";
               return true; 
            }  
        },
         checkcpwd:function(){
           if(this.cpwd == ""){
                this.cpwd1 ="密码不能为空";
                return false;
            }else if(this.cpwd !== this.pwd){
                this.cpwd1 ="重置密码和原密码不同，重新输入";
                this.cpwd ="";
                return false;
            }else{
               this.cpwd1 =""; 
               return true;
            }  
        },
        checkagree: function(){
           
           
            var meth = [
                this.checkTel,
                this.tcheckcode,
                this.checkusername,
                this.checkpwd,
                this.checkcpwd
                
            ];
            var temp = true;
            for(var i=0;i<meth.length;i++){
                if(!meth[i]()){temp = false;break;}
            }
            if(temp)if(!this.agree)
                alert("请先同意用户条例,勾选即默认你同意勾选框右侧的两款协议");
            return (temp && this.agree);
            
        }


     }


   })

 

    document.getElementById("username").onblur = function(e){
        document.getElementById("username2").innerHTML = "";
        $.ajax({
                    type: "post",
                    url: "__APP__/Form/isUserNameEnroll",
                    data: "username="+document.getElementById("username").value,
                    success:function(data){
                      
                       if(data == 'error'){
                           document.getElementById("username2").innerHTML = 
                       "<span style='color:#f00;'>该用户名已经被注册,请另外选择一个</span?";
                           document.getElementById("username").value ="";
                       }
                      
                    },
                    error:function(err){
                       alert("用户名验证失败!");
                    }
            })
    }  

        document.getElementById("tel").onblur = function(e){
           document.getElementById("tel2").innerHTML = "";
           $.ajax({
                    type: "post",
                    url: "__APP__/Form/isUserNameEnroll",
                    data: "phone="+document.getElementById("tel").value,
                    success:function(data){
                      
                       if(data == 'error'){
                          document.getElementById("tel2").innerHTML = 
                             "<span style='color:#f00;'>该电话号码已经被注册</span?";
                          if(confirm("该电话号码已经被注册,立即前往登录?"))
                              window.location.href="__APP__/Form/handleLogin";
                          document.getElementById("tel").value="";

                       }
                     
                    },
                    error:function(err){
                      alert("电话号码验证失败!");
                    }
            })
    } 


</script>
</body>
</html>