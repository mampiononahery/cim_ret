<?php
	require("../includes/const_decl.php");
	$opt=$_REQUEST['opt'];
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
	switch ($opt) {
		case 'maj':
			$id=$_REQUEST['id'];
			$sql="SELECT * FROM equipe WHERE id_equipe='$id'";
			$result=mysql_query($sql);
			if ($row=mysql_fetch_array($result)) {
				extract($row);
?>
<form action="cod_equipe.php" enctype="multipart/form-data" name="maj_equipe" method="post">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr> 
      <td width="20%" class="table_entete" height="30px">ID :</td>
      <td width="80%"><?php echo $id_equipe; ?><input type="hidden" name="id_equipe" value="<?php echo $id_equipe; ?>"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Libell&eacute; :</td>
      <td><input type="text" name="lib_equipe" value="<?php echo $lib_equipe; ?>" autocomplete="off"><input type="hidden" name="opt" value="<?php echo $opt; ?>"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Compos&eacute;e de :</td>
      <td> 
        <?php
		$sql="SELECT * FROM personnel WHERE id_equipe='$id'";
		$result=mysql_query($sql);
		while ($row=mysql_fetch_array($result)) {
			extract($row);
			echo ' * <a href="edit_personnel.php?id='.$id_pers.'&opt=maj" class="nyroModal">'.$prenom_pers.' '.$nom_pers.'</a><br>';
		}
	?>
      </td>
    </tr>
    <tr> 
      <td height="30px" colspan="2" class="table_entete"><div align="center">
          <input type="submit" name="Submit" value="Enregistrer" class="submit">
        </div></td>
    </tr>
  </table>
</form>
<?php
		}
		break;
	case 'new':
?>
<form action="cod_equipe.php" enctype="multipart/form-data" name="new_equipe" method="post">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr> 
      <td width="20%" height="30px" class="table_entete">Libell&eacute; :</td>
      <td width="80%"><input type="text" name="lib_equipe" autocomplete="off"> <input type="hidden" name="opt" value="<?php echo $opt; ?>"></td>
    </tr>
    <tr> 
      <td height="30px" colspan="2" class="table_entete"><div align="center"> 
          <input type="submit" name="Submit" value="Enregistrer" class="submit">
        </div></td>
    </tr>
  </table>
</form>
<?php
		break;
	}
?>
</body>
</html>