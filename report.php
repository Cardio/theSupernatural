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
				
					<!-- CONTENT -->
					<h3>Report an Abduction</h3>
					<p>Welcome to the Alien Abduction Research Center of the University of Mary Washington. </p>
					
					<form method="post" action="reportController.php">
					<table>
					<tr><td>Name</td><td><input type="name" name="name" /></td></tr>
					<tr><td>Date Abducted</td><td><input type="number" name="month" min="1" max="12" step="1" value="1" size="3"/>
					<input type="number" name="day" min="1" max="31" step="1" value="1" size="3"/>
					<input type="number" name="year" min="2009" max="2014" step="1" value="2011" size="4"/></td></tr>
					
					
					<tr><td>Location (city)</td><td><input type="text" name="city" id="city"/> 
					
					<select name="state">
					<option>AL</option>
					<option>AK</option>
					<option>AS</option>
					<option>AZ</option>
					<option>CA</option>
					<option>NM</option>
					<option>TX</option>
					<option>VA</option>
					</select></td></tr>
					
					<tr><td>Experience</td><td><input type="text" name="exp" size="50" value="Describe your Experience."/></td></tr>
					<tr><td>Color of the Aliens </td><td><select><option value="green">Green</option><option value="red">Red</option>
						<option value="yellow">Yellow</option><option value="orange">Orange</option><option value="Pink">Pink</option></tr>
					<tr><td>How Scary?</td><td>not scary <input type="range" name="scary" min="1" max="10" step="1" value="5"/>scary</td></tr>
					<tr><td></td><td><input type="submit" value="Submit" /> </td></tr>
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
