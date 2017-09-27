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
	
	if (!empty($_SESSION['code_promo']))
		$code_promo=$_SESSION['code_promo'];
	else
		$code_promo='';
	
	//debut test
	$total=0;
	$sql="SELECT paniers.id_service, services.lib_service, qte_panier_client, paniers.tarif_service FROM paniers
		INNER JOIN services ON services.id_service=paniers.id_service
		WHERE id_client='$id_client' ORDER BY panier_client";
	$res=mysql_query($sql);
	while($enr=mysql_fetch_array($res)) {
		extract($enr);
		$total+=$qte_panier_client*$tarif_service;
	}
	//fin test
	
	$btn='2';
	$aller='https://www.paypal.com/cgi-bin/webscr';
	$pourqui='';
	if (!empty($code_promo)) {
		$attribuer=mysql_result(mysql_query("SELECT attribuer FROM promos WHERE id_promo='$code_promo'"),0);
		if ($attribuer=='ladisse') {
			$btn='1';
			$pourqui='ladisse';
			$aller='cod_special.php?lang='.$lang;
		}
		else if ($attribuer=='autres') {
			$btn='2';
			$pourqui='autres';
			if ($total!=0)
				$aller='https://www.paypal.com/cgi-bin/webscr';
			else
				$aller='cod_panier.php?lang='.$lang;
		}
		else if ($attribuer=='public') {
			$btn='2';
			$pourqui='public';
			if ($total!=0)
				$aller='https://www.paypal.com/cgi-bin/webscr';
			else
				$aller='cod_panier.php?lang='.$lang;
		}
		else {
			$btn='2';
			$pourqui='';
			if ($total!=0)
				$aller='https://www.paypal.com/cgi-bin/webscr';
			else
				$aller='cod_panier.php?lang='.$lang;
		}
	}
	else {
		$btn='2';
		$pourqui='';
		if ($total!=0)
			$aller='https://www.paypal.com/cgi-bin/webscr';
		else
			$aller='cod_panier.php?lang='.$lang;
	}
	
	//si panier vide
	$nb_enr=0;
	if (empty($code_promo)) {
		$sql="SELECT COUNT(*) FROM paniers WHERE id_client='$id_client'";
		$nb_enr=mysql_result(mysql_query($sql),0);
		if ($nb_enr==0) {
			$sql1="SELECT * FROM services";
			$results=mysql_query($sql1);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				$id_service=$id_service;
				$tarif_service=$tarif_service;
				$date_insertion=date('Y-m-d');
				$sql2="INSERT INTO paniers (id_client, id_service, qte_panier_client, tarif_service, date_insertion) VALUES ('$id_client', '$id_service' ,'0', '$tarif_service', '$date_insertion')";
				mysql_query($sql2);
			}
		}
	}
	else {
		$sql="SELECT COUNT(*) FROM paniers WHERE id_client='$id_client'";
		$nb_enr=mysql_result(mysql_query($sql),0);
		if ($nb_enr!=0) {
			$sql1="SELECT * FROM services";
			$results=mysql_query($sql1);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				$id_service=$id_service;
				if ($pourqui=='ladisse')
					$tarif_service=$tarif_ladisse;
				else if ($pourqui=='autres')
					$tarif_service=$tarif_autre;
				else if ($pourqui=='public')
					$tarif_service=$tarif_public;
				else
					$tarif_service=$tarif_service;
				$date_insertion=date('Y-m-d');
				$sql2="UPDATE paniers SET 
					tarif_service='$tarif_service',
					date_insertion='$date_insertion'
					WHERE id_client='$id_client' AND id_service='$id_service'";
				mysql_query($sql2);
			}
		}
		else {
			$sql1="SELECT * FROM services";
			$results=mysql_query($sql1);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				$id_service=$id_service;
				if ($pourqui=='ladisse')
					$tarif_service=$tarif_ladisse;
				else if ($pourqui=='autres')
					$tarif_service=$tarif_autre;
				else if ($pourqui=='public')
					$tarif_service=$tarif_public;
				else
					$tarif_service=$tarif_service;
				$date_insertion=date('Y-m-d');
				$sql2="INSERT INTO paniers (id_client, id_service, qte_panier_client, tarif_service, date_insertion) VALUES ('$id_client', '$id_service' ,'0', '$tarif_service', '$date_insertion')";
				mysql_query($sql2);
			}
		}
	}
	
	//produit
	if (!empty($_REQUEST['id']))
		$id=$_REQUEST['id'];
	else
		$id='';
	$enr=0;
	//prix du service
	if (!empty($id)) {
		if (empty($code_promo))
			$pr=mysql_result(mysql_query("SELECT tarif_service FROM services WHERE id_service='$id'"),0);
		else {
			if ($pourqui=='ladisse')
				$pr=mysql_result(mysql_query("SELECT tarif_ladisse FROM services WHERE id_service='$id'"),0);
			else if ($pourqui=='autres')
				$pr=mysql_result(mysql_query("SELECT tarif_autre FROM services WHERE id_service='$id'"),0);
			else if ($pourqui=='public')
				$pr=mysql_result(mysql_query("SELECT tarif_public FROM services WHERE id_service='$id'"),0);
			else
				$pr=mysql_result(mysql_query("SELECT tarif_service FROM services WHERE id_service='$id'"),0);
		}
	}
	//verification service
	$enr=mysql_num_rows(mysql_query("SELECT * FROM paniers WHERE id_client='$id_client' AND id_service='$id'"));
	//ajout dans le panier
	if (!empty($pr)) {
		if ($enr==0) {
			$sql="INSERT INTO paniers (id_client, id_service, qte_panier_client, tarif_service, date_insertion)
				VALUES ('$id_client', '$id', '1', '$pr', '$maintenant')";
			//echo $sql;
			mysql_query($sql);
		}
	}

	if (!empty($_REQUEST['action']))
		$action=$_REQUEST['action'];
	else 
		$action='';

	if ($action=='increase')	 {
		$sql="UPDATE paniers SET
			qte_panier_client=qte_panier_client+1
			WHERE id_client='$id_client' AND id_service='$id'";
		//echo $sql;
		mysql_query($sql);
		header("location:monpanier.php?id=$id&lang=$lang");
	}
	
	if ($action=='decrease')	 {
		$sql="UPDATE paniers SET
		qte_panier_client=qte_panier_client-1
		WHERE id_client='$id_client' AND id_service='$id'";
		//echo $sql;
		mysql_query($sql);
		header("location:monpanier.php?id=$id&lang=$lang");
	}
	//
	
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
<title>myretooch.com::<?php echo strtolower(_MON_PANIER); ?></title>
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
<script type="text/javascript" src="js/verifier_promo.js"></script>
<script language="javascript" type="text/javascript">
	function aller() {
		document.getElementById("form1").action="https://www.moneybookers.com/app/payment.pl"
		document.getElementById("form1").submit()
	}
	
	function devoir() {
		var form=document.forms["doit"]
		
		if (form.code_promo.value=="") {
			document.getElementById("promo").style.color="#cc0000"
			form.code_promo.focus()
			return false
		}
		else {
			document.getElementById("promo").style.color="#544b36"
		}
	}
</script>
<link href="design/styles.css" rel="stylesheet" type="text/css" />
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
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><blink><?php echo _MON_PANIER ; ?></blink></td></tr></table></div>
<div id="mnu_mariage1" style="left:538px;"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><?php
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
<!--<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td><?php //if ($total==0) { ?><a href="choix_service.php?lang=<?php //echo $lang; ?>"><?php //echo _RETOUR; ?></a><?php //} ?></td></tr></table></div>-->
<!--<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>-->
</div>
<div id="fond_panier">
    <div id="form_panier">
    	<table width="100%" height="10%">
        	<tr valign="middle">
            	<td align="left" style="font-size:18px"><?php echo _MON_PANIER; ?></td>
                <td align="right" style="font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold"><?php echo _MONTANT_TOTAL.'&nbsp;:&nbsp;'.number_format(mysql_result(mysql_query("SELECT SUM(qte_panier_client*tarif_service) AS total FROM paniers WHERE id_client='$id_client' "),0),2,'.',' ');?> &euro;</td>
            </tr>
            <tr>
            	<td colspan="2"><hr class="hr" style="position:relative; top:-8px;" /></td>
            </tr>
        </table>
	<form name="doit" action="cod_promo.php?lang=<?php echo $lang; ?>" enctype="multipart/form-data" method="post" onsubmit="return devoir();" <?php if (!empty($total)!=0) echo 'style="display:none"'; ?>>
        <table style="position:relative; top:-10px; <?php if (!empty($code_promo)) echo 'display:none'; ?>" width="100%">
        	<tr style="font-family:Tahoma, Geneva, sans-serif; font-weight:bold; font-size:12px">
            	<td align="left"><label id="promo"><?php echo _PROMO; ?></label></b><input name="code_promo" type="text" style="font-size:12px; width:54px" maxlength="6" onKeyUp="verifier_promo(this.value)" autocomplete="off" value="<?php echo $code_promo; ?>" /> <input type="submit" id="Submit" value="<?php echo _GO; ?>" class="submit" /><div id="detect_promo"></div></td>
            </tr>
        </table>
    </form>
	<form action="<?php echo $aller; ?>" method="post" enctype="multipart/form-data" id="form1">
          <table width="100%" align="center" cellpadding="2" cellspacing="0" style="border:1px solid #FFF">
            <tr height="40px" style="background-color:#FFF; color:#ffa500; font-size:18px;"> 
              <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo _SERVICES; ?></td>
              <td align="center"><?php echo _NOMBRE; ?></td>
              <td align="center"><?php echo _QTE; ?></td>
              <td align="right"><?php echo _PRIX_UNITAIRE; ?></td>
              <td align="right"><?php echo _MONTANT; ?>&nbsp;&nbsp;</td>
            </tr><?php
        $nbfoto=0;
        $tot=0;
        $art=1;
        $sql="SELECT paniers.id_service, services.lib_service, qte_panier_client, paniers.tarif_service FROM paniers
        INNER JOIN services ON services.id_service=paniers.id_service
        WHERE id_client='$id_client' ORDER BY tarif_service";
        //echo $sql;
        $resultat=mysql_query($sql);
        while($enr=mysql_fetch_array($resultat)) {
            extract($enr);
            $nbfoto+=$qte_panier_client;
            $tot+=$qte_panier_client*$tarif_service;
            $lib_service = strtr($lib_service, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ/', 
                                     'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy/');
    ?>
            <?php
                if ($qte_panier_client>=1) {
            ?>
            <input name="item_name_<?php echo $art; ?>" type="hidden" value="<?php echo $lib_service; ?>" />
            <input name="item_number_<?php echo $art; ?>" type="hidden" value="<?php echo $art; ?>" />
            <input name="quantity_<?php echo $art; ?>" type="hidden" value="<?php echo $qte_panier_client; ?>" />
            <input name="amount_<?php echo $art; ?>" type="hidden" value="<?php echo $tarif_service; ?>" />
            <?php
                $art++;
            }
            ?>
            <tr style="font-family:Tahoma, Geneva, sans-serif; font-size:14px"> 
              <td align="left">&nbsp;<b>&bull;</b>&nbsp;
              <?php
				if (!empty($code_promo)){
						if ($tarif_service<mysql_result(mysql_query("SELECT tarif_service FROM services WHERE id_service='$id_service'"),0)) {
			  ?>
			  				<span style="font-size:18px"><?php echo substr(traduire($lib_service),0,1); ?></span><?php echo substr(traduire($lib_service),1,strlen(traduire($lib_service))); ?>
              <?php
						}
				 		else {
							echo traduire($lib_service);
						}
				}
				else {
					echo traduire($lib_service);
				}
				?>
              </td>
              <td align="center"><?php echo $qte_panier_client; ?> <?php echo _PHOTOS; ?></span></td>
              <td align="center"><input name="s_<?php echo $id_service; ?>" type="hidden" value="<?php echo $id_service; ?>" size="3" style="text-align:left" />
              <input name="qte_<?php echo $id_service; ?>" type="text" value="<?php echo $qte_panier_client; ?>" size="3" style="text-align:right" autocomplete="off" <?php if ($tot!=0) echo 'readonly="readonly"'; ?> /></td>
              <td align="right"><?php
                if (!empty($code_promo)){
						if ($tarif_service<mysql_result(mysql_query("SELECT tarif_service FROM services WHERE id_service='$id_service'"),0))
							echo '<s style="color:#000000"><font color="#FF0000" style="font-size:18px">'.mysql_result(mysql_query("SELECT tarif_service FROM services WHERE id_service='$id_service'"),0).' &euro;</font></s>';
                }
                  ?>
              <span style="font-size:12px;"><?php echo number_format($tarif_service,2,'.',' ');  ?> &euro;</span></td>
              <td align="right"><?php echo number_format(($qte_panier_client*$tarif_service),2,'.',' ');?> &euro;&nbsp;&nbsp;</td>
            </tr>
            <?php
        }
    ?>
            <tr> 
              <td colspan="5"><hr class="hr" /></td>
            </tr>
            <tr style="font-family:Tahoma, Geneva, sans-serif; font-size:14px; font-weight:bold">
              <td>&nbsp;</td>
              <td align="center"><?php echo $nbfoto.' '.strtoupper(_PHOTOS); ?></td>
              <td>&nbsp;</td>
              <td align="right"><?php echo _MONTANT_TOTAL; ?></td>
              <td align="right"><?php echo number_format($tot,2,'.',' ');  ?>  &euro;&nbsp;&nbsp;<!-- paypal -->
                <input name="cmd" type="hidden" value="_cart" /> 
                <!--<input name="cmd" type="hidden" value="_xclick" />-->
                <input type="hidden" name="upload" value="1"> 
                <!--<input name="business" type="hidden" value="j.iboura@live.fr" />-->
                <input name="business" type="hidden" value="myretooch@gmail.com" />
                <!--<input name="business" type="hidden" value="ventes_1260802642_biz@gmail.com" />-->
                <!--<input name="item_name" type="hidden" value="Service" />-->
                <!--<input name="amount" type="hidden" value="<?php //echo number_format($tot,2,'.',' ');  ?>" />-->
                <input name="shipping" type="hidden" value="0.00" /> <input name="no_shipping" type="hidden" value="0" /> 
                <input name="custom" type="hidden" value="<?php echo $id_client; ?>" /> 
                <input name="return" type="hidden" value="http://www.myretooch.com/finpaiement.php?lang=<?php echo $lang; ?>" /> 
                <input name="cancel_return" type="hidden" value="http://www.myretooch.com/monpanier.php?lang=<?php echo $lang; ?>" /> 
                <input name="notify_url" type="hidden" value="http://www.myretooch.com/notifier.php" /> 
                <input name="no_note" type="hidden" value="1" /> <input name="currency_code" type="hidden" value="EUR" /> 
                <input name="tax" type="hidden" value="0.00" /> <input name="lc" type="hidden" value="FR" /> 
                <input name="bn" type="hidden" value="PP-BuyNowBF" />
                <!-- MoneyBookers -->
                <input type="hidden" name="pay_to_email" value="myretooch@gmail.com">
                <input type="hidden" name="language" value="<?php echo strtoupper($lang); ?>">
                <input type="hidden" name="amount" value="<?php echo $tot; ?>">
                <input type="hidden" name="currency" value="EUR">
                <input type="hidden" name="detail1_description" value="">
                <input type="hidden" name="detail1_text" value="<?php echo _SERVICE; ?>">
                <input type="hidden" name="return_url" value="http://www.myretooch.com/finpaiement.php?lang=<?php echo $lang; ?>">
                <input type="hidden" name="cancel_url" value="http://www.myretooch.com/monpanier.php?lang=<?php echo $lang; ?>">
                <input type="hidden" name="logo_url" value="http://www.myretooch.com/images/myretooch_logo.png">
                <input type="hidden" name="status_url" value="myrias@live.fr">
                <input type="hidden" name="confirmation_note" value="Merci pour votre achat.">
                </td>
            </tr>
            <tr> 
              <td colspan="5" align="center"><hr class="hr" /></td>
            </tr>
            <tr> 
              <td colspan="5" align="center">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td align="right"><?php
                            if ($btn==2) {
                          ?>
                          <span style="position:relative; top:-14px; font-family:Tahoma, Geneva, sans-serif; font-size:12px; font-weight:bold; <?php if ($tot==0) echo 'display:none'; ?>"><?php echo _CHOIXPAIE; ?> </span>
                          <input type="image" src="images/paypal.jpg" border="0" name="submit" title="PayPal <?php echo _PAYPAL; ?>" class="submit2" style="position:relative; top:-2px;<?php if ($tot==0) echo 'display:none'; ?>" value="<?php echo _PAYER; ?>" id="payer">
                          <!--&nbsp;&nbsp;<input type="image" src="images/moneybookers.jpg" border="0" name="submit" title="MoneyBookers <?php //echo _MONEYBOOKERS; ?>" class="submit2" style=" position:relative; top:-2px;<?php if ($tot==0) echo 'display:none'; ?>" value="<?php //echo _PAYER; ?>" id="payer" onclick="aller();">-->
                          <img alt="" border="0" src="https://www.paypal.com/fr_XC/i/scr/pixel.gif" width="1" height="1">
                          <input type="submit" name="maj" id="maj" value="<?php echo _PANIER_VALID; ?>" class="submit" style="position:relative; top:-6px;<?php if ($tot!=0) echo 'display:none'; ?>"/>&nbsp;&nbsp;<?php
                            }
                          ?>
                          <?php
                            if ($btn==1) {
                          ?>
                          <input type="submit" class="submit" value="<?php echo _GO; ?>">&nbsp;&nbsp;
                          <?php
                            }
                          ?></td>
                    </tr>
                  </table>
				</td>
        </tr>
      </table>
    </form>
    </div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>