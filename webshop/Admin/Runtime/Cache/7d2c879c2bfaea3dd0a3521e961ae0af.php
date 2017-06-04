<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <style type="text/css" media="screen">

     .page{
         
     }
     .page a{
     	color: #000;
     	padding: 0px 10px;
     	text-decoration: none;
     	border: 1px solid #ccc;
     	display: inline-block;
     }
     .page a:hover{
     	background-color: rgba(0,255,0,0.4);

     }
     .current{
     	background-color: #0f0;
     	color: #000;
     	padding: 0px 10px;
     	text-decoration: none;
     	border: 1px solid #ccc;
     	display: inline-block;

     }
    	
    </style>
    <body>

    <table cellpadding='3' cellspacing='5'>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><td ><?php echo ($vo["phone"]); ?> </td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr><td></td></tr>
   </table>

   <div class="result page"><?php echo ($page); ?></div>


    </body>
</html>