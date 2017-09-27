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
	$sql="DELETE FROM paniers WHERE id_client='$id_client'";
	mysql_query($sql);
	
	if (!empty($_SESSION['code_promo'])) {
		$_SESSION['code_promo']='';
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
	
	if (!empty($_REQUEST['opt']))
		$opt=$_REQUEST['opt'];
	else
		$opt='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo _ISO;?> " />
<title>myretooch.com::<?php echo strtolower(_MON_PROF); ?></title>
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
<script language="javascript" type="text/javascript">
	function afficher(vid) {
	//alert(vid)
		switch (vid) {
			case 'acces':
				document.getElementById("acces").style.display="";
				break;
			case 'activite':
				document.getElementById("activite").style.display="";
				document.getElementById("profil").style.display="none";
				break;
			case 'profil':
				document.getElementById("activite").style.display="none";
				document.getElementById("profil").style.display="";
				break;
			case 'tr':
				var form=document.forms["maj_profil"];
				if (form.change_pwd.checked) {
					document.getElementById("vmp").style.display="";
					document.getElementById("nmp").style.display="";
					document.getElementById("cmp").style.display="";
				}
				else {
					document.getElementById("vmp").style.display="none";
					document.getElementById("nmp").style.display="none";
					document.getElementById("cmp").style.display="none";
				}
				break;
		}
	}
	
	function verifier_maj() {
		var form=document.forms["maj_profil"]
		var verif = /^[.a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
		
		if (verif.exec(form.email_client.value)==null) {
			document.getElementById("mel").style.color="#cc0000"
			form.email_client.focus()
			return false
		}
		else {
			document.getElementById("mel").style.color=""
		}
		
		if (form.prenom_client.value=="") {
			document.getElementById("prenom").style.color="#cc0000"
			form.prenom_client.focus()
			return false
		}
		else {
			document.getElementById("prenom").style.color=""
		}
		
		if (form.nom_client.value=="") {
			document.getElementById("nom").style.color="#cc0000"
			form.nom_client.focus()
			return false
		}
		else {
			document.getElementById("nom").style.color=""
		}
		
		if (form.jour.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			form.jour.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
		
		if (form.mois.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			form.mois.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
		
		if (form.annee.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			form.annee.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
				
		if (form.tel_client.value=="") {
			document.getElementById("fone").style.color="#cc0000"
			form.tel_client.focus()
			return false
		}
		else {
			document.getElementById("fone").style.color=""
		}
		
		if (form.id_pays.value=="") {
			document.getElementById("pays").style.color="#cc0000"
			form.id_pays.focus()
			return false
		}
		else {
			document.getElementById("pays").style.color=""
		}
		
		if (form.ville_client.value=="") {
			document.getElementById("vil").style.color="#cc0000"
			form.ville_client.focus()
			return false
		}
		else {
			document.getElementById("vil").style.color=""
		}
		
		if (form.adresse_client.value=="") {
			document.getElementById("adr").style.color="#cc0000"
			form.adresse_client.focus()
			return false
		}
		else {
			document.getElementById("adr").style.color=""
		}
		
		if (form.adresse_client.value=="") {
			document.getElementById("adr").style.color="#cc0000"
			form.adresse_client.focus()
			return false
		}
		else {
			document.getElementById("adr").style.color=""
		}
		
		if (form.change_pwd.checked) {
			if (form.nmot2passe_client.value=="") {
				document.getElementById("nmdp").style.color="#cc0000"
				form.nmot2passe_client.focus()
				return false
			}
			else {
				document.getElementById("nmdp").style.color="#555555"
			}
			if (form.cmot2passe_client.value=="") {
				document.getElementById("cmdp").style.color="#cc0000"
				form.cmot2passe_client.focus()
				return false
			}
			else {
				document.getElementById("cmdp").style.color="#555555"
			}
			if (form.nmot2passe_client.value!=form.cmot2passe_client.value) {
				document.getElementById("cmdp").style.color="#cc0000"
				form.cmot2passe_client.focus()
				return false
			}
			else {
				document.getElementById("cmdp").style.color="#555555"
			}
		}
		
		/*if (form.codepostal.value=="") {
			document.getElementById("codepostal").style.color="#cc0000"
			form.codepostal.focus()
			return false
		}
		else {
			document.getElementById("codepostal").style.color="#555555"
		}*/
		
		form.Submit.disabled=true
		form.Submit.value='<?php echo _PATIENTER; ?>'
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
<div id="mnu_mode1"><table height="44px" width="144px" border="0"><tr valign="middle" align="center"><td><font color="#544B36"><?php
				if (!empty($id_client) && mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)!=0) {
					$sql="SELECT * FROM clients WHERE id_client='$id_client'";
					$resultat=mysql_query($sql);
					if ($enr=mysql_fetch_array($resultat)) {
						extract($enr);
						echo _BONJOUR.' '.$prenom_client;
					}
				}
			?></font></td></tr></table></div>
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><!--<a href="choix_service.php?lang=<?php //echo $lang; ?>"><?php //echo _FORMULE ; ?></a>--><a href="monpanier.php?lang=<?php echo $lang; ?>"><?php echo _MON_PANIER ; ?></a></td></tr></table></div>
<div id="mnu_mariage1" style="left:537px;"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><blink><?php echo _MON_PROF; ?></blink></td></tr></table></div>
<!--<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td><a href="abonnements.php?lang=<?php //echo $lang; ?>"><?php //echo strtoupper(_ABN); ?></a></td></tr></table></div>-->
<!--<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>-->
<div id="mnu_famille1" style="left:390px;"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td><?php
				if (!empty($id_client) && mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)!=0) {
			?>
        <a href="cod_logout.php?lang=<?php echo $lang; ?>"><?php echo _SE_DECONNECTER; ?></a>
        <?php
				}
			?></td></tr></table></div>
</div>
<div id="fond_panier">
    <div id="form_profil">
    	<?php
	$sql="SELECT * FROM clients WHERE id_client='$id_client'";
	$resultat=mysql_query($sql);
	while ($enr=mysql_fetch_array($resultat)) {
		extract($enr);
		$IP=$id_pays;
		//$IC=$id_continent;
		$DN=explode('-',$datenais_client);
	?>
      <form action="cod_inscrit.php?opt=maj&lang=<?php echo $lang; ?>" enctype="multipart/form-data" method="post" onSubmit="return verifier_maj();" name="maj_profil">
        <table width="70%" border="0" cellspacing="3" cellpadding="3">
          <?php
			if ($opt=='maj') {
		?>
          <tr> 
            <td colspan="2"><label><font color="#008000"><b><?php echo _MODIF_PROFIL; ?></b></font></label></td>
          </tr>
          <?php
	  	}
	  ?>
          <tr>
            <td><label><?php echo _N_ID; ?></label></td>
            <td><input type="text" name="id_client" disabled="disabled" value="<?php echo $id_client; ?>" size="74" /></td>
          </tr>
          <tr> 
            <td><label><?php echo _USER; ?></label></td>
            <td><input type="text" name="login_client" disabled value="<?php echo $login_client; ?>" size="74"></td>
          </tr>
          <tr> 
            <td><label id="mel"><?php echo _MEL; ?></label></td>
            <td><input type="text" name="email_client" value="<?php echo $email_client; ?>" autocomplete="off" size="74"></td>
          </tr>
          <tr> 
            <td><label id="prenom"><?php echo _PRENOM; ?></label></td>
            <td><input type="text" name="prenom_client" value="<?php echo $prenom_client; ?>" autocomplete="off" size="74"></td>
          </tr>
          <tr> 
            <td class="h7"><label id="nom"><?php echo _NOM; ?></label></td>
            <td><input type="text" name="nom_client" value="<?php echo $nom_client; ?>" autocomplete="off" size="74"></td>
          </tr>
          <tr> 
            <td><label id="dat_nais"><?php echo _DAT_NAIS; ?></label></td>
            <td><select name="jour">
                <option value="" style="color:#FF0000"><?php echo _jour; ?></option>
                <?php
				for ($i=1;$i<32; $i++) {
					if (strlen($i)<2) {
						if ($DN[2]=='0'.$i)
							echo '<option value="0'.$i.'" selected>0'.$i.'</option>';
						else
							echo '<option value="0'.$i.'">0'.$i.'</option>';
					}
					else {
						if ($DN[2]==$i)
							echo '<option value="'.$i.'" selected>'.$i.'</option>';
						else
							echo '<option value="'.$i.'">'.$i.'</option>';
					}
				}
			?>
              </select> <select name="mois">
                <option value="" style="color:#FF0000"><?php echo _mois; ?></option>
                <?php
				for ($i=1;$i<13; $i++) {
					if (strlen($i)<2) {
						if ($DN[1]=='0'.$i)
							echo '<option value="0'.$i.'" selected>0'.$i.'</option>';
						else
							echo '<option value="0'.$i.'">0'.$i.'</option>';
					}
					else {
						if ($DN[1]==$i)
							echo '<option value="'.$i.'" selected>'.$i.'</option>';
						else
							echo '<option value="'.$i.'">'.$i.'</option>';
					}
				}
			?>
              </select> <select name="annee">
                <option value="" style="color:#FF0000"><?php echo _annee; ?></option>
                <?php
				for ($i=date('Y')-18;$i>=date('Y')-100; $i--) {
					if ($DN[0]==$i)
						echo '<option value="'.$i.'" selected>'.$i.'</option>';
					else
						echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
              </select></td>
          </tr>
          <tr> 
            <td><label id="fone"><?php echo _FONE; ?></label></td>
            <td><input type="text" name="tel_client" value="<?php echo $tel_client; ?>" autocomplete="off"></td>
          </tr>
          <tr> 
            <td><label id="pays"><?php echo _PAYS; ?></label></td>
            <td><select name="id_pays">
                <option value="" style="color:#FF0000"><?php echo _PAYS; ?></option>
                <?php
			$sql="SELECT * FROM pays ORDER BY nom_pays";
			$resultat=mysql_query($sql);
			while ($enr=mysql_fetch_array($resultat)) {
				extract($enr);
				if ($IP==$id_pays)
					echo '<option value="'.$id_pays.'" selected>'.ucfirst($nom_pays).'</option>';
				else
					echo '<option value="'.$id_pays.'">'.ucfirst($nom_pays).'</option>';
			}
		?>
              </select></td>
          </tr>
          <tr> 
            <td><label id="vil"><?php echo _VIL; ?></label></td>
            <td><input type="text" name="ville_client" value="<?php echo $ville_client; ?>" autocomplete="off" size="74"></td>
          </tr>
          <tr> 
            <td><label id="adr"><?php echo _ADR; ?></label></td>
            <td><input type="text" name="adresse_client" value="<?php echo $adresse_client; ?>" autocomplete="off" size="74"></td>
          </tr>
          <tr> 
            <td><label id="cp"><?php echo _CP; ?></label></td>
            <td><input type="text" name="codepostal_client" value="<?php echo $codepostal_client; ?>" onkeypress="return checkIt(event)" autocomplete="off"></td>
          </tr>
          <tr> 
                <td><label><?php echo _C_MDP; ?></label></td>
                <td align="left"><input type="checkbox" name="change_pwd" value="1" onClick="afficher('tr');" style="width:1px;"></td>
              </tr>
              <tr id="vmp" style="display:none;"> 
                <td><label><?php echo _V_MDP; ?></label></td>
                <td><input type="password" name="mot2passe_client" readonly="readonly" value="<?php echo $mot2passe_client; ?>" style="width:135px;" title="<?php echo $mot2passe_client; ?>"></td>
              </tr>
              <tr id="nmp" style="display:none;"> 
                <td><label id="nmdp"><?php echo _N_MDP; ?></label></td>
                <td><input type="password" name="nmot2passe_client" autocomplete="off" style="width:135px;"></td>
              </tr>
              <tr id="cmp" style="display:none;"> 
                <td><label id="cmdp"><?php echo _MDP2; ?></label></td>
                <td><input type="password" name="cmot2passe_client" autocomplete="off" style="width:135px;"></td>
              </tr>
              <tr> 
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="<?php echo _VALID; ?>" class="submit"><input type="hidden" name="id_client" value="<?php echo $id_client; ?>"></td>
          </tr>
        </table>
        </div>
      </form>
	<?php
	}
	?>
    </div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>