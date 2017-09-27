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
<br>
<table width="991px" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="table_entete"> 
    <td width="3%" bgcolor="#FFFF30"></td>
    <td width="10%" bgcolor="#FFFF90"> <div align="center"><strong><font size="-2" face="Arial, Helvetica, sans-serif"><font color="#000000">Disponibilit&eacute;</font></font></strong></div></td>
    <td width="3%" bgcolor="#FFFF30"></td>
    <td width="3%" bgcolor="#330099"></td>
    <td width="10%" bgcolor="#0000FF"> <div align="center"><strong><font color="#FFFFFF" size="-2" face="Arial, Helvetica, sans-serif">R&eacute;serv&eacute;</font></strong></div></td>
    <td width="3%" bgcolor="#330099"></td>
    <td width="3%" bgcolor="#009900"></td>
    <td width="10%" bgcolor="#33CC00"> <div align="center"><strong><font color="#FFFFFF" size="-2" face="Arial, Helvetica, sans-serif">Fait</font></strong></div></td>
    <td width="3%" bgcolor="#009900"></td>
    <td width="3%" bgcolor="#CC0D12"></td>
    <td width="10%" bgcolor="#FF0000"> <div align="center"><strong><font color="#FFFFFF" size="-2" face="Arial, Helvetica, sans-serif">Annul&eacute;</font></strong></div></td>
    <td width="3%" bgcolor="#CC0D12"></td>
    <td width="3%" bgcolor="#B8B8B2"></td>
    <td width="10%" bgcolor="#D0D0CC"> <div align="center"><strong><font color="#FFFFFF" size="-2" face="Arial, Helvetica, sans-serif">Pause</font></strong></div></td>
    <td width="3%" bgcolor="#B8B8B2"></td>
  </tr>
</table>
<table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
  <caption>
  PLANNING HEBDOMADAIRE<br>
  <?php
  	if (!empty($_GET["CurDate"])){
		$CurDate=$_GET["CurDate"];
	}
	else{
		$CurDate=Now("DATE");
	}
  	$date1=DateLundi($CurDate);
	$date2=DateDimanche($CurDate);
	$D1=explode('-',$date1);
	$D2=explode('-',$date2);
   ?>
   <a href="hebdomadaire.php?CurDate=<?php echo AjouterDate($CurDate,"d",-7); ?>" title="semaine précédente"><img src="images/Gnome-Go-Previous-32.png" height="16px"></a>
   <?php
	echo '<span style="font-style:normal;font-weight:normal;"> du '.$D1[2].'/'.$D1[1].'/'.$D1[0].' au '.$D2[2].'/'.$D2[1].'/'.$D2[0].'</span>';
   ?>
	<a href="hebdomadaire.php?CurDate=<?php echo AjouterDate($CurDate,"d",7); ?>" title="semaine suivante"><img src="images/Gnome-Go-Next-32.png" height="16px"></a>
   <?php
	$nDate1=DateToNumber($date1);
	$nDate2=DateToNumber($date2);
  ?>
</caption>
  <tr bgcolor="#000000" class="table_entete"> 
    <td width="15%"><div align="center">Heure</div></td>
	<?php
		while ($date1<=$date2){
	?>
	<td width="10%" bgcolor="<?php echo BackColorDate($date1); ?>"><div align="center"><?php echo JourFR(Jour($date1)) . "<br>" . FormatDate($date1,"dd"); ?></div></td>
	<?php
			$nDate1=$nDate1 + 86400;
			$date1=AjouterDate($date1,"d",1);
		}
	?>
  </tr>
  <?php
  	if (!empty($_GET["CurDate"])){
		$CurDate=$_GET["CurDate"];
	}
	else{
		$CurDate=Now("DATE");
	}
  	$date1=DateLundi($CurDate);
	$date2=DateDimanche($CurDate);
	$D1=explode('-',$date1);
	$D2=explode('-',$date2);
  	$i=1;
  	$sql="SELECT * FROM heures";
	$results=mysql_query($sql);
	while ($rows=mysql_fetch_array($results)) {
		extract($rows);
  ?>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete">
    <td rowspan="4"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo substr($val_heure,0,5); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",0)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",0),'1');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=1&heure=" . AjoutHeure($val_heure,"m",0)."&curdate=".AjouterDate($date1,"d",0)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),'1','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
		><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'1'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",1)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",0),'2');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=2&heure=" . AjoutHeure($val_heure,"m",0)."&curdate=".AjouterDate($date1,"d",1)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),'2','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'2'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",2)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",0),'3');
		else{
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=3&heure=" . AjoutHeure($val_heure,"m",0)."&curdate=".AjouterDate($date1,"d",2)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),'3','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'3'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",3)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",0),'4');
		else{
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=4&heure=" . AjoutHeure($val_heure,"m",0)."&curdate=".AjouterDate($date1,"d",3)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),'4','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'4'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",4)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",0),'5');
		else{
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=5&heure=" . AjoutHeure($val_heure,"m",0)."&curdate=".AjouterDate($date1,"d",4)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),'5','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'5'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",5)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",0),'6');
		else{
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=6&heure=" . AjoutHeure($val_heure,"m",0)."&curdate=".AjouterDate($date1,"d",5)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),'6','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'6'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",6)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",0),'7');
		else{
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=7&heure=" . AjoutHeure($val_heure,"m",0)."&curdate=".AjouterDate($date1,"d",6)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),'7','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),'7'); ?></strong></font></div></td>
  </tr>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",0)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'1');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",15));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=1&heure=" . AjoutHeure($val_heure,"m",15)."&curdate=".AjouterDate($date1,"d",0)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",15),'1','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'1'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",1)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'2');
		else{
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",15));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=2&heure=" . AjoutHeure($val_heure,"m",15)."&curdate=".AjouterDate($date1,"d",1)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",15),'2','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
		><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'2'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",2)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'3');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='DONE')
				echo BackColorDone(AjoutHeure($val_heure,"m",15));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=3&heure=" . AjoutHeure($val_heure,"m",15)."&curdate=".AjouterDate($date1,"d",2)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",15),'3','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'3'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",3)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'3');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",15));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=4&heure=" . AjoutHeure($val_heure,"m",15)."&curdate=".AjouterDate($date1,"d",3)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",15),'4','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'4'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",4)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'5');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",15));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" 
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=5&heure=" . AjoutHeure($val_heure,"m",15)."&curdate=".AjouterDate($date1,"d",4)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",15),'5','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>	
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'5'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",5)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'6');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",15));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=6&heure=" . AjoutHeure($val_heure,"m",15)."&curdate=".AjouterDate($date1,"d",5)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",15),'6','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'6'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",6)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",15),'7');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",15));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>" 
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=7&heure=" . AjoutHeure($val_heure,"m",15)."&curdate=".AjouterDate($date1,"d",6)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",15),'7','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),'7'); ?></strong></font></div></td>
  </tr>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",0)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'1');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" 
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=1&heure=" . AjoutHeure($val_heure,"m",30)."&curdate=".AjouterDate($date1,"d",0)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",30),'1','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'1'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",1)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'2');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",30));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" 
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=2&heure=" . AjoutHeure($val_heure,"m",30)."&curdate=".AjouterDate($date1,"d",1)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",30),'2','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'2'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",2)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'3');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",30));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>" 
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=3&heure=" . AjoutHeure($val_heure,"m",30)."&curdate=".AjouterDate($date1,"d",2)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",30),'3','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'3'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",3)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'4');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",30));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=4&heure=" . AjoutHeure($val_heure,"m",30)."&curdate=".AjouterDate($date1,"d",3)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",30),'4','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'4'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",4)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'5');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",30));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=5&heure=" . AjoutHeure($val_heure,"m",30)."&curdate=".AjouterDate($date1,"d",4)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",30),'5','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'5'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",5)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'6');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",30));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=6&heure=" . AjoutHeure($val_heure,"m",30)."&curdate=".AjouterDate($date1,"d",5)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",30),'6','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'6'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",6)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",30),'7');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",30));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=7&heure=" . AjoutHeure($val_heure,"m",30)."&curdate=".AjouterDate($date1,"d",6)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",30),'7','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),'7'); ?></strong></font></div></td>
  </tr>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",0)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'1');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",0)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",45));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='1' AND heure_planning='".AjoutHeure($val_heure,"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=1&heure=" . AjoutHeure($val_heure,"m",45)."&curdate=".AjouterDate($date1,"d",0)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",45),'1','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'1'); ?></strong></font>&nbsp;</div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",1)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'2');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",1)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='2' AND heure_planning='".AjoutHeure($val_heure,"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=2&heure=" . AjoutHeure($val_heure,"m",45)."&curdate=".AjouterDate($date1,"d",1)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",45),'2','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'2'); ?></strong></font>&nbsp;</div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",2)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'3');
		else
			 {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",2)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",45));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" 
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='3' AND heure_planning='".AjoutHeure($val_heure,"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=3&heure=" . AjoutHeure($val_heure,"m",45)."&curdate=".AjouterDate($date1,"d",2)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",45),'3','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'3'); ?></strong></font></div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",3)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'4');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",3)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",45));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" 
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='4' AND heure_planning='".AjoutHeure($val_heure,"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=4&heure=" . AjoutHeure($val_heure,"m",45)."&curdate=".AjouterDate($date1,"d",3)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",45),'4','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'4'); ?></strong></font>&nbsp;</div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",4)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'5');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",4)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",45));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>" 
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='5' AND heure_planning='".AjoutHeure($val_heure,"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=5&heure=" . AjoutHeure($val_heure,"m",45)."&curdate=".AjouterDate($date1,"d",4)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",45),'5','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'5'); ?></strong></font>&nbsp;</div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",5)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'6');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",5)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",45));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='6' AND heure_planning='".AjoutHeure($val_heure,"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=6&heure=" . AjoutHeure($val_heure,"m",45)."&curdate=".AjouterDate($date1,"d",5)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",45),'6','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'6'); ?></strong></font>&nbsp;</div></td>
    <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",6)."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",45),'7');
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".AjouterDate($date1,"d",6)."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",45));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='7' AND heure_planning='".AjoutHeure($val_heure,"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=hebdo&jour=7&heure=" . AjoutHeure($val_heure,"m",45)."&curdate=".AjouterDate($date1,"d",6)."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",45),'7','id'); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>
	><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),'7'); ?></strong></font>&nbsp;</div></td>
  </tr>
<?php
	$i++;
	}
?>
</table>
</body>
</html>