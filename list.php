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
					<h3>Current Sightings</h3>
			

<?php	
include ('db_connect.php');		

$query = "SELECT * FROM sightings ORDER BY id ASC";
 	
  
$result = mysqli_query($db, $query)or die("Error Querying Database");
   
echo"<table>";
   while($row = mysqli_fetch_array($result))
    {
    echo"<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['city'] . "</td><td>" . $row['state'] . "</td><td>" . $row['experience'] . "</td><td>" . $row['creature_type'] . "</td><td>" . $row['action'] . "</td></tr>";
    }
echo "</table>";
mysqli_close($db);
	
?>	
	
						<form method="post" action="report.php">
					    <input type="submit" value="Report A Sighting" />
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
