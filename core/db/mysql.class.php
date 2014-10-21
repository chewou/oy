<?php 
// mysql数据库操作实现类

class mysql{

	public function connect($config){
		$conn = mysql_connect($config['dbhost'],$config['dbuser'],$config['passwd']);
		mysql_select_db($config['dbname'],$conn);
		mysql_set_charset($config['charset'],$conn);
	}
	public function findAll($table){
		$sql = 'select * from '.$table;
		$res =  mysql_query($sql);

		return $res;
	}
}

 ?>