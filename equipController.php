<?php
session_start();

if(isset($_SESSION['username'])){

include ('db_connect.php');
$name = mysqli_real_escape_string($db, trim($_POST['name']));

if($name == "") {
	header('Location:addEquip.php');
exit;  
}

$description = mysqli_real_escape_string($db, trim($_POST['description']));
$rating = $_POST['rating'];

$query="INSERT INTO equipment(name, description, rating) VALUES ('$name','$description','$rating')";

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