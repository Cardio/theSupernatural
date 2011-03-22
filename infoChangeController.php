<?php

  session_start();
  include "db_connect.php";
  $zip=mysqli_real_escape_string($db, trim($_POST['zip']));
  $username=$_SESSION['username'];
  $id=mysqli_real_escape_string($db, trim($_GET['id']));
  $firstname=mysqli_real_escape_string($db, trim($_POST['firstname']));
  $lastname=mysqli_real_escape_string($db, trim($_POST['lastname']));
  $bio=mysqli_real_escape_string($db, trim($_POST['bio']));
  $query="UPDATE users SET zipcode='$zip' WHERE username='$username'";
  $result = mysqli_query($db, $query)or die("Error Querying Database 1");
	
	$query2="UPDATE users SET firstname='$firstname' WHERE username='$username'";
	$result2= mysqli_query($db, $query2)or die("Error Querying Database 2");
	$query3="UPDATE users SET lastname='$lastname' WHERE username='$username'";
	$result3= mysqli_query($db, $query3)or die("Error Querying Database 3");
	$query4="UPDATE users SET bio='$bio' WHERE username='$username'";
	$result4= mysqli_query($db, $query4)or die("Error Querying Database 4");

  mysqli_close($db);
  //header('Location: profile.php?id=$_GET['id']');
  header('Location: editAccount.php?msg=infoChange');
  exit;
?>