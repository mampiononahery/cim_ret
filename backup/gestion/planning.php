<?php
	require("../includes/const_decl.php");
	include 'menu.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<meta name="google-site-verification" content="aMiKad3AJKizrwF0zdO6HavShyOoDcbrGpORMThJEUg" />
<title>myretooch.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="Author" content="Andrianandraina RATOBISON"/>
<meta name="Description" content="Retouche d'images professionnelle sur Paris, sp�cialis�e en retouche photo de types mode, beaut�, art, montage, relooking, r�paration. Retouche de photos essentiellement pour la publicit�, la presse, les maisons de disques et les photographes de mode."/>
<meta name="Category" content="photo, retouche de photos, retouche d'images, illustration, mode, beaut�, montage, relooking, r�paration, traitement de l'image, art num�rique"/>
<meta name="Classification" content="retouche photo, retouche de photos, retouche d'images, post-production, infographie, illustration, photomontages, traitement de l'image, art num�rique" />
<meta name="keywords" content="myretooch, retouche, retouche num�rique, photo retouching, affinement de silhouette, myretooch, myretooch.com, chromie, colorim�trie, colorisation, conception graphique, couverture magazine, cover mag, correction de peau, correction de silhouette, cr�a, cr�ations visuelles, d�tourage, digital retoucher, edito, edition, fluidite, grain de peau, gal�rie d'images, gal�rie photos, gal�ries photos, graphisme, graphiste, image, images, incrustation, illustration, illustrateur, illustratrice, lissage, magazine, mode, beaut�, relooking, r�paration, montage, num�rique, parutions, peau, personnages, personnalit�s, photo, photos de presse, photo-montage, photomontage, photomontages, professionnel de la retouche photo, r�alisation, retouch, retouching, retouche cosm�tique, retouche de peau, retouche chromatique, retouche colorimetrique, retouche morphologique, retouche d'images, retouche photo, retouches haut de gamme, retouches de luxe, retoucheur, retoucheuse, traitement de l'image, trucage, visuel, visuels" />
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
<link rel="stylesheet" type="text/css" href="design/styles.css" title="default" media="screen" />
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>

<body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status=''; return true;">
<table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
  <caption>
  DISPONIBILITE 
  </caption>
  <tr bgcolor="#000000" class="table_entete"> 
    <td width="15%"><div align="center">Heure</div></td>
    <td width="10%"><div align="center">Lundi</div></td>
    <td width="10%"><div align="center">Mardi</div></td>
    <td width="10%"><div align="center">Mercredi</div></td>
    <td width="10%"><div align="center">Jeudi</div></td>
    <td width="10%"><div align="center">Vendredi</div></td>
    <td width="10%"><div align="center">Samedi</div></td>
    <td width="10%"><div align="center">Dimanche</div></td>
  </tr>
  <?php
  	$i=1;
  	$sql="SELECT * FROM heures";
	$results=mysql_query($sql);
	while ($rows=mysql_fetch_array($results)) {
		extract($rows);
  ?>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete">
    <td rowspan="4"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo substr($val_heure,0,5); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning($val_heure,'1'); ?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=1&heure=" . AjoutHeure($val_heure,"m",0); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'1'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning($val_heure,'2'); ?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=2&heure=" . AjoutHeure($val_heure,"m",0); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'2'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning($val_heure,'3'); ?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=3&heure=" . AjoutHeure($val_heure,"m",0); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'3'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning($val_heure,'4'); ?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=4&heure=" . AjoutHeure($val_heure,"m",0); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'4'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning($val_heure,'5'); ?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=5&heure=" . AjoutHeure($val_heure,"m",0); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'5'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning($val_heure,'6'); ?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=6&heure=" . AjoutHeure($val_heure,"m",0); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'6'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning($val_heure,'7'); ?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=7&heure=" . AjoutHeure($val_heure,"m",0); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'7'); ?></strong></font></div></td>
  </tr>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'1'); ?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=1&heure=" . AjoutHeure($val_heure,"m",15); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'1'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'2'); ?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=2&heure=" . AjoutHeure($val_heure,"m",15); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'2'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'3'); ?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=3&heure=" . AjoutHeure($val_heure,"m",15); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'3'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'4'); ?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=4&heure=" . AjoutHeure($val_heure,"m",15); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'4'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'5'); ?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=5&heure=" . AjoutHeure($val_heure,"m",15); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'5'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'6'); ?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=6&heure=" . AjoutHeure($val_heure,"m",15); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'6'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'7'); ?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=7&heure=" . AjoutHeure($val_heure,"m",15); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'7'); ?></strong></font></div></td>
  </tr>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'1'); ?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=1&heure=" . AjoutHeure($val_heure,"m",30); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'1'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'2'); ?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=2&heure=" . AjoutHeure($val_heure,"m",30); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'2'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'3'); ?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=3&heure=" . AjoutHeure($val_heure,"m",30); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'3'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'4'); ?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=4&heure=" . AjoutHeure($val_heure,"m",30); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'4'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'5'); ?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=5&heure=" . AjoutHeure($val_heure,"m",30); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'5'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'6'); ?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=6&heure=" . AjoutHeure($val_heure,"m",30); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'6'); ?></strong></font></div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'7'); ?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=7&heure=" . AjoutHeure($val_heure,"m",30); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'7'); ?></strong></font></div></td>
  </tr>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'1'); ?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=1&heure=" . AjoutHeure($val_heure,"m",45); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'1'); ?></strong></font>&nbsp;</div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'2'); ?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=2&heure=" . AjoutHeure($val_heure,"m",45); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'2'); ?></strong></font>&nbsp;</div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'3'); ?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=3&heure=" . AjoutHeure($val_heure,"m",45); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'3'); ?></strong></font>&nbsp;</div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'4'); ?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=4&heure=" . AjoutHeure($val_heure,"m",45); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'4'); ?></strong></font>&nbsp;</div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'5'); ?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=5&heure=" . AjoutHeure($val_heure,"m",45); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'5'); ?></strong></font>&nbsp;</div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'6'); ?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=6&heure=" . AjoutHeure($val_heure,"m",45); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'6'); ?></strong></font>&nbsp;</div></td>
    <td style="cursor:hand;" bgcolor="<?php echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'7'); ?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" onClick="MM_goToURL('parent','<?php echo "planning_ins.php?jour=7&heure=" . AjoutHeure($val_heure,"m",45); ?>');return document.MM_returnValue"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'7'); ?></strong></font>&nbsp;</div></td>
  </tr>
<?php
	$i++;
	}
?>
</table>
</body>
</html>
