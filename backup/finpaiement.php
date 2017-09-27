<?php
	require ("includes/const_decl.php");
	//require ("includes/class.phpmailer.php");
	require ("includes/langues.php");
	@session_start();
	if (!empty($_SESSION['id_client']))
		$id_client=$_SESSION['id_client'];
	else
		$id_client='';
	
	$heure_fin=date('H:i:s');
	$ip_page=$_SESSION['ip_page'];
	$nom_page=$_SESSION['nom_page'];
	@mysql_query("UPDATE stats SET
				 heure_fin='$heure_fin'
				 WHERE
				 ip_page='$ip_page' AND
				 nom_page='$nom_page' AND
				 heure_fin='00:00:00'");
	
	unset($_SESSION['ip_page']);
	unset($_SESSION['nom_page']);
	
	$ip_page=$_SERVER['REMOTE_ADDR'];
	$nom_page=explode('/',$_SERVER['PHP_SELF']);
	$date_page=date('Y-m-d');
	$heure_deb=date('H:i:s');
	$nom_pg=$nom_page[2];
	/**/
	@mysql_query("INSERT INTO stats(ip_page, nom_page, date_page, heure_deb) VALUES ('$ip_page', '$nom_pg','$date_page','$heure_deb')");
	$_SESSION['ip_page']=$ip_page;
	$_SESSION['nom_page']=$nom_pg;
	/**/
	$msg='';
	if (!empty($_REQUEST['email'])) {
		$email=$_REQUEST['email'];
		if (mysql_num_rows(mysql_query("SELECT * FROM newsletter WHERE email='$email'"))==0) {
			mysql_query("INSERT INTO newsletter (email) VALUES ('$email')");
			$msg=_INSCRIT_OK;
		}
		else {
			$msg=_INSCRIT_DEJA;
		}
	}
	else {
		$email='';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo _ISO;?> " />
<title>myretooch.com::<?php echo strtolower(_INSCRIRE); ?></title>
<!-- Favicon -->
<link rel="icon" href="favicon.ico"/>
<!-- Favicon -->
<meta name="Author" content="Andrianandraina RATOBISON"/>
<meta name="Description" content="Retouche d'images professionnelle sur Paris, spécialisée en retouche photo de types mode, beauté, art, montage, relooking, réparation. Retouche de photos essentiellement pour la publicité, la presse, les maisons de disques et les photographes de mode."/>
<meta name="Category" content="photo, retouche de photos, retouche d'images, illustration, mode, beauté, montage, relooking, réparation, traitement de l'image, art numérique"/>
<meta name="Classification" content="retouche photo, retouche de photos, retouche d'images, post-production, infographie, illustration, photomontages, traitement de l'image, art numérique" />
<meta name="keywords" content="myretooch, retouche, retouche numérique, photo retouching, affinement de silhouette, myretooch, myretooch.com, chromie, colorimétrie, colorisation, conception graphique, couverture magazine, cover mag, correction de peau, correction de silhouette, créa, créations visuelles, détourage, digital retoucher, edito, edition, fluidite, grain de peau, galérie d'images, galérie photos, galéries photos, graphisme, graphiste, image, images, incrustation, illustration, illustrateur, illustratrice, lissage, magazine, mode, beauté, relooking, réparation, montage, numérique, parutions, peau, personnages, personnalités, photo, photos de presse, photo-montage, photomontage, photomontages, professionnel de la retouche photo, réalisation, retouch, retouching, retouche cosmétique, retouche de peau, retouche chromatique, retouche colorimetrique, retouche morphologique, retouche d'images, retouche photo, retouches haut de gamme, retouches de luxe, retoucheur, retoucheuse, traitement de l'image, trucage, visuel, visuels" />
<meta name="title" content="myretooch.com - Retouche et traitement d'images" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Language" content="fr, en, es, ru, jp" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="viewport" content="width=1024" />
<meta name="copyright" content="http://www.myretooch.com" />
<meta name="revisit-after" content="2 days" />
<meta name="Rating" content="Mature" />
<link href="design/styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/verifier_pseudo.js"></script>
<script language="javascript" type="text/javascript">
	function afficher(vid) {
	//alert(vid)
		switch (vid) {
			case 'acces':
				document.getElementById("acces").style.display="";
				break;
			case 'activite':
				document.getElementById("activite").style.display="";
				document.getElementById("profil").style.display="none";
				break;
			case 'profil':
				document.getElementById("activite").style.display="none";
				document.getElementById("profil").style.display="";
				break;
			case 'tr':
				var form=document.forms["maj_profil"];
				if (form.change_pwd.checked) {
					document.getElementById("vmp").style.display="";
					document.getElementById("nmp").style.display="";
					document.getElementById("cmp").style.display="";
				}
				else {
					document.getElementById("vmp").style.display="none";
					document.getElementById("nmp").style.display="none";
					document.getElementById("cmp").style.display="none";
				}
				break;
		}
	}
	
	function verifier_profil() {
		var form=document.forms["new_profil"]
		var verif = /^[.a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
		
		if (form.login_client.value=="") {
			document.getElementById("nuser").style.color="#cc0000"
			form.login_client.focus()
			return false
		}
		else {
			document.getElementById("nuser").style.color=""
		}
		
		if (form.mot2passe_client.value=="") {
			document.getElementById("mdp").style.color="#cc0000"
			form.mot2passe_client.focus()
			return false
		}
		else {
			document.getElementById("mdp").style.color=""
		}
				
		if (form.mot2passe_client.value!=form.mot2passe_client_test.value) {
			document.getElementById("mdp2").style.color="#cc0000"
			form.mot2passe_client_test.focus()
			return false
		}
		else {
			document.getElementById("mdp2").style.color=""
		}
		
		if (verif.exec(form.email_client.value)==null) {
			document.getElementById("mel").style.color="#cc0000"
			form.email_client.focus()
			return false
		}
		else {
			document.getElementById("mel").style.color=""
		}
		
		if (form.prenom_client.value=="") {
			document.getElementById("prenom").style.color="#cc0000"
			form.prenom_client.focus()
			return false
		}
		else {
			document.getElementById("prenom").style.color=""
		}
		
		if (form.nom_client.value=="") {
			document.getElementById("nom").style.color="#cc0000"
			form.nom_client.focus()
			return false
		}
		else {
			document.getElementById("nom").style.color=""
		}
		
		if (form.jour.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			form.jour.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
		
		if (form.mois.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			form.mois.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
		
		if (form.annee.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			form.annee.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
				
		if (form.tel_client.value=="") {
			document.getElementById("fone").style.color="#cc0000"
			form.tel_client.focus()
			return false
		}
		else {
			document.getElementById("fone").style.color=""
		}
		
		if (form.id_pays.value=="") {
			document.getElementById("pays").style.color="#cc0000"
			form.id_pays.focus()
			return false
		}
		else {
			document.getElementById("pays").style.color=""
		}
		
		if (form.ville_client.value=="") {
			document.getElementById("vil").style.color="#cc0000"
			form.ville_client.focus()
			return false
		}
		else {
			document.getElementById("vil").style.color=""
		}
		
		if (form.adresse_client.value=="") {
			document.getElementById("adr").style.color="#cc0000"
			form.adresse_client.focus()
			return false
		}
		else {
			document.getElementById("adr").style.color=""
		}
		
		if (form.adresse_client.value=="") {
			document.getElementById("adr").style.color="#cc0000"
			form.adresse_client.focus()
			return false
		}
		else {
			document.getElementById("adr").style.color=""
		}
		
		if (!form.cgv_client.checked) {
			document.getElementById('lbl_cgv').style.color="#cc0000"
			form.cgv_client.focus()
			return false
		}
		else {
			document.getElementById("lbl_cgv").style.color=""
		}
		
		/*if (form.codepostal.value=="") {
			document.getElementById("codepostal").style.color="#cc0000"
			form.codepostal.focus()
			return false
		}
		else {
			document.getElementById("codepostal").style.color=""
		}*/
		
		form.Submit.disabled=true
		form.Submit.value='<?php echo _PATIENTER; ?>'
	}
	
	function checkIt(evt) {
		var charCode = (evt.charCode) ? evt.charCode : ((
		evt.which) ? evt.which : evt.keyCode);
		if (charCode==32)
			return false
		if (charCode > 47 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
</script>
</head>
<body>
<div id="fond" align="center"><div id="activite"><?php echo _TENDELLE; ?></div></div>
<div id="flash" align="center"><a href="http://www.mycover.fr" target="_blank" title="www.mycover.fr"><img src="images/flash.jpg" width="655" height="102" /></a></div>
<?php
	include("drapeau.php");
?>
<!--<div id="mnu_accueil"><a href="accueil.php?lang=<?php //echo $lang; ?>"><span class="txt_mnu"><?php //echo _ACCUEIL; ?></span></a></div>-->
<div id="mnu_retouche"><a href="accueil.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _RETOUCHE; ?></span></a></div>
<?php
	if (empty($id_client) || mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)==0) {
?>
<div id="mnu_commande" class="actif_autres"><span class="txt_mnu"><?php echo _COMMANDE; ?></span></div>
<?php
	}
	else {
?>
<div id="mnu_commande" class="actif_autres"><span class="txt_mnu"><?php echo _COMPTE; ?></span></div>
<?php
	}
?>
<div id="mnu_tarif"><a href="tarifs.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _TARIFS; ?></span></a></div>
<div id="mnu_partenaire"><a href="partenaire.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _PARTENAIRE; ?></span></a></div>
<div id="mnu_contact"><a href="contact.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _CONTACT; ?></span></a></div>
<div id="smnu_retouche">
<div id="mnu_mode1"><table height="44px" width="144px" border="0"><tr valign="middle" align="center"><td><blink><?php echo _INSCRIRE; ?></blink></td></tr></table></div>
<div id="mnu_montage1" style="color:#CCC"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><?php echo _TRANSFERER_PHOTO; ?></td></tr></table></div>
<div id="mnu_mariage1" style="color:#CCC"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><?php echo _TELECHARGER; ?></td></tr></table></div>
<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
</div>
<div id="fond_panier">
    <div id="form_profil">
    	<?php
	if (mysql_num_rows(mysql_query("SELECT * FROM clients WHERE id_client='$id_client'"))==0) {
?>
      <form action="cod_inscrit.php?opt=new&lang=<?php echo $lang; ?>" enctype="multipart/form-data" method="post" onSubmit="return verifier_profil();" name="new_profil">
        <table width="80%" border="0" cellspacing="3" cellpadding="3">
          <tr> 
            <td><label><?php echo _N_ID; ?></label></td>
            <td><input type="text" name="id_client" value="<?php echo $id_client; ?>" readonly="readonly"></td>
          </tr>
          <tr> 
            <td><label id="nuser"><?php echo _N_USER; ?></label></td>
            <td><input type="text" name="login_client" onKeyUp="verifier_login(this.value)" autocomplete="off"> 
              <div id="detect_pseudo"></div></td>
          </tr>
          <tr> 
            <td><label id="mdp"><?php echo _MDP; ?></label></td>
            <td><input type="password" name="mot2passe_client" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="mdp2"><?php echo _MDP2; ?></label></td>
            <td><input type="password" name="mot2passe_client_test" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="mel"><?php echo _MEL; ?></label></td>
            <td><input type="text" name="email_client" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="prenom"><?php echo _PRENOM; ?></label></td>
            <td><input type="text" name="prenom_client" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="nom"><?php echo _NOM; ?></label></td>
            <td><input type="text" name="nom_client" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="dat_nais"><?php echo _DAT_NAIS; ?></label></td>
            <td><select name="jour">
                <option value="" style="color:#FF0000"><?php echo _jour; ?></option>
                <?php
				for ($i=1;$i<32; $i++) {
					if (strlen($i)<2) {
						echo '<option value="0'.$i.'">0'.$i.'</option>';
					}
					else {
						echo '<option value="'.$i.'">'.$i.'</option>';
					}
				}
			?>
              </select> <select name="mois">
                <option value="" style="color:#FF0000"><?php echo _mois; ?></option>
                <?php
				for ($i=1;$i<13; $i++) {
					if (strlen($i)<2)
						echo '<option value="0'.$i.'">0'.$i.'</option>';
					else
						echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
              </select> <select name="annee">
                <option value="" style="color:#FF0000"><?php echo _annee; ?></option>
                <?php
				for ($i=date('Y')-18;$i>=date('Y')-100; $i--) {
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
              </select></td>
          </tr>
          <tr> 
            <td><label id="fone"><?php echo _FONE; ?></label></td>
            <td><input type="text" name="tel_client" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="pays"><?php echo _PAYS; ?></label></td>
            <td><select name="id_pays">
                <option value="" style="color:#FF0000"><?php echo _PAYS; ?></option>
                <?php
			$sql="SELECT * FROM pays ORDER BY nom_pays";
			$resultat=mysql_query($sql);
			while ($enr=mysql_fetch_array($resultat)) {
				extract($enr);
				echo '<option value="'.$id_pays.'">'.ucfirst($nom_pays).'</option>';
			}
		?>
              </select></td>
          </tr>
          <tr> 
            <td><label id="vil"><?php echo _VIL; ?></label></td>
            <td><input type="text" name="ville_client" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="adr"><?php echo _ADR; ?></label></td>
            <td><input type="text" name="adresse_client" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="cp"><?php echo _CP; ?></label></td>
            <td><input type="text" name="codepostal_client" onkeypress="return checkIt(event)" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="lbl_cgv"><?php echo _LU; ?> <a href="javascript:;"><?php echo _CGV; ?></a></label></td>
            <td><input type="checkbox" name="cgv_client" value="1" style="width:1px;"> <input type="submit" name="Submit" value="<?php echo _VALID; ?>" class="submit" id="Submit"></td>
          </tr>
        </table>
      </form>
      <?php
	}
	else {
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
		//echo $id_facture;
		//enregistrement detail facture
		$sql3="SELECT * FROM paniers WHERE id_client='$id_client' AND date_insertion='$now'";
		$results=mysql_query($sql3);
		while ($rows=mysql_fetch_array($results)) {
			extract($rows);
			$id_service=$id_service;
			$qte_panier_client=$qte_panier_client;
			$tarif_service=$tarif_service;
			$sql4="INSERT INTO detail_factures (id_facture, id_service, qte_panier_client, tarif_service)
				VALUES ('$id_facture', '$id_service', '$qte_panier_client', '$tarif_service')";
			mysql_query($sql4);
		}
		//suppression panier
		$sql5="DELETE FROM paniers WHERE id_client='$id_client' AND date_insertion='$now'";
		mysql_query($sql5);
		
		$sql6="SELECT * FROM clients WHERE id_client='$id_client'";
		$result=mysql_query($sql6);
		if ($row=mysql_fetch_array($result)) {
			extract($row);
			$email_client=$email_client;
			$prenom_client=$prenom_client;
			$nom_client=$nom_client;
		}
		$DF=explode('-',$date_facture);
		/*envoi mail de identification et facture*/
		$sql7="SELECT * FROM factures
		INNER JOIN detail_factures ON detail_factures.id_facture=factures.id_facture
		INNER JOIN services ON services.id_service=detail_factures.id_service
		WHERE factures.id_facture='$id_facture' AND id_client='$id_client'
		ORDER BY services.tarif_service";
		
		if (mysql_num_rows(mysql_query($sql7))!=0) {
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
			$mail->Subject='myretooch.com - Votre Facture ';
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
					<p><a href="http://www.myretooch.com" title="www.myretooch.com"><img src="http://www.myretooch.com/images/myretooch_logo.png" border="0"></a><br>
					  <br>
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
						<td><div align="center">'.$qte_panier_client.' photo(s)</div></td>
						<td><div align="right">EUR &euro;'.number_format($tarif_service,2,'.',' ').'</div></td>
						<td><div align="right">EUR &euro;'.number_format($qte_panier_client*$tarif_service,2,'.',' ').'</div></td>
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
							<td><div align="right">EUR &euro;'.number_format($tot,2,'.',' ').'</div></td>
					  </tr>
					</table>
					<br>
					<p> Bien &agrave; vous,<br>
					  <a href="http://www.myretooch.com">www.myretooch.com</a></p>
					</body>
					</html>';
			//post
			//echo $mail->Body;
			$mail->Send();
			$mail->SmtpClose();
			unset($mail);
			echo '<script>location.href="transfert.php?lang='.$lang.'&idf='.$id_facture.'"</script>';
		}
		else {
			echo '<script>location.href="abonnements.php?lang='.$lang.'&idf='.$id_facture.'"</script>';
		}
	}
?>
    </div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>