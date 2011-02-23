<?php
session_start();

  include "db_connect.php";
  $name = mysqli_real_escape_string($db, trim($_POST['username']));
  $pw = mysqli_real_escape_string($db, trim($_POST['pw']));

   $query = "select * from users WHERE username = '$name' AND password = SHA('$pw')";
   $result = mysqli_query($db, $query);
   if ($row = mysqli_fetch_array($result))
   {
   		$pass = $row['password'];
   		setcookie('pw',$pass,time()+60*60*24*30);
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
