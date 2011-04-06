<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>theSupernatural</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

<?php
include('header.php');
?>

<div class="up">

<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
				
					<!-- CONTENT -->
					<h3>Welcome,
			<?php
			if(isset($_SESSION['username'])){				
				echo $_SESSION['username'];
			} else {
				echo "guest";
			}			
			?>!</h3>
					
					<div class="rightimg"><img src="images/zombie.jpg" width=150px /></div>

					<p>This site to is aid supernatural hunters.  We're here to connect you to your fellow hunters so you don't have to hunt each other!</p>
					<br/>
					<p>Create an account, report a sighting so other hunters can help you, or see what creatures are running amok that you can go take care of.  Happy hunting!</p>
					
		
<br/>
<hr/>
<br/>
					
				<center><iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/BvsMPOfblfg" frameborder="0" allowfullscreen></iframe></center>
				
<?php
include ('db_connect.php');	
echo "<hr /> <br/><h3> NewsFeed/Recent Sightings </h3>";
$query = "SELECT * FROM sightings ORDER BY date DESC LIMIT 5";
$result = mysqli_query($db, $query)or die("Error Querying Database");
//$row=mysqli_fetch_array($result); 
//$sid=$row['id'];  
echo"<br/><hr/>";
   while($row = mysqli_fetch_array($result))
    {
	$sid=$row['id'];
	$query="SELECT * FROM creatureToSight WHERE sightingId='$sid'";
	$result1= mysqli_query($db, $query)or die("Error Querying Database");
	$row2= mysqli_fetch_array($result1);
	$cid=$row2['creatureId'];
	$query2="SELECT * FROM creatureBio WHERE id='$cid'";
	$result2= mysqli_query($db, $query2)or die("Error Querying Database");
	$row3= mysqli_fetch_array($result2);
	
	echo"<table>";
    echo "<tr><td width=\"35%\">Name: " . $row['name'] . "</td><td width=\"65%\">Date:" . $row['date'] . "</td></tr>";
	echo "<tr><td>City: " . $row['city'] . "</td><td>State: " . $row['state'] . "</td></tr>";
	echo "<tr><td>Creature Type: </td><td>" . $row3['name'] . "</td></tr>";
	echo "<tr><td colspan=2><center><a href=sightingViewer.php?id=" . $row['id'] . ">More Information</a></center></td></tr>";
	echo "</table>";
	echo"<hr/>";
    }				
mysqli_close($db);					
?>					
					
					
					<!-- END CONTENT -->
					
				</div>
	
<?php
include('SIDEnFOOTER.html');
?>

			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
