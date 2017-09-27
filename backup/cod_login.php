<?php
	require("includes/const_decl.php");
	require("includes/langues.php");
	
	session_start();
	$login=$_REQUEST['login'];
	
	$pwd=$_REQUEST['pwd'];
	$query="SELECT * FROM clients
			WHERE login_client='$login' AND mot2passe_client='$pwd'";
	//echo $query;
	$results=mysql_query($query);
	$trouve=mysql_num_rows($results);
	//echo $trouve;
	if ($trouve>=1) {
		if ($rows=mysql_fetch_array($results)) {
			extract($rows);
			$_SESSION['login_client']=$login_client;
			$_SESSION['id_client']=$id_client;
			$datecon=date('Y-m-d');
			$heurecon=date('H:i:s');
			$sql="INSERT INTO connectes(id_client, datecon, heurecon)
				  VALUES ('$id_client','$datecon','$heurecon')";
			mysql_query($sql);
			/*header("Location:choix_service.php?id_client=".$id_client."&lang=".$lang);*/
			header("Location:monpanier.php?id_client=".$id_client."&lang=".$lang);
		}
	}
	else {
		echo '<script>alert("'._ERREUR.'");
			location.href="connexion.php?lang='.$lang.'";
		</script>';
		
	}
?>