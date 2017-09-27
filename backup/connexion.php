<?php
	require "includes/const_decl.php";
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
<title>myretooch.com::<?php echo strtolower(_SE_CONNECTER); ?></title>
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
<script language="javascript" type="text/javascript">
		function completer() {
			var form=document.forms["form_client_login"]
			var verif = /^[.a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
			
			if (verif.exec(form.email.value)==null) {
				document.getElementById("mels").style.color="#cc0000"
				form.email.focus()
				return false
			}
			else {
				document.getElementById("mels").style.color="#555555"
			}
			
			form.Submit.disabled=true
			form.Submit.value='<?php echo _PATIENTER; ?>'
		}

	function verifier_contact() {
		var form=document.forms["connexion"]
		var verif = /^[.a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
		
		if (form.login.value=="") {
			document.getElementById("login").style.color="#cc0000"
			form.login.focus()
			return false
		}
		else {
			document.getElementById("login").style.color="#555555"
		}
		if (form.pwd.value=="") {
			document.getElementById("pwd").style.color="#cc0000"
			form.pwd.focus()
			return false
		}
		else {
			document.getElementById("pwd").style.color="#555555"
		}
		
		form.Submit.disabled=true
		form.Submit.value='<?php echo _PATIENTER; ?>'
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
<div id="mnu_commande" class="actif_autres"><span class="txt_mnu"><?php echo _COMMANDE; ?></span></div>
<div id="mnu_tarif"><a href="tarifs.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _TARIFS; ?></span></a></div>
<div id="mnu_partenaire"><a href="partenaire.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _PARTENAIRE; ?></span></a></div>
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
    	<div id="cadre_ncli" align="center">
        <fieldset style="border:0"><?php echo _NCLI; ?></fieldset>
    		<!--<input type="submit" name="Submit" value="<?php //echo _CLICICI; ?>" class="submit" id="Submit" onclick="location.href='choix_service.php?lang=<?php //echo $lang; ?>'">-->
            <input type="submit" name="Submit" value="<?php echo _CLICICI; ?>" class="submit" id="Submit" onclick="location.href='monpanier.php?lang=<?php echo $lang; ?>'"><br /><br />
        </div>
   	  <div id="cadre_connexion" align="center">
        <fieldset style="border:0"><?php echo _DCLI; ?></fieldset>
    	<form action="cod_login.php?lang=<?php echo $lang; ?>" enctype="multipart/form-data" method="post" onSubmit="return verifier_contact();" name="connexion" id="connexion"><label id="login"><?php echo _USER; ?></label><br /><br /><input type="text" name="login" class="inputbox" autocomplete="off" /><br /><br /><label id="pwd"><?php echo _PWD; ?></label><br /><br /><input type="password" name="pwd" class="inputbox" autocomplete="off" /><br /><br /><input type="submit" name="Submit" value="<?php echo _VALID; ?>" class="submit" id="Submit" />
        </form>
        </div>
        <div id="cadre_mp" align="center">
        <fieldset style="border:0; font-size:12px;"><?php echo strtoupper(_LOST_PWD); ?></fieldset>
        <form action="cod_mdp.php?lang=<?php echo $lang; ?>" method="post" enctype="multipart/form-data" name="form_client_login" onSubmit="return completer();">
        <label id="mels"><?php echo _MEL; ?></label><br /><br /><input type="text" name="email" autocomplete="off" class="inputbox" /><br /><br /><input type="submit" name="Submit" value="<?php echo _VALID; ?>" class="submit" id="Submit" />
        </form>
      </div>
    </div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>