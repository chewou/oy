<?php 
// 程序入口文件
$path = dirname(__FILE__);
require_once($path.'/include.list.php');
foreach ($lists as $list) {
	require_once($path.$list);
}

class run{
	private static $control;
	private static $method;
	private static $db;
	private static $view;
	private static function initDb(){		
		DB::init(self::$db);
	}
	private static function initView(){
		VIEW::init(self::$view);
	}
	private static function initControl(){
		self::$control = isset($_GET['control'])?$_GET['control']:'index';
	}
	private static function initMethod(){
		self::$method = isset($_GET['method'])?$_GET['method']:'index';
	}

	public static function start($db,$viewconf){
		self::$db = $db;
		self::$view = $viewconf;
		self::initView();
		self::initDb();
		self::initControl();
		self::initMethod();
		C(self::$control,self::$method);
	}
}






 ?>