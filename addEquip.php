<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Supernatural Equipment</title>
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

					<h3>Add Equipment</h3>
				
					
					<form method="post" action="equipController.php">
					<table>
					<tr><td>Item Name</td><td><input type="text" name="name" size="25" /></td></tr>
					
					<tr><td>Description</td><td><input type="text" name="description" size="50" value="Describe the item."/></td></tr>
					<tr><td></td></tr>
					<tr><td>Rating</td><td>Nonessential<input type="range" name="rating" min="1" max="5" step="1" value="3"/>Important</td></tr>
					<tr><td></td></tr>
					<tr><td colspan="2">Which Creature Is This Item Used For?</td></tr>
					<tr><td>
						<input type="checkbox" name="creature" value="Zombie" /> Zombie<br />
						<input type="checkbox" name="creature" value="Unicorn" /> Unicorn<br />
						<input type="checkbox" name="creature" value="Leprechaun" /> Leprechaun<br />
						<input type="checkbox" name="creature" value="Panda" /> Panda<br />
						<input type="checkbox" name="creature" value="Demon" /> Demon<br />
						<input type="checkbox" name="creature" value="Ghost" /> Ghost<br />
						<input type="checkbox" name="creature" value="Medusa" /> Medusa<br />
						<input type="checkbox" name="creature" value="Vampire" /> Vampire<br />
						<input type="checkbox" name="creature" value="Troll" /> Troll<br />
						<input type="checkbox" name="creature" value="Pikachu" /> Pikachu<br />
						</td></tr>
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
