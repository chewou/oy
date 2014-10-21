<?php 
// 控制器方法，加载控制器类类文件，创建控制器对象
function C($control,$method){
	require_once('libs/Controller/'.$control.'Control.class.php');
	eval('$obj = new '.$control.'Control();$obj->'.$method.'();');	
}
// 初始化模型类，加载模型类文件，创建并返回模型类对象
function M($name){
	require_once('libs/Model/'.$name.'Model.class.php');
	eval('$obj = new '.$name.'Model;');
	return $obj;
} 
// 使用反斜线引用字符串
function daddslashes($str){
	return get_magic_quotes_gpc()?$str:addslashes($str);
}


 ?>