<?php
class gen{

	//------------------------------ function ------------------------------//		
	function timeid($length){
		$timeid = NULL;
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		for ($i = 0; $i < $length; $i++) {
			$timeid .= $chars[rand(0, strlen($chars) - 1)];
		}//for

		$timeStampData = microtime();
		list($msec, $sec) = explode(' ', $timeStampData);
		$msec = round($msec * 1000);
		return date('Ymd-His') . '-' . $msec . '-' . $timeid;
		
	}//function


	//------------------------------ function ------------------------------//		
	function rndstr($length){	
		$out = NULL;
		$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		for($i = 0; $i < $length; $i++){
			$out .= $chars[rand(0, strlen($chars)-1)];
		}//for
		return $out;	

	}//function

	//------------------------------ function ------------------------------//	
	function time_stamp(){ return date('Y-m-d H:i:s'); }	
	function date_stamp(){ return date('Y-m-d'); }
	
	
}//class 

	echo '<h1>'.(new gen())->time_stamp().'</h1>'; //2023-02-12 21:07:38
	echo '<hr>';
	echo '<h1>'.(new gen())->timeid(6).'</h1>'; //20230209-153257-430-XKSKLA
	echo '<hr>';
	echo '<h1>'.(new gen())->rndstr(24).'</h1>'; //I5Rdc2Wu5ZRGi9vAkmszDTj1

?>
