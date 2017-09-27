<?php
	require("../includes/const_decl.php");
	$id_client=$_REQUEST['id'];
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
<link rel="stylesheet" href="design/styles.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../design/nyroModal.css" type="text/css" media="screen" />
<script type="text/javascript" src="../scripts/verifier_pseudo.js"></script>
<script type="text/javascript" src="../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.nyroModal-1.5.2.pack.js"></script>
</head>

<body>
  <?php
	$sql="SELECT * FROM factures WHERE id_client='$id_client' ORDER BY date_facture DESC";
	$results=mysql_query($sql);
	while ($rows=mysql_fetch_array($results)) {
		extract($rows);
		$DF=explode('-',$date_facture);
		echo '
		<table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table" bgcolor="#000000">
		  <tr> 
			<td colspan="5"><div align="center"><b><u><font size="2">Facture N&deg; '.$id_facture.' du '.$DF[2].'/'.$DF[1].'/'.$DF[0].'</font></u></b></div></td>
		  </tr>
		  <tr>
			<td><div align="center"><strong>#</strong></div></td>
			<td><div align="center"><strong>D&eacute;signation</strong></div></td>
			<td><div align="center"><strong>Nombre</strong></div></td>
			<td><div align="center"><strong>Prix Unitaire</strong></div></td>
			<td><div align="center"><strong>Montant</strong></div></td>
		  </tr>';
		$i=1;
		$tot=0;
		$sql="SELECT *, detail_factures.tarif_service FROM detail_factures
		INNER JOIN services ON services.id_service=detail_factures.id_service
		WHERE id_facture='$id_facture'";
		$resultats=mysql_query($sql);
		while ($ligs=mysql_fetch_array($resultats)) {
			extract($ligs);
			$tot+=$qte_panier_client*$tarif_service;
?>
  <tr> 
    <td><div align="center"><?php echo $i; ?></div></td>
    <td><?php echo utf8_encode($lib_service); ?></td>
    <td><div align="center"><?php echo $qte_panier_client; ?> fichier(s)</div></td>
    <td><div align="center">&euro; <?php echo number_format($tarif_service,2,'.',''); ?></div></td>
    <td><div align="center">&euro; <?php echo number_format($qte_panier_client*$tarif_service,2,'.',''); ?></div></td>
  </tr>
  <?php
	$i++;
	}
?>
  <tr> 
    <td colspan="5"><div align="center"> 
        <hr/>
      </div></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><strong>MONTANT TOTAL</strong></div></td>
    <td><div align="center"><font color="#FF0000">EUR &euro; <?php echo number_format($tot,2,'.',''); ?></font></div></td>
  </tr></table>
  <br>
  <?php
	}
?>
</body>
</html>
