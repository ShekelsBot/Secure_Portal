<?php
class explodee{
	
	//------------------------------ function ------------------------------//	
	function str($num, $replace, $subject){
		$arr = Array();
		$arr = explode($replace, $subject);	
		if(empty($arr[$num])) $arr[$num] = NULL; 
		return  $arr[$num]; 		
	}//function
	
}//class



//$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";

//echo (new explodee())->str(0, " ", $pizza);
/*
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2
*/


?>
