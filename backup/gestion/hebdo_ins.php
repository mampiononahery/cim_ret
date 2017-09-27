<?php
	require("../includes/const_decl.php");
	include 'menu.php';
	$jour=$_REQUEST['jour'];
	$heure=$_REQUEST['heure'];
	$curdate=$_REQUEST['curdate'];
	$IE=$_REQUEST['id_equipe'];
	$opt=$_REQUEST['opt'];
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

function afficher() {
	var form=document.forms['new_planning'];
	
	if (form.type_planning.value=='RESERVE') {
		document.getElementById('lig1').style.display=""
	}
	
	if (form.type_planning.value=='PAUSE') {
		document.getElementById('lig1').style.display="none"
	}
}

function verifier() {
	var form=document.forms['new_planning'];
	
	if (form.type_planning.value=='RESERVE' && form.id_pers.value=='') {
		form.id_pers.focus();
		return false
	}
	
	if (form.type_planning.value=='RESERVE' && form.id_client.value=='') {
		form.id_client.focus();
		return false
	}
}
//-->
</script>
</head>
<body>
  <?php
	$sql="SELECT * FROM mouvements WHERE jour_planning='$jour' AND date_planning='$curdate' AND heure_planning='$heure'";
	if (mysql_num_rows(mysql_query($sql))==0) {
?>
  <form action="cod_hebdo.php" name="new_planning" enctype="multipart/form-data" method="post" onSubmit="return verifier();">
    <table width="495px" border="0" align="center" cellpadding="2" cellspacing="1">
      <caption>
      OPERATION SUR LE PLANNING 
      </caption>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Date :</td>
        <td><input type="hidden" name="jour_planning" value="<?php echo $jour; ?>"> 
          <input type="hidden" name="opt" value="<?php echo $opt; ?>"> 
          <input type="hidden" name="date_planning" value="<?php echo $curdate; ?>"> 
          <input type="text" name="daty" value="<?php $D=explode('-',$curdate); echo $D[2].'/'.$D[1].'/'.$D[0]; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Heure :</td>
        <td><input type="text" name="heure_planning" value="<?php echo $heure; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td width="50%">Equipe :</td>
        <td width="50%"><input name="id_equipe" type="hidden" value="<?php echo $IE; ?>">
          <input type="text" name="lib_equipe" readonly="readonly" value="<?php
			$sql="SELECT * FROM equipe WHERE id_equipe='$IE' ORDER BY lib_equipe";
			$results=mysql_query($sql);
			if ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo $lib_equipe;
			}
		?>
        "></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Personnel :</td>
        <td><select name="id_pers">
            <option value="" style="color:#FF0000">[personnel]</option>
            <?php
			$sql="SELECT * FROM personnel WHERE id_equipe='$id_equipe' ORDER BY prenom_pers";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo '<option value="'.$id_pers.'">'.$prenom_pers.' '.$nom_pers.'</option>';
			}
		?>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Type :</td>
        <td><select name="type_planning" onChange="javascript:afficher();">
            <option value="RESERVE" selected>RESERVE</option>
            <option value="PAUSE">PAUSE</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Dur&eacute;e :</td>
        <td><select name="duree_planning">
            <option value="15">15 mn</option>
            <option value="30">30 mn</option>
            <option value="45">45 mn</option>
            <option value="60">1 hr</option>
            <option value="120">2 hrs</option>
            <option value="180">3 hrs</option>
            <option value="240">4 hrs</option>
            <option value="360">6 hrs</option>
            <option value="480">8 hrs</option>
            <option value="720">12 hrs</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig1"> 
        <td>Client :</td>
        <td><select name="id_client">
            <option value="" style="color:#FF0000">[client]</option>
            <?php
			$sql="SELECT * FROM clients ORDER BY prenom_client";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo '<option value="'.$id_client.'">'.$prenom_client.' '.$nom_client.'</option>';
			}
		?>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig2"> 
        <td>Commentaires :</td>
        <td><textarea name="commentaire"></textarea></td>
      </tr>
      <tr class="table_titre"> 
        <td><div align="right"> 
            <input type="button" name="Annuler" value="Annuler" class="submit" onClick="MM_goToURL('parent','<?php if ($opt=='hebdo') echo "hebdomadaire.php"; else echo "quotidien.php"; ?>');return document.MM_returnValue">
          </div></td>
        <td><div align="left"> 
            <input type="submit" name="Submit" value="Valider" class="submit">
          </div></td>
      </tr>
    </table>
  </form>
  <?php
	}
?>
  <?php
	//mouvement RESERVE
	$sql="SELECT * FROM mouvements WHERE jour_planning='$jour' AND date_planning='$curdate' AND heure_planning='$heure' AND type_planning='RESERVE'";
	//echo $sql;
	if (mysql_num_rows(mysql_query($sql))==1) {
		$result=mysql_query($sql);
		if ($row=mysql_fetch_array($result)) {
			extract($row);
?>
  <form action="cod_hebdo.php" name="new_planning" enctype="multipart/form-data" method="post">
    <table width="495px" border="0" align="center" cellpadding="2" cellspacing="1">
      <caption>
      INSERTION PLANNING 
      </caption>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Date :</td>
        <td><input type="hidden" name="jour_planning" value="<?php echo $jour; ?>"> 
          <input type="hidden" name="opt" value="<?php echo $opt; ?>"> 
          <input type="hidden" name="date_planning" value="<?php echo $curdate; ?>"> 
          <input type="text" name="daty" value="<?php $D=explode('-',$curdate); echo $D[2].'/'.$D[1].'/'.$D[0]; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Heure :</td>
        <td><input type="text" name="heure_planning" value="<?php echo $heure; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td width="50%">Equipe :</td>
        <td width="50%"><input name="id_equipe" type="hidden" value="<?php echo $IE; ?>">
          <input type="text" name="lib_equipe" readonly="readonly" value="<?php
			$sql1="SELECT * FROM equipe WHERE id_equipe='$IE' ORDER BY lib_equipe";
			$result1=mysql_query($sql1);
			if ($row1=mysql_fetch_array($result1)) {
				extract($row1);
				echo $lib_equipe;
			}
		?>
        "></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Personnel :</td>
        <td><input type="hidden" name="id_pers" value="<?php echo $id_pers; ?>">
          <input type="text" name="nom_prenom_pers" value="<?php
			$sql2="SELECT * FROM personnel WHERE id_pers='$id_pers'";
			$result2=mysql_query($sql2);
			if ($row2=mysql_fetch_array($result2)) {
				extract($row2);
				echo $prenom_pers.' '.$nom_pers;
			}
		?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Type :</td>
        <td><select name="type_planning" onChange="javascript:afficher();">
            <option value="FAIT">FAIT</option>
            <option value="ANNULE">ANNULE</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Dur&eacute;e :</td>
        <td><select name="duree_planning">
            <option value="15">15 mn</option>
            <option value="30">30 mn</option>
            <option value="45">45 mn</option>
            <option value="60">1 hr</option>
            <option value="120">2 hrs</option>
            <option value="180">3 hrs</option>
            <option value="240">4 hrs</option>
            <option value="360">6 hrs</option>
            <option value="480">8 hrs</option>
            <option value="720">12 hrs</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig3"> 
        <td>Client :</td>
        <td><input type="hidden" name="id_client" value="<?php echo $id_client; ?>">
          <input type="text" name="nom_prenom_client" value="<?php
			$sql3="SELECT * FROM clients WHERE id_client='$id_client'";
			$result3=mysql_query($sql3);
			if ($row3=mysql_fetch_array($result3)) {
				extract($row3);
				echo $prenom_client.' '.$nom_client;
			}
		?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig4"> 
        <td>Commentaires :</td>
        <td><textarea name="commentaire"></textarea></td>
      </tr>
      <tr class="table_titre"> 
        <td><div align="right"> 
            <input type="button" name="Annuler" value="Annuler" class="submit" onClick="MM_goToURL('parent','<?php echo "hebdomadaire.php"; ?>');return document.MM_returnValue">
          </div></td>
        <td><div align="left"> 
            <input type="submit" name="Submit" value="Valider" class="submit">
          </div></td>
      </tr>
    </table>
  </form>
  <?php
		}
	}
?>
  <?php
	//mouvement FAIT
	$sql="SELECT * FROM mouvements WHERE jour_planning='$jour' AND date_planning='$curdate' AND heure_planning='$heure' AND type_planning='FAIT'";
	if (mysql_num_rows(mysql_query($sql))==1) {
		$result=mysql_query($sql);
		if ($row=mysql_fetch_array($result)) {
			extract($row);
?>
  <form action="cod_hebdo.php" name="new_planning" enctype="multipart/form-data" method="post">
    <table width="495px" border="0" align="center" cellpadding="2" cellspacing="1">
      <caption>
      INSERTION PLANNING 
      </caption>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Date :</td>
        <td><input type="hidden" name="jour_planning" value="<?php echo $jour; ?>"> 
          <input type="hidden" name="opt" value="<?php echo $opt; ?>"> 
          <input type="hidden" name="date_planning" value="<?php echo $curdate; ?>"> 
          <input type="text" name="daty" value="<?php $D=explode('-',$curdate); echo $D[2].'/'.$D[1].'/'.$D[0]; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Heure :</td>
        <td><input type="text" name="heure_planning" value="<?php echo $heure; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td width="50%">Equipe :</td>
        <td width="50%"><input name="id_equipe" type="hidden" value="<?php echo $IE; ?>">
          <input type="text" name="lib_equipe" readonly="readonly" value="<?php
			$sql1="SELECT * FROM equipe WHERE id_equipe='$IE' ORDER BY lib_equipe";
			$result1=mysql_query($sql1);
			if ($row1=mysql_fetch_array($result1)) {
				extract($row1);
				echo $lib_equipe;
			}
		?>
        "></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Personnel :</td>
        <td><input type="hidden" name="id_pers" value="<?php echo $id_pers; ?>">
          <input type="text" name="nom_prenom_pers" value="<?php
			$sql2="SELECT * FROM personnel WHERE id_pers='$id_pers'";
			$result2=mysql_query($sql2);
			if ($row2=mysql_fetch_array($result2)) {
				extract($row2);
				echo $prenom_pers.' '.$nom_pers;
			}
		?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Type :</td>
        <td><select name="type_planning" onChange="javascript:afficher();">
            <option value="ANNULE">ANNULE</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Dur&eacute;e :</td>
        <td><select name="duree_planning">
            <option value="15">15 mn</option>
            <option value="30">30 mn</option>
            <option value="45">45 mn</option>
            <option value="60">1 hr</option>
            <option value="120">2 hrs</option>
            <option value="180">3 hrs</option>
            <option value="240">4 hrs</option>
            <option value="360">6 hrs</option>
            <option value="480">8 hrs</option>
            <option value="720">12 hrs</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig3"> 
        <td>Client :</td>
        <td><input type="hidden" name="id_client" value="<?php echo $id_client; ?>">
          <input type="text" name="nom_prenom_client" value="<?php
			$sql3="SELECT * FROM clients WHERE id_client='$id_client'";
			$result3=mysql_query($sql3);
			if ($row3=mysql_fetch_array($result3)) {
				extract($row3);
				echo $prenom_client.' '.$nom_client;
			}
		?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig4"> 
        <td>Commentaires :</td>
        <td><textarea name="commentaire"></textarea></td>
      </tr>
      <tr class="table_titre"> 
        <td><div align="right"> 
            <input type="button" name="Annuler" value="Annuler" class="submit" onClick="MM_goToURL('parent','<?php if ($opt=='hebdo') echo "hebdomadaire.php"; else echo "quotidien.php"; ?>');return document.MM_returnValue">
          </div></td>
        <td><div align="left"> 
            <input type="submit" name="Submit" value="Valider" class="submit">
          </div></td>
      </tr>
    </table>
  </form>
  <?php
		}
	}
?>
  <?php
	//mouvement ANNULE
	$sql="SELECT * FROM mouvements WHERE jour_planning='$jour' AND date_planning='$curdate' AND heure_planning='$heure' AND type_planning='ANNULE'";
	if (mysql_num_rows(mysql_query($sql))==1) {
		$result=mysql_query($sql);
		if ($row=mysql_fetch_array($result)) {
			extract($row);
?>
  <form action="cod_hebdo.php" name="new_planning" enctype="multipart/form-data" method="post" onSubmit="return verifier();">
    <table width="495px" border="0" align="center" cellpadding="2" cellspacing="1">
      <caption>
      INSERTION PLANNING 
      </caption>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Date :</td>
        <td><input type="hidden" name="jour_planning" value="<?php echo $jour; ?>"> 
          <input type="hidden" name="opt" value="<?php echo $opt; ?>"> 
          <input type="hidden" name="date_planning" value="<?php echo $curdate; ?>"> 
          <input type="text" name="daty" value="<?php $D=explode('-',$curdate); echo $D[2].'/'.$D[1].'/'.$D[0]; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Heure :</td>
        <td><input type="text" name="heure_planning" value="<?php echo $heure; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td width="50%">Equipe :</td>
        <td width="50%"><input name="id_equipe" type="hidden" value="<?php echo $IE; ?>">
          <input type="text" name="lib_equipe" readonly="readonly" value="<?php
			$sql1="SELECT * FROM equipe WHERE id_equipe='$IE' ORDER BY lib_equipe";
			$result1=mysql_query($sql1);
			if ($row1=mysql_fetch_array($result1)) {
				extract($row1);
				echo $lib_equipe;
			}
		?>
        "></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Personnel :</td>
        <td><select name="id_pers">
            <option value="" style="color:#FF0000">[personnel]</option>
            <?php
			$sql="SELECT * FROM personnel WHERE id_equipe='$id_equipe' ORDER BY prenom_pers";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo '<option value="'.$id_pers.'">'.$prenom_pers.' '.$nom_pers.'</option>';
			}
		?>
          </select> </td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Type :</td>
        <td><select name="type_planning">
            <option value="RESERVE">RESERVE</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Dur&eacute;e :</td>
        <td><select name="duree_planning">
            <option value="15">15 mn</option>
            <option value="30">30 mn</option>
            <option value="45">45 mn</option>
            <option value="60">1 hr</option>
            <option value="120">2 hrs</option>
            <option value="180">3 hrs</option>
            <option value="240">4 hrs</option>
            <option value="360">6 hrs</option>
            <option value="480">8 hrs</option>
            <option value="720">12 hrs</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig3"> 
        <td>Client :</td>
        <td><select name="id_client">
            <option value="" style="color:#FF0000">[client]</option>
            <?php
			$sql="SELECT * FROM clients ORDER BY prenom_client";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo '<option value="'.$id_client.'">'.$prenom_client.' '.$nom_client.'</option>';
			}
		?>
          </select> </td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig4"> 
        <td>Commentaires :</td>
        <td><textarea name="commentaire"></textarea></td>
      </tr>
      <tr class="table_titre"> 
        <td><div align="right"> 
            <input type="button" name="Annuler" value="Annuler" class="submit" onClick="MM_goToURL('parent','<?php if ($opt=='hebdo') echo "hebdomadaire.php"; else echo "quotidien.php"; ?>');return document.MM_returnValue">
          </div></td>
        <td><div align="left"> 
            <input type="submit" name="Submit" value="Valider" class="submit">
          </div></td>
      </tr>
    </table>
  </form>
  <?php
		}
	}
?>
  <?php
	//mouvement PAUSE
	$sql="SELECT * FROM mouvements WHERE jour_planning='$jour' AND date_planning='$curdate' AND heure_planning='$heure' AND type_planning='PAUSE'";
	if (mysql_num_rows(mysql_query($sql))==1) {
		$result=mysql_query($sql);
		if ($row=mysql_fetch_array($result)) {
			extract($row);
?>
  <form action="cod_hebdo.php" name="new_planning" enctype="multipart/form-data" method="post" onSubmit="return verifier();">
    <table width="495px" border="0" align="center" cellpadding="2" cellspacing="1">
      <caption>
      INSERTION PLANNING 
      </caption>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Date :</td>
        <td><input type="hidden" name="jour_planning" value="<?php echo $jour; ?>"> 
          <input type="hidden" name="opt" value="<?php echo $opt; ?>"> 
          <input type="hidden" name="date_planning" value="<?php echo $curdate; ?>"> 
          <input type="text" name="daty" value="<?php $D=explode('-',$curdate); echo $D[2].'/'.$D[1].'/'.$D[0]; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Heure :</td>
        <td><input type="text" name="heure_planning" value="<?php echo $heure; ?>" readonly="readonly"></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td width="50%">Equipe :</td>
        <td width="50%"><input name="id_equipe" type="hidden" value="<?php echo $IE; ?>">
          <input type="text" name="lib_equipe" readonly="readonly" value="<?php
			$sql1="SELECT * FROM equipe WHERE id_equipe='$IE' ORDER BY lib_equipe";
			$result1=mysql_query($sql1);
			if ($row1=mysql_fetch_array($result1)) {
				extract($row1);
				echo $lib_equipe;
			}
		?>
        "></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Personnel :</td>
        <td><select name="id_pers">
            <option value="" style="color:#FF0000">[personnel]</option>
            <?php
			$sql="SELECT * FROM personnel WHERE id_equipe='$id_equipe' ORDER BY prenom_pers";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo '<option value="'.$id_pers.'">'.$prenom_pers.' '.$nom_pers.'</option>';
			}
		?>
          </select> </td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Type :</td>
        <td><select name="type_planning" onChange="javascript:afficher();">
            <option value="RESERVE">RESERVE</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre"> 
        <td>Dur&eacute;e :</td>
        <td><select name="duree_planning">
            <option value="15">15 mn</option>
            <option value="30">30 mn</option>
            <option value="45">45 mn</option>
            <option value="60">1 hr</option>
            <option value="120">2 hrs</option>
            <option value="180">3 hrs</option>
            <option value="240">4 hrs</option>
            <option value="360">6 hrs</option>
            <option value="480">8 hrs</option>
            <option value="720">12 hrs</option>
          </select></td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig3"> 
        <td>Client :</td>
        <td><select name="id_client">
            <option value="" style="color:#FF0000">[client]</option>
            <?php
			$sql="SELECT * FROM clients ORDER BY prenom_client";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo '<option value="'.$id_client.'">'.$prenom_client.' '.$nom_client.'</option>';
			}
		?>
          </select> </td>
      </tr>
      <tr bgcolor="#000000" class="table_titre" id="lig4"> 
        <td>Commentaires :</td>
        <td><textarea name="commentaire"></textarea></td>
      </tr>
      <tr class="table_titre"> 
        <td><div align="right"> 
            <input type="button" name="Annuler" value="Annuler" class="submit" onClick="MM_goToURL('parent','<?php if ($opt=='hebdo') echo "hebdomadaire.php"; else echo "quotidien.php"; ?>');return document.MM_returnValue">
          </div></td>
        <td><div align="left"> 
            <input type="submit" name="Submit" value="Valider" class="submit">
          </div></td>
      </tr>
    </table>
  </form>
  <?php
		}
	}
?>
</body>
</html>