<?php
session_start();

include ('db_connect.php');

if(isset($_SESSION['username'])){
//This is where the picture stuff starts, so if it messes up then this is what you can get rid of
//define a maximum size for the uploaded images in Kb
define ("MAX_SIZE","1000"); 
//This function reads the extension of the file. It is used to determine if the file is an image by checking the extension.
function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i){
		return ""; 
	}
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

//This variable is used as a flag. The value is initialized with 0 (meaning no error found)  
//and it will be changed to 1 if an error occurs.  
//If the error occures the file will not be uploaded.
	$errors=0;
	//checks if form is submitted
	//if(isset($_POST['Submit'])){
	//reads the name of the file the user submitted for uploading
	$image=$_FILES['image']['name'];
 	//if it is not empty
 	if ($image){
 		//get the original name of the file from the clients machine
 		$filename = stripslashes($_FILES['image']['name']);
 		//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
 		//if it is not a known extension, we will suppose it is an error and will not upload the file,  
		//otherwise we will do more tests
 		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
			//print error message
 			header('Location: creature.php?msg=extension');
			exit;
 			$errors=1;
 		}
 		else{
			//get the size of the image in bytes
 			//$_FILES['image']['tmp_name'] is the temporary filename of the file in which the uploaded file was stored on the server
 			$size=filesize($_FILES['image']['tmp_name']);
			//compare the size with the maximum size we defined and print error if bigger
			if ($size > MAX_SIZE*1024){
				header('Location: creature.php?msg=size');
				exit;
				$errors=1;
			}
			//we will give an unique name, for example the time in unix time format
			$image_name=time().'.'.$extension;
			//the new name will be containing the full path where will be stored (images folder)
			$newname="creaturePictures/".$image_name;
			$pictureUrl="http://localhost/theSupernatural/".$newname;
			//we verify if the image has been uploaded, and print error instead
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			if (!$copied){
				header('Location: creature.php?msg=copyUnsuccessful');
				exit;
				$errors=1;
			}
		}
	}
//this is where picture stuff ends

$name = $_POST['name'];
$locale = $_POST['locale'];
$food = $_POST['food'];
$weakness = $_POST['weakness'];
$powers = $_POST['powers'];

$query="INSERT INTO creatureBio (name, food, locale, weakness, powers, pic) VALUES ('$name', '$food', '$locale', '$weakness', '$powers', '$pictureUrl')";
$result = mysqli_query($db, $query)or die("Error Querying Database");

mysqli_close($db);   
header('Location: creature.php');
exit;   

} else {
	
	header('Location: login.php');
	exit;
}
?>
  

