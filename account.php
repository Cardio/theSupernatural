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

<div id="wrap">
	<div class="pagewrapper">
		<div class="innerpagewrapper">
			<div class="page">
				<div class="content">
				
					<!-- CONTENT -->

  <h3>Account Settings</h3>
<br/>
<p>Change your password here:<br/></p>
<form action="pwChangeController.php" method="post">
<p>New Password: <input type="password" name="pw1" /></p>
<p>Retype New Password: <input type="password" name="pw2" /></p>
<p><input type="submit" value="Change Password" /></p>
</form>
<br/>
<p>Edit your account info here:<br/></p>
<form action="infoChangeController.php" method="post">
<p>Change your zip code: <input type="text" name="zip" /></p>
<p>Other stuff will come later.</p>
<p><input type="submit" value="Edit Account Info" /></p>
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


