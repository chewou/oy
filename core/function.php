<?php 
function C($control,$method){
	require_once('libs/Controller/'.$control.'Control.class.php');
	eval('$obj = new '.$control.'Control();$obj->'.$method.'();');	
}

function M($name){
	require_once('libs/Model/'.$name.'Model.class.php');
	eval('$obj = new '.$name.'Model;');
	return $obj;
} 

function V(){

}


 ?>