<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

	
<?php /*
	//---------------------------------- file vars ----------------------------------//
	if(empty($_FILES["fileToUpload"]["name"]))		$_FILES["fileToUpload"]["name"] = 0;
	if(empty($_FILES["fileToUpload"]["type"]))		$_FILES["fileToUpload"]["type"] = 0;
	if(empty($_FILES["fileToUpload"]["size"])) 		$_FILES["fileToUpload"]["size"] = 0;	
	if(empty($_FILES["fileToUpload"]["tmp_name"]))	$_FILES["fileToUpload"]["tmp_name"] = 0;
	if(empty($_FILES["fileToUpload"]["error"]))		$_FILES["fileToUpload"]["error"] = 4;	

	echo '<hr>';
	echo '<strong>Name</strong> : '.$_FILES["fileToUpload"]["name"].'<br>';
	echo '<strong>Type</strong> : '.$_FILES["fileToUpload"]["type"].'<br>';
	echo '<strong>Tmp Name</strong> : '.$_FILES["fileToUpload"]["tmp_name"].'<br>';
	echo '<strong>Size</strong> : '.$_FILES["fileToUpload"]["size"].'<br>';
	echo '<strong>Error</strong> : '.$_FILES["fileToUpload"]["error"].'<br />'; 
	echo '</hr>';	
	
	$target_dir = 'C:\\xampp\\htdocs\\CIS411\\uploads\\';
	
		//---------------------------------- upload file ----------------------------------//
		if($_FILES["fileToUpload"]["size"] > 0 ) {
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["Action"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					//echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				//echo "Sorry, file already exists.";
				//$uploadOk = 0;
				unlink($target_file);
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 30000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" && $imageFileType != "pdf"  && $imageFileType != "txt"  ) {
				echo "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}

			}
		}//if
			
	
	
	
	
?>
	
</body>
</html>