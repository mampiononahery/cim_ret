<?php
	session_start();
	
	if (empty($_SESSION['login_pers']))
		header("Location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
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
</head>
<body>
<ul id="menuDeroulant">
  <li> <a href="javascript:;">BASE DE DONNEES</a> 
    <ul class="sousMenu">
      <li><a href="photos.php">Photos</a></li>
      <li><a href="newsletters.php">Abonnés newsletters</a></li>
      <li><a href="clients.php">Clients</a></li>
      <li><a href="equipes.php">Equipes</a></li>
      <li><a href="personnels.php">Personnels</a></li>
      <li><a href="services.php">Services et Tarifs</a></li>
      <li><a href="tirages.php">Tirages et Tarifs</a></li>
      <li><a href="promos.php">Codes promo</a></li>
    </ul>
  </li>
  <li> <a href="javascript:;">FICHIERS</a> 
    <ul class="sousMenu">
      <li><a href="oooophoto.php">T&eacute;l&eacute;charger (OOOOPHOTO.COM)</a></li>
	  <li><a href="choix_client.php">Livraison (myretooch.com)</a></li>
      <li><a href="livraison.php">V&eacute;rification livraison (myretooch.com)</a></li>
    </ul>
  </li>
  <li> <a href="javascript:;">AGENDA</a> 
    <ul class="sousMenu">
      <li><a href="planning.php">Disponibilit&eacute;</a></li>
      <li><a href="hebdomadaire.php">Hebdomadaire</a></li>
      <li><a href="quotidien.php">Quotidien</a></li>
    </ul>
  </li>
  <li> <a href="javascript:;">GESTION</a> 
    <ul class="sousMenu">
      <li><a href="ca.php">Chiffres d'affaires</a></li>
      <li><a href="facts.php">Factures</a></li>
    </ul>
  </li>
  <li> <a href="javascript:;">STATS</a>
  	<ul class="sousMenu">
  		<li><a href="visiteurs.php">VISITEURS (<font color="#E31370"><?php
		$nb_visite=mysql_result(mysql_query("SELECT COUNT(ip) FROM visiteurs"),0);
		while (strlen($nb_visite)<6) {
			$nb_visite='0'.$nb_visite;
		}
		echo $nb_visite;
	?></font>)</a></li>
    <li><a href="audiences.php">STATISTIQUES</a></li>
    </ul>
  </li>
  <li> <a href="cod_logout.php"><?php echo strtoupper($_SESSION['login_pers']); ?> - D&eacute;connexion</a> 
  </li>
</ul>
<div style="margin-top:185px"></div>
</body>
</html>