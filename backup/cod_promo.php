<?php
	require ("includes/const_decl.php");
	require ("includes/langues.php");

	//set_time_limit(0);
	
	@session_start();
	
	$id_client=$_SESSION['id_client'];
	
	if ($id_client)
		$_SESSION['code_promo']=$_REQUEST['code_promo'];
	
	$code_promo=$_SESSION['code_promo'];
	
	$nb_photo=mysql_result(mysql_query("SELECT nb_photo FROM promos WHERE id_promo='$code_promo'"),0);
	if ($nb_photo==0)
		header("location:monpanier.php?lang=".$lang);
	else {
		//echo $id_client;
		//traitement panier
		$sql1="SELECT * FROM services WHERE id_service='1'";
		$results=mysql_query($sql1);
		while ($rows=mysql_fetch_array($results)) {
			extract($rows);
			$id_service=$id_service;
			$tarif_service=0;
			$date_insertion=date('Y-m-d');
			$sql2="INSERT INTO paniers (id_client, id_service, qte_panier_client, tarif_service, date_insertion) VALUES ('$id_client', '$id_service' ,'$nb_photo', '$tarif_service', '$date_insertion')";
			//echo $sql2;
			mysql_query($sql2);
		}
		//traitement facture
		$now=date('Y-m-d');
		$date_facture=$now;
		$dern=mysql_result(mysql_query("SELECT COUNT(*) FROM factures"),0);
		if ($dern==0)
			$dern=1;
		else 
			$dern+=1;
		while (strlen($dern)<5) {
			$dern='0'.$dern;
		}
		$id_facture=date('m').date('d').$dern;
		
		//enregistrement facture
		if (mysql_num_rows(mysql_query("SELECT * FROM paniers WHERE id_client='$id_client' AND date_insertion='$now'"))!=0) {
			$sql1="DELETE FROM paniers WHERE id_client='$id_client' AND qte_panier_client='0'";
			mysql_query($sql1);
			$sql2="INSERT INTO factures (id_facture, id_client, date_facture)
				VALUES ('$id_facture', '$id_client', '$date_facture')";
			mysql_query($sql2);
		}
		
		//enregistrement detail facture
		$sql="SELECT * FROM paniers WHERE id_client='$id_client' AND date_insertion='$now'";
		$results=mysql_query($sql);
		while ($rows=mysql_fetch_array($results)) {
			extract($rows);
			$id_service=$id_service;
			$qte_panier_client=$qte_panier_client;
			$tarif_service=$tarif_service;
			$sql="INSERT INTO detail_factures (id_facture, id_service, qte_panier_client, tarif_service)
				VALUES ('$id_facture', '$id_service', '$qte_panier_client', '$tarif_service')";
			mysql_query($sql);
		}
		
		//suppression panier
		$sql="DELETE FROM paniers WHERE id_client='$id_client' AND date_insertion='$now'";
		mysql_query($sql);
		
		header("location:transfert.php?lang=".$lang."&idf=".$id_facture);
	}
?>