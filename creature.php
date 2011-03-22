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
					<h3>Creature Bio</h3>
					
		<form method="post" action="creature.php">
		<table>
		<tr><td>
		<select name="creature">
			<option value="Zombie">Zombie</option>
			<option value="Unicorn">Unicorn</option>
			<option value="Leprechaun">Leprechaun</option>
			<option value="Panda">Panda</option>
			<option value="Demon">Demon</option>
			<option value="Ghost">Ghost</option>
			<option value="Medusa">Medusa</option>
			<option value="Vampire">Vampire</option>
			<option value="Troll">Troll</option>
			<option value="Pikachu">Pikachu</option>
			<option value="All"> Display All</option>
		</select>
		</td><tr>
		<tr><td>
		<input type="submit" value="Submit" />
		<input type="hidden" id="submityn" name="submityn" value="y" />
		</td></tr></table>
		</form>
				
		<?php	
include "db_connect.php";   
$ctype = $_POST['creature'];
$submit= $_POST['submityn'];

if($submit=='y'){
	
if($ctype<>'All'){
$query = "SELECT * FROM creatureBio WHERE name = '$ctype'";
}
else{
$query ="SELECT * FROM creatureBio";
}

$result = mysqli_query($db, $query)or die("Error Querying Database");
  
echo"<br/><hr/>";
   while($row = mysqli_fetch_array($result))
    {
	echo"<table>";
    echo "<tr><td width=\"35%\">Name: </td><td>" . $row['name'] . "</td></tr>";
	echo "<tr><td>Food Preference: </td><td>" . $row['food'] . "</td></tr>";
	echo "<td>General Location: </td><td>" . $row['locale'] . "</td></tr>";
	echo "<tr><td>Weaknesses:</td><td>";
	echo wordwrap($row['weakness'] . "</td></tr>",50,"<br />\n",TRUE);
	echo "<tr><td>Powers:</td><td>";
	echo wordwrap($row['powers'] . "</td></tr>",50,"<br />\n",TRUE);
	echo "<tr><td>Recent Sightings:</td><td>";
	$thename=$row['name'];
	$query2="SELECT * FROM creatureBio WHERE name='$thename'";
	$result2= mysqli_query($db, $query2)or die("Error Querying Database5");
	$row2= mysqli_fetch_array($result2);
	$cid=$row2['id'];
	
	$query3 = "SELECT sightings.date FROM creatureToSight INNER JOIN sightings ON creatureToSight.sightingId = sightings.id WHERE creatureToSight.creatureId = '$cid'";
	$result3 = mysqli_query($db, $query3)or die("Error Querying Database2");
		while($row3 = mysqli_fetch_array($result3)) {
			echo $row3['date'];
			echo "<br />";
		}
	
/*	$query1 ="SELECT * FROM creatureToSight WHERE creatureId='$cid'";
	$result1 = mysqli_query($db, $query1)or die("Error Querying Database4");
	while($row1=mysqli_fetch_array($result1)){
	$sid=$row1['sightingId'];
	$query3="SELECT * FROM sightings WHERE id='$sid'";
	$result3= mysqli_query($db, $query3)or die("Error Querying Database3");
	$row3= mysqli_fetch_array($result3);
		$date=$row3['date'];
		echo $date;
		echo "<br/>";
	}	//SELECT * FROM creatureToSight WHERE */
	echo"</td></tr>";
	echo "</table>";
	echo"<hr/>";
	//connect with recent sightings...
    }
echo "</table>";
mysqli_close($db);
}
else{
echo"<br/>";
}
	
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
</body>
</html>
