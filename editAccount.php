<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>The Supernatural--Edit Your Account</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<?php 
include('header.php'); 

include('db_connect.php');

$query = "SELECT * FROM users WHERE username='$_SESSION[username]'";
  
$result = mysqli_query($db, $query)or die("Error Querying Database");

$row = mysqli_fetch_array($result);

$id=$_GET['id'];
$zip=$row['zipcode'];
$bio=$row['bio'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$pic=$row['pic'];

mysqli_close($db);

?>
<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
					<!-- CONTENT -->
<h3>Edit Account</h3>
<br/>
<p><b>Change Password</b></p>
<div class="error">
<?php
if($_GET['msg']=='passChange') {
	echo "<p>Password Successfully Changed!<p>";
}
?>
</div>
<form action="pwChangeController.php" method="post">
<p>New Password: <input type="password" name="pw1" /></p>
<p>Retype New Password: <input type="password" name="pw2" /></p>
<p><input type="submit" value="Change Password" /></p>
</form>
<br/>
<!--
<p><b>Change Profile Picture</b></p>
<p>Current Picture:</p>
<?php
if (isset($pic)){
?>
<p><img src="<?php echo $pic ?>" height="25%" width="25%" /></p>
<?php
}
else{
?>
<p><img src='http://localhost/groupProject/theSupernatural/profilePictures/default.jpg' height="25%" width="25%" /></p>
<?php
}
?>
<div class="error">
<?php
if($_GET['msg']=='picUploaded') {
	echo "<p>Profile Picture Successfully Changed!<p>";
}
if($_GET['msg']=='copyUnsuccessful') {
	echo "<p>Copy Unsuccessful. Please Try Again.<p>";
}
if($_GET['msg']=='size') {
	echo "<p>Size Limit Exceeded. Please Try Again.<p>";
}
if($_GET['msg']=='extension') {
	echo "<p>Incorrect Image Format. Please Try Again.<p>";
}
?>
</div>
<form enctype="multipart/form-data" action="picUploadController.php" method="post">
<p>Select a picture to upload: <input name="image" type="file" /><p>
<input name="Submit" type="submit" value="Change Picture" />
</form>
<br />
<br/>
-->
<p><b>Edit Other Settings</b></p>
<div class="error">
<?php
if($_GET['msg']=='infoChange') {
	echo "<p>Account Info Successfully Changed!<p>";
}
?>
</div>

<form action="infoChangeController.php?id='$id'" method="post">
<p>First Name: <input type="text" name="firstname" value="<?php echo $firstname ?>" /></p>
<p>Last Name: <input type="text" name="lastname" value="<?php echo $lastname ?>" /></p>
<p>Zip Code: <input type="text" name="zip" value="<?php echo $zip ?>"/></p>
<p>Bio: <input type="text" name="bio" value="<?php echo $bio ?>" /></p>
<p><input type="submit" value="Edit Account Info" /></p>
</form>
<br/>
<!-- END CONTENT -->
</div>
<?php
include('SIDEnFOOTER.html');
?>
</div>
</div>
</div>
</div>
</body>
</html>