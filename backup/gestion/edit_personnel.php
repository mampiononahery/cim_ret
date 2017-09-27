<?php
	require("../includes/const_decl.php");
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
<link rel="stylesheet" href="design/styles.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../design/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="../scripts/verifier_pseudo.js"></script>
<script type="text/javascript" src="../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.nyroModal-1.5.2.pack.js"></script>
</head>

<body>
<?php
	switch ($opt) {
		case 'maj' :
			$id=$_REQUEST['id'];
			$sql="SELECT * FROM personnel WHERE id_pers='$id'";
			$result=mysql_query($sql);
			if ($row=mysql_fetch_array($result)) {
				extract($row);
				$IE=$id_equipe;
?>
<form action="cod_personnel.php" enctype="multipart/form-data" name="maj_pers" method="post">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr>
      <td class="table_entete" height="30px">Equipe :</td>
      <td><select name="id_equipe">
          <option value="" style="color:#FF0000"><?php echo utf8_encode('équipe'); ?></option>
          <?php
		  	$sql="SELECT * FROM equipe ORDER BY lib_equipe";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				if ($id_equipe==$IE)
					echo '<option value="'.$id_equipe.'" selected>'.$lib_equipe.'</option>';
				else
					echo '<option value="'.$id_equipe.'">'.$lib_equipe.'</option>';
			}
		  ?>
        </select></td>
    </tr>
    <tr> 
      <td width="20%" class="table_entete" height="30px">ID :</td>
      <td width="80%"><?php echo $id_pers; ?> <input type="hidden" name="id_pers" value="<?php echo $id_pers; ?>"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Pseudo :</td>
      <td><input type="text" name="login_pers" value="<?php echo utf8_encode($login_pers); ?>" disabled></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Mot de passe :</td>
      <td><input type="text" name="pwd_pers" value="<?php echo utf8_encode($pwd_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Sexe :</td>
      <td><select name="sexe_pers">
          <option value="" style="color:#FF0000">sexe</option>
          <option value="femme" <?php if (utf8_encode($sexe_pers)=='femme') echo 'selected'; ?>>femme</option>
          <option value="homme" <?php if (utf8_encode($sexe_pers)=='homme') echo 'selected'; ?>>homme</option>
        </select> </td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Nom :</td>
      <td><input type="text" name="nom_pers" value="<?php echo utf8_encode($nom_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Pr&eacute;noms :</td>
      <td><input type="text" name="prenom_pers" value="<?php echo utf8_encode($prenom_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">E-mail :</td>
      <td><input type="text" name="mail_pers" value="<?php echo utf8_encode($mail_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">N&eacute;(e) le :</td>
      <td> 
        <?php
			if ($datenais_pers!='0000-00-00') {
				$DN=explode('-',$datenais_pers);
			}	
		?>
        <select name="jour">
          <option value="" style="color:#FF0000">jour</option>
          <?php
				for ($i=1;$i<32;$i++) {
					if (strlen($i)<2)
						if ($DN[2]=='0'.$i)
							echo '<option value="0'.$i.'" selected>0'.$i.'</option>';
						else
							echo '<option value="0'.$i.'">0'.$i.'</option>';
					else
						if ($DN[2]==$i)
							echo '<option value="'.$i.'" selected>'.$i.'</option>';
						else
							echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
        </select> <select name="mois">
          <option value="" style="color:#FF0000">mois</option>
          <?php
				for ($i=1;$i<13;$i++) {
					if (strlen($i)<2)
						if ($DN[1]=='0'.$i)
							echo '<option value="0'.$i.'" selected>0'.$i.'</option>';
						else
							echo '<option value="0'.$i.'">0'.$i.'</option>';
					else
						if ($DN[1]==$i)
							echo '<option value="'.$i.'" selected>'.$i.'</option>';
						else
							echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
        </select> <select name="annee">
          <option value="" style="color:#FF0000"><?php echo utf8_encode('année');?></option>
          <?php
				for ($i=1900;$i<date('Y')+1;$i++) {
					if ($DN[0]==$i)
						echo '<option value="'.$i.'" selected>'.$i.'</option>';
					else
						echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
        </select> </td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">A :</td>
      <td><input type="text" name="lieunais_pers" value="<?php echo utf8_encode($lieunais_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">T&eacute;l&eacute;phone :</td>
      <td><input type="text" name="tel_pers" value="<?php echo utf8_encode($tel_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Portable :</td>
      <td><input type="text" name="portable_pers" value="<?php echo utf8_encode($portable_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Adresse :</td>
      <td><input type="text" name="adr_pers" value="<?php echo utf8_encode($adr_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Ville :</td>
      <td><input type="text" name="ville_pers" value="<?php echo utf8_encode($ville_pers); ?>" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Code postal :</td>
      <td><input type="text" name="cp_pers" value="<?php echo utf8_encode($cp_pers); ?>" autocomplete="off">
        <input type="hidden" name="opt" value="<?php echo $opt; ?>"> 
      </td>
    </tr>
    <tr> 
      <td height="30px" colspan="2" class="table_entete"><div align="center"> 
          <input type="submit" name="Submit" value="Enregistrer" class="submit">
        </div></td>
    </tr>
  </table>
</form>
<?php
			}
		break;
	case 'new' :
?>
<form action="cod_personnel.php" enctype="multipart/form-data" name="new_pers" method="post">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#AFA99B">
    <tr>
      <td height="30px" class="table_entete">Equipe :</td>
      <td><select name="id_equipe">
          <option value="" style="color:#FF0000"><?php echo utf8_encode('équipe'); ?></option>
		  <?php
		  	$sql="SELECT * FROM equipe ORDER BY lib_equipe";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
				echo '<option value="'.$id_equipe.'">'.$lib_equipe.'</option>';
			}
		  ?>
        </select></td>
    </tr>
    <tr> 
      <td width="20%" height="30px" class="table_entete">Pseudo :</td>
      <td width="80%"><input type="text" name="login_pers" onKeyUp="verifier_pseudo(this.value)" autocomplete="off"> <div id="detect_pseudo" style="width='400px';"></div></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Mot de passe :</td>
      <td><input type="text" name="pwd_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Sexe :</td>
      <td><select name="sexe_pers">
          <option value="" style="color:#FF0000">sexe</option>
          <option value="femme">femme</option>
          <option value="homme">homme</option>
        </select> </td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Nom :</td>
      <td><input type="text" name="nom_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Pr&eacute;noms :</td>
      <td><input type="text" name="prenom_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">E-mail :</td>
      <td><input type="text" name="mail_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">N&eacute;(e) le :</td>
      <td> <select name="jour">
          <option value="" style="color:#FF0000">jour</option>
          <?php
				for ($i=1;$i<32;$i++) {
					if (strlen($i)<2)
						echo '<option value="0'.$i.'">0'.$i.'</option>';
					else
						echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
        </select> <select name="mois">
          <option value="" style="color:#FF0000">mois</option>
          <?php
				for ($i=1;$i<13;$i++) {
					if (strlen($i)<2)
						echo '<option value="0'.$i.'">0'.$i.'</option>';
					else
						echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
        </select> <select name="annee">
          <option value="" style="color:#FF0000"><?php echo utf8_encode('année');?></option>
          <?php
				for ($i=1900;$i<date('Y')+1;$i++) {
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
			?>
        </select> </td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">A :</td>
      <td><input type="text" name="lieunais_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">T&eacute;l&eacute;phone :</td>
      <td><input type="text" name="tel_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Portable :</td>
      <td><input type="text" name="portable_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Adresse :</td>
      <td><input type="text" name="adr_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Ville :</td>
      <td><input type="text" name="ville_pers" autocomplete="off"></td>
    </tr>
    <tr> 
      <td class="table_entete" height="30px">Code postal :</td>
      <td><input type="text" name="cp_pers" autocomplete="off"> <input type="hidden" name="opt" value="<?php echo $opt; ?>"> 
      </td>
    </tr>
    <tr> 
      <td height="30px" colspan="2" class="table_entete"><div align="center"> 
          <input type="submit" name="Submit" value="Enregistrer" class="submit" id="Submit">
        </div></td>
    </tr>
  </table>
</form>
<?php
		break;
	}
?>
</body>
</html>
