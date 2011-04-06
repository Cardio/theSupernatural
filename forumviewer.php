<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Supernatural Forum</title>
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
				
<!--Content -->
<h3>Supernatural Forum </h3>
<br/>
<?php
include ('db_connect.php');

if(isset($_SESSION['username'])){

$name = $_SESSION['username'];
  
$query = "SELECT * FROM thread";
$result = mysqli_query($db, $query)or die("Error Querying Database");
 

   while($row = mysqli_fetch_array($result))
    {
	echo"<table>";
	$title=$row['title'];
	$id=$row['id'];
	//echo $title;
	echo "<tr><td width=\"35%\"><a href=\"forum.php?index=";
	echo $id;
	echo "\">";
    echo $title;
	echo "</a><br/></td>";
	
	echo "<td width=\"35%\"> Date Created:" . $row['date_posted'] . "</td></tr>";
	$query2= "SELECT * FROM users WHERE id='$row[author_id]'";
	$result1 = mysqli_query($db, $query2)or die("Error Querying Database");
	$row1 = mysqli_fetch_array($result1);
	$author=$row1['username'];
	echo "<tr><td></td><td>Created By:" . $author . "</td></tr>";
	//$query2= "SELECT COUNT(postID) FROM threadToPost WHERE threadId='$id'";
	//$result = mysqli_query($db, $query)or die("Error Querying Database");
	//$row1 = mysqli_fetch_array($result);
	//echo "<td width=\"35%\"> Total Posts:" .$row1  . "</td></tr>";
    echo "<hr /></table>";
	
	}
	

mysqli_close($db);
}
?>
<hr /><br />
<center><a href="forumviewer.php?makeNew=y">Create New Thread</a></center>
<?php 
$makeNew=$_GET['makeNew'];
if($makeNew=='y'){
?>
<form method="post" action="threadController.php">
<table>
<tr><td>Date</td><td><input type="number" name="month" min="1" max="12" step="1" value="<?php echo date("m", time()); ?>" size="3"/>
<input type="number" name="day" min="1" max="31" step="1" value="<?php echo date("d", time()); ?>" size="3"/>
<input type="number" name="year" min="1900" max="2014" step="1" value="<?php echo date("Y", time()); ?>" size="4"/></td></tr>				
<tr><td>Title</td><td><input type="text" name="title" size="50" value="Insert Your Title Here."/></td></tr>
<tr><td>Post</td><td><input type="text" name="post" size="50" value="Insert Your Post Here."/></td></tr>
<td><input type="hidden" name=threadid value="<?php echo $threadid; ?>"><input type="submit" value="Submit" /> </td></tr>
</table>
</form>
<?php
} ?>
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