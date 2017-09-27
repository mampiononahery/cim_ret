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
<title>myretooch.com::<?php echo strtolower(_BEAUTE); ?></title>
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
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-galleryview-1.1/jquery.timers-1.1.2.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery-galleryview-1.1/jquery.galleryview-1.1.3.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('#photos').galleryView({
		panel_width: 610,
		panel_height: 385,
		frame_width: 67,
		frame_height: 100,
		background_color: 'transparent',
		easing: 'easeInOutQuad',
		pause_on_hover: true
	});
});

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
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
<div id="mnu_retouche" class="actif_retouche"><a href="accueil.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _RETOUCHE; ?></span></a></div>
<?php
	if (empty($id_client) || mysql_result(mysql_query("SELECT COUNT(id_client) FROM clients WHERE id_client='$id_client'"),0)==0) {
?>
<div id="mnu_commande"><a href="connexion.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _COMMANDE; ?></span></a></div>
<?php
	}
	else {
?>
<div id="mnu_commande"><a href="choix_service.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _COMPTE; ?></span></a></div>
<?php
	}
?>
<div id="mnu_tarif"><a href="tarifs.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _TARIFS; ?></span></a></div>
<div id="mnu_partenaire"><a href="partenaire.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _PARTENAIRE; ?></span></a></div>
<div id="mnu_contact"><a href="contact.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _CONTACT; ?></span></a></div>
<div id="smnu_retouche">
<div id="mnu_mode1" class="actif"><table height="44px" width="144px" border="0"><tr valign="middle" align="center"><td><blink><?php echo _BEAUTE; ?></blink></td></tr></table></div>
<div id="mnu_montage1"><table height="44px" width="249px" border="0"><tr valign="middle" align="center"><td><a href="montage.php?lang=<?php echo $lang; ?>"><?php echo _MONTAGE; ?></a></td></tr></table></div>
<!--<div id="mnu_mariage1"><table height="44px" width="102px" border="0"><tr valign="middle" align="center"><td><a href="mariage.php?lang=<?php //echo $lang; ?>"><?php //echo _MARIAGE; ?></a></td></tr></table></div>-->
<div id="mnu_presse1"><table height="44px" width="154px" border="0"><tr valign="middle" align="center"><td><a href="presse.php?lang=<?php echo $lang; ?>"><?php echo _PRESSE_MAGAZINE; ?></a></td></tr></table></div>
<div id="mnu_objet1"><table height="44px" width="85px" border="0"><tr valign="middle" align="center"><td><a href="objet.php?lang=<?php echo $lang; ?>"><?php echo _OBJET; ?></a></td></tr></table></div>
<!--<div id="mnu_famille1"><table height="44px" width="156px" border="0"><tr valign="middle" align="center"><td><a href="famille.php?lang=<?php //echo $lang; ?>"><?php //echo _FAMILLE; ?></a></td></tr></table></div>-->
</div>
<div id="fond_service">
	<div id="photos" class="galleryview" style="top:15px; left:150px;">
    <?php
			$apres=array();
			$avant=array();
			
			$folder = 'photos/beaute/apres/';
			$dossier = opendir($folder);
			$i=0;
			while ($Fichier = readdir($dossier)) {
			  if ($Fichier != "." && $Fichier != "..") {
				$nomFichier = $folder.$Fichier;
				if (substr($nomFichier,strlen($nomFichier)-2,2)!='db') {
					//echo $nomFichier.'<br />';
					$apres[$i]=$nomFichier;
					$avant[$i]='photos/beaute/avant/'.$Fichier;
					$i++;
				}
			  }
			}
			closedir($dossier);
			
			/*$folder = 'photos/beaute/avant/';
			$dossier = opendir($folder);
			$j=0;
			while ($Fichier = readdir($dossier)) {
			  if ($Fichier != "." && $Fichier != "..") {
				$nomFichier = $folder.$Fichier;
				if (substr($nomFichier,strlen($nomFichier)-2,2)!='db') {
					//echo $nomFichier.'<br />';
					$avant[$j]=$nomFichier;
					$j++;
				}
			  }
			}
			closedir($dossier);*/
    ?>
  <?php
  	for ($i=0;$i<=sizeof($apres)-1;$i++) {
  ?>
  <div class="panel" align="center">
	 <a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres<?php echo $i+1; ?>').innerHTML='<?php echo _APRES; ?>'" onmouseover="MM_swapImage('Image<?php echo $i+170; ?>','','<?php echo $avant[$i]; ?>',0); document.getElementById('avant_apres<?php echo $i+1; ?>').innerHTML='<?php echo _AVANT; ?>'"><img src="<?php echo $apres[$i]; ?>" name="Image<?php echo $i+170; ?>" id="Image<?php echo $i+170; ?>" height="490px" style="border:2px solid #E938AF" /></a>
     <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres<?php echo $i+1; ?>"><?php echo _APRES; ?></span></td></tr></table></div>
  </div>
  <?php
	}
  ?>
 <!--<div class="panel" align="center">
	 <a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres1').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image17','','photos/beaute/avant/1_0.jpg',0); document.getElementById('avant_apres1').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/1_1.jpg" name="Image17" id="Image17" height="490px" style="border:2px solid #E938AF" /></a>
     <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres1"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div> 
 <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres2').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image18','','photos/beaute/avant/2_0.jpg',0); document.getElementById('avant_apres2').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/2_1.jpg" name="Image18" id="Image18" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres2"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
 <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres3').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image19','','photos/beaute/avant/3_0.jpg',0); document.getElementById('avant_apres3').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/3_1.jpg" name="Image19" id="Image19" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres3"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
 <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres4').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image20','','photos/beaute/avant/4_0.jpg',0); document.getElementById('avant_apres4').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/4_1.jpg" name="Image20" id="Image20" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres4"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
 <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres5').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image21','','photos/beaute/avant/5_0.jpg',0); document.getElementById('avant_apres5').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/5_1.jpg" name="Image21" id="Image21" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres5"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
 <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres6').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image22','','photos/beaute/avant/DSC_9783_01.jpg',0); document.getElementById('avant_apres6').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/DSC_9783_02.jpg" name="Image22" height="490px" id="Image22" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres6"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
 <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres7').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image23','','photos/beaute/avant/ok_01.jpg',0); document.getElementById('avant_apres7').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/ok_02.jpg" name="Image23" id="Image23" height="490px" style="border:2px solid #E938AF" /></a>
   <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres7"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
 <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres8').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image24','','photos/beaute/avant/Original_01.jpg',0); document.getElementById('avant_apres8').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/Original_02.jpg" name="Image24" border="0" id="Image24" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres8"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
  <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres9').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image25','','photos/beaute/avant/6_0.jpg',0); document.getElementById('avant_apres9').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/6_1.jpg" name="Image25" id="Image25" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres9"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
  <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres10').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image26','','photos/beaute/avant/7_0.jpg',0); document.getElementById('avant_apres10').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/7_1.jpg" name="Image26" id="Image26" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres10"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
  <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres11').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image27','','photos/beaute/avant/8_0.jpg',0); document.getElementById('avant_apres11').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/8_1.jpg" name="Image27" id="Image27" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres11"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>
  <div class="panel" align="center">
 	<a href="javascript:;" onmouseout="MM_swapImgRestore(); document.getElementById('avant_apres12').innerHTML='<?php //echo _APRES; ?>'" onmouseover="MM_swapImage('Image28','','photos/beaute/avant/9_0.jpg',0); document.getElementById('avant_apres12').innerHTML='<?php //echo _AVANT; ?>'"><img src="photos/beaute/apres/9_1.jpg" name="Image28" id="Image28" height="490px" style="border:2px solid #E938AF" /></a>
    <div style="position:absolute; left:142px; border:1px solid #FFF; color:#ffa200; font-size:20px; background-color:#FFF; width:324px; height:28px; top:462px;"><table><tr valign="middle"><td><span id="avant_apres12"><?php //echo _APRES; ?></span></td></tr></table></div>
  </div>-->
  <ul class="filmstrip" style="display:none">
  	<?php
  		for ($i=0;$i<=sizeof($apres)-1;$i++) {
  	?>
    		<li><img src="<?php echo $apres[$i]; ?>" height="100px" width="67px" /></li>	
    <?php
		}
	?>
    <!--<li><img src="photos/beaute/apres/1_1.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/2_1.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/3_1.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/4_1.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/5_1.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/DSC_9783_02.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/ok_02.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/Original_02.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/6_1.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/7_1.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/8_1.jpg" height="100px" width="67px" /></li>
    <li><img src="photos/beaute/apres/9_1.jpg" height="100px" width="67px" /></li>-->
  </ul>
</div>
<div align="center" style="position:relative; top:14px; color:#FFF; font-weight:bold; font-family:Tahoma, Geneva, sans-serif; font-size:10px">(<?php echo _SOURIS; ?>)</div>
</div>
<?php
	include("bas.php");
?>
</body>
</html>