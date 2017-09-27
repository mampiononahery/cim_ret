<?php
	require("../includes/const_decl.php");
	include 'menu.php';
	
	//set_time_limit(0);

	if (empty($_GET['dossier']))
		$dossier='/';
	else
		$dossier=$_GET['dossier'];
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
<form name="ftp_local" action="cod_download.php" enctype="multipart/form-data" method="post">
  <table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
    <caption>
    LES FICHIERS A TRAITER
    </caption>
    <tr bgcolor="#000000" class="table_entete"> 
      <td colspan="2"> <div align="center">Nom</div></td>
      <td width="15%"><div align="center">Type</div></td>
      <td width="8%" align="center">Date</td>
      <td width="8%"><div align="center">Taille</div></td>
      <td width="7%" align="center">Aper&ccedil;u</td>
    </tr>
    <?php
		if ($dossier!='/') {
	?>
    <tr class="table_contenu"> 
      <td width="1%">&nbsp;</td>
      <td width="15%"><a href="javascript:history.go(-1);"><img src="images/Top-arrow-32.png" height="16px" title="dossier parent"></a></td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <?php
		}
	?>
    <?php
		//liste des dossiers
		// création de la connexion
		$Connexion = ftp_connect(FTPSERVER);
		ftp_login($Connexion, FTPLOGIN, FTPPASSWORD);
		
		// récupération de la liste des dossiers
		$ListeFichier = ftp_nlist($Connexion, $dossier);
		$i=1;
		foreach($ListeFichier as $Fichier) {
		  $Position = strrpos($Fichier , "/");
		  if(!isfile($Connexion,$Fichier)){
		  	$Type='Répertoire';
			if ((substr($Fichier, $Position+1)!='gestion') && (substr($Fichier, $Position+1)!='candidats')) {
	?>
    <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_contenu"> 
      <td width="1%"><div align="center"> <img src="images/folder-32.png" height="16px" title="dossier"> 
        </div></td>
      <td width="15%"><a href="oooophoto.php?dossier=<?php echo $dossier.substr($Fichier, $Position+1).'/'; ?>"><?php echo utf8_decode(substr($Fichier, $Position+1)); ?></a></td>
      <td><div align="center"><?php echo $Type; ?></div></td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <?php
			}
		}
		$i++;
		}
	?>
    <?php
		// récupération de la liste des fichiers
		$ListeFichier = ftp_nlist($Connexion, $dossier);
		foreach($ListeFichier as $Fichier) {
		  $Position = strrpos($Fichier , "/");
		  if(isfile($Connexion,$Fichier)) {
		  	$Type='Fichier '.substr(substr($Fichier, $Position),strlen(substr($Fichier, $Position))-3,3);
			// ts mila mampiasa an ity                    if ((substr($Fichier, $Position+1)!='index.php') && (substr($Fichier, $Position+1)!='favicon.ico') && (substr($Fichier, $Position+1)!='Thumbs.db')) {
		
		
		$filname = substr($Fichier, $Position+1); 
		$acces = "download.php?" ;
		$exp=explode("/",$Fichier);	
		$ct=count($exp);
		if($ct>2){   /// ito manalay izay tsy repertoir rhtra
			$fdir = $exp[1]."/".$exp[2] ; 
			$dir= $fdir.$filname;
	?>
    <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_contenu"> 
      <td width="1%"><div align="center"> <img src="images/File_32.png" height="16px" title="fichier"> 
        </div></td>
     <!--                 ito miala  <td width="15%"><a href="http://www.oooophoto.com/<?php echo substr($dossier,1,strlen($dossier)); ?><?php echo substr($Fichier, $Position+1); ?>"><?php echo substr($Fichier, $Position+1); ?></a></td>!-->
	 
	   <td width="15%"><?php print "<a href='".$acces."num=".$fdir."&fil=".$filname."'>".utf8_decode(substr($Fichier, $Position+1))."</a>" ; ?></td>
	   
      <td><div align="center"><?php echo $Type; ?></div></td>
      <td align="center"><?php $buff=@ftp_mdtm($Connexion,$Fichier); echo date('d/m/Y H:i:s',$buff); ?></td>
      <td><div align="right"> 
          <?php if (ftp_size($Connexion,$Fichier)!=-1) echo GetSizeName(ftp_size($Connexion,$Fichier)); ?>
        </div></td>
      <td align="center"><img class="thumbnail" src="http://www.oooophoto.com/<?php echo substr($dossier,1,strlen($dossier)); ?><?php echo substr($Fichier, $Position+1); ?>" height="56"></td>
    </tr>
    <?php
			}
		}
		$i++;
		}
		ftp_close($Connexion);
	?>
  </table>
</form>
</body>
</html>