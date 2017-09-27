<?php
	require("../includes/const_decl.php");
	include 'menu.php';
	
	$apres=array();
	$avant=array();
	
	if (!empty($_REQUEST['offset']))
		$offset=$_REQUEST['offset'];
	else
		$offset=0;
	
	if (!empty($_REQUEST['dossier']))
		$dossier=$_REQUEST['dossier'];
	else
		$dossier='../photos/beaute/';
	
	if ($dossier!='../photos/presse-magazine/') {
		$folder = $dossier.'apres/';
		$repertoire = opendir($folder);
		$i=0;
		while ($Fichier = readdir($repertoire)) {
		  if ($Fichier != "." && $Fichier != "..") {
			$nomFichier = $folder.$Fichier;
			if (substr($nomFichier,strlen($nomFichier)-2,2)!='db') {
				//echo $nomFichier.'<br />';
				$apres[$i]=$nomFichier;
				$avant[$i]=$dossier.'avant/'.$Fichier;
				$i++;
			}
		  }
		}
		closedir($repertoire);
	}
	else {
		$repertoire = opendir($dossier);
		$i=0;
		while ($Fichier = readdir($repertoire)) {
		  if ($Fichier != "." && $Fichier != "..") {
			$nomFichier = $Fichier;
			if (substr($nomFichier,strlen($nomFichier)-2,2)!='db') {
				//echo $nomFichier.'<br />';
				$apres[$i]=$dossier.$nomFichier;
				$i++;
			}
		  }
		}
		closedir($repertoire);
	}
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
	function supprimer(i,j) {
		var form=document.forms["frm"]
		if (confirm('Etes-vous sûr de vouloir supprimer '+i+' ?')) {
			if (j!="")
				document.location.href='cod_photo.php?opt=suppr&apres='+i+'&avant='+j+'&dossier='+form.dossier.value;
			else
				document.location.href='cod_photo.php?opt=suppr&apres='+i+'&dossier='+form.dossier.value;
		}
	}
</script>
<!--nyroModal-->
<link rel="stylesheet" href="../design/nyroModal.css" type="text/css" media="screen" />
	
<script type="text/javascript" src="../scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.mousewheel.pack.js"></script>
<script type="text/javascript" src="../scripts/jquery.color.js"></script>
<script type="text/javascript" src="../scripts/jquery.nyroModal-1.5.2.js"></script>
<script type="text/javascript" language="JavaScript">
	//<![CDATA[
	// Demo NyroModal
	$(function() {
		$.nyroModalSettings({
			debug: false,
			processHandler: function(settings) {
				var url = settings.url;
				if (url && url.indexOf('http://www.youtube.com/watch?v=') == 0) {
					$.nyroModalSettings({
						type: 'swf',
						height: 355,
						width: 425,
						url: url.replace(new RegExp("watch\\?v=", "i"), 'v/')
					});
				}
			},
			endShowContent: function(elts, settings) {
				$('.resizeLink', elts.contentWrapper).click(function(e) {
					e.preventDefault();
					$.nyroModalSettings({
						width: Math.random()*1000,
						height: Math.random()*1000
					});
					return false;
				});
				$('.bgLink', elts.contentWrapper).click(function(e) {
					e.preventDefault();
					$.nyroModalSettings({
						bgColor: '#'+parseInt(255*Math.random()).toString(16)+parseInt(255*Math.random()).toString(16)+parseInt(255*Math.random()).toString(16)
					});
					return false;
				});
			}
		});
		
		$('#manual').click(function(e) {
			e.preventDefault();
			var content = 'Content wrote in JavaScript<br />';
			jQuery.each(jQuery.browser, function(i, val) {
				content+= i + " : " + val+'<br />';
			});
			$.fn.nyroModalManual({
				bgColor: '#3333cc',
				content: content
			});
			return false;
		});
		$('#manual2').click(function(e) {
			e.preventDefault();
			$('#imgFiche').nyroModalManual({
				bgColor: '#cc3333'
			});
			return false;
		});
		$('#myValidForm').submit(function(e) {
			e.preventDefault();
			if ($("#myValidForm :text").val() != '') {
				$('#myValidForm').nyroModalManual();
			} else {
				alert("Enter a value before going to " + $('#myValidForm').attr("action"));
			}
			return false;
		});
		$('#block').nyroModal({
			'blocker': '#blocker'
		});
		
		function preloadImg(image) {
			var img = new Image();
			img.src = image;
		}
		
		preloadImg('img/ajaxLoader.gif');
		preloadImg('img/prev.gif');
		preloadImg('img/next.gif');
		
	});
	
	// Page enhancement
	$(function() {
		var allPre = $('pre');
		allPre.each(function() {
			var pre = $(this);
			var link = $('<a href="#" class="showCode">Show Code</a>');
			pre.hide().before(link).before('<br />');
			link.click(function(event) {
					event.preventDefault();
					pre.slideToggle('fast');
					return false;
				});
		});
		var shown = false;
		$('#showAllCodes').click(function(event) {
			event.preventDefault();
			if (shown)
				allPre.slideUp('fast');
			else
				allPre.slideDown('fast');
			shown = !shown;
			return false;
		});
	});
	
	//]]>
	</script>
	<style type="text/css">
		#blocker {
			width: 300px;
			height: 300px;
			background: red;
			padding: 30px;
			border: 5px solid green;
		}
	</style>
<!--nyroModal-->
</head>
<body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status=''; return true;">
  <form name="frm" action="photos.php" method="post" enctype="multipart/form-data">
  <table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
    <caption>
    DOSSIER<br><select name="dossier" onchange="javascript:form.submit()">
    	<option value="../photos/beaute/" <?php if ($dossier=='../photos/beaute/') echo 'selected'; ?>>MODE & BEAUTE</option>
        <option value="../photos/montage/" <?php if ($dossier=='../photos/montage/') echo 'selected'; ?>>MONTAGE, RELOOKING, REPARATION</option>
        <option value="../photos/mariage/" <?php if ($dossier=='../photos/mariage/') echo 'selected'; ?>>MARIAGE</option>
        <option value="../photos/presse-magazine/" <?php if ($dossier=='../photos/presse-magazine/') echo 'selected'; ?>>PRESSE MAGAZINE</option>
        <option value="../photos/objet/" <?php if ($dossier=='../photos/objet/') echo 'selected'; ?>>OBJET</option>
        <option value="../photos/famille/" <?php if ($dossier=='../photos/famille/') echo 'selected'; ?>>PHOTOS DE FAMILLE</option>
    </select>
    </caption>
    <tr bgcolor="#000000" class="table_entete"> 
      <td align="center">#</td>
      <td align="center"><img src="images/ImgDelete.gif" width="16" height="16"></td>
      <td align="center">
      	<?php
			if ($dossier!='../photos/presse-magazine/') {
		?>
		      	AVANT / APRES
        <?php
			}
			else {
		?>
        		PRESSE MAGAZINE
        <?php
			}
		?>
      </td>
      <td><div align="center"><a href="edit_photo.php" title="Nouvelle photo" class="nyroModal"><img src="images/edit_add-32.png" width="16" height="16"></a></div></td>
    </tr>
    <?php
  		for ($i=0;$i<=sizeof($apres)-1;$i++) {
	?>
    <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_contenu"> 
      <td align="center" height="30px"><?php echo $i+1; ?></td>
      <td><div align="center">
      	<?php
			if ($dossier!='../photos/presse-magazine/') {
		?>
      	<a href="javascript:;" onClick="supprimer('<?php echo $apres[$i]; ?>','<?php echo $avant[$i]; ?>');" title="Supprimer <?php echo $apres[$i]; ?> ?"><img src="images/ImgDelete.gif" width="16" height="16"></a>
        <?php
			}
			else {
		?>
        	<a href="javascript:;" onClick="supprimer('<?php echo $apres[$i]; ?>','');" title="Supprimer <?php echo $apres[$i]; ?> ?"><img src="images/ImgDelete.gif" width="16" height="16"></a>
        <?php
			}
		?>
        </div></td>
      <td align="center" colspan="2">
      	<?php
			if ($dossier!='../photos/presse-magazine/') {
		?>
      <img src="<?php echo $avant[$i]; ?>" width="166px" height="250px" style="border:2px solid #E938AF" /> &nbsp;<img src="<?php echo $apres[$i]; ?>" width="166px" height="250px" style="border:2px solid #E938AF" />
      	<?php
			}
			else {
		?>
        	<img src="<?php echo $apres[$i]; ?>" width="166px" height="250px" style="border:2px solid #E938AF" />
        <?php
			}
		?>
      </td>
    </tr>
    <?php
  	}
  ?>
  </table>
  </form>
</body>
</html>
