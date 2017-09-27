<?php
	require ("includes/const_decl.php");
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
<meta name="keywords" content="aubene, retouche, retouche numérique, photo retouching, affinement de silhouette, aubene, aubene.com, chromie, colorimétrie, colorisation, conception graphique, couverture magazine, cover mag, correction de peau, correction de silhouette, créa, créations visuelles, détourage, digital retoucher, edito, edition, fluidite, grain de peau, galérie d'images, galérie photos, galéries photos, graphisme, graphiste, image, images, incrustation, illustration, illustrateur, illustratrice, lissage, magazine, mode, beauté, relooking, réparation, montage, numérique, parutions, peau, personnages, personnalités, photo, photos de presse, photo-montage, photomontage, photomontages, professionnel de la retouche photo, réalisation, retouch, retouching, retouche cosmétique, retouche de peau, retouche chromatique, retouche colorimetrique, retouche morphologique, retouche d'images, retouche photo, retouches haut de gamme, retouches de luxe, retoucheur, retoucheuse, traitement de l'image, trucage, visuel, visuels" />
<meta name="title" content="aubene.com - Retouche et traitement d'images" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Content-Language" content="fr, en, es, ru, jp" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="viewport" content="width=1024" />
<meta name="copyright" content="http://www.aubene.com" />
<meta name="revisit-after" content="2 days" />
<meta name="Rating" content="Mature" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.custom.min.js"></script>
<script type="text/javascript" src="js/verifier_pseudo.js"></script>
<script language="javascript" type="text/javascript">
	function inserer() {
		var form=document.forms["form1"]
		var verif = /^[.a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
		var $tabs = $('#tabs').tabs();
		
		var j=0;
		//abonnement
		for (var i=0;i<form.formule.length;i++) {
			if (form.formule[i].checked)
				j++
		}
		
		if (j==0) {
			document.getElementById("lbl_abn").style.color="#cc0000"
			$tabs.tabs('select', 0); // switch to third tab
			document.getElementById("formule").focus()
			return false
		}
		else {
			document.getElementById("lbl_abn").style.color=""
		}
		
		if (!document.getElementById("cgv").checked) {
			document.getElementById("lbl_cgv").style.color="#cc0000"
			$tabs.tabs('select', 0); // switch to third tab
			document.getElementById("cgv").focus()
			return false
		}
		else {
			document.getElementById("lbl_cgv").style.color=""
		}
		
		//fiche d'inscription
		if (form.login_client.value=="") {
			document.getElementById("nuser").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.login_client.focus()
			return false
		}
		else {
			document.getElementById("nuser").style.color=""
		}
		
		if (form.mot2passe_client.value=="") {
			document.getElementById("mdp").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.mot2passe_client.focus()
			return false
		}
		else {
			document.getElementById("mdp").style.color=""
		}
				
		if (form.mot2passe_client.value!=form.mot2passe_client_test.value) {
			document.getElementById("mdp2").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.mot2passe_client_test.focus()
			return false
		}
		else {
			document.getElementById("mdp2").style.color=""
		}
		
		if (verif.exec(form.email_client.value)==null) {
			document.getElementById("mel").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.email_client.focus()
			return false
		}
		else {
			document.getElementById("mel").style.color=""
		}
		
		if (form.prenom_client.value=="") {
			document.getElementById("prenom").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.prenom_client.focus()
			return false
		}
		else {
			document.getElementById("prenom").style.color=""
		}
		
		if (form.nom_client.value=="") {
			document.getElementById("nom").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.nom_client.focus()
			return false
		}
		else {
			document.getElementById("nom").style.color=""
		}
		
		if (form.jour.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.jour.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
		
		if (form.mois.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.mois.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
		
		if (form.annee.value=="") {
			document.getElementById("dat_nais").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.annee.focus()
			return false
		}
		else {
			document.getElementById("dat_nais").style.color=""
		}
				
		if (form.tel_client.value=="") {
			document.getElementById("fone").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.tel_client.focus()
			return false
		}
		else {
			document.getElementById("fone").style.color=""
		}
		
		if (form.id_pays.value=="") {
			document.getElementById("pays").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.id_pays.focus()
			return false
		}
		else {
			document.getElementById("pays").style.color=""
		}
		
		if (form.ville_client.value=="") {
			document.getElementById("vil").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.ville_client.focus()
			return false
		}
		else {
			document.getElementById("vil").style.color=""
		}
		
		if (form.adresse_client.value=="") {
			document.getElementById("adr").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.adresse_client.focus()
			return false
		}
		else {
			document.getElementById("adr").style.color=""
		}
		
		if (form.adresse_client.value=="") {
			document.getElementById("adr").style.color="#cc0000"
			$tabs.tabs('select', 1); // switch to third tab
			form.adresse_client.focus()
			return false
		}
		else {
			document.getElementById("adr").style.color=""
		}
		
		//Banque
		if (form.nombq.value=="") {
			document.getElementById("nombq").style.color="#cc0000"
			$tabs.tabs('select', 3); // switch to third tab
			form.nombq.focus()
			return false
		}
		else {
			document.getElementById("nombq").style.color=""
		}
		
		if (form.adressebq.value=="") {
			document.getElementById("adressebq").style.color="#cc0000"
			$tabs.tabs('select', 3); // switch to third tab
			form.adressebq.focus()
			return false
		}
		else {
			document.getElementById("adressebq").style.color=""
		}
		
		if (form.villebq.value=="") {
			document.getElementById("villebq").style.color="#cc0000"
			$tabs.tabs('select', 3); // switch to third tab
			form.villebq.focus()
			return false
		}
		else {
			document.getElementById("villebq").style.color=""
		}
		
		if (form.cpbq.value=="") {
			document.getElementById("cpbq").style.color="#cc0000"
			$tabs.tabs('select', 3); // switch to third tab
			form.cpbq.focus()
			return false
		}
		else {
			document.getElementById("cpbq").style.color=""
		}
		
		//RIB, RIP, RICE
		if (form.etablissement.value=="") {
			document.getElementById("etablissement").style.color="#cc0000"
			$tabs.tabs('select', 4); // switch to third tab
			form.etablissement.focus()
			return false
		}
		else {
			document.getElementById("etablissement").style.color=""
		}
		
		if (form.guichet.value=="") {
			document.getElementById("guichet").style.color="#cc0000"
			$tabs.tabs('select', 4); // switch to third tab
			form.guichet.focus()
			return false
		}
		else {
			document.getElementById("guichet").style.color=""
		}
		
		if (form.numerocompte.value=="") {
			document.getElementById("numerocompte").style.color="#cc0000"
			$tabs.tabs('select', 4); // switch to third tab
			form.numerocompte.focus()
			return false
		}
		else {
			document.getElementById("numerocompte").style.color=""
		}
		
		if (form.clerib.value=="") {
			document.getElementById("clerib").style.color="#cc0000"
			$tabs.tabs('select', 4); // switch to third tab
			form.clerib.focus()
			return false
		}
		else {
			document.getElementById("clerib").style.color=""
		}
		
	}	
</script>
<script type="text/javascript">
	$(function() {

		var $tabs = $('#tabs').tabs();

		$(".ui-tabs-panel").each(function(i){

		  var totalSize = $(".ui-tabs-panel").size() - 1;

		  if (i != totalSize) {
			  next = i + 2;
			  $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'><?php echo _SUIV; ?> <img src='images/suivant.png' width='10' height='10' /></a>");
		  }
  
		  if (i != 0) {
			  prev = i;
			  $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'><img src='images/precedent.png' width='10' height='10' /> <?php echo _PREC; ?></a>");
		  }
	
		});

		$('.next-tab, .prev-tab').click(function() { 
			   $tabs.tabs('select', $(this).attr("rel"));
			   return false;
		   });
   

	});
</script>
<link href="design/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="design/tabs.css" type="text/css" media="screen, projection"/>
</head>
<body>
<div id="fond" align="center"><div id="activite"><?php echo _TENDELLE; ?></div></div>
<div id="flash" align="center"></div>
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
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><?php echo _MON_ABN ; ?></td></tr></table></div>
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
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td><a href="choix_service.php?lang=<?php echo $lang; ?>"><?php echo _RETOUR; ?></a></td></tr></table></div>
<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
</div>

<div id="fond_panier">
    <div id="form_abn">
    	<form action="cod_abonnement.php" method="post" enctype="multipart/form-data" id="form1" onsubmit="return inserer();">
        <div id="page-wrap">
            <div id="tabs">
                <ul style="text-align:center">
                    <li><a href="#fragment-1"><?php echo _CHOIX_ABN; ?></a></li>
                    <li><a href="#fragment-2"><?php echo _FICHE_ABN; ?></a></li>
                    <li><a href="#fragment-3"><?php echo _AUTO_ABN; ?></a></li>
                    <li><a href="#fragment-4"><?php echo _ETS_ABN; ?></a></li>
                    <li><a href="#fragment-5"><?php echo _COMPTE_ABN; ?></a></li>
                    <li><a href="#fragment-6"><?php echo _VALID_ABN; ?></a></li>
               </ul>
                <div id="fragment-1" class="ui-tabs-panel">
                    <table width="100%" align="center" cellpadding="2" cellspacing="0">
                        <tr height="40px" style="background-color:#FFF; color:#ffa500; font-size:18px;">
                          <td align="center"><input type="radio" disabled="disabled" /></td> 
                          <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="lbl_abn"><?php echo _ABN; ?></span></td>
                          <td align="center"><?php echo _NBFOTO; ?></td>
                          <td align="right"><?php echo _MONTANT; ?>&nbsp;&nbsp;</td>
                        </tr>
                        <?php
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
                        <td align="center"><input type="radio" name="formule[]" id="formule" value="<?php echo $id_formule; ?>" onclick="form.montant.value=<?php echo number_format(($tarif_service-($tarif_service*$remise))*$nb_photos,2,'.',' '); ?>" /></td>
                        <td align="left">&nbsp;<?php echo traduire_abonner($lib_formule); ?></td>
                        <td align="center">&nbsp;&nbsp;<?php echo $nb_photos; ?></td>
                        <td align="right"><b><?php echo number_format(($tarif_service-($tarif_service*$remise))*$nb_photos,2,'.',' '); ?> &euro;&nbsp;&nbsp;</b></td>
                      </tr>
                      <?php
                    }
                    ?>
                        <tr> 
                          <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="4"><hr class="hr" /></td>
                        </tr>
                        <tr> 
                          <td colspan="4">&nbsp;</td>
                        </tr>
                      <tr style="color:#FFF; font-family:Tahoma, Geneva, sans-serif; font-size:14px">
                        <td align="center"><input type="checkbox" name="cgv" id="cgv" value="1" /></td>
                        <td colspan="2" align="left" class="form_abn"><label id="lbl_cgv"><?php echo _LU; ?> <a href="javascript:;"><?php echo _CGV; ?></a></label></td>
                        <td align="right">&nbsp;</td>
                      </tr>
                  </table>
                </div>
                
                <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide">
                	<table width="45%" border="0" cellspacing="1" style="position:relative;top:-20px;">
                    	<tr>
                      	<td colspan="2">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td><label><?php echo _N_ID; ?></label></td>
                        <td><input type="text" name="id_client" value="<?php echo $id_client; ?>" readonly="readonly"></td>
                      </tr>
                      <tr> 
                        <td><label id="nuser"><?php echo _N_USER; ?></label></td>
                        <td><input type="text" name="login_client" onKeyUp="verifier_login(this.value)" autocomplete="off"></td>
                      </tr>
                      <tr> 
                        <td><label id="mdp"><?php echo _MDP; ?></label></td>
                        <td><input type="password" name="mot2passe_client" autocomplete="off"></td>
                      </tr>
                      <tr> 
                        <td><label id="mdp2"><?php echo _MDP2; ?></label></td>
                        <td><input type="password" name="mot2passe_client_test" autocomplete="off"></td>
                      </tr>
                      <tr> 
                        <td><label id="mel"><?php echo _MEL; ?></label></td>
                        <td><input type="text" name="email_client" autocomplete="off"></td>
                      </tr>
                      <tr> 
                        <td><label id="prenom"><?php echo _PRENOM; ?></label></td>
                        <td><input type="text" name="prenom_client" autocomplete="off"></td>
                      </tr>
                      <tr> 
                        <td><label id="nom"><?php echo _NOM; ?></label></td>
                        <td><input type="text" name="nom_client" autocomplete="off"></td>
                      </tr>
                      <tr> 
                        <td><label id="dat_nais"><?php echo _DAT_NAIS; ?></label></td>
                        <td><select name="jour">
                            <option value="" style="color:#FF0000"><?php echo _jour; ?></option>
                            <?php
                            for ($i=1;$i<32; $i++) {
                                if (strlen($i)<2) {
                                    echo '<option value="0'.$i.'">0'.$i.'</option>';
                                }
                                else {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                        ?>
                          </select> <select name="mois">
                            <option value="" style="color:#FF0000"><?php echo _mois; ?></option>
                            <?php
                            for ($i=1;$i<13; $i++) {
                                if (strlen($i)<2)
                                    echo '<option value="0'.$i.'">0'.$i.'</option>';
                                else
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                          </select> <select name="annee">
                            <option value="" style="color:#FF0000"><?php echo _annee; ?></option>
                            <?php
                            for ($i=date('Y')-18;$i>=date('Y')-100; $i--) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                          </select></td>
                      </tr>
                      <tr> 
                        <td><label id="fone"><?php echo _FONE; ?></label></td>
                        <td><input type="text" name="tel_client" autocomplete="off"></td>
                      </tr>
                      <tr>
                      	<td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                      	<td align="left"><div id="detect_pseudo" style="position:relative; left:0px;"></div></td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    <table width="45%" border="0" cellspacing="1" style="position:absolute;top:0px; left:400px">
                    	<tr>
                      	<td colspan="2">&nbsp;</td>
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
                            echo '<option value="'.$id_pays.'">'.ucfirst($nom_pays).'</option>';
                        }
                    ?>
                          </select></td>
                      </tr>
                      <tr> 
                        <td><label id="vil"><?php echo _VIL; ?></label></td>
                        <td><input type="text" name="ville_client" autocomplete="off"></td>
                      </tr>
                      <tr> 
                        <td><label id="adr"><?php echo _ADR; ?></label></td>
                        <td><textarea name="adresse_client"></textarea></td>
                      </tr>
                      <tr> 
                        <td><label id="cp"><?php echo _CP; ?></label></td>
                        <td><input type="text" name="codepostal_client" onkeypress="return checkIt(event)" autocomplete="off"></td>
                      </tr>
                    </table>
                </div>
                
                <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px">
                     <p align="justify"><?php echo _MT_PRE; ?> = <input name="montant" type="text" disabled="disabled" style="background:none; border:none; width:40px; color:#000 " />&euro;, <?php echo _LE; ?> 
                     <select name="chq_jour">
                     	<?php
							for ($i=1; $i<16; $i++) {
								if ($i<10) {
						?>
                        			<option value="<?php echo $i ?>">0<?php echo $i; ?></option>
                        <?php
								}
								else {
						?>
                        			<option value="<?php echo $i ?>"><?php echo $i; ?></option>
                        <?php
								}
							}
						?>
                     </select> <?php echo _CHQMOIS; ?>.</p>
                     <p align="justify"><?php echo _PERIOD_PRE; ?></p>
                     <p align="justify"><?php echo _AUTO_PRE; ?></p>
                     <p align="justify"><?php echo _BEN_PRE; ?><br /><br />
                       BUREAU DE LIAISON<br />
                       <span class="adr">14 Avenue de l'Op&eacute;ra<br />
                     75002 Paris (France)</span></p>
                </div>
            
                <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide">
					<table width="45%" border="0" cellspacing="1" style="position:relative;top:-20px;">
                      <tr>
                      	<td colspan="2">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td><label id="nombq"><?php echo _NOMBQ; ?></label></td>
                        <td><input type="text" name="nombq" autocomplete="off" /></td>
                      </tr>
                      <tr> 
                        <td><label id="adressebq"><?php echo _ADRBQ; ?></label></td>
                        <td><textarea name="adressebq"></textarea></td>
                      </tr>
                      <tr> 
                        <td><label id="villebq"><?php echo _VILBQ; ?></label></td>
                        <td><input type="text" name="villebq" autocomplete="off" /></td>
                      </tr>
                      <tr> 
                        <td><label id="cpbq"><?php echo _CPBQ; ?></label></td>
                        <td><input type="text" name="cpbq" autocomplete="off" /></td>
                      </tr>
                    </table>    		
                </div>
                
                <div id="fragment-5" class="ui-tabs-panel ui-tabs-hide" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px">
                    <table width="100%" border="0" cellspacing="1" style="position:relative;top:-20px;">
                       <tr>
                      	<td colspan="2">&nbsp;</td>
                      </tr>
                      <tr>
                      	<td colspan="2"><?php echo _RIB; ?></td>
                      </tr>
                      <tr>
                      	<td colspan="2">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td width="20%"><label id="etablissement"><?php echo _CODBQ; ?></label></td>
                        <td><input type="text" name="etablissement" autocomplete="off" /></td>
                      </tr>
                      <tr> 
                        <td><label id="guichet"><?php echo _CODGUI; ?></label></td>
                        <td><input type="text" name="guichet" autocomplete="off" /></td>
                      </tr>
                      <tr> 
                        <td><label id="numerocompte"><?php echo _NUMBQ; ?></label></td>
                        <td><input type="text" name="numerocompte" autocomplete="off" /></td>
                      </tr>
                      <tr> 
                        <td><label id="clerib"><?php echo _RIBBQ; ?></label></td>
                        <td><input type="text" name="clerib" autocomplete="off" /></td>
                      </tr>
                      <tr>
                      	<td colspan="2">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="2"><?php echo _IMPORTANT; ?></td>
                      </tr>
                    </table>
                </div>
            
                <div id="fragment-6" class="ui-tabs-panel ui-tabs-hide">
                	<table width="100%" cellpadding="2" style="font-family:Tahoma, Geneva, sans-serif; font-size:12px">
                    	<tr>
                        	<td><p align="justify"><?php echo _CONFIDENTIEL; ?></p></td>
                        </tr>
                    	<tr>
            				<td align="center"><input name="submit" type="submit" class="submit" id="Submit" value="<?php echo _GO; ?>" /></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
	</form>
</div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>