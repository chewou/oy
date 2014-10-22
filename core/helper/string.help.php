<?php 
/**随机生成指定的长度的字符串
 *@param type:随机生成的字符串类型，1为纯数字，2为纯字母，3为数字自母混搭，默认值为1
 *@param len:生成的字符串的长度，默认值为4
 *return string
 */
	
function buildRandomStr($type=1, $len=4){
	
	if($type == 1){
		$str = implode('', range(0,9));
	}

	if($type == 2){
		$str = implode('', range('a','z')).implode('', range('A','Z'));
	}

	if($type == 3){
		$str = implode('', range(0,9)).implode('', range('a','z')).implode('', range('A','Z'));
	}	

	if(strlen($str) < $len){
		die("字符串长度不够");
	}else{
		$str = substr(str_shuffle($str),0,$len);	
	}
	
	return $str;
} 
