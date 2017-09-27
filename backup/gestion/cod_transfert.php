<?php
	require ("../includes/const_decl.php");
	require ("../includes/class.phpmailer.php");
	
	set_time_limit(0);
	
	session_start();
	
	$nb_photo=0;
	$id_facture=$_REQUEST['id_facture'];
	$id_client=$_REQUEST['id_client'];
	
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
	
	@ftp_chdir($connexion,'gestion/clients');
	
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
	//echo $sql;
	$resultat=mysql_query($sql);
	while($enr=mysql_fetch_array($resultat)) {
		extract($enr);
		$DF=explode('-',$date_facture);
		for ($i=1;$i<=$qte_panier_client;$i++) {
			if (!empty($_FILES[ereg_replace(' ','_',ereg_replace('&eacute;','e',$lib_service).$i)]['tmp_name'])) {
				$nb_photo++;
				$nom_photo=$_FILES[ereg_replace(' ','_',ereg_replace('&eacute;','e',$lib_service).$i)]['name'];
				$extension=substr($_FILES[ereg_replace(' ','_',ereg_replace('&eacute;','e',$lib_service).$i)]['name'],strlen($_FILES[ereg_replace(' ','_',ereg_replace('&eacute;','e',$lib_service).$i)]['name'])-3,3);
				if (strtolower($extension)!='jpg' && strtolower($extension)!='jpeg' && strtolower($extension)!='gif' && strtolower($extension)!='png' && strtolower($extension)!='zip' && strtolower($extension)!='rar') {
					echo '<script>alert("Le fichier No '.$nb_photo.' n\'est pas autorisé.");</script>';
					echo '<script>javascript:history.go(-1);</script>';
					exit();
				}
				
				//remplacement de l'espacement
				$nom_photo=ereg_replace(' ','_',$nom_photo);
				
				//remplacement des caractères accentués
				$nom_photo=ereg_replace('â','a',$nom_photo);
				$nom_photo=ereg_replace('à','a',$nom_photo);
				$nom_photo=ereg_replace('ä','a',$nom_photo);
				
				$nom_photo=ereg_replace('é','e',$nom_photo);
				$nom_photo=ereg_replace('è','e',$nom_photo);
				$nom_photo=ereg_replace('ê','e',$nom_photo);
				$nom_photo=ereg_replace('ë','e',$nom_photo);
				
				$nom_photo=ereg_replace('î','i',$nom_photo);
				$nom_photo=ereg_replace('ì','i',$nom_photo);
				$nom_photo=ereg_replace('ï','i',$nom_photo);
				
				$nom_photo=ereg_replace('ô','o',$nom_photo);
				$nom_photo=ereg_replace('ö','o',$nom_photo);
				$nom_photo=ereg_replace('ò','o',$nom_photo);
				
				$nom_photo=ereg_replace('ü','u',$nom_photo);
				$nom_photo=ereg_replace('û','u',$nom_photo);
				$nom_photo=ereg_replace('ù','u',$nom_photo);
				
				$nom_photo=ereg_replace('ÿ','y',$nom_photo);

				//
				
				$fichier_photo=$_FILES[ereg_replace(' ','_',ereg_replace('&eacute;','e',$lib_service).$i)]['tmp_name'];
				$newfile="ftp://user06:321JamesiC@ftp.myretooch.com//".$rep."/".$nom_photo;
				
				//transfert vers ftp
				//$upload = @ftp_put($connexion, $newfile, $fichier_photo, FTP_BINARY);
				@copy($_FILES[ereg_replace(' ','_',ereg_replace('&eacute;','e',$lib_service).$i)]['tmp_name'], $newfile);
			}
		}
	}
	ftp_close($connexion);
	
	if ($nb_photo==0) {
		echo '<script>alert("Oops! aucun fichier transféré. Veuillez réessayer.");</script>';
		echo '<script>javascript:history.go(-1);</script>';
		exit();
	}
	
	//insertion date de livraison
	$sql="UPDATE factures SET date_livraison='".date('Y-m-d')."' WHERE id_facture='$id_facture'";
	mysql_query($sql);
	
	//envoi mail au traiteur
	$mail = new PHPmailer();
	$mail->IsSMTP();
	$mail->IsHTML(true);
	$mail->Host='smtp.barence.com';
	$mail->From='myretooch@gmail.com';
	$mail->FromName='myretooch.com';
	$mail->AddAddress(mysql_result(mysql_query("SELECT email_client FROM clients WHERE id_client='$id_client'"),0), mysql_result(mysql_query("SELECT prenom_client FROM clients WHERE id_client='$id_client'"),0).' '.mysql_result(mysql_query("SELECT nom_client FROM clients WHERE id_client='$id_client'"),0));
	$mail->AddBCC('james_iboura@live.fr', 'James IBOURA');
	$mail->AddBCC('andry.ratobison@gmail.com', 'Andrianandraina RATOBISON');
	
	//subject
	$mail->Subject='myretooch.com - Bon de livraison suivant Facture N°'.$id_facture.' du '.FormatDate(mysql_result(mysql_query("SELECT date_facture FROM factures WHERE id_facture='$id_facture'"),0),'d/m/y');
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
			<p><a href="http://www.myretooch.com" title="www.myretooch.com"><img src="http://www.myretooch.com/images/myretooch_logo.gif" border="0"></a><br>
			  <br>
			  <u><strong>BON DE LIVRAISON suivant FACTURE N&deg;</strong></u><strong> : </strong>'.$id_facture.'<br>
			  <u><strong>DU</strong></u><strong> :</strong> '.$DF[2].'/'.$DF[1].'/'.$DF[0].'<br>
			  <br>
			  <u><strong>CLIENT N&deg;</strong></u> : '.$id_client.' - '.$prenom_client.' '.$nom_client.' - '.$email_client.'<br><br>
			  <strong>Pour récupérer vos fichiers, <a href="http://www.myretooch.com/download.php?id_client='.$id_client.'&id_facture='.$id_facture.'"><i>cliquez ici</i></a>.</strong><br><br>
			<table width="70%" border="0" cellspacing="1" cellpadding="2">
			  <tr class="tr"> 
				<td><div align="center"><strong>#</strong></div></td>
				<td><div align="center"><strong>Service(s) demand&eacute;(s)</strong></div></td>
				<td><div align="center"><strong>Nom(s) de fichier(s)</strong></div></td>
				<td><div align="center"><strong>Vos commentaires</strong></div></td>
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
			Paris le, '.date("d/m/y").'
			<br>
			<p>Bien &agrave; vous,<br>
			  <a href="http://www.myretooch.com">www.myretooch.com</a></p>
			</body>
			</html>';
	//post
	//echo $mail->Body;
	$mail->Send();
	$mail->SmtpClose();
	unset($mail);
	//
	
	echo '<script>alert("'.$nb_photo.' fichier(s) transféré(s) avec succès.");
			location.href="choix_client.php"
		</script>';
?>