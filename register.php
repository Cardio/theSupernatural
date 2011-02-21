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

  <h3>Create Account</h3>
  <form method="post" action="registerController.php">
    
    <label for="username">Type Username:</label>
    <input type="text" id="username" name="username" /><br />
    <label for="pw">Type Password:</label>
    <input type="password" id="pw" name="pw" /><br />
    <label for="pw">Retype Password:</label>
    <input type="password" id="pw" name="pw2" /><br />
    <input type="submit" value="Create Account" name="submit" />
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
