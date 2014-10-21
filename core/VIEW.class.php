<?php 
// 视图类
class VIEW{
	private static $view;

	public static function init($viewconf){
		self::$view = new Smarty;
		foreach ($viewconf as $k => $v) {
			self::$view->$k = $v;
		}
	}

	public static function display($template,$data = array()){
		foreach ($data as $key => $value) {
			self::$view->assign($key,$value);
		}
		self::$view->display($template);
	}
}



 ?>