<?php 
session_start();

include('db_connect.php');
$username = $_POST['username'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];



if($pw == $pw2) {
$query= "INSERT INTO users (id, username, password) VALUES(NULL, '$username', SHA('$pw'))";
$result = mysqli_query($db, $query)
or die("Error Querying Database");

$_SESSION['username'] = $username;
$_SESSION['pw'] = $pw;

mysqli_close($db);

header( 'Location: index.php');
exit;

} else {
	header('Location: register.php?error=wrongPass');
}
?>