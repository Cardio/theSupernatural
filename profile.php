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
include('header.php');
?>
<?php
include ('db_connect.php');
$id=mysqli_real_escape_string($db, trim($_GET['id']));
$query="SELECT * FROM users WHERE id= '$id'";
$result=mysqli_query($db, $query);
$row=mysqli_fetch_array($result);
$zip=$row['zipcode'];
$bio=$row['bio'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$username=$row['username'];
$pic=$row['pic'];
?>
<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
					<!-- CONTENT -->
<h3><?php echo $username ?>'s Profile</h3>
<br/>
<?php
if (isset($pic)){
?>
<p><img src="<?php echo $pic ?>" /></p>

<?php
}
else{
?>
<p><img src='http://localhost/theSupernatural/profilePictures/default.jpg' height="25%" width="25%" /></p>

<?php
}
?>
<!--
<div class="leftimg"><img style="border:1px solid black;" src="images/bluemonster.png" width=120px height=120px /></div>
-->
<p>First Name: <?php echo $firstname; ?></p>
<p>Last Name: <?php echo $lastname; ?></p>
<p>Zip Code: <?php echo $zip; ?></p>
<p>Bio: <?php echo $bio; ?> </p>
<br/> <br/>
<p>Recent Sightings: <br/>
<?php 
	$thename=$row['username'];
	$query2="SELECT * FROM sightings WHERE name='$thename'";
	$result2= mysqli_query($db, $query2)or die("Error Querying Database5");
	//$row2= mysqli_fetch_array($result2);
	while($row2 = mysqli_fetch_array($result2)) {
			//echo "<td>";
			echo $row2['date'];
			echo ": ";
			$sid=$row2['id'];
			$query3 = "SELECT creatureBio.name FROM creatureToSight INNER JOIN creatureBio ON creatureToSight.creatureId=creatureBio.id WHERE creatureToSight.sightingId='$sid'";
			$result3= mysqli_query($db, $query3)or die("Error Querying Database5");
			$row3= mysqli_fetch_array($result3);
			echo $row3['name'];
			echo "<br />";
		}  
?> 
</p>
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