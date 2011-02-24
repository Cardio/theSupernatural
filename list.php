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
			

<?php	
include ('db_connect.php');		

$query = "SELECT * FROM sightings ORDER BY id ASC";
 	
  
$result = mysqli_query($db, $query)or die("Error Querying Database");
   
echo"<br/><hr/>";
   while($row = mysqli_fetch_array($result))
    {
	echo"<table>";
    echo "<tr><td width=\"35%\">Name: " . $row['name'] . "</td><td width=\"65%\">Date:" . $row['date'] . "</td></tr>";
	echo "<tr><td>City:" . $row['city'] . "</td><td>State:" . $row['state'] . "</td></tr>";
	echo "<tr><td>Creature Type:" . $row['creature_type'] . "</td></tr>";
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
