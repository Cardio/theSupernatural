<?php

include('cookie.php');

  include "db_connect.php";

   $query = "select * from users WHERE username = '$_SESSION[username]'";
   $result = mysqli_query($db, $query);
   while($row = mysqli_fetch_array($result)) {
   $id = $row['id'];
   }
?>

<html>
<head>
<link rel="icon" type="image/ico" href="images/favicon.ico"> 
</head>
<body>

<div class="header">

	<div class="title">
		<div class="innertitle">
			<div class="banner">
			<!-- TITLE -->
<a href="index.php"><img src="images/spnHeader.png" border="0" /></a>

			<!-- END TITLE -->
			</div>
		</div>
	</div>

	<div class="outernav">
		<div class="nav">
			<div class="innernav">
				<ul>
				
					<!-- MENU -->
					<li><a href="index.php">Home</a></li>
					<li><a href="creature.php">Creature Bio</a><li>
					<li><a href="list.php">List of Sightings</a></li>
					
					<?php
					
					if(isset($_SESSION['username'])) {
						echo "<li><a href=\"profile.php?id=". $id . "\">Profile</a></li>";
						echo "<li><a href=\"editAccount.php\">Account</a></li>
								<li><a href=\"logout.php\">Logout</a></li>";
					} else {
						echo "<li><a href=\"register.php\">Register</a></li>
								<li><a href=\"login.php\">Login</a></li>";
					}
					
					?>
					
					
					<!-- END MENU -->
					
				</ul>
			</div>
		</div>
	</div>
	


</div>

</body>
</html>