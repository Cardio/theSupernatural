<?php
session_start();

include ('db_connect.php');
$name = $_SESSION['username'];
$month = $_POST['month'];
$day = $_POST['day'];
$yr = $_POST['year'];
$date = $yr . '-' . $month . '-' . $day;
$city = mysqli_real_escape_string($db, trim($_POST['city']));
$state = $_POST['state'];
$exp = mysqli_real_escape_string($db, trim($_POST['exp']));
$ctype = $_POST['creature'];
$act = mysqli_real_escape_string($db, trim($_POST['action']));




$query="INSERT INTO sightings(name, date, city, state, experience, creature_type, action) VALUES ('$name','$date','$city','$state','$exp','$ctype','$act')";
//$query2="SELECT * FROM sigthings";

$result = mysqli_query($db, $query) or die("Error Querying Database");
   mysqli_close($db);
   
header('Location:list.php?submit=y');
exit;   
?>


