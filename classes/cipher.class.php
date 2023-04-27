<?php
class cipher{

	//------------------------------ function ------------------------------//
	function enc64($str){
		if(!empty($str)){ return base64_encode($str); }else{ return 0; }
	}//function

	//------------------------------ function ------------------------------//
	function dec64($str){
		if(!empty($str)){ return base64_decode($str); }else{ return 0; }
	}//function
	
	
	//------------------------------ function ------------------------------//
	function hash($str){
		return password_hash($str, PASSWORD_DEFAULT);
	}

	//------------------------------ function ------------------------------//
	function hash_verify($str, $hash){
		if(password_verify($str, $hash)){ return 1; }else{ return 0; }
	}//function	

}//class

	//$pass = '123456';

	//echo '<h1>'.(new cipher())->enc64($pass).'</h1>';

	//echo '<h1>'.(new cipher())->dec64((new cipher())->enc64($pass)).'</h1>';

	//echo '<h1>'.(new cipher())->hash($pass).'</h1>';

	//echo '<h1>'.(new cipher())->hash_verify($pass, (new cipher())->hash($pass)).'</h1>';

?>