<?php 
/**
 *配置文件
 */

//数据库配置文件
$db = array(
		'dbhost' => 'localhost',
		'dbuser' => 'root',
		'passwd' => '',
		'charset' => 'utf8',
		'dbname' => 'jianli',
		'dbtype' => 'mysql'
	);

// 视图配置文件
$viewconf = array(
		
		'left_delimiter'  => '{',  
		'right_delimiter' => '}', 
		'template_dir'    => 'libs/View', 
		'compile_dir'     => 'data/template_c'
	)

 ?>