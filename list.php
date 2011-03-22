<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Supernatural Sightings</title>
<link rel="stylesheet" href="styles.css" type="text/css" />


</head>
<body>
<?php
   include('header.php');
?>


<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
				
					<!-- CONTENT -->
					<?php
					if($_GET['submit']=='y'){
					echo "<p>Your sighting has been submitted successfully!</p>";
					}
					?>
					<h3>Current Sightings</h3>
					
<form method="post" action="list.php">			
List by:<select name="listBy">
			<option value="Recent">Recent</option>
			<option value="City">City</option>
			<option value="State">State</option>
		</select>
<input type="submit" value="Submit" />		
</form>		
<br/>
<?php	
include ('db_connect.php');	
$listBy= $_POST['listBy'];
if($listBy=='Recent'){
$query = "SELECT * FROM sightings ORDER BY date DESC";
}	
if($listBy=='City'){
$query = "SELECT * FROM sightings ORDER BY city ASC";
}
else if($listBy=='State'){
$query = "SELECT * FROM sightings ORDER BY state ASC";
}
//else if($listBy=='Creature'){
//$query = "SELECT * FROM sightings ORDER BY creature_type ASC";
//}
else{	
//$query = "SELECT * FROM sightings ORDER BY id ASC";
$query = "SELECT * FROM sightings ORDER BY date DESC";
} 	
  
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
	echo "<tr><td>Experience:</td><td>";
	echo wordwrap($row['experience'] . "</td></tr>",50,"<br />\n",TRUE);
	echo "<tr><td>Actions:</td><td>";
	echo wordwrap($row['action'] . "</td></tr>",50,"<br />\n",TRUE);
	echo "</table>";
	echo"<hr/>";
    }
//echo "</table>";

mysqli_close($db);
	
?>	
						<center>
						<form method="post" action="report.php">
					    <input type="submit" value="Report A Sighting" />
					    </form>
						</center>
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
