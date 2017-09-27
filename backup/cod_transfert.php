<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
	require ("includes/const_decl.php");
	//require ("includes/class.phpmailer.php");
	
	//set_time_limit(0);
	
	@session_start();
	
	$nb_photo=0;
	$id_facture=$_REQUEST['id_facture'];
	$id_client=$_SESSION['id_client'];
	$_SESSION['code_promo']='';
	$lang=$_REQUEST['lang'];
	
	$CurDate=Now("DATE");
	$date7=$CurDate;
	for ($i=1,$j=1;$i<8;$i++) {
		$date7 = AjouterDate($date7,"d",$j);
		if (JourFR(Jour($date7))=='Samedi') {
			$date7 = AjouterDate($date7,"d",2);
		}
	}
	$d7=explode('-',$date7);
	$date7=$d7[2].'/'.$d7[1].'/'.$d7[0];
	
	switch ($lang) {
		case 'fr':
			$lang='fr';			
			include "langues/fr.php";
			break;
		case 'en':
			$lang='en';
			include "langues/en.php";
			break;
		case 'es':
			$lang='es';
			include "langues/es.php";
			break;
		case 'ru':
			$lang='ru';
			include "langues/ru.php";
			break;
		case 'jp':
			$lang='jp';
			include "langues/jp.php";
			break;
	}
	
	$sql="SELECT * FROM clients WHERE id_client='$id_client'";
	$result=mysql_query($sql);
	if ($row=mysql_fetch_array($result)) {
		extract($row);
		$email_client=$email_client;
		$prenom_client=$prenom_client;
		$nom_client=$nom_client;
	}
	
	//création répertoire myretooch.com
	$connexion = ftp_connect(FTP_SERVER);
	$login = ftp_login($connexion, FTP_LOGIN, FTP_PASSWORD);
	if (!$connexion || !$login) { die('Connexion réfusée!'); }
	
	@ftp_cdup($connexion);
	$rep='gestion/clients/'.$id_client;
	@ftp_mkdir($connexion,$rep);
	@ftp_chdir($connexion,$rep);
	
	$rep=$id_facture;
	@ftp_mkdir($connexion,$rep);
	
	ftp_close($connexion);
	
	//création répertoire oooophoto.com
	$connexion = ftp_connect(FTPSERVER);
	$login = ftp_login($connexion, FTPLOGIN, FTPPASSWORD);
	if (!$connexion || !$login) { die('Connexion réfusée!'); }
	
	@ftp_cdup($connexion);
	
	$rep=$id_client;
	@ftp_mkdir($connexion,$rep);
	@ftp_chdir($connexion,$rep);
	
	$rep=$id_facture;
	@ftp_mkdir($connexion,$rep);

	$rep=$id_client.'/'.$id_facture;
	
	@ftp_cdup($connexion);
	//echo $id_facture.' '.$id_client;
	$sql="SELECT * FROM factures
		INNER JOIN detail_factures ON detail_factures.id_facture=factures.id_facture
		INNER JOIN services ON services.id_service=detail_factures.id_service
		WHERE factures.id_facture='$id_facture' AND id_client='$id_client'";
	$resultat=mysql_query($sql);
	while($enr=mysql_fetch_array($resultat)) {
		extract($enr);
		$DF=explode('-',$date_facture);
		for ($i=1;$i<=$qte_panier_client;$i++) {
			$lib_service = strtr($lib_service, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			//echo $_FILES[ereg_replace(' ','_',ereg_replace('&eacute;','e',$lib_service).$i)]['tmp_name'];
			if (!empty($_FILES[ereg_replace(' ','_',$lib_service).$i]['tmp_name'])) {
				$nb_photo++;
				$nom_photo=$_FILES[ereg_replace(' ','_',$lib_service).$i]['name'];
				$extension=substr($_FILES[ereg_replace(' ','_',$lib_service).$i]['name'],strlen($_FILES[ereg_replace(' ','_',$lib_service).$i]['name'])-3,3);
				if (strtolower($extension)!='jpg' && strtolower($extension)!='jpeg' && strtolower($extension)!='gif' && strtolower($extension)!='png') {
					echo '<script>alert("'._FICNUM.' '.$nb_photo.' '._NIMG.'");</script>';
					echo '<script>javascript:history.go(-1);</script>';
					exit();
				}
				
				//remplacement de l'espacement
				$nom_photo=ereg_replace(' ','_',$nom_photo);
				
				//remplacement des caractères accentués
				$nom_photo = strtr($nom_photo, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ/', 
                                     'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy/');
				//
				
				$fichier_photo=$_FILES[ereg_replace(' ','_',$lib_service).$i]['tmp_name'];
				$newfile="ftp://user04:321JamesiE@ftp.oooophoto.com//".$rep."/".$nom_photo;
				//echo $newfile;
				//récupérer le commentaire
				$commentaire=$_REQUEST['c'.ereg_replace(' ','_',$lib_service).$i];
				$sql="INSERT INTO travaux (id_client, id_facture, id_service, photo, commentaire)
					VALUES ('$id_client', '$id_facture', '$id_service', '$nom_photo', '$commentaire')";
				mysql_query($sql);

				//transfert vers ftp
				//$upload = @ftp_put($connexion, $newfile, $fichier_photo, FTP_BINARY);
				@copy($_FILES[ereg_replace(' ','_',$lib_service).$i]['tmp_name'], $newfile);
			}
		}
	}
	ftp_close($connexion);
	
	if ($nb_photo==0) {
		echo '<script>alert("'._OOPS.'");</script>';
		echo '<script>javascript:history.go(-1);</script>';
		exit();
	}
	
	if (empty($prenom_client))
		$prenom_client='Ladisse';
	if (!empty($prenom_client))
		$nom_client='(Modele Management)';
	
		//envoi mail au traiteur
		$mail = new PHPmailer();
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$mail->Host='smtp.barence.com';
		$mail->From='j.iboura@live.fr';
		$mail->FromName='team oooophoto.com';
		$mail->AddAddress('kitxenons@gmail.com');
		$mail->AddBCC('j.iboura@live.fr', 'James IBOURA');
		$mail->AddBCC('andry.ratobison@gmail.com', 'Andrianandraina RATOBISON');
		
		//subject
		$mail->Subject='oooophoto.com - Travaux A Faire';
		//message
		$mail->Body='<html>
					<head>
					<style type="text/css">
						body {
							font-family:"Trebuchet MS", Verdana, sans-serif;
							font-size:14px;
						}
						img {
							border:none;
						}
						a {
							text-decoration:none;
						}
						a:hover {
							text-decoration:none;
							font-weight:bold;
						}
						table {
							border:1px solid #000000;
							background-color:#E5E5E5;
							color:#6B6B6B;
							font-size:12px;
						}
						.tr {
							background-color:#000000;
							color:#eedfda;
						}
					</style>		
					</head>
				<body>
				<p> Bonjour,<br><br>
				  <u><strong>FACTURE N&deg;</strong></u><strong> : </strong>'.$id_facture.'<br>
				  <u><strong>DU</strong></u><strong> :</strong> '.$DF[2].'/'.$DF[1].'/'.$DF[0].'<br>
				  <br>
				  <u><strong>CLIENT N&deg;</strong></u> : '.$id_client.' - '.$prenom_client.' '.$nom_client.'<br>
				  <u><strong>REPERTOIRE</strong></u> (oooophoto.com) : '.$id_client.'/'.$id_facture.'<br><br>
				
				<table width="70%" border="0" cellspacing="1" cellpadding="2">
				  <tr class="tr"> 
					<td><div align="center"><strong>#</strong></div></td>
					<td><div align="center"><strong>Service demand&eacute;</strong></div></td>
					<td><div align="center"><strong>Nom de fichier</strong></div></td>
					<td><div align="center"><strong>Commentaire</strong></div></td>
				  </tr>';
				  
				  $i=1;
				  $sql="SELECT * FROM travaux
						INNER JOIN services ON services.id_service=travaux.id_service 
						WHERE id_facture='$id_facture' && id_client='$id_client'";
				  $results=mysql_query($sql); 
				  while ($rows=mysql_fetch_array($results)) {
					extract($rows);
					$mail->Body.=' 
					  <tr> 
						<td><div align="center">'.$i.'</div></td>
						<td>'.$lib_service.'</td>
						<td><div align="center">'.$photo.'</div></td>
						<td><div align="justify">'.$commentaire.'</div></td>
					  </tr>';
					  $i++;
				 }
				$mail->Body.='
				</table>
				<br>
				<p>Bien &agrave; vous,<br>
				  <b>TEAM OOOOPHOTO.COM</b></p>
				</body>
				</html>';
		//post
		//echo $mail->Body;
		$mail->Send();
		$mail->SmtpClose();
		unset($mail);
	//
	echo '<script>alert("'.$nb_photo._NB_FILE.'\n'._DAT_PHOTO.$date7.'.");
			location.href="choix_service.php?lang='.$lang.'"
		</script>';
?>