<?php 

class indexControl{


	public function index(){
		$data = array('qq'=>'2069410891');
		$d = M('test');
		$a = $d->test();		
		VIEW::display('welcome.php',$data);		
	}
}


 ?>