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
		function supprimer(i) {
			if (confirm('Etes-vous sûr de vouloir supprimer '+i+' ?')) {
				document.location.href='cod_promo.php?id='+i+'&opt=suppr&offset='+'<?php echo $offset; ?>';
			}
		}
		
		function distribuer(y) {
			var form=document.forms["form_code"]
			var tmp_chk=eval("form.ok"+y+".checked")
			//var tmp_focus=eval("form.c"+y+".focus()")
			//var tmp_val=eval("form.c"+y+".value")
			if (tmp_chk) {
				form.action="cod_promo.php?opt=distribue&id_promo="+y+"&offset="+'<?php echo $offset; ?>'
				form.submit()
			}
			else {
				form.action="cod_promo.php?opt=dedistribue&id_promo="+y+"&offset="+'<?php echo $offset; ?>'
				form.submit()
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
<form action="cod_promo.php" enctype="multipart/form-data" method="post" name="form_code">
<table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
  <caption>
  CODES PROMOTION 
  </caption>
  <tr bgcolor="#000000" class="table_entete"> 
    <td align="center">#</td>
    <td ><div align="center"><img src="images/ImgDelete.gif" width="16" height="16"></div></td>
    <td align="center">Codes</td>
    <td align="center">Date de cr&eacute;ation</td>
    <td align="center">Attribu&eacute; &agrave; </td>
    <td align="center">Nombre de<br />
      photos gratuites</td>
    <td align="center">Activ&eacute;</td>
    <td ><div align="center"><a href="edit_promo.php?opt=new&offset=<?php echo $offset; ?>" title="Nouveaux codes promo" class="nyroModal"><img src="images/edit_add-32.png" width="16" height="16"></a></div></td>
  </tr>
  <?php
  	$lignes=15;
	$previousoffset=$offset-$lignes;
	$nextoffset=$offset+$lignes;
  	$i=1;
  	$sql="SELECT * FROM promos ORDER BY date_creation DESC, id_promo, active";
	$results=mysql_query($sql);
	$trouve=mysql_num_rows($results);
	$sql.=" LIMIT ".$offset.",".$lignes;
	$results=mysql_query($sql);
	while ($rows=mysql_fetch_array($results)) {
		extract($rows);
		$DC=explode('-',$date_creation);
		$IC=$attribuer;
  ?>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_contenu"> 
    <td align="center" height="30"><?php echo $i; ?></td>
    <td><div align="center"> 
        <a href="javascript:;" onClick="supprimer('<?php echo $id_promo; ?>');" title="supprimer <?php echo $id_promo; ?>"><img src="images/ImgDelete.gif" width="16" height="16"></a>
      </div></td>
    <td align="center" title="<?php echo $id_promo; ?>"><a href="edit_promo.php?opt=maj&id=<?php echo $id_promo; ?>&offset=<?php echo $offset; ?>" class="nyroModal" title="Code Promo N°<?php echo $id_promo; ?>"><?php echo $id_promo; ?></a></td>
    <td align="center"><?php echo $DC[2].'/'.$DC[1].'/'.$DC[0]; ?></td>
    <td align="center"><?php echo $attribuer; ?></td>
    <td align="center"><?php echo number_format($nb_photo,0,'',' '); ?></td>
    <td align="center"><input type="checkbox" name="ok<?php echo $id_promo; ?>" id="ok" value="1" <?php if ($active==1) echo 'checked'; ?> onClick="return distribuer('<?php echo $id_promo; ?>');"></td>
    <td>&nbsp;</td>
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
                  <a href="promos.php?offset=<?php echo $previousoffset ; ?>"> 
                  <?php
                    	echo "Précédent";
					}
					
				?>
                  </a></div></td>
    <td align="center"><?php 
					for ($x=0,$page=1;$x<$trouve;$x+=$lignes,$page++)
					{	
						if (($x<$offset) || ($x>($offset+$lignes-1)))
						{
				?>
                  <a href="promos.php?offset=<?php echo $x ; ?>"> 
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
                  <a href="promos.php?offset=<?php echo $nextoffset; ?>"> 
                  <?php
						echo "Suivant";
					}
					
				?>
                  </a></td>
  </tr>
</table>
</form>
</body>
</html>