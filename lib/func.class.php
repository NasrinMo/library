<?php

/**
 * 
 */
class Func
{
	
	static function dd($data , $data2 = "" , $data3 = ""){

		if($data != "" && $data2 != "" && $data3 != "" ){
			echo "<pre>";var_dump($data ,$data2 , $data3 );
		}elseif($data != "" && $data2 != ""){
			echo "<pre>";var_dump($data ,$data2  );
		}else{
			echo "<pre>";var_dump($data  );
		}
		
		die;
	}
}
