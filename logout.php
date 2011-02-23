<?php
	session_start();
	session_destroy();
	setcookie('pw', '', time()-3600);
	header('Location: index.php');
	?>