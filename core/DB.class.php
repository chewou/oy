<?php 
/**
 *数据库类
 */

class DB{
	public static $db;
	public static function init($config){
		self::$db = new $config['dbtype'];
		self::$db->connect($config);		
	} 

	public static function findAll($table){
		return self::$db->findAll($table);
	}
	public static function findOne($table){
		return self::$db->findOne($table);
	}
}

 ?>