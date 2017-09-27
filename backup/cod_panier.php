<?php
	require "includes/const_decl.php";
	require "includes/langues.php";

	@session_start();
	
	$id_client=$_SESSION['id_client'];
	$sql="SELECT * FROM services";
	$res=mysql_query($sql);
	while ($lig=mysql_fetch_array($res)) {
		extract($lig);
		if (!empty($_REQUEST['qte_'.$id_service])) {
			if ($_REQUEST['qte_'.$id_service]!=0) {
				$qte=$_REQUEST['qte_'.$id_service];
				$id=$_REQUEST['s_'.$id_service];
				$sql="UPDATE paniers SET
					qte_panier_client='$qte'
					WHERE id_client='$id_client' AND id_service='$id'";
					mysql_query($sql);
			}
		}
	}

	echo '<script>location.href="monpanier.php?lang='.$lang.'";</script>';
	//header("location:monpanier.php?lang=$lang");
?>