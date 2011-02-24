<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>theSupernatural</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

<?php
include('header.php');
?>

<div class="up">

<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
				
					<!-- CONTENT -->
					<h3>Welcome,
			<?php
			if(isset($_SESSION['username'])){				
				echo $_SESSION['username'];
			} else {
				echo "guest";
			}			
			?>!</h3>
					
					<div class="rightimg"><img src="images/zombie.jpg" width=150px /></div>

					<p>This site to is aid supernatural hunters.  We're here to connect you to your fellow hunters so you don't have to hunt each other!</p>
					<br/>
					<p>Create an account, report a sighting so other hunters can help you, or see what creatures are running amok that you can go take care of.  Happy hunting!</p>
					
		
<br/>
<hr/>
<br/>
					
				<center><iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/BvsMPOfblfg" frameborder="0" allowfullscreen></iframe></center>
					<!-- END CONTENT -->
					
				</div>
	
<?php
include('SIDEnFOOTER.html');
?>

			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
