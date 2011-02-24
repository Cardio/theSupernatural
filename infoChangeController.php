<?php

  session_start();
  include "db_connect.php";
  $zip=$_POST['zip'];
  $username=$_SESSION['username'];
  $query="UPDATE users SET zipcode='$zip' WHERE username='$username'";
  $result = mysqli_query($db, $query);
  mysqli_close($db);
  
  header('Location: editAccount.php?msg=infoChange');
  exit;

?>