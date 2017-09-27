<?php
	require("../includes/const_decl.php");
	$opt=$_REQUEST['opt'];
	$offset=$_REQUEST['offset'];	
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
<script language="JavaScript" type="text/javascript">
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
	
	function completer() {
		var form=document.forms["new_code"]
		if (form.attribuer.value=="") {
			form.attribuer.focus()
			return false;
		}
	}
</script>
</head>

<body>
<?php
	switch ($opt) {
		case 'new':
?>
<form action="cod_promo.php" enctype="multipart/form-data" name="new_code" method="post" onSubmit="return completer();">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr>
      <td width="27%" height="30px" class="table_entete">Code promo attribu&eacute; &agrave; :</td>
      <td width="73%">
      		<select name="attribuer">
               <option value="autres" >autres</option>
               <option value="myretooch" >myretooch</option>
               <option value="public" >public</option>
			</select></td>
    </tr>
    <tr>
      <td height="30px" class="table_entete">Nombre de photos gratuites :</td>
      <td><input type="text" name="nb_photo" autocomplete="off" value="0" onKeyPress="return checkIt(event)" /></td>
    </tr>
    <tr> 
      <td height="30px" colspan="2" class="table_entete"><div align="center"> 
          <input type="submit" name="Submit" value="G&eacute;n&eacute;rer" class="submit">
          <input type="hidden" name="opt" value="new">
          <input type="hidden" name="offset" value="<?php echo $offset; ?>">
      </div></td>
    </tr>
  </table>
</form>
<?php
		break;
	case 'maj':
		$id=$_REQUEST['id'];
		$sql="SELECT * FROM promos WHERE id_promo='$id'";
		$result=mysql_query($sql);
		if ($row=mysql_fetch_array($result)) {
			extract($row);
?>
<form action="cod_promo.php" enctype="multipart/form-data" name="maj_code" method="post">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr>
      <td width="27%" height="30px" class="table_entete">Code promo attribu&eacute; &agrave; :</td>
      <td width="73%">
      		<select name="attribuer">
               <option value="autres" <?php if ($attribuer=='autres') echo 'selected'; ?> >autres</option>
               <option value="myretooch" <?php if ($attribuer=='myretooch') echo 'selected'; ?> >myretooch</option>
               <option value="public" <?php if ($attribuer=='public') echo 'selected'; ?> >public</option>
			</select></td>
    </tr>
    <tr>
      <td height="30px" class="table_entete">Nombre de photos gratuites :</td>
      <td><input type="text" name="nb_photo" autocomplete="off" value="<?php echo $nb_photo; ?>" onKeyPress="return checkIt(event)" /></td>
    </tr>
    <tr> 
      <td height="30px" colspan="2" class="table_entete"><div align="center"> 
          <input type="submit" name="Submit" value="Enregistrer" class="submit">
          <input type="hidden" name="opt" value="maj">
          <input type="hidden" name="offset" value="<?php echo $offset; ?>">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
      </div></td>
    </tr>
  </table>
</form>
<?php
		break;
		}
	}
?>
</body>
</html>