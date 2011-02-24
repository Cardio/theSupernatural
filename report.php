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

					<h3>Report an Sighting</h3>
				
					
					<form method="post" action="reportController.php">
					<table>
					<tr><td>Name</td><td><?php echo($_SESSION['username']); ?></td></tr>
					<tr><td>Date of Sighting</td><td><input type="number" name="month" min="1" max="12" step="1" value="<?php echo date("m", time()); ?>" size="3"/>
					<input type="number" name="day" min="1" max="31" step="1" value="<?php echo date("d", time()); ?>" size="3"/>
					<input type="number" name="year" min="1900" max="2014" step="1" value="<?php echo date("Y", time()); ?>" size="4"/></td></tr>
					
					
					<tr><td>Location (city)</td><td><input type="text" name="city" id="city"/> 
					
					<select name="state">
					<option>AL</option>
					<option>AK</option>
					<option>AZ</option>
					<option>AR</option>
					<option>CA</option>
					<option>CO</option>
					<option>CT</option>
					<option>DE</option>
					<option>DC</option>
					<option>FL</option>
					<option>GA</option>
					<option>HI</option>
					<option>ID</option>
					<option>IL</option>
					<option>IN</option>
					<option>IA</option>
					<option>KS</option>
					<option>KY</option>
					<option>LA</option>
					<option>ME</option>
					<option>MD</option>
					<option>MA</option>
					<option>MI</option>
					<option>MN</option>
					<option>MS</option>
					<option>MO</option>
					<option>MT</option>
					<option>NE</option>
					<option>NV</option>
					<option>NH</option>
					<option>NJ</option>
					<option>NM</option>
					<option>NY</option>
					<option>NC</option>
					<option>ND</option>
					<option>OH</option>
					<option>OK</option>
					<option>OR</option>
					<option>PA</option>
					<option>RI</option>
					<option>SC</option>
					<option>SD</option>
					<option>TN</option>
					<option>TX</option>
					<option>UT</option>
					<option>VT</option>
					<option>VA</option>
					<option>WA</option>
					<option>WV</option>
					<option>WI</option>
					<option>WY</option>
					</select></td></tr>
					
					<tr><td>Experience</td><td><input type="text" name="exp" size="50" value="Describe your Experience."/></td></tr>
					
					<tr><td>Type of Supernatural Creature </td>
					<td><select name="creature">
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
						<option value="Other">Other</option></select></td></tr>
					<tr><td></td>
					<tr><td>The Creatures Actions</td><td><input type="text" name="action" size="50" value="Describe the Creatures Activities."/></td></tr>
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
