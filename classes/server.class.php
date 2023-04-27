<?php
class server{
	
	//------------------------------ function ------------------------------//	
	function vars(){ foreach($_SERVER as $key => $value){ echo $key . ' :  ' . $value .'<br>'.PHP_EOL; } }	
	
	//------------------------------ function ------------------------------//	
	function active_sessions(){ foreach($_SESSION as $key => $value){ echo $key . ' :  ' . $value .'<br>'.PHP_EOL; } }	
	
	//------------------------------ function ------------------------------//	
	function cookies(){
		if(isset($_COOKIE['cookie'])) {
			foreach ($_COOKIE['cookie'] as $name => $value) {
				$name = htmlspecialchars($name);
				$value = htmlspecialchars($value);
				echo "$name : $value <br />\n";
			}//foreach
		}//if
	}//function
	
}//class


/*




	// (new server())->vars();
		echo '<hr>';

	setcookie("cookie[three]", "cookiethree");
	setcookie("cookie[two]", "cookietwo");
	setcookie("cookie[one]", "cookieone");

	 (new server())->cookies();
	echo '<hr>';

	session_start();
	$_SESSION["favcolor"] = "green";
	$_SESSION["favanimal"] = "cat";

	 (new server())->active_sessions();		
	echo '<hr>';

	$string = "This is only a test of ' different chars & % ";

	echo htmlspecialchars($string);
	echo '<hr>';

*/

?>
