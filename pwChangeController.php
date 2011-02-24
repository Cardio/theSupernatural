<?php

   session_start();
   include "db_connect.php";
   $pw1=$_POST['pw1'];
   $pw2=$_POST['pw2'];
   $username=$_SESSION['username'];
   if ($pw1==$pw2){
   	$query="UPDATE users SET password= SHA('$pw1') WHERE username='$username'";
   	$result = mysqli_query($db, $query);

	mysqli_close($db);	
	header( 'Location: editAccount.php?msg=passChange');
   	exit;
   }
   else{
	mysqli_close($db);
	header( 'Location: editAccount.php?msg=passWrong');
   	exit;
   }

   mysqli_close($db);
  header('Location: editAccount.php?msg=passChange');
  exit;

?>