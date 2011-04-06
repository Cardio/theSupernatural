<?php
session_start();

include ('db_connect.php');

if(isset($_SESSION['username'])){

$name = $_SESSION['username'];
$month = $_POST['month'];
$day = $_POST['day'];
$yr = $_POST['year'];
$date = $yr . '-' . $month . '-' . $day;
//$date = date("m", time());

//$title = mysqli_real_escape_string($db, trim($_POST['title']));
$post = mysqli_real_escape_string($db, trim($_POST['post']));
$threadid=$_POST['threadid'];
//echo $threadid;

$query4="SELECT * FROM users WHERE username='$name'";
$result4= mysqli_query($db, $query4) or die("Error Querying Database4");
$row=mysqli_fetch_array($result4); 
$authorid=$row['id']; 
//echo $authorid;

$query="INSERT INTO posts (post, author_id, date_posted) VALUES ('$post', '$authorid', '$date')";
$result = mysqli_query($db, $query) or die("Error Querying Database");
$query2="SELECT * FROM posts WHERE date_posted='$date' AND post='$post'";
$result = mysqli_query($db, $query2) or die("Error Querying Database2");    
$row=mysqli_fetch_array($result); 
$postid=$row['id'];
//echo $postid;    
$query3="INSERT INTO threadToPost(threadId, postId) VALUES ('$threadid','$postid')";
$result = mysqli_query($db, $query3) or die("Error Querying Database3");   

//$query1="SELECT * FROM creatureBio WHERE name='$ctype'" ;
//$result = mysqli_query($db, $query1) or die("Error Querying Database1"); 
//$row=mysqli_fetch_array($result); 
//$cid=$row['id'];   
   
mysqli_close($db);   
header('Location: forum.php?index='. $threadid);
exit;   

} else {
	
	header('Location: login.php');
	exit;
}
?>


