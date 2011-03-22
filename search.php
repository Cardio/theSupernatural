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

if($name == "" || $name == "id=searchq") {
	
		echo "<form method=post class=searchform><p><center><h3>
		<input type=text style=font-size:20px; size=13 value=\"Search Here\" id=searchq name=q> </input>
		within <select name=drop style=font-size:22px;>
		<option value=1>Everything</option>
		<option value=2>Names</option>
		<option value=3>Dates</option>
		<option value=4>Cities</option>
		<option value=5>States</option>
		<option value=6>Experiences</option>
		<option value=7>Creatures</option>
		<option value=8>Actions</option>
		</select>
		<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
		</p></form></br>";
		
} else {
	
if($filter==1){
	$query="SELECT * FROM sightings WHERE name LIKE '%$name%' OR date LIKE '%$name%'
		OR city LIKE '%$name%' OR state LIKE '%$name%' OR experience LIKE '%$name%' 
		OR creature_type LIKE '%$name%' OR action LIKE '%$name%'";
	}elseif ($filter==2){
		$query="SELECT * FROM sightings WHERE name LIKE '%$name%'";
	}elseif ($filter==3){
		$query="SELECT * FROM sightings WHERE date LIKE '%$name%'";
	}elseif ($filter==4){
		$query="SELECT * FROM sightings WHERE city LIKE '%$name%'";
	}elseif ($filter==5){
		$query="SELECT * FROM sightings WHERE state LIKE '%$name%'";
	}elseif ($filter==6){
		$query="SELECT * FROM sightings WHERE experience LIKE '%$name%'";
	}elseif ($filter==7){
		$query="SELECT * FROM sightings WHERE creature_type LIKE '%$name%'";
	}elseif ($filter==8){
		$query="SELECT * FROM sightings WHERE action LIKE '%$name%'";
	}

$result=mysqli_query($db, $query)
or die("Error Querying Database");	

if($filter==1){
	echo "<form method=post class=searchform><p><center><h3>
		<input type=text style=font-size:20px; size=13 value=$name id=searchq name=q> </input>
		within <select name=drop style=font-size:22px;>
		<option value=1>Everything</option>
		<option value=2>Names</option>
		<option value=3>Dates</option>
		<option value=4>Cities</option>
		<option value=5>States</option>
		<option value=6>Experiences</option>
		<option value=7>Creatures</option>
		<option value=8>Actions</option>
		</select>
		<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
		</p></form></br>";
	}elseif ($filter==2){
		echo "<form method=post class=searchform><p><center><h3>
			<input type=text style=font-size:20px; size=13 value=$name id=searchq name=q> </input>
			within <select name=drop style=font-size:22px;>
			<option value=1>Everything</option>
			<option value=2 selected>Names</option>
			<option value=3>Dates</option>
			<option value=4>Cities</option>
			<option value=5>States</option>
			<option value=6>Experiences</option>
			<option value=7>Creatures</option>
			<option value=8>Actions</option>
			</select>
			<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
			</p></form></br>";
	}elseif ($filter==3){
		echo "<form method=post class=searchform><p><center><h3>
			<input type=text style=font-size:20px; size=13 value=$name id=searchq name=q> </input>
			within <select name=drop style=font-size:22px;>
			<option value=1>Everything</option>
			<option value=2>Names</option>
			<option value=3 selected>Dates</option>
			<option value=4>Cities</option>
			<option value=5>States</option>
			<option value=6>Experiences</option>
			<option value=7>Creatures</option>
			<option value=8>Actions</option>
			</select>
			<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
			</p></form></br>";
	}elseif ($filter==4){
		echo "<form method=post class=searchform><p><center><h3>
			<input type=text style=font-size:20px; size=13 value=$name id=searchq name=q> </input>
			within <select name=drop style=font-size:22px;>
			<option value=1>Everything</option>
			<option value=2>Names</option>
			<option value=3>Dates</option>
			<option value=4 selected>Cities</option>
			<option value=5>States</option>
			<option value=6>Experiences</option>
			<option value=7>Creatures</option>
			<option value=8>Actions</option>
			</select>
			<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
			</p></form></br>";
	}elseif ($filter==5){
		echo "<form method=post class=searchform><p><center><h3>
			<input type=text style=font-size:20px; size=13 value=$name id=searchq name=q> </input>
			within <select name=drop style=font-size:22px;>
			<option value=1>Everything</option>
			<option value=2>Names</option>
			<option value=3>Dates</option>
			<option value=4>Cities</option>
			<option value=5 selected>States</option>
			<option value=6>Experiences</option>
			<option value=7>Creatures</option>
			<option value=8>Actions</option>
			</select>
			<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
			</p></form></br>";
	}elseif ($filter==6){
		echo "<form method=post class=searchform><p><center><h3>
			<input type=text style=font-size:20px; size=13 value=$name id=searchq name=q> </input>
			within <select name=drop style=font-size:22px;>
			<option value=1>Everything</option>
			<option value=2>Names</option>
			<option value=3>Dates</option>
			<option value=4>Cities</option>
			<option value=5>States</option>
			<option value=6 selected>Experiences</option>
			<option value=7>Creatures</option>
			<option value=8>Actions</option>
			</select>
			<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
			</p></form></br>";
	}elseif ($filter==7){
		echo "<form method=post class=searchform><p><center><h3>
			<input type=text style=font-size:20px; size=13 value=$name id=searchq name=q> </input>
			within <select name=drop style=font-size:22px;>
			<option value=1>Everything</option>
			<option value=2>Names</option>
			<option value=3>Dates</option>
			<option value=4>Cities</option>
			<option value=5>States</option>
			<option value=6>Experiences</option>
			<option value=7 selected>Creatures</option>
			<option value=8>Actions</option>
			</select>
			<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
			</p></form></br>";
	}elseif ($filter==8){
		echo "<form method=post class=searchform><p><center><h3>
			<input type=text style=font-size:20px; size=13 value=$name id=searchq name=q> </input>
			within <select name=drop style=font-size:22px;>
			<option value=1>Everything</option>
			<option value=2>Names</option>
			<option value=3>Dates</option>
			<option value=4>Cities</option>
			<option value=5>States</option>
			<option value=6>Experiences</option>
			<option value=7>Creatures</option>
			<option value=8 selected>Actions</option>
			</select>
			<input type=submit class=formbutton name=submit value=\"Search Again\" style=\"height:30px;width:115px;font-size:small\">
			</p></form></br>";
	}
	
	
	echo"</h3></center><hr/>";
	echo "<table>";
while($row= mysqli_fetch_array($result)){


	echo"<table>";
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
