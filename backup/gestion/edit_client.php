<?php
	require("../includes/const_decl.php");
	$id=$_REQUEST['id'];
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
<link rel="stylesheet" href="design/styles.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../design/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.nyroModal-1.5.2.pack.js"></script>
</head>

<body>
<?php
	$sql="SELECT * FROM clients
		INNER JOIN pays ON pays.id_pays=clients.id_pays
		WHERE id_client='$id'";
	$result=mysql_query($sql);
	if ($row=mysql_fetch_array($result)) {
		extract($row);
?>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
  <tr> 
    <td width="20%" class="table_entete" height="30px">ID :</td>
    <td width="80%"><?php echo $id_client; ?></td>
  </tr>
  <tr> 
    <td class="table_entete" height="30px">Pseudo :</td>
    <td><?php echo utf8_encode($login_client); ?></td>
  </tr>
  <tr> 
    <td class="table_entete" height="30px">Pr&eacute;noms et Nom :</td>
    <td><?php echo utf8_encode($prenom_client.' '.$nom_client); ?></td>
  </tr>
  <tr> 
    <td class="table_entete" height="30px">E-mail :</td>
    <td><?php echo $email_client; ?></td>
  </tr>
  <tr> 
    <td class="table_entete" height="30px">N&eacute;(e) le :</td>
    <td>
		<?php
			if ($datenais_client!='0000-00-00') {
				$DN=explode('-',$datenais_client);
				echo $DN[2].'/'.$DN[1].'/'.$DN[0];
			}	
		?>
	</td>
  </tr>
  <tr> 
    <td class="table_entete" height="30px">T&eacute;l&eacute;phone :</td>
    <td><?php echo $tel_client; ?></td>
  </tr>
  <tr> 
    <td class="table_entete" height="30px">Adresse :</td>
    <td><?php echo utf8_encode($adresse_client); ?></td>
  </tr>
  <tr> 
    <td class="table_entete" height="30px">Ville :</td>
    <td><?php echo utf8_encode($ville_client); ?></td>
  </tr>
  <tr> 
    <td class="table_entete" height="30px">Code postal :</td>
    <td><?php echo $codepostal_client; ?></td>
  </tr>
  <tr>
    <td class="table_entete" height="30px">Pays :</td>
    <td><?php echo utf8_encode(ucfirst($nom_pays)); ?></td>
  </tr>
</table>
<?php
	}
?>
</body>
</html>
