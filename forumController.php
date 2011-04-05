<?php
session_start();

include ('db_connect.php');

if(isset($_SESSION['username'])){

$name = $_SESSION['username'];
$month = $_POST['month'];
$day = $_POST['day'];
$yr = $_POST['year'];
$date = $yr . '-' . $month . '-' . $day;

$title = mysqli_real_escape_string($db, trim($_POST['title']));
$post = mysqli_real_escape_string($db, trim($_POST['post']));

$query4="SELECT * FROM users WHERE username='$name'";
$result4= mysqli_query($db, $query4) or die("Error Querying Database4");
$row=mysqli_fetch_array($result4); 
$authorid=$row['id']; 

$query="INSERT INTO blogposts (title, post, author_id, date_posted) VALUES ('$title', '$post', '$authorid', '$date')";
//$query2="SELECT * FROM sigthings";
$result = mysqli_query($db, $query) or die("Error Querying Database");
  
   
//$query1="SELECT * FROM creatureBio WHERE name='$ctype'" ;
//$result = mysqli_query($db, $query1) or die("Error Querying Database1"); 
//$row=mysqli_fetch_array($result); 
//$cid=$row['id'];   
   
   
//$query2="SELECT * FROM sightings WHERE date='$date' AND name='$name' AND city='$city' AND state='$state' AND experience='$exp' AND action='$act'";
//$result = mysqli_query($db, $query2) or die("Error Querying Database2");    
//$row=mysqli_fetch_array($result); 
//$sid=$row['id'];   

//$query3="INSERT INTO creatureToSight(sightingId, creatureId) VALUES ('$sid','$cid')";
//$result = mysqli_query($db, $query3) or die("Error Querying Database3");
   mysqli_close($db);
   
header('Location:blog.php?submit=y');
exit;   

} else {
	
	header('Location: login.php');
	exit;
}
?>


