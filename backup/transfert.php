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
<script type="text/javascript">
	function patienter() {
		var form=document.forms["ftp_transfert"]
		form.Submit.value="Patientez..."
	}
</script>
</head>
<body>
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
<div id="mnu_mode1" style="color:#CCC"><table height="44px" width="144px" border="0"><tr valign="middle" align="center"><td><?php echo _INSCRIRE; ?></td></tr></table></div>
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><blink><?php echo _TRANSFERER_PHOTO; ?></blink></td></tr></table></div>
<div id="mnu_mariage1" style="color:#CCC"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><?php echo _TELECHARGER; ?></td></tr></table></div>
<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
</div>
<div id="fond_panier">
    <div id="form_transfert">
    	<form action="cod_transfert.php?lang=<?php echo $lang; ?>" name="ftp_transfert" enctype="multipart/form-data" method="post" onSubmit="patienter();">
        <table width="98%" border="0" cellspacing="0" cellpadding="2" align="center">
          <tr bgcolor="#FFF" style="color:#f8bb49; font-size:18px; font-weight:bold"> 
            <td align="center"><span style="position:relative;left:-85px;"><?php echo _SERVICE_DEMANDE; ?></span></td>
            <td align="center"><span style="position:relative;margin-left:-240px;"><?php echo _NOMBRE; ?></span></td>
            <td align="center"><span style="margin-left:-45px;"><?php echo _PHOTO_A_TRANSFERT; ?></span></td>
            <td colspan="2" align="center"><span style="position:relative;left:15px;"><?php echo _COMMENTER; ?></span></td>
          </tr>
        </table>
        <br />
        <div style=" border:1px solid #FFF;height:450px; width:822px; margin-top:-20px; margin-left:8px; overflow:scroll; overflow-x:hidden">
        <table width="98%" border="0" cellspacing="0" cellpadding="2" align="center">
          <tr bgcolor="#FFF" style="color:#f8bb49; font-size:18px; font-weight:bold; display:none"> 
            <td align="center"><?php echo _SERVICE_DEMANDE; ?></td>
            <td align="center"><?php echo _NOMBRE; ?></td>
            <td align="center"><?php echo _PHOTO_A_TRANSFERT; ?></td>
            <td colspan="2" align="center"><?php echo _COMMENTER; ?></td>
          </tr>
          <?php
		  $dern_facture=$_REQUEST['idf'];
	$sql="SELECT * FROM factures
		INNER JOIN detail_factures ON detail_factures.id_facture=factures.id_facture
		INNER JOIN services ON services.id_service=detail_factures.id_service
		WHERE factures.id_facture='$dern_facture' AND id_client='$id_client'
		ORDER BY services.tarif_service";
	//echo $sql;
	$nb_foto=0;
	$resultat=mysql_query($sql);
	while($enr=mysql_fetch_array($resultat)) {
		extract($enr);
		$nb_foto+=$qte_panier_client;
		$lib_service = strtr($lib_service, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ/', 
                                     'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy/');
  ?>
          <tr style="color:#FFF; font-family:Tahoma, Geneva, sans-serif; font-size:14px"> 
            <td>&bull;&nbsp;<label><?php echo traduire($lib_service); ?></label><input type="hidden" name="<?php echo $lib_service; ?>" value="<?php echo $lib_service; ?>" ></td>
            <td align="center"><?php echo $qte_panier_client; ?> <label><?php echo _PHOTOS; ?></label></td>
            <td align="center"><?php
			for ($i=1;$i<=$qte_panier_client;$i++) {
	  	?>
              <label style="font-size:9px"><?php if ($i<10) echo '0'.$i; else echo $i;?></label>&nbsp;<input name="<?php echo ereg_replace(' ','_',$lib_service.$i); ?>" type="file" autocomplete="off" style="width:auto" /><br /> 
              <?php
			}
		?>
            </td>
            <td colspan="2" align="center"><?php
			for ($i=1;$i<=$qte_panier_client;$i++) {
	  	?>
              <label style="font-size:9px"><?php if ($i<10) echo '0'.$i; else echo $i;?></label>&nbsp;<input name="<?php echo 'c'.ereg_replace(' ','_',$lib_service.$i); ?>" type="text" style="width:120px; height:17px" autocomplete="off" maxlength="200" /><br />
              <?php
			}
		?>
            </td>
          </tr>
          <?php
	}
	?>	
        </table>
        </div>
        <br />
        <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" style="position:relative; top:-14px;">
        	<tr> 
            <td colspan="5" align="center"><input type="hidden" name="MAX_FILE_SIZE" value="100000" /><input type="submit" name="Submit" value="<?php echo _TRANSFERER; ?>" class="submit">
                <img src="images/ajax-loader.gif" style="display:none" id="attente"/>
                <input type="hidden" name="id_facture" value="<?php echo $dern_facture; ?>" /></td>
          </tr>
       </table>
      </form>
	</div>
</div>
<div align="center" style="position:absolute; top:690px; left:400px; color:#FFF; font-weight:bold; font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php
			if (!empty($_SESSION['id_client'])) {
		?>
        	<label><?php echo _RMQ; ?></label>
		<?php
			}
		?></div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>