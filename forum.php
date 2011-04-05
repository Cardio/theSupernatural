<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Supernatural Blog</title>
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

					<h3>Create a Blog?</h3>
					<?php
					//if($_GET['submit']=='y'){
					//echo "<p>Your sighting has been submitted successfully!</p>";
					
			
include ('db_connect.php');	
//$listBy= $_POST['listBy'];
//if($listBy=='Recent'){
//$query = "SELECT * FROM sightings ORDER BY date DESC";
//}	
//f($listBy=='City'){
//$query = "SELECT * FROM sightings ORDER BY city ASC";
//}
//else if($listBy=='State'){
//$query = "SELECT * FROM sightings ORDER BY state ASC";
//}
//else if($listBy=='Creature'){
//$query = "SELECT * FROM sightings ORDER BY creature_type ASC";
//}
//else{	
//$query = "SELECT * FROM sightings ORDER BY id ASC";
$query = "SELECT * FROM blogposts";
//ORDER BY date DESC";
//} 	
  
$result = mysqli_query($db, $query)or die("Error Querying Database1");
//$row=mysqli_fetch_array($result); 
//$sid=$row['id'];  
echo"<br/><hr/>";
   while($row = mysqli_fetch_array($result))
    {
	$id=$row['author_id'];
	$query="SELECT * FROM users WHERE id='$id'";
	$result1= mysqli_query($db, $query)or die("Error Querying Database2");
	$row2= mysqli_fetch_array($result1);
	$username=$row2['username'];
	
	echo"<table>";
    echo "<tr><td width=\"35%\">Name: " . $username . "</td><td width=\"65%\">Date:" . $row['date_posted'] . "</td></tr>";
	echo "<tr><td>Title:</td><td>";
	echo wordwrap($row['title'] . "</td></tr>",50,"<br />\n",TRUE);
	echo "<tr><td>Post:</td><td>";
	echo wordwrap($row['post'] . "</td></tr>",50,"<br />\n",TRUE);
	echo "</table>";
	echo"<hr/>";
    }
//echo "</table>";

mysqli_close($db);

	?>
				
					
					<form method="post" action="BlogController.php">
					<table>
					<tr><td>Date</td><td><input type="number" name="month" min="1" max="12" step="1" value="<?php echo date("m", time()); ?>" size="3"/>
					<input type="number" name="day" min="1" max="31" step="1" value="<?php echo date("d", time()); ?>" size="3"/>
					<input type="number" name="year" min="1900" max="2014" step="1" value="<?php echo date("Y", time()); ?>" size="4"/></td></tr>
					
					
					<tr><td>Title</td><td><input type="text" name="title" id="title"/> 
					<tr><td>Post</td><td><input type="text" name="post" size="50" value="Insert Your Blog Post Here."/></td></tr>
					<td><input type="submit" value="Submit" /> </td></tr>
					</table>
					
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
