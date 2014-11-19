<?php 
/**
 *配置文件
 */

//数据库配置文件
$db = array(
		'dbhost' => '127.0.0.1',
		'dbuser' => 'root',
		'passwd' => '',
		'charset' => 'utf8',
		'dbname' => 'test',
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