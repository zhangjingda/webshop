<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): $mod = ($i % 2 );++$i; echo ($result["proname"]); ?>
  <?php echo ($result["price"]); ?>
  <?php echo ($result["num"]); ?>
  <?php echo ($result['price']*$result['num']); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>