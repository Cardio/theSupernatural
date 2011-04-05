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
				
<!--Content -->

<?php
include ('db_connect.php');

if(isset($_SESSION['username'])){

$name = $_SESSION['username'];
  
$query = "SELECT * FROM thread";
$result = mysqli_query($db, $query)or die("Error Querying Database");
 

   while($row = mysqli_fetch_array($result))
    {echo"<table>";
	$title=$row['title'];
	$id=$row['id'];
	//echo $title;
	echo "<td><tr><a href=\"forum.php?index=" . $id . "  >" . $title . "<br/></tr></td>";
    echo "<hr /></table>";
	}

mysqli_close($db);
}
?></div>	
<?php
    include('SIDEnFOOTER.html');
?>
	</div>
		
	</div>
</div>
</body>
</html>