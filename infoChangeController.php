<?php

  session_start();
  include "db_connect.php";
  $zip=$_POST['zip'];
  $username=$_SESSION['username'];
  $query="UPDATE users SET zipcode='$zip' WHERE username='$username'";
  $result = mysqli_query($db, $query);
//<<<<<<< HEAD
  mysqli_close($db);  
  header( 'Location: index.php');
  exit;

//=======
  mysqli_close($db);
  
  header('Location: editAccount.php?msg=infoChange');
  exit;
//>>>>>>> 8780d4b58518c768ca989c24ab379c0503e4ea4a

?>