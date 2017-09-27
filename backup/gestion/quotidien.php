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
<form>
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
    PLANNING QUOTIDIEN<br>
	<?php
		if (!empty($_GET["CurDate"])){
			$CurDate=$_GET["CurDate"];
		}
		else{
			$CurDate=Now("DATE");
		}
		$maintenant=explode('-',$CurDate);
		$numjour=NumJour(JourFR(Jour($CurDate)));
	?>
    <a href="quotidien.php?CurDate=<?php echo AjouterDate($CurDate,"d",-1); ?>" title="jour précédent"><img src="images/Gnome-Go-Previous-32.png" height="16px"></a>
	<?php
		echo '<span style="font-style:normal;font-weight:normal;">'.JourFR(Jour($CurDate)).'</span>';
	?>
    <select name="jour">
      <option value="" style="color:#FF0000">[jour]</option>
      <?php
		for ($i=1;$i<32;$i++) {
			if (strlen($i)<2)
				$i='0'.$i;
	  ?>
      <option value="<?php echo $i; ?>" <?php if ($i==$maintenant[2]) echo 'selected'; ?>><?php echo $i; ?></option>
      <?php
		}
      ?>
    </select>
    <select name="mois">
      <option value="" style="color:#FF0000">[mois]</option>
      <?php
		for ($i=1;$i<13;$i++) {
			if (strlen($i)<2)
				$i='0'.$i;
	  ?>
      <option value="<?php echo $i; ?>" <?php if ($i==$maintenant[1]) echo 'selected'; ?>><?php echo $i; ?></option>
      <?php
		}
      ?>
    </select>
    <select name="annee">
      <option value="" style="color:#FF0000">[annee]</option>
      <?php
		for ($i=date('Y');$i<=date('Y')+1;$i++) {
	  ?>
      <option value="<?php echo $i; ?>" <?php if ($i==$maintenant[0]) echo 'selected'; ?>><?php echo $i; ?></option>
      <?php
		}
      ?>
    </select>
    <a href="quotidien.php?CurDate=<?php echo AjouterDate($CurDate,"d",1); ?>" title="jour suivant"><img src="images/Gnome-Go-Next-32.png" height="16px"></a>
    </caption>
	<?php
		$i=1;
		$sql="SELECT * FROM heures ORDER BY id_heure LIMIT 0,8";
		$results=mysql_query($sql);
		while ($rows=mysql_fetch_array($results)) {
			extract($rows);
	?>
    <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
      <td width="10%" rowspan="4"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $val_heure; ?></strong></font></div>
        <div align="center"></div>
        <div align="center"></div>
        <div align="center"></div></td>
      <td width="10%" bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",0),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",0)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",0));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure($val_heure,"m",0)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",0),$numjour); ?></strong></font></div></td>
      <td width="10%" rowspan="4"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo AjoutHeure($val_heure,"h",8); ?></strong></font></div></td>
      <td width="10%" bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0));
		}
		?>" title="<?php echo AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure(AjoutHeure($val_heure,"h",8),"m",0)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"h",8),$numjour); ?></strong></font></div></td>
      <td width="10%" rowspan="4"><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo AjoutHeure($val_heure,"h",16); ?></strong></font></div></td>
      <td width="10%" bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0));
		}
		?>" title="<?php echo AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",0),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><?php echo equipe_planning(AjoutHeure($val_heure,"h",16),$numjour); ?></div></td>
    </tr>
    <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",15),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",15)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",15));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",15); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure($val_heure,"m",15)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",15),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",15),$numjour); ?></strong></font></div></td>
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15));
		}
		?>" title="<?php echo AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",15),$numjour); ?></strong></font></div></td>
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15));
		}
		?>" title="<?php echo AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><?php echo equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",15),$numjour); ?></div></td>
    </tr>
    <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",30),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",30)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",30));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",30); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure($val_heure,"m",30)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",30),$numjour); ?></strong></font></div></td>
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30));
		}
		?>" title="<?php echo AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",30),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",30),$numjour); ?></strong></font></div></td>
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30));
		}
		?>" title="<?php echo AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><?php echo equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",30),$numjour); ?></div></td>
    </tr>
    <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_entete"> 
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure($val_heure,"m",45),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure($val_heure,"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",45)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure($val_heure,"m",45));
		}
		?>" title="<?php echo AjoutHeure($val_heure,"m",45); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure($val_heure,"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure($val_heure,"m",45)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure($val_heure,"m",45),$numjour); ?></strong></font></div></td>
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45));
		}
		?>" title="<?php echo AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",45),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><font color="#000066" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",8),"m",45),$numjour); ?></strong></font></div></td>
      <td bgcolor="<?php
		if (mysql_num_rows(mysql_query("SELECT * FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45)."' AND date_planning='".$CurDate."'"))==0)
			echo bgcolor_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45),$numjour);
		else {
			if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45)."' AND date_planning='".$CurDate."'"),0)=='RESERVE')
				echo BackColorBook(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45)."' AND date_planning='".$CurDate."'"),0)=='PAUSE')
				echo BackColorPause(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45)."' AND date_planning='".$CurDate."'"),0)=='ANNULE')
				echo BackColorCancel(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45));
			else if (mysql_result(mysql_query("SELECT type_planning FROM mouvements WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45)."' AND date_planning='".$CurDate."'"),0)=='FAIT')
				echo BackColorDone(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45));
		}
		?>" title="<?php echo AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45); ?>"
		<?php
			if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$numjour' AND heure_planning='".AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45)."'"))!=0) {
		?>
		onClick="MM_goToURL('parent','<?php echo "hebdo_ins.php?opt=quot&jour=$numjour&heure=" . AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45)."&curdate=".$CurDate."&id_equipe=".equipe_planning(AjoutHeure($val_heure,"m",0),$numjour,$numjour); ?>');return document.MM_returnValue" style="cursor:hand;"
		<?php
			}
		?>><div align="center"><?php echo equipe_planning(AjoutHeure(AjoutHeure($val_heure,"h",16),"m",45),$numjour); ?></div></td>
    </tr>
	<?php
		$i++;
		}
	?>
  </table>
</form>
</body>
</html>