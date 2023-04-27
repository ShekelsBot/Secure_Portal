<?php
class file
{
	//------------------------------ function ------------------------------//
	function write($file, $str){
		$handle = fopen($file, "w");
		if(fwrite($handle, $str)){ return 1; }else{ return 0; }
		fclose($handle);
	}//function
	
	//------------------------------ function ------------------------------//
	function append($file, $str){
		$handle = fopen($file, "a");
		if(fwrite($handle, $str)){ return 1; }else{ return 0; }
		fclose($handle);
	}//function

	//------------------------------ function ------------------------------//
	function read($file){
		$out = NULL;
		$handle = fopen($file, "r");
		if($handle){ while(!feof($handle)){ $out = fgets($handle, 4096); } }//if
		fclose($handle);
		return $out;
	}//function
	
	//------------------------------ function ------------------------------//
	function timestamp($file){
		if(file_exists($file)){ return date ('Y-m-d H:i:s', filemtime($file)); }else{ return 0; }
	}//function

	//------------------------------ function ------------------------------//
	function fdate($file){
		if(file_exists($file)){ return date ('Y-m-d', filemtime($file)); }else{ return 0; }
	}//function
	
	//------------------------------ function ------------------------------//
	function ftime($file){
		if(file_exists($file)){ return date ('H:i:s', filemtime($file)); }else{ return 0; }
	}//function	
	
	//------------------------------ function ------------------------------//
	function exists($file){
		if(file_exists($file)){ return 1; }else{ return 0; }
	}//function	
	
	//------------------------------ function ------------------------------//
	function remote_file_exists($url){
		$header = array();
		$header = get_headers($url, 1);
		if(preg_match('/[200|OK]/', $header[0])){ return 1; }else{ return 0; }
	}//function	

	//------------------------------ function ------------------------------//
	function size($file){
		if(file_exists($file)){ return filesize($file); }else{ return 0; }//if
	}//function	

	//------------------------------ function ------------------------------//
	function fcopy($file, $newfile){
		if(!copy($file, $newfile)){ return 0; }else{ return file::sizeFormat(filesize($newfile)); }
	}//function	

	//------------------------------ function ------------------------------//
	function delete($file){
		if(file_exists($file)){ 
			if(!is_dir($file)){unlink($file); }else{ rmdir($file); }
		}else{ 
			return 0; 
		}//if
	}//function	

	//------------------------------ function ------------------------------//
	function make_dir($folder){
			if(!is_dir($folder)){
				if(mkdir($folder)){ return 1; }else{ return 0; }
			}else{	
				return 0;
			}//if
	}//function	

	//------------------------------ function ------------------------------//						
	function folderSize($dir){
		$count_size = 0;
		$count = 0;
		$dir_array = scandir($dir);
		  foreach($dir_array as $key=>$filename){
			if($filename!=".." && $filename!="."){
			   if(is_dir($dir."/".$filename)){
				  $new_foldersize = foldersize($dir."/".$filename);
				  $count_size = $count_size+ $new_foldersize;
				}else if(is_file($dir."/".$filename)){
				  $count_size = $count_size + filesize($dir."/".$filename);
				  $count++;
				}//if
		   }//if
		 }//foreach
		return file::sizeFormat($count_size);
	}//function	
							
	//------------------------------ function ------------------------------//						
	function sizeFormat($bytes){ 
		$kb = 1024;
		$mb = $kb * 1024;
		$gb = $mb * 1024;
		$tb = $gb * 1024;

		if (($bytes >= 0) && ($bytes < $kb)) {
		return $bytes . ' B';

		} elseif (($bytes >= $kb) && ($bytes < $mb)) {
		return ceil($bytes / $kb) . ' KB';

		} elseif (($bytes >= $mb) && ($bytes < $gb)) {
		return ceil($bytes / $mb) . ' MB';

		} elseif (($bytes >= $gb) && ($bytes < $tb)) {
		return ceil($bytes / $gb) . ' GB';

		} elseif ($bytes >= $tb) {
		return ceil($bytes / $tb) . ' TB';
		} else {
		return $bytes . ' B';
		}
	}//function		

	//------------------------------ function ------------------------------//
	function scanDirs($rootDir, $allData=array()){
		// set filenames invisible if you want
		$invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd", "index.php");
		// run through content of root directory
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			// filter all files not accessible
			$path = $rootDir.'/'.$content;
			if(!in_array($content, $invisibleFileNames)) {
				// if content is file & readable, add to array
				if(is_file($path) && is_readable($path)) {
				// save file name with path
				$allData[] = $path;
				// if content is a directory and readable, add path and name
				}elseif(is_dir($path) && is_readable($path)) {
				// recursive callback to open new directory
				$allData = self::scanDirs($path, $allData);
				}//if
			}//if
		}//foreach
		return $allData;
	}//function

	//------------------------------ function ------------------------------//
	function findone($rootDir, $allData=array(), $find){
		// set filenames invisible if you want
		$invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd");
		// run through content of root directory
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			// filter all files not accessible
			$path = $rootDir.'\\'.$content;
			if(!in_array($content, $invisibleFileNames)) {
				// if content is file & readable, add to array
				if(is_file($path) && is_readable($path)) {
					if(preg_match("/$find/i", $path))
					{ 
						// save file name with path
						$allData[] = $path;
					}
				// if content is a directory and readable, add path and name
				}elseif(is_dir($path) && is_readable($path)) {
				// recursive callback to open new directory
				$allData = self::findone($path, $allData, $find);
				}//if
			}//if
		}//foreach
		return $allData;
	}//function


	//------------------------------ function ------------------------------//
	function findall($rootDir, $allData=array(), $find){
		// set filenames invisible if you want
		$invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd");
		// run through content of root directory
		$dirContent = scandir($rootDir);
		foreach($dirContent as $key => $content) {
			// filter all files not accessible
			$path = $rootDir.'\\'.$content;
			if(!in_array($content, $invisibleFileNames)) {
				// if content is file & readable, add to array
				if(is_file($path) && is_readable($path)) {
					if(preg_match("/$find/i", $path))
					{ 
						// save file name with path
						$allData[] = $path;
					}
				// if content is a directory and readable, add path and name
				}elseif(is_dir($path) && is_readable($path)) {
				// recursive callback to open new directory
				$allData = self::findall($path, $allData, $find);
				}//if
			}//if
		}//foreach
		return $allData;
	}//function

					
					
}//class


	$file = 'Test.txt';
	$newfile = 'TestNew.txt';
	$folder = 'MyTest';
	$url = 'https://www.viseh.com/index.php';

	$str = 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.';


	echo '<h1>'.(new file())->write($file, $str).'</h1>';
	echo '<h1>'.(new file())->append($file, $str).'</h1>';	
	echo '<h1>'.(new file())->timestamp($file).'</h1>';	
	echo '<h1>'.(new file())->fdate($file).'</h1>';	
	echo '<h1>'.(new file())->exists($file).'</h1>';	
	echo '<h1>'.(new file())->remote_file_exists($url).'</h1>';	
	echo '<h1>'.(new file())->size($file).'</h1>';
	echo '<h1>'.(new file())->read($file).'</h1>';
	echo '<h1>'.(new file())->fcopy($file, $newfile).'</h1>';
	echo '<h1>'.(new file())->make_dir($folder).'</h1>';
	echo '<h1>'.(new file())->foldersize($folder).'</h1>';

	$files = (new file())->scanDirs('C:\\xampp\\htdocs\\CIS411\\classes', $allData=array());
	//foreach($files as $f) echo $f.'<br>';

	$find = 'tcpdf_config';
	$files = (new file())->findone('C:\\xampp\\htdocs\\CIS411\\classes', $allData=array(), $find);
	//foreach($files as $f) echo $f.'<br>';

	$files = (new file())->findall('C:\\xampp\\htdocs\\CIS411\\classes', $allData=array(), $find);
	foreach($files as $f) echo $f.'<br>';




?>