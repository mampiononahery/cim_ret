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
<title>myretooch.com::<?php echo strtolower(_PARTENAIRE); ?></title>
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
<div id="mnu_partenaire" class="actif_autres"><a href="partenaire.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _PARTENAIRE; ?></span></a></div>
<div id="mnu_contact"><a href="contact.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _CONTACT; ?></span></a></div>
<div id="smnu_retouche">
<div id="mnu_mode1"><table height="44px" width="144px" border="0"><tr valign="middle" align="center"><td><a href="mode_beaute.php?lang=<?php echo $lang; ?>"><?php echo _BEAUTE; ?></a></td></tr></table></div>
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><a href="montage.php?lang=<?php echo $lang; ?>"><?php echo _MONTAGE; ?></a></td></tr></table></div>
<div id="mnu_mariage1"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><a href="mariage.php?lang=<?php echo $lang; ?>"><?php //echo _MARIAGE; ?></a></td></tr></table></div>
<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td><a href="presse.php?lang=<?php echo $lang; ?>"><?php echo _PRESSE_MAGAZINE; ?></a></td></tr></table></div>
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td><a href="objet.php?lang=<?php echo $lang; ?>"><?php echo _OBJET; ?></a></td></tr></table></div>
<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td><a href="famille.php?lang=<?php echo $lang; ?>"><?php //echo _FAMILLE; ?></a></td></tr></table></div>
</div>
<div id="fond_connexion">
	<div id="info_contact">
    	<div id="titre_contact"><?php echo ucfirst(strtolower(_CONTACT)); ?></div><div id="contenu_contact">BUREAU DE LIAISON<br />
          <span class="adr">14 Avenue de l'Op&eacute;ra<br />
        75002 Paris (France)</span></div>
        <div id="titre_mail"><?php echo strtoupper(_MEL1); ?></div><div id="contenu_mail"><a href="mailto:myretooch@gmail.com">myretooch@gmail.com</a></div>
    </div>
    <div id="form_contact">
    	<div id="cadre_connexion">
    	
        </div>
    </div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>