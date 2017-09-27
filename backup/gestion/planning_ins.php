<?php
	require("../includes/const_decl.php");
	include 'menu.php';
	$jour=$_REQUEST['jour'];
	$heure=$_REQUEST['heure'];
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
<link rel="stylesheet" type="text/css" href="design/styles.css" title="default" media="screen" />
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>

<body>
<form action="cod_planning.php" name="new_planning" enctype="multipart/form-data" method="post">
  <table width="495px" border="0" align="center" cellpadding="2" cellspacing="1">
    <caption>
    INSERTION PLANNING 
    </caption>
    <tr bgcolor="#000000" class="table_titre"> 
      <td width="50%">Equipe :</td>
      <td width="50%"><select name="id_equipe">
          <?php
			$sql="SELECT * FROM equipe ORDER BY lib_equipe";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo '<option value="'.$id_equipe.'">'.$lib_equipe.'</option>';
			}
		?>
        </select></td>
    </tr>
    <tr bgcolor="#000000" class="table_titre"> 
      <td>Jour :</td>
      <td><input type="hidden" name="jour_planning" value="<?php echo $jour; ?>"><input type="text" name="lib_jour_planning" value="<?php echo lib_jour($jour); ?>" readonly="readonly"></td>
    </tr>
    <tr bgcolor="#000000" class="table_titre"> 
      <td>Type :</td>
      <td><select name="type_planning">
          <option value="DISPONIBLE">DISPONIBLE</option>
          <option value="INDISPONIBLE">INDISPONIBLE</option>
        </select></td>
    </tr>
    <tr bgcolor="#000000" class="table_titre"> 
      <td>Heure :</td>
      <td><input type="text" name="heure_planning" value="<?php echo $heure; ?>" readonly="readonly"></td>
    </tr>
    <tr bgcolor="#000000" class="table_titre"> 
      <td>Dur&eacute;e :</td>
      <td><select name="duree_planning">
		<option value="15">15 mn</option>
		<option value="30">30 mn</option>
		<option value="45">45 mn</option>
		<option value="60">1 hr</option>
		<option value="120">2 hrs</option>
		<option value="180">3 hrs</option>
		<option value="240">4 hrs</option>
		<option value="360">6 hrs</option>
		<option value="480">8 hrs</option>
		<option value="720">12 hrs</option>
        </select></td>
    </tr>
    <tr class="table_titre">
      <td><div align="right">
          <input type="button" name="Annuler" value="Annuler" class="submit" onClick="MM_goToURL('parent','<?php echo "planning.php"; ?>');return document.MM_returnValue"">
        </div></td>
      <td><div align="left">
          <input type="submit" name="Submit" value="Enregistrer" class="submit">
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>
