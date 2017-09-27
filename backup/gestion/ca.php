<?php
	require("../includes/const_decl.php");
	include 'menu.php';

	if (!empty($_REQUEST['offset']))
		$offset=$_REQUEST['offset'];
	else
		$offset=0;

	$CurDate=Now("DATE");
	
	if (!empty($_REQUEST['jour']))
		$maintenant[2]=$_REQUEST['jour'];
	else
		$maintenant=explode('-',$CurDate);	
	
	if (!empty($_REQUEST['mois']))
		$maintenant[1]=$_REQUEST['mois'];
	else
		$maintenant=explode('-',$CurDate);	
	
	if (!empty($_REQUEST['annee']))
		$maintenant[0]=$_REQUEST['annee'];
	else
		$maintenant=explode('-',$CurDate);	
	
	if (!empty($_REQUEST['semaine']))
		$semaine=$_REQUEST['semaine'];
	else {
	  	$date1=DateLundi($CurDate);
		$date2=DateDimanche($CurDate);
		$date1=DateLundi($CurDate);
		$date2=DateDimanche($CurDate);
		$semaine=$date1.'*'.$date2;
	}
	
	$mois=mktime( 0, 0, 0, $maintenant[1], 1, $maintenant[0] ); 
	$nb_jour=date("t",$mois);
	$nb_sem=$nb_jour/7;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<meta name="google-site-verification" content="aMiKad3AJKizrwF0zdO6HavShyOoDcbrGpORMThJEUg" />
<title>myretooch.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
<link rel="icon" href="../favicon.ico"/>
<script language="JavaScript" type="text/javascript">
	function soumettre() {
		var form=document.forms["ca"]
		form.action="ca.php"
		form.submit()
	}
</script>
</head>
<body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status=''; return true;">
<form action="ca.php" enctype="multipart/form-data" method="post" name="ca">
  <table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
    <caption>
    CHIFFRES D'AFFAIRES<br>
    <?php echo nom_mois($maintenant[1]); ?> 
    <select name="annee">
      <option value="" style="color:#FF0000;">ann&eacute;e</option>
      <?php
				for ($i=date('Y')-2;$i<date('Y')+2;$i++) {
					if ($maintenant[0]==$i)
						echo '<option value="'.$i.'" selected>'.$i.'</option>';
					else
						echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
    </select>
    <input type="submit" value="Go" class="submit" />
    </caption>
    <tr bgcolor="#000000" class="table_entete"> 
      <td align="center">#</td>
      <td align="center">&nbsp;</td>
      <td align="center">Nombre de clients</td>
      <td><div align="center">Nombre de photos &agrave; traiter</div></td>
      <td><div align="center">Nombre de photos trait&eacute;es</div></td>
      <td colspan="3"><div align="center">CA r&eacute;alis&eacute;</div></td>
    </tr>
    <tr bgcolor="#D8EDFE" class="table_contenu"> 
      <td height="30">Jour</td>
      <td><select name="jour" onChange="javascript:soumettre();">
          <option value="" style="color:#FF0000;">jour</option>
          <?php
	  	for ($i=1;$i<=$nb_jour;$i++) {
			if (strlen($i)==1)
					if ($maintenant[2]==$i)
						echo '<option value="0'.$i.'" selected>'.'0'.$i.'</option>';
					else
						echo '<option value="0'.$i.'">'.'0'.$i.'</option>';
				else
					if ($maintenant[2]==$i)
						echo '<option value="'.$i.'" selected>'.$i.'</option>';
					else
						echo '<option value="'.$i.'">'.$i.'</option>';
		}
	  ?>
        </select></td>
      <td align="center"> 
        <?php
	  	$nb_cli_j= mysql_result(mysql_query("SELECT DISTINCT COUNT(id_client) FROM factures WHERE date_facture='".$maintenant[0]."-".$maintenant[1]."-".$maintenant[2]."'"),0);
		echo $nb_cli_j;
	  ?></td>
      <td align="center"> 
        <?php
	  	$nb_foto_j= mysql_result(mysql_query("SELECT SUM(qte_panier_client) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_livraison='0000-00-00' AND date_facture='".$maintenant[0]."-".$maintenant[1]."-".$maintenant[2]."'"),0);
		if (!empty($nb_foto_j))
			echo $nb_foto_j;
		else
			echo '0';
	  ?></td>
      <td align="center">
        <?php
	  	$nb_fotot_j= mysql_result(mysql_query("SELECT SUM(qte_panier_client) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_livraison<>'0000-00-00' AND date_facture='".$maintenant[0]."-".$maintenant[1]."-".$maintenant[2]."'"),0);
		if (!empty($nb_fotot_j))
			echo $nb_fotot_j;
		else
			echo '0';
	  ?></td>
      <td colspan="3" align="right">&euro;
          <?php
	  	$ca_j= mysql_result(mysql_query("SELECT SUM(qte_panier_client*tarif_service) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_facture='".$maintenant[0]."-".$maintenant[1]."-".$maintenant[2]."'"),0);
		if (!empty($ca_j))
			echo $ca_j;
		else
			echo '0';
	  ?>
       </td>
    </tr>
    <tr bgcolor="#B0DBFD" class="table_contenu"> 
      <td height="30">Semaine</td>
      <td><select name="semaine" onChange="javascript:soumettre();">
          <option value="" style="color:#FF0000;">semaine</option>
          <?php
		  	$date_L=DateLundi($maintenant[0].'-'.$maintenant[1].'-01');
			$date_D=DateDimanche($maintenant[0].'-'.$maintenant[1].'-01');
		  	for ($i=0;$i<=30;$i=$i+7) {
			  	$datedeb=AjouterDate($date_L,"d",$i);
				$datefin=AjouterDate($date_D,"d",$i);
				$DD=explode('-',$datedeb);
				$DF=explode('-',$datefin);
				if ($semaine==$datedeb.'*'.$datefin)
					echo '<option value="'.$datedeb.'*'.$datefin.'" selected> du '.$DD[2].'/'.$DD[1].'/'.$DD[0].' au '.$DF[2].'/'.$DF[1].'/'.$DF[0].'</option>';
				else
					echo '<option value="'.$datedeb.'*'.$datefin.'"> du '.$DD[2].'/'.$DD[1].'/'.$DD[0].' au '.$DF[2].'/'.$DF[1].'/'.$DF[0].'</option>';
			}
		  ?>
          <?php
	  	/*for ($i=1;$i<=$nb_sem;$i++) {
			if (strlen($i)==1)
				if ($semaine=='0'.$i)
					echo '<option value="0'.$i.'" selected>'.'0'.$i.'</option>';
				else
					echo '<option value="0'.$i.'">'.'0'.$i.'</option>';
			else
				if ($semaine=='0'.$i)
					echo '<option value="'.$i.'" selected>'.$i.'</option>';
				else
					echo '<option value="'.$i.'">'.$i.'</option>';
		}*/
	  ?>
        </select></td>
      <td align="center">
        <?php
		$entre_date=explode('*',$semaine);
	  	$nb_cli_s= mysql_result(mysql_query("SELECT DISTINCT COUNT(id_client) FROM factures WHERE date_facture BETWEEN '".$entre_date[0]."' AND '".$entre_date[1]."'"),0);
		echo $nb_cli_s;
	  ?></td>
      <td align="center"> 
        <?php
	  	$nb_foto_s= mysql_result(mysql_query("SELECT SUM(qte_panier_client) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_livraison='0000-00-00' AND date_facture BETWEEN '".$entre_date[0]."' AND '".$entre_date[1]."'"),0);
		if (!empty($nb_foto_s))
			echo $nb_foto_s;
		else
			echo '0';
	  ?></td>
      <td align="center"> 
        <?php
	  	$nb_fotot_s= mysql_result(mysql_query("SELECT SUM(qte_panier_client) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_livraison<>'0000-00-00' AND date_facture BETWEEN '".$entre_date[0]."' AND '".$entre_date[1]."'"),0);
		if (!empty($nb_fotot_s))
			echo $nb_fotot_s;
		else
			echo '0';
	  ?></td>
      <td align="right" colspan="3">&euro;
        <?php
	  	$ca_s= mysql_result(mysql_query("SELECT SUM(qte_panier_client*tarif_service) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_facture BETWEEN '".$entre_date[0]."' AND '".$entre_date[1]."'"),0);
		if (!empty($ca_s))
			echo $ca_s;
		else
			echo '0';
	  ?>
      </td>
    </tr>
    <tr bgcolor="#D8EDFE" class="table_contenu"> 
      <td height="30">Mois</td>
      <td><select name="mois" onChange="javascript:soumettre();">
          <option value="" style="color:#FF0000;">mois</option>
          <?php
			for ($i=1;$i<13;$i++) {
				if (strlen($i)==1)
					if ($maintenant[1]==$i)
						echo '<option value="0'.$i.'" selected>'.nom_mois('0'.$i).'</option>';
					else
						echo '<option value="0'.$i.'">'.nom_mois('0'.$i).'</option>';
				else
					if ($maintenant[1]==$i)
						echo '<option value="'.$i.'" selected>'.nom_mois($i).'</option>';
					else
						echo '<option value="'.$i.'">'.nom_mois($i).'</option>';
			}
		?>
        </select></td>
      <td align="center"> 
        <?php
	  	$nb_cli_m= mysql_result(mysql_query("SELECT DISTINCT COUNT(id_client) FROM factures WHERE date_facture LIKE '".$maintenant[0]."-".$maintenant[1]."%'"),0);
		echo $nb_cli_m;
	  ?></td>
      <td align="center"> 
        <?php
	  	$nb_foto_m= mysql_result(mysql_query("SELECT SUM(qte_panier_client) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_livraison='0000-00-00' AND date_facture LIKE '".$maintenant[0]."-".$maintenant[1]."%'"),0);
		if (!empty($nb_foto_m))
			echo $nb_foto_m;
		else
			echo '0';
	  ?></td>
      <td align="center"> 
        <?php
	  	$nb_fotot_m= mysql_result(mysql_query("SELECT SUM(qte_panier_client) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_livraison<>'0000-00-00' AND date_facture LIKE '".$maintenant[0]."-".$maintenant[1]."%'"),0);
		if (!empty($nb_fotot_m))
			echo $nb_fotot_m;
		else
			echo '0';
	  ?></td>
      <td align="right" colspan="3">&euro;
        <?php
	  	$ca_m= mysql_result(mysql_query("SELECT SUM(qte_panier_client*tarif_service) FROM detail_factures
		INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
		WHERE date_facture LIKE '".$maintenant[0]."-".$maintenant[1]."%'"),0);
		if (!empty($ca_m))
			echo $ca_m;
		else
			echo '0';
	  ?>
      </td>
    </tr>
  </table>
  <br>
   <?php
		$sql1="SELECT * FROM services ORDER BY id_service";
		$line='';
		$lib='';
		$results=mysql_query($sql1);
		$i=0;
		while ($rows=mysql_fetch_array($results)) {
			extract($rows);
			$IdS=$id_service;
			$lib.=$lib_service.',';
			$line.=mysql_result(mysql_query("SELECT SUM(qte_panier_client) FROM detail_factures
			INNER JOIN factures ON factures.id_facture=detail_factures.id_facture 
			WHERE id_service='$IdS' AND factures.date_facture LIKE '".$maintenant[0]."%'"),0).',';
			$i++;
		}
		$line=substr($line,0,strlen($line)-1);
		$lib=substr($lib,0,strlen($lib)-1);
  ?>
	<?php
		if ($line!=',,') {
	?>
  <table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
  	<tr>
	<td align="center">
	<iframe id="imgManager" name="imgManager" src="ca_secteur.php?annee=<?php echo $maintenant[0]; ?>&tot_foto=<?php echo $line; ?>&tout_lib=<?php echo $lib; ?>" scrolling="no" frameborder="0" hspace="no" vspace="0" height="460" style="background-color:#000000"></iframe>
	</td>
	</tr>
  </table>
  	<?php
		}
		else {
	?>
  <table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
  	<tr>
	<td align="center">Pas de données</td>
	</tr>
  </table>
    <?php
		}
	?>
</form>
</body>
</html>