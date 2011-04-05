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
                                        <?php
                                        $id = $_GET['id'];
                                        ?>
                                        <h3>Sighting</h3>


<br/>
<?php
include ('db_connect.php');

$query = "SELECT * FROM sightings where id = '$id'";


$result = mysqli_query($db, $query)or die("Error Querying Database");
//$row=mysqli_fetch_array($result);
//$sid=$row['id'];
echo"<br/><hr/>";
   while($row = mysqli_fetch_array($result))
    {
        $sid=$row['id'];
        $query="SELECT * FROM creatureToSight WHERE sightingId='$sid'";
        $result1= mysqli_query($db, $query)or die("Error Querying Database");
        $row2= mysqli_fetch_array($result1);
        $cid=$row2['creatureId'];
        $query2="SELECT * FROM creatureBio WHERE id='$cid'";
        $result2= mysqli_query($db, $query2)or die("Error Querying Database");
        $row3= mysqli_fetch_array($result2);

        $city = $row['city'];
        $state = $row['state'];

      $address = $city . ", " . $state;

//      $address = "Stafford, VA";

//      $URLaddress = urlencode($address); //$address is the location

//      echo '<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp%3Bsource=s_q&amp%3Bhl=en&amp%3Bgeocode&amp%3Bq' . $URLaddress . '&amp;aq=&amp;sspn=0.002535,0.010568&amp;ie=UTF8&amp;hq=&amp;hnear=' . $URLaddress . '&amp;spn=0.001267,0.005284&amp;t=h&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp%3Bsource=embed&amp%3Bhl=en&amp%3Bgeocode&amp%3Bq' . $URLaddress . ';aq=&amp;sspn=0.002535,0.010568&amp;ie=UTF8&amp;hq=&amp;hnear=' . $URLaddress . '&amp;spn=0.001267,0.005284&amp;t=h&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>';

//$address = 'Stafford, VA';

$URLaddress = urlencode($address); //$address is the location

echo '<table cellspacing="0" cellpadding="0" border="0"><tr><td><iframe src="http://www.map-generator.net/extmap.php?name=Spot&amp;address=' . $URLaddress . '&amp;width=500&amp;height=400&amp;maptype=map&amp;zoom=14&amp;hl=en&amp;t=1302040588" width="500" height="400" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe></td></tr><tr><td align="right"><a style="font:8px Arial;text-decoration:none;cursor:default;color:#5C5C5C;" href="http://www.map-generator.net">map-generator.net</a></td></tr></table>';



        echo "<table>";
    echo "<tr><td width=\"35%\">Name: " . $row['name'] . "</td><td width=\"65%\">Date:" . $row['date'] . "</td></tr>";
        echo "<tr><td>City: " . $row['city'] . "</td><td>State: " . $row['state'] . "</td></tr>";
        echo "<tr><td>Creature Type: </td><td>" . $row3['name'] . "</td></tr>";
        echo "<tr><td>Experience:</td><td>";
        echo wordwrap($row['experience'] . "</td></tr>",50,"<br />\n",TRUE);
        echo "<tr><td>Actions:</td><td>";
        echo wordwrap($row['action'] . "</td></tr>",50,"<br />\n",TRUE);
        echo "</table>";
        echo"<hr/>";
    }
//echo "</table>";

mysqli_close($db);

?>
                                                <a href="list.php">Return to Sightings List</a>
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