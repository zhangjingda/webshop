<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="__PUBLIC__/css/index.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo C('STATIC_RES');?>/bootstrap/css/bootstrap.min.css">
</head>
<body>
 <div id="header">
    <img src="/webshop/Public/images/logo.png">
    <h1>后台系统登录</h1>
 </div>

<div id="#app">
<div id="form-box">
<div class="row">
  <div class="container">
  <form method="post" action="__APP__/Admin/handleAdminLogin" 
  autocomplete="off" id="form1" name="form" onsubmit="return isFormRig()">
        <div class="input-group">
       <span class="input-group-addon" style="border:none;background-color: #fff">账号</span>
            <div class="col-md-4">
    <input type="text" class="form-control" placeholder="管理员账号(6-16位)" id="account"
    name="account">
            </div>
             <div class="help-block" id="account1"></div>
         </div>
        
         <div class="input-group">
         <span class="input-group-addon" 
         style="border:none;background-color: #fff">密码</span>
            <div class="col-md-4">
         <input type="password" class="form-control" placeholder="密码(6-16位)" id="password"
         name="password">
            </div>
            <div class="help-block" id="password1"></div>
        </div>

         <div class="form-group">
         <div class="col-md-2">
            <input type="submit" class="form-control btn btn-danger btn-block" 
            value="管理员登录">

            </div>

        </div>

  </form>

	</div></div>
</div>
</div>
<!-- <script src="<?php echo C('STATIC_RES');?>/js/jQuery-2.1.1.min.js"></script> -->
<!-- <script src="<?php echo C('STATIC_RES');?>/js/vue.min.js"></script> -->
<script type="text/javascript">

function getEle(id){return document.getElementById(id);}


function event(targetId , event , fun){

   var  node = getEle(targetId);
   if(window.addEventListener){
   	   node.addEventListener(event , fun , false);
   }else if(window.attachEvent){
   	   node.attachEvent("on"+event , fun);  
   }else{
   	   return alert("Bind event error!");
   }
}
function accountHandle(obj){

     var account1 = getEle("account1");
	 account1.innerHTML = "";
     if(obj.value == ""){
         account1.innerHTML = "<span style='color:#f00'>账号不能为空</span>"; 
         return false;
     }else if(!/[\d\w]{6,16}/.test(obj.value)){
          account1.innerHTML = "<span style='color:#f00'>账号(位数或格式)错误</span>";  
          return false;
     }
     return true;
}
function passwordHandle(obj){
	 var password1 = getEle("password1");
	 password1.innerHTML = "";
     if(obj.value == ""){
         password1.innerHTML = "<span style='color:#f00'>密码不能为空</span>"; 
         return false;
     }else if(!/[\d\w]{6,16}/.test(obj.value)){
          password1.innerHTML = "<span style='color:#f00'>密码(位数或格式)错误</span>";  
          return false;
     }
     return true;
}

//为两个表单注册失去焦点事件
window.event("account" , "blur" , function(e){accountHandle(this);});
window.event("password" , "blur" , function(e){passwordHandle(this);});

//点击提交按钮,表单是否提交的判断
function isFormRig(){

   if(accountHandle(getEle("account")) && passwordHandle(getEle("password"))){
   	  return true;
   }else return false;

}
   


</script>
</body>
</html>