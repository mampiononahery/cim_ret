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
	
	//maintenant
	$maintenant=date('Y-m-d');
	//session temporaire d'un client
	if (empty($_SESSION['id_client']))
		$_SESSION['id_client']=date('Ymd').date('His');
	else
		$id_client=$_SESSION['id_client'];
	
	if (!empty($_SESSION['id_client'])) {
		$id_client=$_SESSION['id_client'];
	}
	else
		$id_client='';
	
	$btn=0;
	$aller='';
	$ok=0;
	
	$sql="SELECT * FROM abonnements WHERE id_client='$id_client' AND expire='0'";
	if (mysql_num_rows(mysql_query($sql))==0) {
		$btn=1;
		$aller='cod_abonnement.php?lang='.$lang;
		$ok=0;
	}
	else {
		$btn=2;
		$aller='https://www.paypal.com/cgi-bin/webscr';
		$result=mysql_query($sql);
		while ($lig=mysql_fetch_array($result)) {
			extract($lig);
			$idformule=$id_formule;
		}
		$ok=1;
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
<title>myretooch.com::<?php echo strtolower(_MON_ABN); ?></title>
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
<script language="javascript" type="text/javascript">
	function verifier() {
		var form=document.forms["form1"];
		var j=0;
		
		if (form.action=='https://www.paypal.com/cgi-bin/webscr') {
			for (var i=0;i<form.formule.length;i++) {
				if (!form.formule[i].checked) {
					form.formule[i].disabled=true
				}
			}
		}
	}
	function inserer() {
		var form=document.forms["form1"];
		var j=0;
		//abonnement
		
		if (form.action=='https://www.paypal.com/cgi-bin/webscr') {
			for (var i=0;i<form.formule.length;i++) {
				if (form.formule[i].checked) {
					form.item_name.value=eval('form.lib_formule_'.concat(i)+'.value')
					form.item_number.value=eval('form.id_formule_'.concat(i)+'.value')
					form.a3.value=eval('form.montant_'.concat(i)+'.value')
				}
			}
		}
		
		for (var i=0;i<form.formule.length;i++) {
			if (form.formule[i].checked)
				j++
		}
		
		if (j==0) {
			document.getElementById("lbl_abn").style.color="#cc0000"
			document.getElementById("formule").focus()
			return false
		}
		else {
			document.getElementById("lbl_abn").style.color=""
		}
		
		if (!document.getElementById("cgv").checked) {
			document.getElementById("lbl_cgv").style.color="#cc0000"
			document.getElementById("cgv").focus()
			return false
		}
		else {
			document.getElementById("lbl_cgv").style.color=""
		}
	}
</script>
<link href="design/styles.css" rel="stylesheet" type="text/css" media="screen, projection" />
</head>
<body onload="verifier();">
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
				else {
		                echo _BONJOUR;
				}
			?></font></td></tr></table></div>
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><blink><?php echo _MON_ABN ; ?></blink></td></tr></table></div>
<div id="mnu_mariage1"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><?php
				if (!empty($id_client) && mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)!=0) {
			?><a href="monprofil.php?lang=<?php echo $lang; ?>"><?php echo _MON_PROF; ?></a>
            <?php
				}
			?></td></tr></table></div>
<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td><?php
				if (!empty($id_client) && mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)!=0) {
			?><a href="cod_logout.php?lang=<?php echo $lang; ?>"><?php echo _SE_DECONNECTER; ?></a><?php
				}
			?></td></tr></table></div>
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td><a href="choix_service.php?lang=<?php echo $lang; ?>"><?php if ($aller=='cod_abonnement.php?lang='.$lang) echo _RETOUR; ?></a></td></tr></table></div>
<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
</div>

<div id="fond_panier">
    <div id="form_abn">
    	<form action="<?php echo $aller; ?>" method="post" enctype="multipart/form-data" id="form1" onsubmit="return inserer();">
        		<input type="hidden" name="business" value="myretooch@gmail.com">
                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <input type="hidden" name="item_name" value="">
                <input type="hidden" name="item_number" value="">
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="a3" value="">
                <input type="hidden" name="p3" value="12">
                <input type="hidden" name="t3" value="M">
                <input type="hidden" name="custom" value="<?php echo $id_client; ?>" /> 
                <input type="hidden" name="return" value="http://www.myretooch.com/finpaiement.php?lang=<?php echo $lang; ?>" /> 
                <input type="hidden" name="cancel_return" value="http://www.myretooch.com/monabonnement.php?lang=<?php echo $lang; ?>" />
                <input name="notify_url" type="hidden" value="http://www.myretooch.com/notifier.php" />
               <table width="100%" align="center" cellpadding="2" cellspacing="0" style="margin-top:10px; border:1px solid #FFF">
                    <tr height="40px" style="background-color:#FFF; color:#ffa500; font-size:18px;">
                      <td align="center"><input type="radio" disabled="disabled" /></td> 
                      <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="lbl_abn"><?php echo _ABN; ?></span></td>
                      <td align="center"><?php echo _NBFOTO; ?></td>
                      <td align="right"><?php echo _MONTANT; ?>&nbsp;&nbsp;</td>
                    </tr>
                    <?php
				$i=0;
                $requete="SELECT * FROM formules
                        INNER JOIN services ON formules.id_service=services.id_service
                        ORDER BY formules.id_service, id_formule";
                $resultats=mysql_query($requete);
                while($enrs=mysql_fetch_array($resultats)) {
                    extract($enrs);
                    $lib_formule = strtr($lib_formule, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ/', 
                                             'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy/');
            ?>
                  <tr style="color:#FFF; font-family:Tahoma, Geneva, sans-serif; font-size:14px; height:25px;">
                    <td align="center"><input type="radio" name="formule[]" id="formule" value="<?php echo $id_formule; ?>" onclick="form.a3.value=<?php echo number_format(($tarif_service-($tarif_service*$remise))*$nb_photos,2,'.',' '); ?>; form.item_number.value='<?php echo $id_formule; ?>'; form.item_name.value='<?php echo $lib_formule; ?>';" <?php if ($id_formule==@$idformule) echo 'checked disabled'; ?> /><input type="hidden" name="id_formule_<?php echo $i; ?>" value="<?php echo $id_formule; ?>" /></td>
                    <td align="left">&nbsp;<?php echo traduire_abonner($lib_formule); ?><input type="hidden" name="lib_formule_<?php echo $i; ?>" value="<?php echo $lib_formule; ?>" /></td>
                    <td align="center">&nbsp;&nbsp;<?php echo $nb_photos; ?><input type="hidden" name="montant_<?php echo $i; ?>" value="<?php echo number_format(($tarif_service-($tarif_service*$remise))*$nb_photos,2,'.',' '); ?>" /></td>
                    <td align="right"><b><?php echo number_format(($tarif_service-($tarif_service*$remise))*$nb_photos,2,'.',' '); ?> &euro;&nbsp;&nbsp;</b></td>
                  </tr>
                  <?php
				  $i++;
                }
                ?>
                    <tr>
                      <td colspan="4"><hr class="hr" /></td>
                    </tr>
                  <tr style="color:#FFF; font-family:Tahoma, Geneva, sans-serif; font-size:14px;">
                    <td align="center"><input type="checkbox" name="cgv" id="cgv" value="1" <?php if ($ok==1) echo 'checked disabled'; ?> /></td>
                    <td colspan="2" align="left" class="form_abn"><label id="lbl_cgv"><?php echo _LU; ?> <a href="javascript:;"><?php echo _CGV; ?></a></label></td>
                    <td align="center"><?php
						if ($btn==1) {
					?>
                    		<input name="submit" type="submit" class="submit" id="Submit" value="<?php echo _GO; ?>" />
                    <?php
						}
					?><?php
						if ($btn==2) {
					?><input type="image" name="submit" border="0" src="images/paypal.jpg" title="PayPal <?php echo _PAYPAL; ?>">
                <img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif" ><?php
						}
					?></td>
                  </tr>
              </table>
			</form>
		</div>
	</div>
</div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>