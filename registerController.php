<?php 
session_start();

include('db_connect.php');
$username = mysqli_real_escape_string($db, trim($_POST['username']));
if($username == "") {
	header('Location: register.php?error=noName');
	exit;
}
$pw = mysqli_real_escape_string($db, trim($_POST['pw']));
$pw2 = mysqli_real_escape_string($db, trim($_POST['pw2']));
if($pw == "") {
	header('Location: register.php?error=noPass');
	exit;
}
   $query = "select * from users WHERE username = '$username' ";
   $result = mysqli_query($db, $query);
   if ($row = mysqli_fetch_array($result)) {
   	header('Location: register.php?error=nameTaken');
   	exit;
   }
   
if($pw == $pw2) {
$query2= "INSERT INTO users (id, username, password) VALUES(NULL, '$username', SHA('$pw'))";
$result2 = mysqli_query($db, $query2)
or die("Error Querying Database");

mysqli_close($db);

header( 'Location: login.php?msg=reg');
exit;

} else {
	header('Location: register.php?error=wrongPass');
	exit;
}
?>