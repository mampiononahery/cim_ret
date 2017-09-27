<?php
	require("../includes/const_decl.php");
	$id=$_REQUEST['id'];
	//newsletters
	$sql="DELETE FROM newsletter WHERE email='$id'";
	mysql_query($sql);
	header('location:newsletters.php');
?>