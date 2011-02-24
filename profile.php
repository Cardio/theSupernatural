<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>The Supernatural--Viewing A User Profile</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<?php 

include ('db_connect.php');
include('header.php'); 
$id=$_GET['id'];
$query="SELECT * FROM users WHERE id='$id'";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);
$zip=$row['zipcode'];
$username=$row['username'];
mysqli_close($db);


?>
<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
					<!-- CONTENT -->
<h3><?php echo "$username"; ?>'s Profile</h3>
<br/>
<p>Zip Code: <?php echo "$zip"; ?></p>
<p>Bio: //put a short bio here, but add it to the table first</p>
<p>More info, maybe a picture, the type of things they hunt, reports, etc.</p>

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