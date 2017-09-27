<?php
	require('fpdf/fpdf.php');
	
	@set_time_limit(0);
	
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
	
	$sqlabn="SELECT * FROM abonnements WHERE expire='0'";
	$resabn=mysql_query($sqlabn);
	while ($ligabn=mysql_fetch_array($resabn)) {
		extract($ligabn);
		$id_client=$id_client;
		$id_abn=$id_abn;
		$id_formule=$id_formule;
		$nb_photos=$nb_photos;
		$tarif_service=$tarif_service;
		$remise=$remise;
		$mois_an_cours=date('Y-m').'%';
		$sqldetabn="SELECT * FROM historique_abn WHERE $id_abn='$id_abn' AND deb_periode LIKE '$mois_an_cours' AND facture='0'";
		$resdetabn=mysql_query($sqldetabn);
		while ($ligdetabn=mysql_fetch_array($resdetabn)) {
			extract($ligdetabn);
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
			
			$pdf->SetX(35);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(10,50,@mysql_result(mysql_query("SELECT lib_formule FROM formules WHERE id_formule='$id_formule'"),0),0,0);
			
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
			$pdf->Cell(10,50,'Facture N° : '.$id_abn.'/'.$id_formule.'/'.date('dmY'),0,0);
			
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
			
			$datedeb=@mysql_result(mysql_query("SELECT deb_periode FROM historique_abn WHERE id_abn='$id_abn' AND deb_periode LIKE '$mois_an_cours'"),0);
			$datefin=@mysql_result(mysql_query("SELECT fin_periode FROM historique_abn WHERE id_abn='$id_abn' AND fin_periode LIKE '$mois_an_cours'"),0);
			
			$sqlfacture="UPDATE historique_abn
						SET facture='1'
			  			WHERE id_abn='$id_abn' AND deb_periode='$datedeb'";
			mysql_query($sqlfacture);
			
			$DD=explode('-',$datedeb);
			$DF=explode('-',$datefin);
			
			$mtpaye=($nb_photos*$tarif_service)-($nb_photos*$tarif_service*$remise);
			
			$pdf->SetY(82.5);
			$pdf->SetX(12);
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(10,50,'Abonnement',0,0);
			$pdf->SetX(52);
			$pdf->Cell(10,50,'Pour la période du '.$DD[2].'/'.$DD[1].'/'.$DD[0].' au '.$DF[2].'/'.$DF[1].'/'.$DF[0].' ('.@mysql_result(mysql_query("SELECT lib_formule FROM formules WHERE id_formule='$id_formule'"),0).').',0,0);
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
			
			$pdf->Output('factures/'.$id_abn.'-'.$id_formule.'-'.$DD[2].$DD[1].$DD[0].'.pdf');
			
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
			$mail->AddAttachment('factures/'.$id_abn.'-'.$id_formule.'-'.$DD[2].$DD[1].$DD[0].'.pdf');
			
			//subject
			$mail->Subject='Facture N° '.$id_abn.'/'.$id_formule.'/'.date('dmY').' pour '.$pnomcli.' '.$nomcli;
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
				<p><a href="http://www.01net.com/telecharger/windows/Internet/internet_utlitaire/fiches/14537.html">http://www.01net.com/telecharger/windows/Internet/internet_utilitaire/fiches/14537.html</a></p>
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
		}
	}
	
	$now=date('Y-m-d');
	//Expiration de l'abonnement
	$sqlabn="SELECT * FROM abonnements WHERE expire='0'";
	$resabn=mysql_query($sqlabn);
	while ($ligabn=mysql_fetch_array($resabn)) {
		extract($ligabn);
		$idabn=$id_abn;
		$date_fin=@mysql_result(mysql_query("SELECT MAX(fin_periode) FROM historique_abn WHERE id_abn='$idabn'"),0);
		if (DiffDate($date_fin,$now,"d")>0) {
			$perime="UPDATE abonnements
				SET expire='1'
				WHERE id_abn='$idabn'";
			mysql_query($perime);
		}
	}
?>
<script language="javascript" type="text/javascript">
	function verifier_inscription() {
		var form=document.forms["inscrit"]
		var verif = /^[.a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
		
		if (verif.exec(form.email.value)==null) {
			document.getElementById("email").style.color="#939393"
			form.email.focus()
			return false
		}
		else {
			document.getElementById("email").style.color="#555555"
		}
	}
</script>
<div id="bas"><div id="lettre"><?php echo _NEWSLETTER; ?>&nbsp;&nbsp;:</div><div id="inscrit"><form name="inscrit" id="inscrit" method="post" action="?lang=<?php echo $lang; ?>" enctype="multipart/form-data" class="form_inscrit" onSubmit="return verifier_inscription();"><input type="text" class="texte_lettre" name="email" id="email" value="<?php if (empty($email)) echo _VMAIL; else echo $email; ?>" onblur="if(this.value=='') this.value='<?php echo _VMAIL; ?>';" onfocus="if(this.value=='<?php echo _VMAIL; ?>') this.value='';" autocomplete="off" /><input name="ok" type="image" src="images/ok.png" class="ok_lettre" /></form></div><div id="msg"><?php echo $msg; ?></div><div id="social"><a href="http://www.facebook.com/profile.php?id=100000511398543#!/group.php?gid=244667642180" target="_blank" title="<?php echo _SUIVRE; ?> Facebook"><img src="images/facebook.png" height="27" /></a><!--&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.blogger.com" title="<?php //echo _SUIVRE; ?> Blogger" target="_blank"><img src="images/blogger.png" height="27" /></a>!-->&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.twitter.com/myretooch" target="_blank" title="<?php echo _SUIVRE; ?> Twitter"><img src="images/twitter.png" height="27" /></a><!--&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.myspace.com/" title="<?php //echo _SUIVRE; ?> Myspace" target="_blank"><img src="images/myspace.png" height="27" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.skyrock.com" title="<?php //echo _SUIVRE; ?> Skyrock" target="_blank"><img src="images/skyrock.png" height="27" /></a>!--></div></div>