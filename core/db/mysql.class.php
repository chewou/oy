<?php 
// mysql数据库操作实现类
// error_reporting(E_NOTICE);
class mysql{

	// 定义错误处理函数
	public function error($error){
		die("对不起,操作有误，错误原因是：".$error);
		// echo $error;
	}
	// 数据库连接函数
	public function connect($config){		
			$conn = mysql_connect($config['dbhost'],$config['dbuser'],$config['passwd']);
			mysql_select_db($config['dbname'],$conn);
			mysql_set_charset($config['charset'],$conn);

		
	}
	public function query($sql){
		if(!mysql_query($sql)){
			$errMessage = $sql .'&nbsp;'. mysql_error();
			$this->error($errMessage);
		}else{
			return mysql_query($sql);
		}
	}
	public function findAll($table){
		$sql = 'select * from '.$table;
		$res =  $this->query($sql);
		$list = array();		
		while($r = mysql_fetch_row($res,MYSQL_ASSOC)){
			$list[] = $r;
		}			
		return $list;
	}
	public function findOne($table){
		$sql = 'select * from '.$table;
		$res = $this->query($sql);
		return mysql_fetch_row($res,MYSQL_ASSOC);
	}
}

 ?>