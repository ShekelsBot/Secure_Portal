<?php
class arr{
	
	function view($arr){
		
			echo '<pre>',print_r($arr),'</pre>';
		
	}//function
	
	
}//class






	$arr = array(0, 1, 5, 8, 2, 4, 4, 3, 4, 5, 9, 8, 9, 3, 4, 5);

	$arr1 = (new arr())->view($arr);
		echo '<hr>';
		print_r($arr);
		echo '<hr>';
		var_dump($arr);
		
		
?>
