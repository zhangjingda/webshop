<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>这是分页显示测试程序</title>
    <style type="text/css">
      #pagebox{
      	width: 483px;
      	 height: 30px;
      }
      .page,.page1,.page2{
      	height:30px;
      	min-width:40px;
      	line-height: 30px;
      	text-align: center;
      	border:none;
      	outline: none;
      	margin-left:5px;


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

    
    </style>
</head>

<body>


<div id="wrapper">
 
  <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i; echo ($result["username"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>


</div>
<?php echo ($pagestr); ?>



<script>
(function bindEvent(){
	var len = document.querySelectorAll(".page").length;
	for(var i=0;i<len;i++){
		(function(i){
            document.querySelectorAll(".page")[i].onclick = function(e){
                var text = parseInt(e.target.textContent.trim());
                var ss = location.href.lastIndexOf("\\");
                ss = window.location.href.substr(ss);
                window.location.href = "http://localhost/webshop/Index/test/page/"+text;
            }
		})(i)
	}

    var len = document.querySelectorAll(".page1").length;
    for(var i=0;i<len;i++){
		(function(i){
            document.querySelectorAll(".page1")[i].onclick = function(e){
                var ss = "<?php echo ($page); ?>"
                if(ss=="")ss="1";
                ss = parseInt(ss.trim());
                if(i==0){
                    window.location.href = "http://localhost/webshop/Index/test/page/"+(--ss);      
                }else if(i==1){
                	window.location.href = "http://localhost/webshop/Index/test/page/"+(++ss);
                } 
            }
		})(i)
	}


})()


</script>
</body>
</html>