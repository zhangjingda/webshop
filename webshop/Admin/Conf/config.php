<?php
$config = array(

	'URL_MODEL' => 1,
	'DB_HOST' => "localhost",
	'DB_TYPE' => "mysql",
	'DB_USER' => "zhang",
	'DB_PWD' => "zhang",
	'DB_NAME' => "webshop",
	"DB_PREFIX" =>"",
	'URL_HTML_SUFFIX'=>'shtml',
	'DEFAULT_FILTER'=>'htmlspecialchars,strip_tags',
	'FIlE_PATH' => 'E:/www/webshop/Admin/Tpl/Public',
	'TMPL_PARSE_STRING'=>array('__PUBLIC__'=>'/webshop/Admin/Tpl/Public'),
	"STATIC_RES" => "/webshop/Public"
);
return array_merge(include'./Config/config.php',$config);
?>