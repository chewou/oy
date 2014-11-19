<?php 
/**
 *数据库类
 */

class DB{
	public static $db;

	public static function init($config){
		$dsn = $config['dbtype'].':dbname='.$config['dbname'].';host='.$config['dbhost'];	
		self::$db = new pdodb();		
		self::$db->connect($dsn,$config['dbuser'],$config['passwd']);		
		// $db->insert('stu',array('sname'=>'ouyang','sex'=>1,'qq'=>11134617));
		// $data = self::$db->select('test');			
		// var_dump($data);
		// $a = self::$db->query('select * from pdo where id = 46');
		// foreach ($a as $value) {
		// 	var_dump($value);
		// }
		// var_dump($data);
	} 

	public static function findAll($table){
		// return self::$db->findAll($table);
	}
	public static function findOne($table){
		// return self::$db->findOne($table);
	}
	public static function insert($table,$arr){
		return self::$db->insert($table,$arr);
	}
	public static function select($table,$column='*',$where='',$condition=''){
		return self::$db->select($table,$column,$where,$condition);
	}
	public static function query($sql){
		return self::$db->query($sql);
	}

}

 ?>