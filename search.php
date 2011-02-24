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


<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">



		
<?php
include('db_connect.php');

$name = $_POST['q'];	
$query="SELECT * FROM sightings WHERE name LIKE '%$name%' OR date LIKE '%$name%'
		OR city LIKE '%$name%' OR state LIKE '%$name%' OR creature_type LIKE '%$name%'";
//$query="SELECT * FROM sightings WHERE creature_type LIKE '%$name%'";

$result=mysqli_query($db, $query)
or die("Error Querying Database");	
	echo "<center><h3>Search for \"" . $name . "\"</h3></center><hr/>";
	echo "<table>";
while($row= mysqli_fetch_array($result)){
//$name=$row['name'];

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
    
//echo "<tr><td>'$name'</td></tr>\n";
}	
echo"</table>";
?>



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
