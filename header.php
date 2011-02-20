
<div class="header">
	<div class="outernav">
		<div class="nav">
			<div class="innernav">
				<ul>
				
					<!-- MENU -->
					<li><a href="index.php">Home</a></li>
					<li><a href="report.php">Report an Sighting</a></li>
					<li><a href="list.php">See List of Sightings</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
					
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
		
	<div class="clear"></div>
	
	<div class="title">
		<div class="innertitle">
			
			<!-- TITLE -->
			<h1><a href="#">theSupernatural</a></h1>
			<h2>worldwide site of supernatural invasions </h2>
			<!-- END TITLE -->
			
		</div>
	</div>
</div>