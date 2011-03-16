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
			<option value="DavidWoodruff">David Woodruff</option>
			<option value="Pikachu">Pikachu</option>
		</select>
		</td><tr>
		<tr><td>
		<input type="submit" value="Submit" />
		<input type="hidden" id="submityn" name="submityn" value="y" />
		</td></tr></table>
		</form>
		
		
	//need an if here... or some sort of check	
		
		<?php	
include "db_connect.php";   
$ctype = $_POST['creature'];
$submit= $_POST['submityn'];

if($submit=='y'){
	

$query = "SELECT * FROM creatureBio WHERE name= '$ctype' ";
//I think this is where my error is...can I put ctype in there like that?

$result = mysqli_query($db, $query)or die("Error Querying Database");
  
//echo"<br/><hr/>";
  // while($row = mysqli_fetch_array($result))
    //{
//	echo"<table>";
//    echo "<tr><td width=\"35%\">Name: " . $row['name'] . "</td></tr>";
//	echo "<tr><td>Food Preference:" . $row['food'] . "</td><td>General Location:" . $row['locale'] . "</td></tr>";
//	echo "<tr><td>Weaknesses:</td><td>";
//	echo wordwrap($row['weakness'] . "</td></tr>",50,"<br />\n",TRUE);
//	echo "<tr><td>Powers:</td><td>";
//	echo wordwrap($row['powers'] . "</td></tr>",50,"<br />\n",TRUE);
//	echo "</table>";
//	echo"<hr/>";
//    }
//echo "</table>";

mysqli_close($db);
}
else{
echo"<br/> this is other part of if..";
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
