<?php
	require ("includes/const_decl.php");
	require ("includes/langues.php");
	
	@session_start();
	
	//$id_client=$_REQUEST['custom'];
	//$id_formule=$_REQUEST['item_number'];
	
	//création répertoire myretooch.com
	//$connexion = ftp_connect(FTP_SERVER);
	//$login = ftp_login($connexion, FTP_LOGIN, FTP_PASSWORD);
	//if (!$connexion || !$login) { die('Connexion réfusée!'); }
	
	//@ftp_cdup($connexion);
	//$rep='gestion/clients/'.$id_client;
	//@ftp_mkdir($connexion,$rep);
	//ftp_close($connexion);
				
	//création répertoire oooophoto.com
	//$connexion = ftp_connect(FTPSERVER);
	//$login = ftp_login($connexion, FTPLOGIN, FTPPASSWORD);
	//if (!$connexion || !$login) { die('Connexion réfusée!'); }

	//@ftp_cdup($connexion);

	/*$rep=$id_client;
	@ftp_mkdir($connexion,$rep);
	ftp_close($connexion);*/
	
	//$nb_photos=mysql_result(mysql_query("SELECT nb_photos FROM formules WHERE id_formule='$id_formule'"),0);
	//$remise=mysql_result(mysql_query("SELECT remise FROM formules WHERE id_formule='$id_formule'"),0);
	
	//$id_service=mysql_result(mysql_query("SELECT id_service FROM formules WHERE id_formule='$id_formule'"),0);
	
	//$tarif_service=mysql_result(mysql_query("SELECT tarif_service FROM services WHERE id_service='$id_service'"),0);

	$date_abn=date('Y-m-d');
	
	/*$sql="INSERT INTO abonnements (id_client, id_formule, nb_photos, tarif_service, remise, date_abn)
		  VALUES ('$id_client', '$id_formule', '$nb_photos', '$tarif_service', '$remise', '$date_abn')";
		 
	mysql_query($sql);*/
	
	//$id_abn=mysql_insert_id();
	for ($i=date('m'); $i<12+date('m'); $i++) {
		if ($i>12) {
			$m=$i-12;
			$y=date('Y')+1;
		}
		else {
			if ($i<10)
				$m='0'.$i;
			else
				$m=$i;
			$y=date('Y');
		}
		
		$mois = mktime( 0, 0, 0, $m, 1, $y );
		
		if ($m==date('m'))
			$deb_periode=$date_abn;
		else {
			if (strlen($m)==1)
				$deb_periode=$y.'-0'.$m.'-01';
			else
				$deb_periode=$y.'-'.$m.'-01';
		}
		
		if (strlen($m)==1)
			$fin_periode=$y.'-0'.$m.'-'.date("t",$mois);
		else
			$fin_periode=$y.'-'.$m.'-'.date("t",$mois);
		echo $i.' = '.$deb_periode.' -> '.$fin_periode.'<br/>';
		/*$sql="INSERT INTO historique_abn (id_abn, deb_periode, fin_periode)
			  VALUES ('$id_abn', '$deb_periode', '$fin_periode')";
		mysql_query($sql);*/
	}
	
	//creation repertoire pour recevoir les photos
	//$connexion = ftp_connect(FTPSERVER);
	//$login = ftp_login($connexion, FTPLOGIN, FTPPASSWORD);
	//if (!$connexion || !$login) { die('Connexion réfusée!'); }
	
	for ($i=date('m'); $i<12+date('m'); $i++) {
		if ($i>12) {
			$m=$i-12;
			$y=date('Y')+1;
		}
		else {
			if ($i<10)
				$m='0'.$i;
			else
				$m=$i;
			$y=date('Y');
		}
		
		$mois = mktime( 0, 0, 0, $m, 1, $y );
		
		if ($m==date('m'))
			$deb_periode=$date_abn;
		else {
			if (strlen($m)==1)
				$deb_periode=$y.'-0'.$m.'-01';
			else
				$deb_periode=$y.'-'.$m.'-01';
		}
		
		$DD=explode('-',$deb_periode);
		
		//echo $DD[2].'/'.$DD[1].'/'.$DD[0].'<br/>';
		//@ftp_cdup($connexion);
		//$rep=$id_client.'/'.$id_abn.'-'.$id_formule.'-'.$DD[2].$DD[1].$DD[0];
		//@ftp_mkdir($connexion,$rep);
	}
	//ftp_close($connexion);	
	
	//header("location:monabonnement.php");
?>