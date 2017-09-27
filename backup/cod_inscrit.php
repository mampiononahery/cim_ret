<?php
	require ("includes/const_decl.php");
	//require ("includes/class.phpmailer.php");
	require('fpdf/fpdf.php');
	
	//set_time_limit(0);
	
	@session_start();
	
	if (!empty($_SESSION['id_client'])) {
		$id_client=$_SESSION['id_client'];
	}

	$opt=$_REQUEST['opt'];
	$lang=$_REQUEST['lang'];

	switch ($opt) {
		case 'new':
			//$id_client=$_SESSION['id_client'];
			$login_client=$_REQUEST['login_client'];
			$mot2passe_client=$_REQUEST['mot2passe_client'];
			$email_client=$_REQUEST['email_client'];
			$prenom_client=$_REQUEST['prenom_client'];
			$nom_client=$_REQUEST['nom_client'];
			if (checkdate($_REQUEST['mois'],$_REQUEST['jour'],$_REQUEST['annee']))
				$datenais_client=$_REQUEST['annee'].'-'.$_REQUEST['mois'].'-'.$_REQUEST['jour'];
			else
				$datenais_client='0000-00-00';
			$tel_client=$_REQUEST['tel_client'];
			$id_pays=$_REQUEST['id_pays'];
			$ville_client=$_REQUEST['ville_client'];
			$adresse_client=$_REQUEST['adresse_client'];
			if (!empty($_REQUEST['codepostal_client']))
				$codepostal_client=$_REQUEST['codepostal_client'];
			else
				$codepostal_client='';
			if (!empty($_REQUEST['cgv_client']))
				$cgv_client=$_REQUEST['cgv_client'];
			else
				$cgv_client=0;
			$query="INSERT INTO clients(id_client, login_client, mot2passe_client, email_client, prenom_client, nom_client, datenais_client, tel_client, id_pays, ville_client, adresse_client, codepostal_client, cgv_client, active_client)
					VALUE ('$id_client', '$login_client', '$mot2passe_client', '$email_client', '$prenom_client', '$nom_client', '$datenais_client', '$tel_client', '$id_pays', '$ville_client', '$adresse_client', '$codepostal_client', '$cgv_client', '1')";
			//echo $query;
			mysql_query($query);
			
			//si panier
			if (mysql_num_rows(mysql_query("SELECT * FROM paniers WHERE id_client='$id_client' AND date_insertion='$now'"))!=0) {
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
					//echo $sql;
					mysql_query($sql);
				}
				//suppression panier
				$sql="DELETE FROM paniers WHERE id_client='$id_client' AND date_insertion='$now'";
				mysql_query($sql);
				
				$DF=explode('-',$date_facture);
			
				/*envoi mail de identification et facture*/
				$mail = new PHPmailer();
				$mail->IsSMTP();
				$mail->IsHTML(true);
				$mail->Host='smtp.barence.com';
				$mail->From='myretooch@gmail.com';
				$mail->FromName='myretooch.com';
				$mail->AddAddress($email_client, $prenom_client.' '.$nom_client);
				$mail->AddBCC('j.iboura@live.fr', 'James IBOURA');
				$mail->AddBCC('andry.ratobison@gmail.com', 'Andrianandraina RATOBISON');
				
				//subject
				$mail->Subject='myretooch.com - Votre Identification et Votre Facture';
				//message
				$mail->Body='
						<html>
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
						<p><a href="http://www.myretooch.com" title="www.myretooch.com"><img src="http://www.myretooch.com/images/myretooch_logo.png"></a><br>
						  <br>
						  <u>IDENTIFICATION</u> (<font color="#FF0000">Confidentiel</font>) :</p>
						<table width="40%" border="0" cellspacing="0" cellpadding="0">
						  <tr> 
							<td width="20%"><strong>Nom d\'utilisateur :</strong></td>
							<td width="20%">'.$login_client.'</td>
						  </tr>
						  <tr>
							<td><strong>Mot de passe :</strong></td>
							<td>'.$mot2passe_client.'</td>
						  </tr>
						</table>
						<p> <u><strong>FACTURE N&deg;</strong></u><strong> : </strong>'.$id_facture.'<br>
						  <u><strong>DU</strong></u><strong> :</strong> '.$DF[2].'/'.$DF[1].'/'.$DF[0].'<br>
						  <br>
						  <u><strong>DOIT</strong></u><strong> :</strong> '.$prenom_client.' '.$nom_client.' 
						</p>
						<br>
						<table width="70%" border="0" cellspacing="1" cellpadding="2">
						  <tr class="tr"> 
							<td><div align="center"><strong>#</strong></div></td>
							<td><div align="center"><strong>D&eacute;signation</strong></div></td>
							<td><div align="center"><strong>Nombre</strong></div></td>
							<td><div align="center"><strong>Prix Unitaire</strong></div></td>
							<td><div align="center"><strong>Montant</strong></div></td>
						  </tr>';
						$i=1;
						$tot=0;
						$sql="SELECT * FROM detail_factures
							INNER JOIN services ON services.id_service=detail_factures.id_service
							WHERE id_facture='$id_facture'";
						$results=mysql_query($sql);
						while ($rows=mysql_fetch_array($results)) {
							extract($rows);
							$mail->Body.='
							<tr>
							<td><div align="center">'.$i.'</div></td>
							<td>'.$lib_service.'</td>
							<td><div align="right">'.$qte_panier_client.' fichier(s)</div></td>
							<td><div align="right">&euro; '.number_format($tarif_service,2,',',' ').'</div></td>
							<td><div align="right">&euro; '.number_format($qte_panier_client*$tarif_service,2,',',' ').'</div></td>
						  </tr>
							';
							$tot+=$qte_panier_client*$tarif_service;
							$i++;
						}
						  $mail->Body.='
							<tr>
								<td colspan="5"><div align="center"><hr/></div></td>
							</tr>
							<tr> 
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><div align="right"><strong>TOTAL</strong></div></td>
								<td><div align="right">&euro; '.number_format($tot,2,',',' ').'</div></td>
							</tr>
						</table>
						<br>
						<p> Bien &agrave; vous,<br>
						  <a href="http://www.myretooch.com">www.myretooch.com</a></p>
						</body>
						</html>';
				//post
				$mail->Send();
				$mail->SmtpClose();
				unset($mail);
				header("location:transfert.php?lang=".$lang."&idf=".$id_facture);
			}
			else {
				/*envoi mail de identification*/
				$mail = new PHPmailer();
				$mail->IsSMTP();
				$mail->IsHTML(true);
				$mail->Host='smtp.barence.com';
				$mail->From='myretooch@gmail.com';
				$mail->FromName='myretooch.com';
				$mail->AddAddress($email_client, $prenom_client.' '.$nom_client);
				$mail->AddBCC('j.iboura@live.fr', 'James IBOURA');
				$mail->AddBCC('andry.ratobison@gmail.com', 'Andrianandraina RATOBISON');
				
				//subject
				$mail->Subject='myretooch.com - Votre Identification';
				//message
				$mail->Body='
						<html>
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
						<p><a href="http://www.myretooch.com" title="www.myretooch.com"><img src="http://www.myretooch.com/images/myretooch_logo.png"></a><br>
						  <br>
						  <u>IDENTIFICATION</u> (<font color="#FF0000">Confidentiel</font>) :</p>
						<table width="40%" border="0" cellspacing="0" cellpadding="0">
						  <tr> 
							<td width="20%"><strong>Nom d\'utilisateur :</strong></td>
							<td width="20%">'.$login_client.'</td>
						  </tr>
						  <tr>
							<td><strong>Mot de passe :</strong></td>
							<td>'.$mot2passe_client.'</td>
						  </tr>
						</table>
						<br>
						<p> Bien &agrave; vous,<br>
						  <a href="http://www.myretooch.com">www.myretooch.com</a></p>
						</body>
						</html>';
				//post
				$mail->Send();
				$mail->SmtpClose();
				unset($mail);
				
				
				//Traitement facture
				class PDF extends FPDF {
					function Header()
					{
						//Logo
						$this->Image('images/myretooch_logo.jpg',10,10,50);
						//Police Arial gras 15
						$this->SetFont('Arial','B',25);
						//Décalage à droite
						$this->Cell(80);
						//Titre
						$this->Cell(30,60,'Facture',0,0,'C');
						//Saut de ligne
						$this->Ln(20);
					}
					
					//Pied de page
					function Footer()
					{
						//Positionnement à 1,5 cm du bas
						$this->SetY(-15);
						//Police Arial italique 8
						$this->SetFont('Arial','',6);
						//
						$this->SetDrawColor(0,0,0);
						$this->SetLineWidth(0.2);
						$this->Line(10,280,200,280);
						//
						$tendelle = "fpdf/footer.txt";
						$f=fopen($tendelle,'r');
						$txt=fread($f,filesize($tendelle));
						fclose($f);
						$this->MultiCell(0,4,substr(utf8_decode($txt),1,strlen($txt)),0,'C');
					}
				}
				
				//Instanciation de la classe dérivée
				$pdf=new PDF();
				$pdf->AddPage();
				
				$pdf->SetFillColor(255,255,255);
				$pdf->SetDrawColor(254,156,223);
				$pdf->SetLineWidth(0.5);
				$pdf->Rect(10,52,78,14,'DF');
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(10,50,'Nom d\'utilisateur : ',0,0);
				
				$lgcli=@mysql_result(mysql_query("SELECT login_client FROM clients WHERE id_client='$id_client'"),0);
				
				$pdf->SetFont('Arial','',10);
				$pdf->SetX(42);
				$pdf->Cell(10,50,$lgcli,0,0);
				$pdf->SetFont('Arial','B',10);
				
				$pdf->SetX(10);
				$pdf->SetY(34);
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(10,50,'Abonnement : ',0,0);
				
				$idformule=@mysql_result(mysql_query("SELECT id_formule FROM abonnements WHERE id_client='$id_client' AND expire='0'"),0);
				$idabn=@mysql_result(mysql_query("SELECT id_abn FROM abonnements WHERE id_client='$id_client' AND expire='0'"),0);
				
				$pdf->SetX(35);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(10,50,@mysql_result(mysql_query("SELECT lib_formule FROM formules WHERE id_formule='$idformule'"),0),0,0);
				
				$pdf->SetX(10);
				$pdf->SetY(38);
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(10,50,'E-mail : ',0,0);
				
				$melcli=@mysql_result(mysql_query("SELECT email_client FROM clients WHERE id_client='$id_client'"),0);
				
				$pdf->SetX(24);
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(10,50,$melcli,0,0);
				
				$nomcli=strtoupper(@mysql_result(mysql_query("SELECT nom_client FROM clients WHERE id_client='$id_client'"),0));
				$pnomcli=strtoupper(@mysql_result(mysql_query("SELECT prenom_client FROM clients WHERE id_client='$id_client'"),0));
				
				$pdf->SetY(28);
				$pdf->SetX(90);
				$pdf->SetTextColor(118,118,118);
				$pdf->SetFont('Arial','B',12);
				$pdf->Cell(10,50,$pnomcli.' '.$nomcli,0,0);
				
				$adrcli=strtoupper(@mysql_result(mysql_query("SELECT adresse_client FROM clients WHERE id_client='$id_client'"),0));
				
				$pdf->SetY(34);
				$pdf->SetX(90);
				$pdf->Cell(10,50,$adrcli,0,0);
				
				$vilcli=strtoupper(@mysql_result(mysql_query("SELECT ville_client FROM clients WHERE id_client='$id_client'"),0));
				$cpcli=strtoupper(@mysql_result(mysql_query("SELECT codepostal_client FROM clients WHERE id_client='$id_client'"),0));
				
				$pdf->SetY(40);
				$pdf->SetX(90);
				$pdf->Cell(10,50,$cpcli.' '.$vilcli,0,0);
				
				$pdf->SetY(50);
				$pdf->SetX(9);
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(10,50,'Facture N° : '.$idabn.'/'.$idformule.'/'.date('dmY'),0,0);
				
				$pdf->SetY(60);
				$pdf->Cell(144);
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(10,50,'Paris, le '.strtolower(FormatDate(date('Y-m-d'),"dd mm yyyy","FRA")),0,'R');
				
				$pdf->SetFillColor(204,204,204);
				$pdf->SetDrawColor(0,0,0);
				$pdf->SetLineWidth(0.1);
				$pdf->Rect(10,100,191,5,'DF');
				
				$pdf->SetY(77.5);
				$pdf->SetX(15);
				$pdf->SetTextColor(51,51,51);
				$pdf->SetFont('Times','B',8);
				$pdf->Cell(10,50,'Désignation',0,0);
			
				$pdf->SetX(55);
				$pdf->Cell(10,50,'Période',0,0);
				
				$pdf->SetX(178);
				$pdf->Cell(10,50,'Montant en €',0,0);
				
				$pdf->SetFillColor(204,204,204);
				$pdf->SetDrawColor(0,0,0);
				$pdf->SetLineWidth(0.1);
				$pdf->Rect(10,105,40,5,'DF');
				$pdf->Rect(50,105,125,5,'DF');
				$pdf->Rect(175,105,26.1,5,'DF');
				
				$datedeb=@mysql_result(mysql_query("SELECT deb_periode FROM historique_abn WHERE id_abn='$idabn' ORDER BY deb_periode"),0);
				$datefin=@mysql_result(mysql_query("SELECT fin_periode FROM historique_abn WHERE id_abn='$idabn' ORDER BY deb_periode"),0);
				
				$sqlfacture="UPDATE historique_abn
						  SET facture='1'
						  WHERE id_abn='$idabn' AND deb_periode='$datedeb'";
				mysql_query($sqlfacture);
				
				$DD=explode('-',$datedeb);
				$DF=explode('-',$datefin);
				
				$nbfoto=@mysql_result(mysql_query("SELECT nb_photos FROM abonnements WHERE id_abn='$idabn'"),0);
				$taf=@mysql_result(mysql_query("SELECT tarif_service FROM abonnements WHERE id_abn='$idabn'"),0);
				$remise=@mysql_result(mysql_query("SELECT remise FROM abonnements WHERE id_abn='$idabn'"),0);
				
				$mtpaye=($nbfoto*$taf)-($nbfoto*$taf*$remise);
				
				$pdf->SetY(82.5);
				$pdf->SetX(12);
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont('Arial','',7);
				$pdf->Cell(10,50,'Abonnement',0,0);
				$pdf->SetX(52);
				$pdf->Cell(10,50,'Pour la période du '.$DD[2].'/'.$DD[1].'/'.$DD[0].' au '.$DF[2].'/'.$DF[1].'/'.$DF[0].' ('.@mysql_result(mysql_query("SELECT lib_formule FROM formules WHERE id_formule='$idformule'"),0).').',0,0);
				$pdf->SetX(185);
				$pdf->Cell(10,50,number_format($mtpaye,2,',',' '),0,0);
				
				$pdf->SetFillColor(255,255,255);
				$pdf->SetDrawColor(0,0,0);
				$pdf->SetLineWidth(0.3);
				$pdf->Rect(115,112,65,5,'DF');
				$pdf->Rect(175,112,26.1,5,'DF');
				
				$pdf->SetY(89.6);
				$pdf->SetX(147);
				$pdf->SetTextColor(102,102,102);
				$pdf->SetFont('Arial','B',8);
				$pdf->Cell(10,50,'Montant total : ',0,0);
				$pdf->SetX(183.3);
				$pdf->Cell(10,50,number_format($mtpaye,2,',',' '),0,0);
				
				$pdf->SetY(100);
				$pdf->SetX(8);
				$pdf->SetTextColor(0,0,0);
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(10,50,'Nous vous remercions pour le prélèvement automatique : ',0,0);
				$pdf->SetY(104);
				$pdf->SetX(8);
				$pdf->Cell(10,50,'Le montant de € '.number_format($mtpaye,2,',',' ').' sera prélevé sur votre compte à compter du '.$DD[2].'/'.$DD[1].'/'.$DD[0].'.',0,0);
				
				$pdf->SetY(150);
				$pdf->SetX(20);
				$pdf->SetTextColor(99,99,101);
				$pdf->SetFont('Arial','B',6);
				$pdf->Cell(10,50,'Le Directeur Administratif et Financier',0,0);
				
				$pdf->Output('factures/'.$idabn.'-'.$idformule.'-'.$DD[2].$DD[1].$DD[0].'.pdf');
				
				//Envoi facture
				$mail = new PHPmailer();
				$mail->IsSMTP();
				$mail->IsHTML(true);
				$mail->Host='smtp.barence.com';
				$mail->From='myretooch@gmail.com';
				$mail->FromName='myretooch.com';
				$mail->AddAddress($melcli, $pnomcli.' '.$nomcli);
				$mail->AddBCC('j.iboura@live.fr', 'James IBOURA');
				$mail->AddBCC('andry.ratobison@gmail.com', 'Andrianandraina RATOBISON');
				$mail->AddAttachment('factures/'.$idabn.'-'.$idformule.'-'.$DD[2].$DD[1].$DD[0].'.pdf');
				
				//subject
				$mail->Subject='Facture N° '.$idabn.'/'.$idformule.'/'.date('dmY').' pour '.$pnomcli.' '.$nomcli;
				//message
				$mail->Body='
						<html>
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
					<p><a href="http://www.myretooch.com" title="www.myretooch.com"><img src="http://www.myretooch.com/images/myretooch_logo.png"></a><br>
					  <br>
					Cher Client&egrave;le,</p>
					<p>Nous vous transmettons en pi&egrave;ce jointe votre facture du mois de '.strtoupper(nom_mois(date('m'))).' '.date('Y').'<br>
					Nom d\'utilisateur : '.$lgcli.'</p>
					<p>En cas de probl&egrave;me d&rsquo;ouverture, ci apr&egrave;s le lien vous permettant de t&eacute;l&eacute;charger   gratuitement l&rsquo;Adobe Acrobat version 9.2</p>
					<p><a href="http://www.01net.com/telecharger/windows/Internet/internet_utlitaire/fiches/14537.html">http://www.01net.com/telecharger/windows/Internet/internet_utlitaire/fiches/14537.html</a></p>
					<p>Vous remerciant de votre fid&eacute;lit&eacute;,</p>
					<p>Sinc&egrave;res salutations.</p>
					<p>La Direction du Service Client<br>
					<a href="http://www.myretooch.com">www.myretooch.com</a></p>
					</body>
					</html>';
				//post
				$mail->Send();
				$mail->SmtpClose();
				unset($mail);
				//
				
				header("location:abonnements.php?lang=".$lang."&idf=".$id_facture);
			}
			break;

		case 'maj':
			if (!empty($_REQUEST['change_pwd']))
				$mot2passe_client=$_REQUEST['nmot2passe_client'];
			else
				$mot2passe_client=$_REQUEST['mot2passe_client'];
			$id_client=$_REQUEST['id_client'];
			$email_client=$_REQUEST['email_client'];
			$prenom_client=$_REQUEST['prenom_client'];
			$nom_client=$_REQUEST['nom_client'];
			if (checkdate($_REQUEST['mois'],$_REQUEST['jour'],$_REQUEST['annee']))
				$datenais_client=$_REQUEST['annee'].'-'.$_REQUEST['mois'].'-'.$_REQUEST['jour'];
			else
				$datenais_client='0000-00-00';
			$tel_client=$_REQUEST['tel_client'];
			$id_pays=$_REQUEST['id_pays'];
			$ville_client=$_REQUEST['ville_client'];
			$adresse_client=$_REQUEST['adresse_client'];
			if (!empty($_REQUEST['codepostal_client']))
				$codepostal_client=$_REQUEST['codepostal_client'];
			else
				$codepostal_client='';

			$query="UPDATE clients SET 
					mot2passe_client='$mot2passe_client',
					email_client='$email_client',
					prenom_client='$prenom_client',
					nom_client='$nom_client',
					datenais_client='$datenais_client',
					tel_client='$tel_client',
					id_pays='$id_pays',
					ville_client='$ville_client',
					adresse_client='$adresse_client',
					codepostal_client='$codepostal_client'
					WHERE id_client='$id_client';";
			mysql_query($query);
			header("location:monprofil.php?opt=".$opt."&lang=".$lang);
			break;
	}
?>