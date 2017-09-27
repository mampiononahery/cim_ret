<?php
	session_start();

	unset($_SESSION['login_pers']);
	
	session_destroy();

	header("location:index.php");
?>