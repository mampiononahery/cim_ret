<?php
	require("../includes/const_decl.php");
	session_start();
	$login=$_REQUEST['login_pers'];
	$pwd=$_REQUEST['pwd_pers'];
	$query="SELECT * FROM personnel
			WHERE login_pers='$login' AND pwd_pers='$pwd'";

	$results=mysql_query($query);
	$trouve=mysql_num_rows($results);

	if ($trouve==1) {
		if ($rows=mysql_fetch_array($results)) {
			extract($rows);
			$_SESSION['login_pers']=$login_pers;
			//$_SESSION['prenom']=$prenom;
			$_SESSION['id_pers']=$id_pers;
			header("Location:ca.php");
		}
	}
	else {
		header("Location:index.php");
	}
?>