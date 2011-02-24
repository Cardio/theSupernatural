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

$zip=$row['zipcode'];

mysqli_close($db);

?>
<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
					<!-- CONTENT -->
<h3>Edit Account</h3>
<p><b>Change Password</b></p>
<form action="pwChangeController.php" method="post">
<p>New Password: <input type="password" name="pw1" /></p>
<p>Retype New Password: <input type="password" name="pw2" /></p>
<p><input type="submit" value="Change Password" /></p>
</form>
<br/>
<p><b>Edit Other Settings</b></p>
<form action="infoChangeController.php" method="post">
<p>Your current zip code is: <?php echo $zip ?></p>
<p>Change your zip code: <input type="text" name="zip" /></p>
<p>Other stuff will come later.</p>
<p><input type="submit" value="Edit Account Info" /></p>
</form>
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