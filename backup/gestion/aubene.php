<?php
	require("../includes/const_decl.php");
	include 'menu.php';
	if (!empty($_REQUEST['id_client']))
		$id_client=$_REQUEST['id_client'];
	if (!empty($_REQUEST['id_facture']))
		$id_facture=$_REQUEST['id_facture'];
	//set_time_limit(0);
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
<script language="JavaScript" type="text/javascript">
	function patienter() {
		var form=document.forms["ftp_transfert"]
		form.Submit.disabled=true
		form.Submit.value="Patientez..."
	}
</script>
</head>

<body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status=''; return true;">
<form action="cod_transfert.php" name="ftp_transfert" enctype="multipart/form-data" method="post" onSubmit="patienter();">
  <table width="991px" border="0" cellspacing="1" cellpadding="2" class="table" align="center">
    <caption>
    LIVRAISON<br>
    FACTURE N&deg; <?php echo $id_facture; ?> du <?php echo FormatDate(mysql_result(mysql_query("SELECT date_facture FROM factures WHERE id_facture='$id_facture'"),0),'d/m/y'); ?> 
    <br>
    de <?php echo mysql_result(mysql_query("SELECT prenom_client FROM clients WHERE id_client='$id_client'"),0); ?> <?php echo mysql_result(mysql_query("SELECT nom_client FROM clients WHERE id_client='$id_client'"),0); ?> 
    </caption>
    <tr bgcolor="#000000" class="table_entete"> 
      <td width="13%"><div align="center">Service(s) demand&eacute;(s)</div></td>
      <td width="12%"><div align="center">Nombre</div></td>
      <td width="33%" align="center">Fichier(s) à transf&eacute;rer</td>
    </tr>
    <?php
	//echo $dern_facture;
	$i=1;
	$sql="SELECT * FROM factures
		INNER JOIN detail_factures ON detail_factures.id_facture=factures.id_facture
		INNER JOIN services ON services.id_service=detail_factures.id_service
		WHERE factures.id_facture='$id_facture' AND id_client='$id_client'";
	//echo $sql;
	$resultat=mysql_query($sql);
	while($enr=mysql_fetch_array($resultat)) {
		extract($enr);
  ?>
    <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_contenu"> 
      <td><?php echo strtoupper($lib_service); ?>
        <input type="hidden" name="<?php echo ereg_replace('&eacute;','e',$lib_service); ?>" value="<?php echo ereg_replace('&eacute;','e',$lib_service); ?>" ></td>
      <td align="center"><div align="center" class="h7"><?php echo $qte_panier_client; ?> 
          fichier(s)</div></td>
      <td align="center"> 
        <?php
			for ($i=1;$i<=$qte_panier_client;$i++) {
	  	?>
        <?php echo $i;?> <input name="<?php echo ereg_replace(' ','_',ereg_replace('&eacute;','e',$lib_service).$i); ?>" type="file" autocomplete="off"><br/>
        <?php
			}
		?>
      </td>
    </tr>
    <?php
	}
	?>
    <tr> 
      <td colspan="3"><div align="center"> 
          <input type="submit" name="Submit" value="Transférer" class="submit">
          <input type="hidden" name="id_facture" value="<?php echo $id_facture; ?>">
		  <input type="hidden" name="id_client" value="<?php echo $id_client; ?>">
        </div></td>
    </tr>
  </table>
      </form>
</body>
</html>