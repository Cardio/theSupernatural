<?php
session_start();

  include "db_connect.php";
  $name = $_POST['username'];
  $pw = $_POST['pw'];

   $query = "select * from users WHERE username = '$name' AND password = SHA('$pw')";
   $result = mysqli_query($db, $query);
   if ($row = mysqli_fetch_array($result))
   {
   		$_SESSION['zip'] = $row['zipcode'];
   		$_SESSION ['username'] = $name;
   		$_SESSION ['pw'] = $pw;
   		header( 'Location: index.php');
   		exit;
   }
   else
    {
    	header( 'Location: login.php?error=wrong');
    	exit;
    }

?>
