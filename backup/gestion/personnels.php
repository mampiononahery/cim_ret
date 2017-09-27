<?php
	require("../includes/const_decl.php");
	include 'menu.php';
	if (!empty($_REQUEST['offset']))
		$offset=$_REQUEST['offset'];
	else
		$offset=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<meta name="google-site-verification" content="aMiKad3AJKizrwF0zdO6HavShyOoDcbrGpORMThJEUg" />
<title>myretooch.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
	<link rel="stylesheet" type="text/css" href="design/styles.css" title="default" media="screen" />
	<link rel="icon" href="../favicon.ico"/>
	<script type="text/javascript" src="../scripts/verifier_pseudo.js"></script>
	<script language="JavaScript" type="text/javascript">
		function supprimer(i,j) {
			if (confirm('Etes-vous s�r de vouloir supprimer '+j+' ?')) {
				document.location.href='cod_personnel.php?id='+i+'&opt=suppr';
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
<table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
  <caption>
  LES PERSONNELS 
  </caption>
  <tr bgcolor="#000000" class="table_entete"> 
    <td align="center">#</td>
    <td><div align="center"><img src="images/ImgDelete.gif" width="16" height="16"></div></td>
    <td>Personnels</td>
    <td>Equipes</td>
    <td align="center">Sexe</td>
    <td>T&eacute;l&eacute;phones</td>
    <td>Portables</td>
    <td><div align="center"><a href="edit_personnel.php?opt=new" title="Nouveau personnel" class="nyroModal"><img src="images/edit_add-32.png" width="16" height="16"></a></div></td>
  </tr>
  <?php
  	$lignes=20;
	$previousoffset=$offset-$lignes;
	$nextoffset=$offset+$lignes;
  	$i=1;
  	$sql="SELECT * FROM personnel
		INNER JOIN equipe ON equipe.id_equipe=personnel.id_equipe
		ORDER BY prenom_pers";
	$results=mysql_query($sql);
	$trouve=mysql_num_rows($results);
	$sql.=" LIMIT ".$offset.",".$lignes;
	$results=mysql_query($sql);
	while ($rows=mysql_fetch_array($results)) {
		extract($rows);
  ?>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_contenu"> 
    <td align="center" height="30px"><?php echo $i; ?></td>
    <td><div align="center"><a href="javascript:;" onClick="supprimer('<?php echo $id_pers; ?>','<?php echo $prenom_pers.' '.$nom_pers; ?>');" title="supprimer <?php echo $prenom_pers.' '.$nom_pers; ?>"><img src="images/ImgDelete.gif" width="16" height="16"></a></div></td>
    <td><a href="edit_personnel.php?opt=maj&id=<?php echo $id_pers; ?>" class="nyroModal" title="<?php echo $prenom_pers.' '.$nom_pers; ?>"><?php echo $prenom_pers.' '.$nom_pers; ?></a></td>
    <td><?php echo $lib_equipe; ?></td>
    <td align="center"><?php if ($sexe_pers=='femme') { ?>
		<img src="images/sexe_femme.gif" title="f�minin">
	<?php
		}
		else if ($sexe_pers=='homme') {
	?>
		<img src="images/sexe_homme.gif" title="masculin">
	<?php
		}
		else {
			echo '&nbsp;';
		}
	?>
	</td>
    <td><?php echo $tel_pers; ?></td>
    <td colspan="2"><?php echo $portable_pers; ?></td>
  </tr>
  <?php
  	$i++;
  	}
  ?>
</table>
<br>
<table width="991px" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><?php
					if ($offset>0) {
				?>
                  <a href="personnels.php?offset=<?php echo $previousoffset ; ?>"> 
                  <?php
                    	echo "Pr�c�dent";
					}
					
				?>
                  </a></div></td>
    <td align="center"><?php 
					for ($x=0,$page=1;$x<$trouve;$x+=$lignes,$page++)
					{	
						if (($x<$offset) || ($x>($offset+$lignes-1)))
						{
				?>
                  <a href="personnels.php?offset=<?php echo $x ; ?>"> 
                  <?php 
							echo ($page . " ");
				?>
                  </a> 
                  <?php
						}
						else
						{
							echo ($page);
						}
					}
				?></td>
    <td align="center"><?php 
					if ($trouve>$nextoffset)
					{
				?>
                  <a href="personnels.php?offset=<?php echo $nextoffset; ?>"> 
                  <?php
						echo "Suivant";
					}
					
				?>
                  </a></td>
  </tr>
</table>
</body>
</html>