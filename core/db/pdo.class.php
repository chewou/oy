<?php 

class pdodb{
	public static $pdo;	
	/*
	 *数据库连接
	 */
	public function connect($dsn,$user,$passwd,$charset){
		try{			
			self::$pdo = new PDO($dsn,$user,$passwd);
			$sql = "set charset $charset";
			self::$pdo->query($sql);						
		}catch(PDOException $e){
			echo 'failed!'.$e->getMessage();
			exit;
		}
		
	}
	/*
	 *数据库插入函数
	 *@param，table为插入的表
	 *@param，arr为要出入的内容，注意为关联数组
	 *return 成功返回插入的最后一个数据的id号，失败则退出
	 */
	public function insert($table,$arr){
		if(is_array($arr)){	
			$count = count($arr);
			$arr_key = array_keys($arr);
			$keys = implode(',', $arr_key);
			$values = implode(',:', $arr_key);
			$values = ':'.$values;
			$sql = "insert into {$table} ({$keys}) values({$values})";
			// echo $sql;
			try{
				$data = self::$pdo->prepare($sql);
				$data->execute($arr);			
				return self::$pdo->lastInsertId();				
			}
			catch(PDOException $e){
				echo 'failed:'.$e->getMessage();
			}
		}else{
			echo 'please input an array;'; 
			exit;
		}
	}

	/*
	 *数据库查询函数
	 *@param table,查询的表名称
	 *@param column,查询的列名称，字符串形式，多个则以逗号分隔开
	 *@param where,判断的条件名称,字符
	 *@param condition,where判断的条件值，字符
	 *使用：如果指定了where，则必须指定condition
	 *return 数组
	 */
	public function select($table,$column='*',$where='',$condition=''){
		if($where == ''){
			$sql = "select {$column} from {$table}";
		}else{
			$sql = "select {$column} from {$table} where {$where} = :condition";
		}
		// echo $sql;
		try{
			$prepare = self::$pdo->prepare($sql);
			if ($where !== ''){
				$prepare->bindValue(':condition',$condition);
			}
			$prepare->execute();
			$data = $prepare->fetch(PDO::FETCH_ASSOC);
			if(!$data){
				throw new PDOException("获取数据失败", 1);				
			}
			return $data;
		}catch(PDOException $e){			
			echo "执行{$sql}语句失败，请检查错误，".$e->getMessage();
			return $data;
		}				
	}

	/*
	 *数据库执行函数
	 */
	public function query($sql){		
		$data = self::$pdo->query($sql);
		return $data;
	}


}


 ?>