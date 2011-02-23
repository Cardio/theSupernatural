<?php
include('cookie.php');
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
					<li><a href="list.php">List of Sightings</a></li>
					
					<?php
					
					if(isset($_SESSION['username'])) {
						echo "<li><a href=\"account.php\">Account</a></li>
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