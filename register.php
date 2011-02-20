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

  <h1>Create Account - This needs to be finished</h1>
  <h1>You need to create a create account.php file</h1>
  <form method="post" action="createAccount.php">
    
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" /><br />
    <label for="pw">Password:</label>
    <input type="password" id="pw" name="pw" /><br />
    <label for="zip">Zipcode:</label>
    <input type="text" id="zip" name="zip" /><br />
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
