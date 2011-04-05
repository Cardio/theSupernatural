<?php
session_start();

if(isset($_SESSION['username'])){

include ('db_connect.php');
$name = mysqli_real_escape_string($db, trim($_POST['name']));

if($name == "") {
	header('Location:addEquip.php');
exit;  
}
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
 			header('Location: addEquip.php?msg=extension');
			exit;
 			$errors=1;
 		}
 		else{
			//get the size of the image in bytes
 			//$_FILES['image']['tmp_name'] is the temporary filename of the file in which the uploaded file was stored on the server
 			$size=filesize($_FILES['image']['tmp_name']);
			//compare the size with the maximum size we defined and print error if bigger
			if ($size > MAX_SIZE*1024){
				header('Location: addEquip.php?msg=size');
				exit;
				$errors=1;
			}
			//we will give an unique name, for example the time in unix time format
			$image_name=time().'.'.$extension;
			//the new name will be containing the full path where will be stored (images folder)
			$newname="equipmentPictures/".$image_name;
			$pictureUrl="http://localhost/theSupernatural/".$newname;
			//CHANGE QUERY SO IT ADDS PICTURE TO DATABASE
			//$query="UPDATE users SET pic='$queryname' WHERE id=$id";
			//$result=mysqli_query($db, $query);
			//mysqli_close($db);
			//we verify if the image has been uploaded, and print error instead
			$copied = copy($_FILES['image']['tmp_name'], $newname);
			if (!$copied){
				header('Location: addEquip.php?msg=copyUnsuccessful');
				exit;
				$errors=1;
			}
		}
	}
//If no errors registered, print the success message
//if(isset($_POST['Submit'])&&!$errors){
	//header('Location: editAccount.php?msg=picUploaded');
	//exit;
//}

//this is where picture stuff ends
$description = mysqli_real_escape_string($db, trim($_POST['description']));
$rating = $_POST['rating'];

$query="INSERT INTO equipment(name, description, rating, pic) VALUES ('$name','$description','$rating','$pictureUrl')";


$result = mysqli_query($db, $query) or die("Error Querying Database");

$query="SELECT * FROM equipment WHERE name = '$name'";
$result = mysqli_query($db, $query) or die("Error Querying Database2");

$row = mysqli_fetch_array($result);

$equipId = $row['id'];

$creature = $_POST['creature'];
if(empty($creature)) {
} else {
	$N = count($creature);
	for($i=0; $i < $N; $i++) {
		$query="SELECT * FROM creatureBio WHERE name = '$creature[$i]'";
		$result = mysqli_query($db, $query) or die("Error Querying Database3");
		$row = mysqli_fetch_array($result);
		$creatureId = $row['id'];
		
		$query="INSERT INTO equipToCreature(equipId, creatureId) VALUES ('$equipId','$creatureId')";
		$result = mysqli_query($db, $query) or die("Error Querying Database4");
	}
}
   mysqli_close($db);

header('Location:equipList.php?submit=y');
exit;  

} else {
	header('Location: login.php');
}
?>