<?php
	require ("includes/langues.php");
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo _ISO;?> " />
<title>myretooch.com::<?php echo strtolower(_RETOUCHE); ?></title>
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

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
 
</head>
<body>
<div id="fond" align="center"><div id="activite"><?php echo _TENDELLE; ?></div></div>
<div id="flash" align="center"><a href="http://www.mycover.fr" target="_blank" title="www.mycover.fr"><img src="images/flash.jpg" width="655" height="102" /></a></div>
<?php
	include("drapeau.php");
?>
<div id="mnu_qui"><a href="qui.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _QUI; ?></span></a></div>
<div id="mnu_exemple"><a href="exampleretouche.php?lang=<?php echo $lang; ?>"><span class="txt_mnu" style='color:'><?php echo _Exemple_retouche; ?></span></a></div>
<div id="mnu_formules"><a href="nosformules.php?lang=<?php echo $lang; ?>"><span class="txt_mnu" ><?php echo _Nos_formules; ?></span></a></div>
<div id="mnu_recru"><a href="recrutement.php?lang=<?php echo $lang; ?>"><span class="txt_mnu"><?php echo _Recrutement; ?></span></a></div>
<div id="mnu_contact"><a href="#"><span class="txt_mnu"><?php echo _CONTACT; ?></span></a></div>
<div id="squelette"> 
<ul id="accueil">
		<li id="mnu_mode"><a href="mode_beaute.php?lang=<?php echo $lang; ?>"><img id="img1" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1; document.getElementById('li_1').style.color='#ffa200'" onmouseout="this.style.opacity=0.8;document.getElementById('li_1').style.color='white'" /></a>
	    <div id="t_1"><table class="tab"><tr valign="middle" align="center"><td><?php echo _BEAUTE; ?></td></tr></table></div><div id="pi_1"><a href="mode_beaute.php?lang=<?php echo $lang; ?>" id="li_1" onmouseover="img1.style.opacity=1;this.style.color='#ffa200'" onmouseout="img1.style.opacity=0.8;this.style.color='#fff'"><?php echo _PLUSINFO; ?></a></div></li>
<li id="mnu_montage"><a href="montage.php?lang=<?php echo $lang; ?>"><img id="img2" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_2').style.color='#b90147'" onmouseout="this.style.opacity=0.8;document.getElementById('li_2').style.color='#fff'" /></a><div id="t_2"><table class="tab"><tr valign="middle" align="center"><td><?php echo _MONTAGE; ?></td></tr></table></div><div id="pi_2"><a href="montage.php?lang=<?php echo $lang; ?>" id="li_2" onmouseover="img2.style.opacity=1;this.style.color='#b90147'" onmouseout="img2.style.opacity=0.8;this.style.color='#fff'"><?php echo _PLUSINFO; ?></a></div></li>
        <!--<li id="mnu_mariage"><a href="mariage.php?lang=<?php echo $lang; ?>"><img id="img3" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_3').style.color='#0074a7'" onmouseout="this.style.opacity=0.8;document.getElementById('li_3').style.color='#fff'" /></a><div id="t_3"><table class="tab"><tr valign="middle" align="center"><td><?php //echo _MARIAGE; ?></td></tr></table></div><div id="pi_3"><a href="mariage.php?lang=<?php //echo $lang; ?>" id="li_3" onmouseover="img3.style.opacity=1;this.style.color='#0074a7'" onmouseout="img3.style.opacity=0.8;this.style.color='#fff'"><?php //echo _PLUSINFO; ?></a></div></li>-->
        <li id="mnu_presse"><a href="presse.php?lang=<?php echo $lang; ?>"><img id="img4" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_4').style.color='#fd4fff'" onmouseout="this.style.opacity=0.8;document.getElementById('li_4').style.color='#fff'" /></a><div id="t_4"><table class="tab"><tr valign="middle" align="center"><td><?php echo _PRESSE_MAGAZINE; ?></td></tr></table></div><div id="pi_4"><a href="presse.php?lang=<?php echo $lang; ?>" id="li_4" onmouseover="img4.style.opacity=1;this.style.color='#fd4fff'" onmouseout="img4.style.opacity=0.8;this.style.color='#fff'"><?php echo _PLUSINFO; ?></a></div></li>
    <li id="mnu_objet"><a href="objet.php?lang=<?php echo $lang; ?>"><img id="img5" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_5').style.color='#01b07c'" onmouseout="this.style.opacity=0.8;document.getElementById('li_5').style.color='#fff'" /></a><div id="t_5"><table class="tab"><tr valign="middle" align="center"><td><?php echo _OBJET; ?></td></tr></table></div><div id="pi_5"><a href="objet.php?lang=<?php echo $lang; ?>" id="li_5" onmouseover="img5.style.opacity=1;this.style.color='#01b07c'" onmouseout="img5.style.opacity=0.8;this.style.color='#fff'"><?php echo _PLUSINFO; ?></a></div></li>
        <!--<li id="mnu_famille"><a href="famille.php?lang=<?php echo $lang; ?>"><img id="img6" class="visuel" src="images/transparent.gif" style="opacity:0.8;filter:alpha(opacity=80);" onmouseover="this.style.opacity=1;document.getElementById('li_6').style.color='#ff4e00'" onmouseout="this.style.opacity=0.8;document.getElementById('li_6').style.color='#fff'" /></a><div id="t_6"><table class="tab"><tr valign="middle" align="center"><td><?php //echo _FAMILLE; ?></td></tr></table></div><div id="pi_6"><a href="famille.php?lang=<?php //echo $lang; ?>" id="li_6" onmouseover="img6.style.opacity=1;this.style.color='#ff4e00'" onmouseout="img6.style.opacity=0.8;this.style.color='#fff'"><?php //echo _PLUSINFO; ?></a></div></li>-->
  </ul>
</div>
<?php
	include("bas.php");
?> 
</body>
</html>    