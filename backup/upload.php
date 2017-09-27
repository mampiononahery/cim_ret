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
<title>myretooch.com::<?php echo strtolower(_TRANSFERER_PHOTO); ?></title>
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
</head>
<body onload="applyLanguage();">
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
<div id="mnu_mode1"><table height="44px" width="144px" border="0"><tr valign="middle" align="center"><td><font color="#544B36"><?php
				if (!empty($id_client) && mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)!=0) {
					$sql="SELECT * FROM clients WHERE id_client='$id_client'";
					$resultat=mysql_query($sql);
					if ($enr=mysql_fetch_array($resultat)) {
						extract($enr);
						echo _BONJOUR.' '.$prenom_client;
					}
				}
			?></font></td></tr></table></div>
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><a href="choix_service.php?lang=<?php echo $lang; ?>"><?php echo _FORMULE ; ?></a></td></tr></table></div>
<div id="mnu_mariage1"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><a href="monprofil.php?lang=<?php echo $lang; ?>"><?php echo _MON_PROF; ?></a></td></tr></table></div>
<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td><a href="abonnements.php?lang=<?php echo $lang; ?>"><?php echo _MESABN; ?></a></td></tr></table></div>
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td><blink><?php echo _TRANSFERER_PHOTO; ?></blink></td></tr></table></div>
<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td><?php
				if (!empty($id_client) && mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)!=0) {
			?>
        <a href="cod_logout.php?lang=<?php echo $lang; ?>"><?php echo _SE_DECONNECTER; ?></a>
        <?php
				}
			?></td></tr></table></div>
</div>
<div id="fond_panier">
    <div id="form_profil" align="center">
	<!-- text below wil be shown if JavaScript disabled at browser -->
 <span id="noscriptdiv" style="border:1px  solid #FF0000;display:block;padding:5px;text-align:left; background: #FDF2F2;color:#000;">Active Scripting (JavaScript) should be enabled in your browser for this application to function properly!</span>
<script type="text/javascript">
	document.getElementById('noscriptdiv').style.visibility = 'hidden';
	document.getElementById('noscriptdiv').style.height = 0;
	document.getElementById('noscriptdiv').style.padding = 0;
	document.getElementById('noscriptdiv').style.border = 0;
</script>
<div id="MultiPowUpload_holder">
</div>	
<!-- SWFObject home page: http://code.google.com/p/swfobject/
You can replace src value with the http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js (Most users has such file cached)
 -->
<script type="text/javascript" src="multipowupload/Extra/swfobject.js"></script>
<script type="text/javascript">
	var params = {  
		BGColor: "#FFFFFF"
	};
	
	var attributes = {  
		id: "MultiPowUpload",  
		name: "MultiPowUpload"
	};
	
	var flashvars = {
	  "serialNumber": "put your serial number here",
	  "uploadUrl": "multipowupload/FileProcessingScripts/PHP/uploadfiles.php?idf=<?php echo $idf; ?>",	  
	  "useExternalInterface": "true",
	  "language.autoDetect": "false",
	  "backgroundColor":"#FFFFFF",
	  "fileFilter.maxCount":<?php echo $f_a; ?>,
	  "fileFilter.minSize":-1,
	  "fileFilter.types":"Images|*.jpg:*.jpeg:*.gif:*.png:*.bmp"
	};
	//Default MultiPowUpload should have minimum width=400 and minimum height=180
	swfobject.embedSWF("multipowupload/ElementITMultiPowUpload.swf", "MultiPowUpload_holder", "450", "320", "10.0.0", "multipowupload/Extra/expressInstall.swf", flashvars, params, attributes);
	
	function applyAuto()
	{
		if(MultiPowUpload.getParameter("language.autoDetect") == "true")
		{			
			MultiPowUpload.setParameter("language.autoDetect", false);
			applyLanguage();
		}
		else
		{			
			MultiPowUpload.setParameter("language.autoDetect", true);			
			MultiPowUpload.setParameter("language.source","multipowupload/Extra/Languages/Language_<?php echo $lang; ?>.xml");
		}
	}
	
	function applyLanguage()
	{
		alert("<?php echo _MAX.' '.$f_a; ?>");
		<?php
			if ($lang=='jp') $lang='fr';
		?>
		MultiPowUpload.setParameter("language.source","multipowupload/Extra/Languages/Language_<?php echo $lang; ?>.xml");
	}
</script>	
    </div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>