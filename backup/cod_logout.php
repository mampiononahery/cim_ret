<?php
	require("includes/const_decl.php");
	session_start();
	$id_client=$_SESSION['id_client'];
	$lang=$_REQUEST['lang'];
	$datecon=date('Y-m-d');
	$heuredecon=date('H:i:s');
	$sql="DELETE FROM paniers WHERE id_client='$id_client'";
	mysql_query($sql);
	$sql2="UPDATE connectes
		   SET heuredecon='$heuredecon'
		   WHERE id_client='$id_client' AND datecon='$datecon' AND heuredecon='00:00:00'";
	mysql_query($sql2);
	session_destroy();
	header("location:accueil.php?lang=".$lang);
?>