<?php
class xml{

	//------------------------------ function ------------------------------//
	function readurl($url, $xpath){
		
		$xml = simplexml_load_file($url) or die("Something went wrong!");
		return $xml->xpath($xpath);	
		
	}//function
	
}//class
/*
;
	$url = "https://www.fda.gov/about-fda/contact-fda/stay-informed/rss-feeds/food-safety-recalls/rss.xml";
	$xpath = "/rss/channel/item";
	$arr = (new xml())->readurl($url, $xpath);

	foreach($arr as $data){
		echo '<div class=article>';
		echo '<div style=width:100%><a style="text-decoration:none;"href=' . $data->link . '><h2>' . $data->title . '</h2></a></div>';
		echo $data->description;
		echo "<br></div>";
	}


*/







?>
