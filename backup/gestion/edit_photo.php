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
<script type="text/javascript" src="../scripts/verifier_pseudo.js"></script>
<script type="text/javascript" src="../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.nyroModal-1.5.2.pack.js"></script>
</head>
<script type="text/javascript">
	function afficher() {
		var form=document.forms["new_photo"]
		switch (form.dossier.value) {
			case "../photos/presse-magazine/" :
				document.getElementById("lg_avant").style.display="none"
				document.getElementById("lg_apres").style.display="none"
				document.getElementById("lg_presse").style.display=""
				break
			default :
				document.getElementById("lg_avant").style.display=""
				document.getElementById("lg_apres").style.display=""
				document.getElementById("lg_presse").style.display="none"
				break
		}
	}
	
	function verifier() {
		var form=document.forms["new_photo"]
		if (form.dossier.value!="../photos/presse-magazine/") {
			if (form.avant.value=="") {
				document.getElementById("lbl_avant").style.color="#cc0000"
				form.avant.focus()
				return false
			}
			else {
				document.getElementById("lbl_avant").style.color=""
			}
			
			if (form.apres.value=="") {
				document.getElementById("lbl_apres").style.color="#cc0000"
				form.apres.focus()
				return false
			}
			else {
				document.getElementById("lbl_apres").style.color=""
			}
		}
		
		if (form.dossier.value=="../photos/presse-magazine/") {
			if (form.presse.value=="") {
				document.getElementById("lbl_presse").style.color="#cc0000"
				form.presse.focus()
				return false
			}
			else {
				document.getElementById("lbl_presse").style.color=""
			}
		}

		form.Submit.value="Patientez..."
	}
</script>
<body>
<form action="cod_photo.php" enctype="multipart/form-data" name="new_photo" method="post" onsubmit="return verifier();">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr>
      <td height="30px" class="table_entete">DOSSIER :</td>
      <td><select name="dossier" onchange="afficher();">
    	<option value="../photos/beaute/">MODE & BEAUTE</option>
        <option value="../photos/montage/">MONTAGE, RELOOKING, REPARATION</option>
        <option value="../photos/mariage/">MARIAGE</option>
        <option value="../photos/presse-magazine/">PRESSE MAGAZINE</option>
        <option value="../photos/objet/">OBJET</option>
        <option value="../photos/famille/">PHOTOS DE FAMILLE</option>
        </select></td>
    </tr>
    <tr id="lg_avant">
      <td width="20%" height="30px" class="table_entete"><label id="lbl_avant">AVANT :</label></td>
      <td width="80%"><div id="detect_pseudo" style="width='400px';"><input type="file" name="avant" id="avant" /></div></td>
    </tr>
    <tr id="lg_apres">
      <td class="table_entete" height="30px"><label id="lbl_apres">APRES :</label></td>
      <td><span style="width='400px';"><input type="file" name="apres" id="apres" /></span></td>
    </tr>
    <tr id="lg_presse" style="display:none"> 
      <td class="table_entete" height="30px"><label id="lbl_presse">PRESSE-MAGAZINE :</label></td>
      <td><span style="width='400px';"><input type="file" name="presse" id="presse" /></span></td>
    </tr>
    <tr> 
      <td height="30px" colspan="2" class="table_entete"><div align="center"><input type="hidden" name="MAX_FILE_SIZE" value="100000" /><input type="submit" name="Submit" value="Transf&eacute;rer" class="submit" id="Submit"><input type="hidden" name="opt" value="nouveau" /></div></td>
    </tr>
  </table>
</form>
</body>
</html>