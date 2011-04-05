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

$name = mysqli_real_escape_string($db, trim($_POST['q']));
$filter = mysqli_real_escape_string($db, trim($_POST['drop']));


	
		echo "<form method=post class=searchform><p><center><h3>";
		if($name == "" || $name == "id=searchq") {
			echo "<input type=text style=font-size:20px; size=10 value=\"Search Here\" id=searchq name=q> </input>";
			} else { 
					echo "<input type=text style=font-size:20px; size=10 value=$name id=searchq name=q> </input>";
					}
		echo " <select name=drop style=font-size:22px;>
		<option value=1>Everything</option>
		<optgroup label=Users>	";
		if ($filter==2){ 
			echo "<option value=2 selected>by Name</option>";
			} else  echo "<option value=2>by Name</option>";
		
		echo "</optgroup>
		<optgroup label=Sightings>";
		if ($filter==3){
			echo "<option value=3 selected>by Name</option>";
			} else echo "<option value=3>by Name</option>";
		if ($filter==4){
			echo "<option value=4 selected>by Date</option>";
			} else echo "<option value=4>by Date</option>";
		if ($filter==5){
			echo "<option value=5 selected>by City</option>";
			} else echo "<option value=5>by City</option>";
		if ($filter==6){
			echo "<option value=6 selected>by State</option>";
			} else echo "<option value=>by State</option>";
		if ($filter==7){
			echo "<option value=7 selected>by Experience</option>";
			} else echo "<option value=7>by Experience</option>";
		if ($filter==8){
			echo "<option value=8 selected>by Creature</option>";
			} else echo "<option value=8>by Creature</option>";
		if ($filter==9){
			echo "<option value=9 selected>by Action</option>";
			} else echo "<option value=9>by Action</option>";
		echo "</optgroup>
		<optgroup label=Creatures>";
		if ($filter==10){
			echo "<option value=10 selected>by Name</option>";
			} else echo "<option value=10>by Name</option>";
		if ($filter==11){
			echo "<option value=11 selected>by Diet</option>";
			} else echo "<option value=11>by Diet</option>";
		if ($filter==12){
			echo "<option value=12 selected>by Location</option>";
			} else echo "<option value=12>by Location</option>";
		if ($filter==13){
			echo "<option value=13 selected>by Powers</option>";
			} else echo "<option value=13>by Powers</option>";
		if ($filter==14){
			echo "<option value=14 selected>by Weakness</option>";
			} else echo "<option value=14>by Weakness</option>";
		echo "</optgroup>
		<optgroup label=Equipment>";
		if ($filter==15){
			echo "<option value=15 selected>by Name</option>";
			} else echo "<option value=15>by Name</option>";
		if ($filter==16){
			echo "<option value=16 selected>by Description</option>";
			} else echo "<option value=16>by Description</option>";
		if ($filter==17){
			echo "<option value=17 selected>by Rating</option>";
			} else echo "<option value=17>by Rating</option>";
		echo "</select>";
		if($name == "" || $name == "id=searchq") {
		echo " <input type=submit class=formbutton name=submit value=Search style=\"height:30px;width:115px;font-size:small\">";
		} else {
		echo " <input type=submit class=formbutton name=submit value=Search Again style=\"height:30px;width:115px;font-size:small\">";
		}
		echo "</p></form></br>";
		
if($name != "" && $name != "id=searchq") {
	
	if ($filter==1 || $filter==2){
		$query="SELECT * FROM users WHERE username LIKE '%$name%'";
	}elseif ($filter==3){
		$query="SELECT * FROM sightings WHERE name LIKE '%$name%'";
	}elseif ($filter==4){
		$query="SELECT * FROM sightings WHERE date LIKE '%$name%'";
	}elseif ($filter==5){
		$query="SELECT * FROM sightings WHERE city LIKE '%$name%'";
	}elseif ($filter==6){
		$query="SELECT * FROM sightings WHERE state LIKE '%$name%'";
	}elseif ($filter==7){
		$query="SELECT * FROM sightings WHERE experience LIKE '%$name%'";
	}elseif ($filter==8){
		$query="SELECT * FROM sightings WHERE creature_type LIKE '%$name%'";
	}elseif ($filter==9){
		$query="SELECT * FROM sightings WHERE action LIKE '%$name%'";
	}elseif ($filter==10){
		$query="SELECT * FROM creaturebio WHERE name LIKE '%$name%'";
	}elseif ($filter==11){
		$query="SELECT * FROM creaturebio WHERE food LIKE '%$name%'";
	}elseif ($filter==12){
		$query="SELECT * FROM creaturebio WHERE locale LIKE '%$name%'";
	}elseif ($filter==13){
		$query="SELECT * FROM creaturebio WHERE powers LIKE '%$name%'";
	}elseif ($filter==14){
		$query="SELECT * FROM creaturebio WHERE weakness LIKE '%$name%'";
	}elseif ($filter==15){
		$query="SELECT * FROM equipment WHERE name LIKE '%$name%'";
	}elseif ($filter==16){
		$query="SELECT * FROM equipment WHERE description LIKE '%$name%'";
	}elseif ($filter==17){
		$query="SELECT * FROM equipment WHERE rating LIKE '%$name%'";
	}

	$result=mysqli_query($db, $query)
			or die("Error Querying Database");

		
	
	echo"</h3></center><hr/>";
	echo "<table>";
	
if ($filter ==1 || $filter==2) {
	while($row= mysqli_fetch_array($result)){
		echo"<table>";
		echo "USER<br />";
		echo "<tr><td width=\"35%\">Name: " . $row['username'] . "</td><td width=\"65%\"><br />";
		echo "</table>";
		echo"<hr/>";
		}
	}
	
if ( $filter ==1 || $filter > 2 && $filter <10) {
	
	if($filter==1){
		$query="SELECT * FROM sightings WHERE name LIKE '%$name%' OR date LIKE '%$name%'
			OR city LIKE '%$name%' OR state LIKE '%$name%' OR experience LIKE '%$name%' 
			OR creature_type LIKE '%$name%' OR action LIKE '%$name%'";

		$result=mysqli_query($db, $query)
			or die("Error Querying Database");
	}
	
	while($row= mysqli_fetch_array($result)){
	
	
		echo"<table>";
		echo "SIGHTING<br />";
		echo "<tr><td width=\"35%\">Name: " . $row['name'] . "</td><td width=\"65%\">Date: " . $row['date'] . "</td></tr>";
		echo "<tr><td>City:    " . $row['city'] . "</td><td>State:    " . $row['state'] . "</td></tr>";
		echo "<tr><td>Creature Type:    " . $row['creature_type'] . "</td></tr>";
		echo "<tr><td>Experience:    </td><td>";
		echo wordwrap($row['experience'] . "</td></tr>",50,"<br />\n",TRUE);
		echo "<tr><td>Actions:    </td><td>";
		echo wordwrap($row['action'] . "</td></tr>",50,"<br />\n",TRUE);
		echo "</table>";
		echo"<hr/>";
	}
}	

if ($filter ==1 || ($filter > 9 && $filter <15)) {
	if($filter==1){
			$query="SELECT * FROM creaturebio WHERE name LIKE '%$name%' OR food LIKE '%$name%'
				OR locale LIKE '%$name%' OR weakness LIKE '%$name%' OR powers LIKE '%$name%'";

			$result=mysqli_query($db, $query)
				or die("Error Querying Database");
		}
	
	while($row= mysqli_fetch_array($result)){

		
	
		echo"<table>";
		echo "CREATURE<br />";
		echo "<tr><td width=\"35%\">Creature: " . $row['name'] . "</td><td width=\"65%\">Diet: " . $row['food'] . "</td></tr>";
		echo "<tr><td>Location:    " . $row['locale'] . "</td><td>Powers:    " . $row['powers'] . "</td></tr>";
		echo "<tr><td>Weakness:    " . $row['weakness'] . "</td></tr>";
		echo "</table>";
		echo"<hr/>";
    
	}
}	

if ($filter ==1 || $filter  > 14) {
	if($filter==1){
			$query="SELECT * FROM equipment WHERE name LIKE '%$name%' OR description LIKE '%$name%'
				OR rating LIKE '%$name%'";

			$result=mysqli_query($db, $query)
				or die("Error Querying Database");
		}
	
	while($row= mysqli_fetch_array($result)){
		echo"<table>";
		echo "EQUIPMENT<br />";
		echo "<tr><td width=\"35%\">Name: " . $row['name'] . "</td><td width=\"65%\">Description: " . $row['description'] . "</td></tr>";
		echo "<tr><td>Rating:    " . $row['rating'] . "</td>";
		echo "</table>";
		echo"<hr/>";
	}
}

echo"</table>";

}

echo "</div>";
				    include('SIDEnFOOTER.html');
				?>
				   

			</div>
		</div>
	</div>
</div>
</body>
</html>
