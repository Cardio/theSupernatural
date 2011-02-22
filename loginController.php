<?php
session_start();

  include "db_connect.php";
  $name = $_POST['username'];
  $pw = $_POST['pw'];

   $query = "select * from users WHERE username = '$name' AND password = SHA('$pw')";
   $result = mysqli_query($db, $query);
   if ($row = mysqli_fetch_array($result))
   {
		setcookie('id',$row['id'],time()+60*60*24*30);
		mysqli_close($db);
   		header( 'Location: index.php');
   		exit;
   }
   else
    {
		mysqli_close($db);
    	header( 'Location: login.php?error=wrong');
    	exit;
    }

?>
