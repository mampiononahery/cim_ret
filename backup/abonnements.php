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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo _ISO;?> " />
<title>myretooch.com::<?php echo strtolower(_ABNEFF); ?></title>
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
	function afficher(x,z) {
		tot=document.getElementById("total").value;
		for (i=1;i<=tot; i++) {
			if (i!=z) {
				document.getElementById('tr'.concat(i)).style.display="none";
				document.getElementById('plusmoins'.concat(i)).innerHTML='+';
			}
			else {
				if (document.getElementById(x).style.display!="none") {
					document.getElementById(x).style.display="none";
					document.getElementById('plusmoins'.concat(i)).innerHTML='+';
				}
				else {
					document.getElementById(x).style.display="";
					document.getElementById('plusmoins'.concat(i)).innerHTML='-';
				}
			}
		}
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
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><a href="choix_service.php?lang=<?php echo $lang; ?>"><?php echo _FORMULE ; ?></a></td></tr></table></div>
<div id="mnu_mariage1"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><a href="monprofil.php?lang=<?php echo $lang; ?>"><?php echo _MON_PROF; ?></a></td></tr></table></div>
<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td><blink><?php echo _MESABN; ?></blink></td></tr></table></div>
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td>&nbsp;</td></tr></table></div>
<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td><?php
				if (!empty($id_client) && mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)!=0) {
			?>
        <a href="cod_logout.php?lang=<?php echo $lang; ?>"><?php echo _SE_DECONNECTER; ?></a>
        <?php
				}
			?></td></tr></table></div>
</div>
<div id="fond_panier">
    <div id="form_profil">
    	<table width="100%" align="center" cellpadding="2" cellspacing="0" style="border:1px solid #FFF">
        	<tr height="40px" style="background-color:#FFF; color:#ffa500; font-size:16px;">
        	  <td align="center">&nbsp;</td>
            	<td width="15%" align="center"><?php echo _ID; ?></td>
            	<td width="15%" align="center"><?php echo _DATE; ?></td>
                <td width="20%" align="center"><?php echo _FORCH; ?></td>
                <td width="30%" align="center"><?php echo _NBFOTO; ?></td>
                <td align="center"><?php echo _MENS; ?> (&euro;)</td>
            </tr>
       </table>
       <div style="border:1px solid #FFF; height:455px; overflow:auto">
       <table width="100%" align="center" cellpadding="2" cellspacing="0">
        	<?php
				$j=1;
				$tmp='0';
				$sql="SELECT * FROM abonnements
					INNER JOIN formules ON formules.id_formule=abonnements.id_formule
					WHERE id_client='$id_client'
					ORDER BY date_abn DESC";
				$resultat=mysql_query($sql);
				while ($lig=mysql_fetch_array($resultat)) {
					extract($lig);
					$idabn_=$id_abn;
					$idabn=$id_abn;
					$idformule=$id_formule;
					$nbfotos=$nb_photos;
					$perime=$expire;
					while (strlen($idabn)<5) {
						$tmp='0'.$idabn;
						$idabn=$tmp;
					}
			?>
            	<tr style="color:#FFF; font-family:Tahoma, Geneva, sans-serif; font-size:14px; height:25px; cursor:pointer" onmouseover="this.style.backgroundColor='#000000';" onmouseout="this.style.backgroundColor=''" onclick="afficher('tr<?php echo $j; ?>','<?php echo $j; ?>');">
	            	<td width="5%" align="center"><div id="plusmoins<?php echo $j; ?>" style="font-size:18px"><b>+</b></div></td>
                	<td width="8%" align="center"><?php echo $tmp; ?></td>
                	<td width="22%" align="center">
						<?php
							$DA=explode('-',$date_abn);
                            echo $DA[2].'/'.$DA[1].'/'.$DA[0];
                        ?>
                    </td>
                    <td width="30%" align="left"><?php echo $lib_formule; ?></td>
                    <td align="center"><?php echo $nb_photos; ?></td>
                    <td align="right"><?php ?><?php echo number_format(($tarif_service-($tarif_service*$remise))*$nb_photos,2,'.',' '); ?>&euro;&nbsp;&nbsp;</td>
                </tr>
            	<tr id="tr<?php echo $j;?>" style="color:#FFF; font-family:Tahoma, Geneva, sans-serif; font-size:14px; height:25px; display:none">
            	  <td colspan="6" align="center">
						<table width="90%" align="right" cellpadding="0" cellspacing="0" style="font-size:12px; border:1px solid #FFF">                        	<?php
								$i=1;
								$lqs="SELECT * FROM historique_abn WHERE id_abn='$idabn' ORDER BY deb_periode ASC";
								$reponse=mysql_query($lqs);
								while ($rec=mysql_fetch_array($reponse)) {
									extract($rec);
									$DP=explode('-',$deb_periode);
									$FP=explode('-',$fin_periode);
							?><?php
								if ($i==1) {
							?>
                            	<tr style="background-color:#FFF; color:#ffa500; font-size:12px; font-weight:bold">
                                	<td align="center"><?php echo _PERIOD; ?></td>
                                    <td align="center"><?php echo _FOTOTRANS; ?></td>
                                    <td align="center"><?php echo _FOTOREST; ?></td>
                                    <td align="center"><?php echo _FACT; ?></td>
                                    <td align="center"><?php echo _TRANSF; ?></td>
                                    <td></td>
                                </tr><?php
								}
							?>
                        	<tr>
                            	<td align="center">&bull; <?php echo _DU; ?> <?php echo $DP[2].'/'.$DP[1].'/'.$DP[0]; ?> <?php echo _AU; ?> <?php echo $FP[2].'/'.$FP[1].'/'.$FP[0]; ?></td>
                                <td align="center"><?php if ($photos_transferes!=0) echo $photos_transferes; else echo '-'; ?></td>
                                <td align="center"><?php if ($nbfotos-$photos_transferes!=0) echo $nbfotos-$photos_transferes; else echo '-'; ?></td>
                                <td align="center"><?php if ($facture==1) {; ?><a href="factures/<?php echo $idabn_; ?>-<?php echo $idformule; ?>-<?php echo $DP[2].$DP[1].$DP[0]; ?>.pdf" target="_blank"><img src="images/pdf-enabled.png" height="19" /></a><?php } else { ?><img src="images/pdf-disabled.png" height="19" /><?php } ?></td>
                                <td align="center"><?php if ($nbfotos-$photos_transferes!=0 && $perime==0 && substr($deb_periode,0,7)==date('Y').'-'.date('m')) { ?><a href="upload.php?lang=<?php echo $lang; ?>&f_a=<?php echo $nbfotos-$photos_transferes; ?>&idf=<?php echo $idabn_; ?>-<?php echo $idformule; ?>-<?php echo $DP[2].$DP[1].$DP[0]; ?>"><img src="images/transfer-enabled.png" height="19" /></a><?php } else { ?><img src="images/transfer-disabled.png" height="19" /><?php } ?></td>
                            </tr>
                            <?php
								$i++;
								}
							?>
                        </table>
                  </td>
           	  </tr>
            <?php
				$j++;
				}
			?>
            <input type="hidden" name="total" id="total" value="<?php echo $j-1; ?>" />
        </table>
        </div>
    </div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>