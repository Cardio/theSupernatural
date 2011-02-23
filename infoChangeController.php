<?php

  session_start();
  include "db_connect.php";
  $zip=$_POST['zip'];
  $username=$_SESSION['username'];
  $query="UPDATE users SET zipcode='$zip' WHERE username='$username'";
  $result = mysqli_query($db, $query);
  echo "How do I redirect?";
  echo "Your zip: $zip"; 
  echo "Your username: $username";
  mysqli_close($db);

?>