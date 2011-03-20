<?php
session_start();

include ('db_connect.php');
$name = mysqli_real_escape_string($db, trim($_POST['name']));
$description = mysqli_real_escape_string($db, trim($_POST['description']));
$rating = $_POST['rating'];

$query="INSERT INTO equipment(name, description, rating) VALUES ('$name','$description','$rating')";

$result = mysqli_query($db, $query) or die("Error Querying Database");
   mysqli_close($db);
   
header('Location:equipList.php?submit=y');
exit;   
?>