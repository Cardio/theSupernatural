<?php 
session_start();

include('db_connect.php');
$username = $_POST['username'];
$pw = $_POST['pw'];
$zip = $_POST['zip'];

$query= "INSERT INTO users (id, username, password, zipcode) VALUES(NULL, '$username', SHA('$pw'), '$zip')";
$result = mysqli_query($db, $query)
or die("Error Querying Database");

$_SESSION['username'] = $username;
$_SESSION['pw'] = $pw;

mysqli_close($db);

header( 'Location: index.php');
exit;

?>