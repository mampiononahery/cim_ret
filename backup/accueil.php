<?php
	require ("includes/const_decl.php");
	//require ("includes/class.phpmailer.php");
	require ("includes/langues.php");
	
	@session_start();
	if (!empty($_SESSION['id_client']))
		$id_client=$_SESSION['id_client'];
	else
		$id_client='';
		
	/*$ip_page=$_SERVER['REMOTE_ADDR'];
	$nom_page=explode('/',$_SERVER['PHP_SELF']);
	$date_page=date('Y-m-d');
	$heure_deb=date('H:i:s');
	$nom_pg=$nom_page[1];
	/**/
	/*@mysql_query("INSERT INTO stats(ip_page, nom_page, date_page, heure_deb) VALUES ('$ip_page', '$nom_pg','$date_page','$heure_deb')");
	$_SESSION['ip_page']=$ip_page;
	$_SESSION['nom_page']=$nom_pg;*/
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
<title>myretooch.com::<?php echo strtolower(_RETOUCHE); ?></title>
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
<!--<div id="mnu_accueil" class="actif_accueil"><span class="txt_mnu"><?php //echo _ACCUEIL; ?></span></div>-->
<div id="mnu_retouche" class="actif_retouche"><span class="txt_mnu"><?php echo _RETOUCHE; ?></span></a></div>
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
<div id="mnu_contact"><a href="contact.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _CONTACT; ?></span></a></div>
<div id="squelette">
<ul id="accueil">
		<li id="mnu_mode"><a href="mode_beaute.php?lang=<?php echo $lang; ?>"><img id="img1" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1; document.getElementById('li_1').style.color='#ffa200'" onmouseout="this.style.opacity=0.8;document.getElementById('li_1').style.color='white'" /></a>
	    <div id="t_1"><table class="tab"><tr valign="middle" align="center"><td><?php echo _BEAUTE; ?></td></tr></table></div><div id="pi_1"><a href="mode_beaute.php?lang=<?php echo $lang; ?>" id="li_1" onmouseover="img1.style.opacity=1;this.style.color='#ffa200'" onmouseout="img1.style.opacity=0.8;this.style.color='#fff'"><?php echo _PLUSINFO; ?></a></div></li>
<li id="mnu_montage"><a href="montage.php?lang=<?php echo $lang; ?>"><img id="img2" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_2').style.color='#b90147'" onmouseout="this.style.opacity=0.8;document.getElementById('li_2').style.color='#fff'" /></a><div id="t_2"><table class="tab"><tr valign="middle" align="center"><td><?php echo _MONTAGE; ?></td></tr></table></div><div id="pi_2"><a href="montage.php?lang=<?php echo $lang; ?>" id="li_2" onmouseover="img2.style.opacity=1;this.style.color='#b90147'" onmouseout="img2.style.opacity=0.8;this.style.color='#fff'"><?php echo _PLUSINFO; ?></a></div></li>
        <!--<li id="mnu_mariage"><a href="mariage.php?lang=<?php echo $lang; ?>"><img id="img3" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_3').style.color='#0074a7'" onmouseout="this.style.opacity=0.8;document.getElementById('li_3').style.color='#fff'" /></a><div id="t_3"><table class="tab"><tr valign="middle" align="center"><td><?php //echo _MARIAGE; ?></td></tr></table></div><div id="pi_3"><a href="mariage.php?lang=<?php //echo $lang; ?>" id="li_3" onmouseover="img3.style.opacity=1;this.style.color='#0074a7'" onmouseout="img3.style.opacity=0.8;this.style.color='#fff'"><?php //echo _PLUSINFO; ?></a></div></li>-->
        <li id="mnu_presse"><a href="presse.php?lang=<?php echo $lang; ?>"><img id="img4" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_4').style.color='#fd4fff'" onmouseout="this.style.opacity=0.8;document.getElementById('li_4').style.color='#fff'" /></a><div id="t_4"><table class="tab"><tr valign="middle" align="center"><td><?php echo _PRESSE_MAGAZINE; ?></td></tr></table></div><div id="pi_4"><a href="presse.php?lang=<?php echo $lang; ?>" id="li_4" onmouseover="img4.style.opacity=1;this.style.color='#fd4fff'" onmouseout="img4.style.opacity=0.8;this.style.color='#fff'"><?php echo _PLUSINFO; ?></a></div></li>
    <li id="mnu_objet"><a href="objet.php?lang=<?php echo $lang; ?>"><img id="img5" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_5').style.color='#01b07c'" onmouseout="this.style.opacity=0.8;document.getElementById('li_5').style.color='#fff'" /></a><div id="t_5"><table class="tab"><tr valign="middle" align="center"><td><?php echo _OBJET; ?></td></tr></table></div><div id="pi_5"><a href="objet.php?lang=<?php echo $lang; ?>" id="li_5" onmouseover="img5.style.opacity=1;this.style.color='#01b07c'" onmouseout="img5.style.opacity=0.8;this.style.color='#fff'"><?php echo _PLUSINFO; ?></a></div></li>
        <!--<li id="mnu_famille"><a href="famille.php?lang=<?php echo $lang; ?>"><img id="img6" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_6').style.color='#ff4e00'" onmouseout="this.style.opacity=0.8;document.getElementById('li_6').style.color='#fff'" /></a><div id="t_6"><table class="tab"><tr valign="middle" align="center"><td><?php //echo _FAMILLE; ?></td></tr></table></div><div id="pi_6"><a href="famille.php?lang=<?php //echo $lang; ?>" id="li_6" onmouseover="img6.style.opacity=1;this.style.color='#ff4e00'" onmouseout="img6.style.opacity=0.8;this.style.color='#fff'"><?php //echo _PLUSINFO; ?></a></div></li>-->
  </ul>
</div>
<?php
	include("bas.php");
?>
</body>
</html>