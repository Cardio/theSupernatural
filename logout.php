<?php
	session_start();
	session_destroy();
	setcookie('id', '', time()-3600);
	header('Location: index.php');
	?>