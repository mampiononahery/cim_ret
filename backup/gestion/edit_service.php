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
<script language="JavaScript" type="text/javascript">
	function new_xhr(){
		var xhr_object = null;
		if(window.XMLHttpRequest)
		   xhr_object = new XMLHttpRequest();
		else if(window.ActiveXObject){
		   try {
					xhr_object = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
					xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
		}
		else {
		   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
		   xhr_object = false;
		}
		return xhr_object;
	}

	function load_page(file) {
		var xhr2 = new_xhr();
		xhr2.onreadystatechange = function(){
			if ( xhr2.readyState == 4 ){
				if(xhr2.status  != 200){
					document.getElementById("content").innerHTML ="Error code " + xhr2.status;
				} else {
					document.getElementById("content").innerHTML = xhr2.responseText;
				}
			} else {
				document.getElementById("content").innerHTML = "Chargement en cours ...<br /><img src='../scripts/images/loading.gif' alt=''/>";
			}
		}
		xhr2.open("GET", file, true);
		xhr2.send(null);
	}
	
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
	
	function verifier_new() {
		var form=document.forms["new_service"]
		if (form.lib_service.value=="") {
			form.lib_service.focus();
			return false
		}
	}
	
	function verifier_maj() {
		var form=document.forms["maj_service"]
		if (form.lib_service.value=="") {
			form.lib_service.focus();
			return false
		}
	}
	
	function supprimer(x, y, z) {
		if (confirm('Etes-vous sur de vouloir supprimer '+z+' ?')) {
			document.location.href='cod_service.php?id='+x+'&idf='+y+'&opt=suppr_f';
		}
	}
</script>
</head>

<body>
<?php
	switch ($opt) {
		case 'maj':
			$id=$_REQUEST['id'];
			$sql="SELECT * FROM services WHERE id_service='$id'";
			$result=mysql_query($sql);
			if ($row=mysql_fetch_array($result)) {
				extract($row);
?>
<form action="cod_service.php" enctype="multipart/form-data" name="maj_service" method="post" onSubmit="return verifier_maj();">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr> 
      <td width="20%" class="table_entete" height="30px">ID :</td>
      <td width="80%"><?php echo $id_service; ?>
        <input type="hidden" name="id_service" value="<?php echo $id_service; ?>"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Libell&eacute; :</td>
      <td><input type="text" name="lib_service" value="<?php echo utf8_encode($lib_service); ?>" autocomplete="off">
        <input type="hidden" name="opt" value="<?php echo $opt; ?>"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Tarif normal :</td>
      <td colspan="2"><input type="text" name="tarif_service" value="<?php echo $tarif_service; ?>" autocomplete="off"> 
              &euro;
              <div align="left"></div></td>
    </tr>
    <tr>
      <td class="table_entete" height="30px">Tarif &quot;AUTRES&quot; :</td>
      <td colspan="3"><input type="text" name="tarif_autre" value="<?php echo $tarif_autre; ?>" autocomplete="off">        
        &euro;</td>
    </tr>
    <tr>
      <td class="table_entete" height="30px">Tarif &quot;MYRETOOCH&quot; :</td>
      <td colspan="3"><input type="text" name="tarif_ladisse" value="<?php echo $tarif_ladisse; ?>" autocomplete="off">        &euro;</td>
    </tr>
    <tr>
      <td class="table_entete" height="30px">Tarif &quot;PUBLIC&quot;</td>
      <td colspan="2"><input type="text" name="tarif_public" value="<?php echo $tarif_public; ?>" autocomplete="off">        
        &euro;</td>
    </tr>
    <tr>
      <td class="table_entete" height="30px">Formules d'abonnement :</td>
      <td colspan="2"><?php echo @mysql_num_rows(mysql_query("SELECT * FROM formules WHERE id_service='$id_service'")); ?><input type="hidden" name="nb_f" autocomplete="off" value="<?php echo @mysql_num_rows(mysql_query("SELECT * FROM formules WHERE id_service='$id_service'")); ?>" /> formule(s)</td>
    </tr>
    <tr <?php if (@mysql_num_rows(mysql_query("SELECT * FROM formules WHERE id_service='$id_service'"))==0) { ?>style="display:none"<?php } ?>>
      <td colspan="3" class="table_entete">
      	<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center">
	<tr>
    	<td align="center" width="10%">#</td>
        <td align="center"><img src="images/ImgDelete.gif" width="16" height="16" /></td>
        <td align="center">D&eacute;signation formule</td>
        <td align="center">Nombre de photos</td>
        <td align="center">Remise (%)</td>
    </tr>
    <?php
		$i=1;
		$sql="SELECT * FROM formules WHERE id_service='$id_service' ORDER BY nb_photos";
		$res=mysql_query($sql);
		while ($lig=mysql_fetch_array($res)) {
			extract($lig);
	?>
    		<tr>
            	<td align="center" style="font-weight:normal"><?php echo $i; ?><input type="hidden" name="id_formule[]" value="<?php echo $id_formule; ?>" /></td>
                <td align="center">
                	<?php
						if (@mysql_num_rows(mysql_query("SELECT * FROM abonnements WHERE id_formule='$id_formule'"))==0) {
					?>
                	<a href="javascript:;" onclick="supprimer(<?php echo $id_service; ?>, <?php echo $id_formule; ?>, '<?php echo $lib_formule; ?>')" title="supprimer <?php echo $lib_formule; ?>"><img src="images/ImgDelete.gif" width="16" height="16" /></a>
                    <?php
						}
						else {
					?>
                    &nbsp;	
                    <?php
						}
					?>
                </td>
            	<td align="center"><input type="text" name="lib_f[]" autocomplete="off" value="<?php echo $lib_formule; ?>" /></td>
                <td align="center"><input type="text" name="nb_p[]" onKeyPress="return checkIt(event)" style="text-align:right" autocomplete="off" value="<?php echo $nb_photos; ?>" /></td>
                <td align="center"><input type="text" name="rem[]" onKeyPress="return checkIt(event)" style="text-align:right" autocomplete="off" value="<?php echo $remise*100; ?>" /></td>
            </tr>
    <?php
		$i++;
		}
	?>
</table> 
      </td>
    </tr>
    <tr>
      <td height="30px" class="table_entete">Nouvelles formules :</td>
      <td height="30px"><input type="text" name="nb_formule" autocomplete="off" value="0" onKeyPress="return checkIt(event)" onKeyUp="load_page('ajouter_formule.php?nb_formule='+this.form.nb_formule.value+'&ids=<?php echo $id_service; ?>');return false;" /> formule(s)</td>
    </tr>
    <tr>
      <td colspan="2" class="table_entete"><div id="content" align="center"></div></td>
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
<form action="cod_service.php" enctype="multipart/form-data" name="new_service" method="post" onSubmit="return verifier_new();">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr> 
      <td width="20%" height="30px" class="table_entete">Libell&eacute; :</td>
      <td width="80%"><input type="text" name="lib_service" autocomplete="off"> 
        <input type="hidden" name="opt" value="<?php echo $opt; ?>"></td>
    </tr>
    <tr>
      <td height="30px" class="table_entete">Tarif normal :</td>
      <td><input name="tarif_service" type="text" onKeyPress="return checkIt(event)" value="0" autocomplete="off">        
        &euro;</td>
    </tr>
    <tr>
      <td height="30px" class="table_entete">Tarif &quot;AUTRES&quot; :</td>
      <td><input name="tarif_autre" type="text" onKeyPress="return checkIt(event)" value="0" autocomplete="off">        &euro;</td>
    </tr>
    <tr>
      <td height="30px" class="table_entete">Tarif &quot;MYRETOOCH&quot; :</td>
      <td><input name="tarif_ladisse" type="text" onKeyPress="return checkIt(event)" value="0" autocomplete="off">        &euro;</td>
    </tr>
    <tr>
      <td height="30px" class="table_entete">Tarif &quot;PUBLIC&quot; :</td>
      <td><input name="tarif_public" type="text" onKeyPress="return checkIt(event)" value="0" autocomplete="off">        &euro;</td>
    </tr>
    <tr>
      <td class="table_entete" height="30px">Formules d'abonnement :</td>
      <td colspan="2"><input type="text" name="nb_formule" autocomplete="off" value="0" onKeyPress="return checkIt(event)" onKeyUp="load_page('ajouter_formule.php?nb_formule='+this.form.nb_formule.value);return false;" /> formule(s)</td>
    </tr>
    <tr>
      <td colspan="3" class="table_entete"><div id="content" align="center"></div></td>
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