<?php
	require("../includes/const_decl.php");
	$id=$_REQUEST['id'];
	//clients
	$sql="DELETE FROM clients WHERE id_client='$id'";
	mysql_query($sql);
	//factures
	$sql="DELETE FROM factures WHERE id_client='$id'";
	mysql_query($sql);
	//detail factures
	$sql="DELETE FROM detail_factures WHERE id_client='$id'";
	mysql_query($sql);
	//paniers
	$sql="DELETE FROM paniers WHERE id_client='$id'";
	mysql_query($sql);
	
	header('location:clients.php');
?>