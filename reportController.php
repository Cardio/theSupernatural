<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alien Abductions</title>
<link rel="stylesheet" href="styles.css" type="text/css" />


</head>
<body>
<?php
   include('header.html');
?>


<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">

<?php

include ('db_connect.php');
$name = $_POST['name'];
$month = $_POST['month'];
$day = $_POST['day'];
$yr = $_POST['year'];
$location = $_POST['city'];

echo "Report Summary: <br/>";
echo "Name: $name <br/>";
echo "Date: $month / $day / $yr <br/>";
echo "The rest is on file. Thank you.";
$query="INSERT INTO alien (name) VALUES ('$name')";
$query2="SELECT * FROM alien";

$result = mysqli_query($db, $query) or die("Error Querying Database");
mysqli_close($db);
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
