<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Supernatural Equipment</title>
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
					echo "<p>Your equipment has been submitted successfully!</p>";
					}
					?>
					<h3>Equipment</h3>
			

<?php	
include ('db_connect.php');		

$query = "SELECT * FROM equipment ORDER BY name ASC";
 	
  
$result = mysqli_query($db, $query)or die("Error Querying Database");
   
echo"<br/><hr/>";
   while($row = mysqli_fetch_array($result))
    {
    	$equipId = $row['id'];
	echo"<table>";
    echo "<tr><td width=\"35%\">Name: " . $row['name'] . "</td><td width=\"65%\"></td></tr>";
	echo "<tr><td>Description:</td><td>";
	echo wordwrap($row['description'] . "</td></tr>",45,"<br />\n",TRUE);
	echo "<tr><td>Rating:</td><td>";
	if($row['rating']==1) {
		echo wordwrap("This item is hardly ever needed.  May as well use it as a back-scratch.",45,"<br />\n",TRUE);
	} else if($row['rating']==2) {
		echo wordwrap("If you've got the time and resources, this item wouldn't be bad to have.  Think of it as an extra slice of pizza.",45,"<br />\n",TRUE);
	} else if($row['rating']==3) {
		echo wordwrap("You should probably have this one.  However, if push comes to shove this would be near the top of your list to chuck overboard at an oncoming zombie.",45,"<br />\n",TRUE);
	} else if($row['rating']==4) {
		echo wordwrap("This item is like your credit card, don't leave home with out it!  And don't let a friend borrow it because they \"just want to get a snack real quick\", you'll never see it again.",45,"<br />\n",TRUE);
	} else if($row['rating']==5) {
		echo wordwrap("This item is your precious.  You're Golem and it's the one ring, you never want to be without it.",45,"<br />\n",TRUE);
	}
	echo "</td></tr>";
	echo "<tr><td colspan=\"2\">This item is useful when dealing with the following creatures:</td></tr>";
	echo "<tr><td></td><td>";
	
	$query2 = "SELECT creatureBio.name FROM equipToCreature INNER JOIN creatureBio ON equipToCreature.creatureId = creatureBio.id WHERE equipToCreature.equipId = '$equipId'";
	$result2 = mysqli_query($db, $query2)or die("Error Querying Database2");
		while($row2 = mysqli_fetch_array($result2)) {
			echo $row2['name'];
			echo "<br />";
		}

	
/*	$query2 = "SELECT * FROM equipToCreature WHERE equipId = '$equipId'";
	$result2 = mysqli_query($db, $query2)or die("Error Querying Database");
		while($row2 = mysqli_fetch_array($result2)) {
			$creatureId = $row2['creatureId'];
			$query3 = "SELECT * FROM creatureBio WHERE id = '$creatureId'";
			$result3 = mysqli_query($db, $query3)or die("Error Querying Database");
			$row3 = mysqli_fetch_array($result3);
			echo $row3['name'];
			echo "<br />";
		} */
	
	echo "</td></tr>";
	echo "</table>";
	echo"<hr/>";
    }
//echo "</table>";

mysqli_close($db);
	
?>	
						<center>
						<form method="post" action="addEquip.php">
					    <input type="submit" value="Add Equipment!" />
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