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
	$sql="DELETE FROM paniers WHERE id_client='$id_client'";
	mysql_query($sql);
	
	if (!empty($_SESSION['code_promo'])) {
		$_SESSION['code_promo']='';
	}
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
<title>myretooch.com::<?php echo strtolower(_CONTACT); ?></title>
<!-- Favicon -->
<link rel="icon" href="favicon.ico"/>
<!-- Favicon -->
<meta name="Author" content="Andrianandraina RATOBISON"/>
<meta name="Description" content="Retouche d'images professionnelle sur Paris, sp�cialis�e en retouche photo de types mode, beaut�, art, montage, relooking, r�paration. Retouche de photos essentiellement pour la publicit�, la presse, les maisons de disques et les photographes de mode."/>
<meta name="Category" content="photo, retouche de photos, retouche d'images, illustration, mode, beaut�, montage, relooking, r�paration, traitement de l'image, art num�rique"/>
<meta name="Classification" content="retouche photo, retouche de photos, retouche d'images, post-production, infographie, illustration, photomontages, traitement de l'image, art num�rique" />
<meta name="keywords" content="myretooch, retouche, retouche num�rique, photo retouching, affinement de silhouette, myretooch, myretooch.com, chromie, colorim�trie, colorisation, conception graphique, couverture magazine, cover mag, correction de peau, correction de silhouette, cr�a, cr�ations visuelles, d�tourage, digital retoucher, edito, edition, fluidite, grain de peau, gal�rie d'images, gal�rie photos, gal�ries photos, graphisme, graphiste, image, images, incrustation, illustration, illustrateur, illustratrice, lissage, magazine, mode, beaut�, relooking, r�paration, montage, num�rique, parutions, peau, personnages, personnalit�s, photo, photos de presse, photo-montage, photomontage, photomontages, professionnel de la retouche photo, r�alisation, retouch, retouching, retouche cosm�tique, retouche de peau, retouche chromatique, retouche colorimetrique, retouche morphologique, retouche d'images, retouche photo, retouches haut de gamme, retouches de luxe, retoucheur, retoucheuse, traitement de l'image, trucage, visuel, visuels" />
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
<script language="javascript" type="text/javascript">
	function verifier_contact() {
		var form=document.forms["contact"]
		var verif = /^[.a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
		
		if (form.nom_pnom.value=="") {
			document.getElementById("nom_pnom").style.color="#cc0000"
			form.nom_pnom.focus()
			return false
		}
		else {
			document.getElementById("nom_pnom").style.color="#ffffff"
		}
		if (form.activite.value=="") {
			document.getElementById("activites").style.color="#cc0000"
			form.activite.focus()
			return false
		}
		else {
			document.getElementById("activites").style.color="#ffffff"
		}
		
		if (verif.exec(form.email.value)==null) {
			document.getElementById("emails").style.color="#cc0000"
			form.email.focus()
			return false
		}
		else {
			document.getElementById("emails").style.color="#ffffff"
		}
		
		if (form.tel.value=="") {
			document.getElementById("tel").style.color="#cc0000"
			form.tel.focus()
			return false
		}
		else {
			document.getElementById("tel").style.color="#ffffff"
		}
		if (form.id_pays.value=="") {
			document.getElementById("pays").style.color="#cc0000"
			form.id_pays.focus()
			return false
		}
		else {
			document.getElementById("pays").style.color="#ffffff"
		}
		if (form.ville.value=="") {
			document.getElementById("ville").style.color="#cc0000"
			form.ville.focus()
			return false
		}
		else {
			document.getElementById("ville").style.color="#ffffff"
		}
		if (form.adresse.value=="") {
			document.getElementById("adresse").style.color="#cc0000"
			form.adresse.focus()
			return false
		}
		else {
			document.getElementById("adresse").style.color="#ffffff"
		}
		
		/*if (form.codepostal.value=="") {
			document.getElementById("codepostal").style.color="#cc0000"
			form.codepostal.focus()
			return false
		}
		else {
			document.getElementById("codepostal").style.color="#555555"
		}*/
		
		if (form.zone_info.value=="") {
			document.getElementById("zone_info").style.color="#cc0000"
			form.zone_info.focus()
			return false
		}
		else {
			document.getElementById("zone_info").style.color="#ffffff"
		}
		
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
<div id="flash" align="center"><a href="http://www.mycover.fr" target="_blank" title="www.mycover.fr"><img src="images/flash.gif" width="655" height="102" /></a></div>
<?php
	include("drapeau.php");
?>
<!--<div id="mnu_accueil"><a href="accueil.php?lang=<?php //echo $lang; ?>"><span class="txt_mnu"><?php //echo _ACCUEIL; ?></span></a></div>-->
<div id="mnu_retouche"><a href="accueil.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _RETOUCHE; ?></span></a></div>
<?php
	if (empty($id_client) || mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)==0) {
?>
<div id="mnu_commande"><a href="connexion.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _COMMANDE; ?></span></a></div>
<?php
	}
	else {
?>
<div id="mnu_commande"><a href="choix_service.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _COMPTE; ?></span></a></div>
<?php
	}
?>
<div id="mnu_tarif"><a href="tarifs.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _TARIFS; ?></span></a></div>
<div id="mnu_partenaire"><a href="partenaire.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _PARTENAIRE; ?></span></a></div>
<div id="mnu_contact" class="actif_contact"><span class="txt_mnu"><?php echo _CONTACT; ?></span></div>
<div id="smnu_retouche">
<div id="mnu_mode1"><table height="44px" width="144px" border="0"><tr valign="middle" align="center"><td><a href="mode_beaute.php?lang=<?php echo $lang; ?>"><?php echo _BEAUTE; ?></a></td></tr></table></div>
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><a href="montage.php?lang=<?php echo $lang; ?>"><?php echo _MONTAGE; ?></a></td></tr></table></div>
<div id="mnu_mariage1"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><a href="mariage.php?lang=<?php echo $lang; ?>"><?php //echo _MARIAGE; ?></a></td></tr></table></div>
<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td><a href="presse.php?lang=<?php echo $lang; ?>"><?php echo _PRESSE_MAGAZINE; ?></a></td></tr></table></div>
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td><a href="objet.php?lang=<?php echo $lang; ?>"><?php echo _OBJET; ?></a></td></tr></table></div>
<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td><a href="famille.php?lang=<?php echo $lang; ?>"><?php //echo _FAMILLE; ?></a></td></tr></table></div>
</div>
<div id="fond_contact">
	<div id="info_contact">
    	<div id="titre_contact"><?php echo ucfirst(strtolower(_CONTACT)); ?></div><div id="contenu_contact">BUREAU DE LIAISON<br />
          <span class="adr">14 Avenue de l'Op&eacute;ra<br />
        75002 Paris (France)</span></div>
        <div id="titre_mail"><?php echo strtoupper(_MEL1); ?></div><div id="contenu_mail"><a href="mailto:myretooch@gmail.com">myretooch@gmail.com</a></div>
    </div>
    <div id="form_contact">
    	<form action="cod_envoi.php?lang=<?php echo $lang; ?>" enctype="multipart/form-data" method="post" onSubmit="return verifier_contact();" name="contact" id="contact">
    	<table width="80%" cellspacing="3" cellpadding="3" align="center">
        	<tr>
            	<td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        	<tr> 
            <td width="34%" class="h7"><label><?php echo _CIVIL; ?></label></td>
            <td width="66%">
              <select name="civilite" id="civilite">
                <option value="M."><?php echo _M; ?></option>
                <option value="Mme"><?php echo _MME; ?></option>
                <option value="Mlle"><?php echo _MLLE; ?></option>
                </select>
              </td>
          </tr>
          <tr>
            <td><label id="nom_pnom"><?php echo _NOM_PNOM; ?></label></td>
            <td><input type="text" name="nom_pnom" class="inputbox" autocomplete="off" /></td>
          </tr>
          <tr>
            <td class="h7"><label id="activites"><?php echo _ACT; ?></label></td>
            <td><input type="text" name="activite" class="inputbox" autocomplete="off" /></td>
          </tr>
          <tr> 
            <td class="h7"><label id="emails"><?php echo _MEL; ?></label></td>
            <td><input type="text" name="email" autocomplete="off" class="inputbox"></td>
          </tr>
          <tr> 
            <td class="h7"><label id="tel"><?php echo _FONE; ?></label></td>
            <td><input type="text" name="tel" autocomplete="off" class="inputbox"></td>
          </tr>
          <tr> 
            <td class="h7"><label id="pays"><?php echo _PAYS; ?></label></td>
            <td><select name="id_pays" class="inputbox">
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
            <td class="h7"><label id="ville"><?php echo _VIL; ?></label></td>
            <td><input type="text" name="ville" autocomplete="off" class="inputbox"></td>
          </tr>
          <tr> 
            <td class="h7"><label id="adresse"><?php echo _ADR; ?></label></td>
            <td><input type="text" name="adresse" autocomplete="off" class="inputbox"></td>
          </tr>
          <tr> 
            <td class="h7"><label id="codepostal"><?php echo _CP; ?></label></td>
            <td><input type="text" name="codepostal" onkeypress="return checkIt(event)" autocomplete="off" class="inputbox"></td>
          </tr>
          <tr valign="top">
            <td class="h7"><label id="zone_info"><?php echo _SAISI; ?></label></td>
            <td><textarea name="zone_info" cols="45" rows="5"></textarea></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="<?php echo _ENVOI; ?>" class="submit" id="Submit"></td>
          </tr>
        </table>
        </form>
    </div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>