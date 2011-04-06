<?php
session_start();

include ('db_connect.php');

if(isset($_SESSION['username'])){

$name = $_POST['name'];
$locale = $_POST['locale'];
$food = $_POST['food'];
$weakness = $_POST['weakness'];
$powers = $_POST['powers'];

$query="INSERT INTO creatureBio (name, food, locale, weakness, powers) VALUES ('$name', '$locale', '$food', '$weakness', '$powers')";
$result = mysqli_query($db, $query)or die("Error Querying Database");

mysqli_close($db);   
header('Location: creature.php');
exit;   

} else {
	
	header('Location: login.php');
	exit;
}
?>
  

