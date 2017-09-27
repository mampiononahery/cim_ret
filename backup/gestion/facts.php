<?php
	require("../includes/const_decl.php");
	include 'menu.php';
	
	$tot_foto=0;
	$tot_page=0;

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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<meta name="google-site-verification" content="aMiKad3AJKizrwF0zdO6HavShyOoDcbrGpORMThJEUg" />
<title>myretooch.com - Détails factures</title>
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
			if (confirm('Etes-vous sûr de vouloir supprimer '+j+' ?')) {
				document.location.href='cod_service.php?id='+i+'&opt=suppr';
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
<form action="facts.php" enctype="multipart/form-data" method="post">
<table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
  <caption>
  FACTURES<br>
  <select name="mois">
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
        </select>
        <select name="annee">
      <option value="" style="color:#FF0000;">ann&eacute;e</option>
      <?php
				for ($i=date('Y');$i<date('Y')+2;$i++) {
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
    <td align="center"><div align="center">N&deg;</div></td>
    <td align="center">Date Facture</td>
    <td align="center">Client</td>
    <td align="center">Nombre de fichiers</td>
    <td align="center">Montant</td>
    <td align="center">Date Livraison</td>
  </tr>
  <?php
  	$lignes=14;
	$previousoffset=$offset-$lignes;
	$nextoffset=$offset+$lignes;
  	$i=1;
  	$sql="SELECT * FROM factures WHERE date_facture LIKE '$maintenant[0]-$maintenant[1]%' ORDER BY id_facture DESC";
	$results=mysql_query($sql);
	$trouve=mysql_num_rows($results);
	$sql.=" LIMIT ".$offset.",".$lignes;
	$results=mysql_query($sql);
	while ($rows=mysql_fetch_array($results)) {
		extract($rows);
  ?>
  <tr <?php if ($i%2==0) echo 'bgcolor="#B0DBFD"'; else echo 'bgcolor="#D8EDFE"';?> class="table_contenu"> 
    <td align="center" height="30"><?php echo $i; ?></td>
    <td><div align="center"><a href="detail_fact.php?id=<?php echo $id_facture; ?>" class="nyroModal"><?php echo $id_facture; ?></a></div></td>
    <td align="center">
	<?php
		if ($date_facture!='0000-00-00') {
			$DF=explode('-',$date_facture);
			echo $DF[2].'/'.$DF[1].'/'.$DF[0];
		}
	?></a></td>
    <td><a href="edit_client.php?id=<?php echo $id_client; ?>" class="nyroModal"><?php echo $id_client; ?> - 
	<?php
		$query="SELECT * FROM clients WHERE id_client='$id_client'";
		$result=mysql_query($query);
		if ($row=mysql_fetch_array($result)) {
			extract($row);
			echo $prenom_client.' '.$nom_client;
		}
    ?></a></td>
    <td align="center">
	<?php
		$nb_foto=0;
		$query="SELECT * FROM detail_factures
		INNER JOIN services ON services.id_service=detail_factures.id_service
		WHERE id_facture='$id_facture'";
		$result=mysql_query($query);
		while ($ligs=mysql_fetch_array($result)) {
			extract($ligs);
			$nb_foto+=$qte_panier_client;
		}
		$tot_foto=$tot_foto+$nb_foto;
    	echo number_format($nb_foto,0,' ',' ');
	?></td>
    <td align="right">&euro;
	<?php
		$tot=0;
		$query="SELECT *, detail_factures.tarif_service  FROM detail_factures
		INNER JOIN services ON services.id_service=detail_factures.id_service
		WHERE id_facture='$id_facture'";
		$result=mysql_query($query);
		while ($ligs=mysql_fetch_array($result)) {
			extract($ligs);
			$tot+=$qte_panier_client*$tarif_service;
		}
		$tot_page=$tot_page+$tot;
    	echo number_format($tot,2,'.',' ');
	?></td>
    <td align="center">
	<?php
		if ($date_livraison!='0000-00-00') {
			$DL=explode('-',$date_livraison);
			echo $DL[2].'/'.$DL[1].'/'.$DL[0];
		}
		else {
			echo '<font color="#FF0000">non livré</font>';
		}
	?></td>
  </tr>
  <?php
  	$i++;
  	}
  ?>
  <tr bgcolor="#B0DBFD" class="table_contenu">
    <td height="30" colspan="4" align="center"><font color="#000000">Total de la page <?php echo ($offset/$lignes)+1; ?></font></td>
    <td align="center"><font color="#000000"><?php echo number_format($tot_foto,0,' ',' ');?></font></td>
    <td align="right"><font color="#000000">&euro; <?php echo number_format($tot_page,2,'.',' ');?></font></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr bgcolor="#B0DBFD" class="table_contenu">
    <td height="30" colspan="4" align="center"><font color="#000000">Total g&eacute;n&eacute;ral (<?php echo nom_mois($maintenant[1]).' '.$maintenant[0]; ?>)</font></td>
    <td align="center"><font color="#000000">
	<?php
		$query="SELECT SUM(qte_panier_client) FROM detail_factures
				INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
				WHERE date_facture LIKE '$maintenant[0]-$maintenant[1]%'";
		echo number_format(mysql_result(mysql_query($query),0),'0',' ',' ');
    ?></font>
    </td>
    <td align="right"><font color="#000000">&euro;
    <?php
		$query="SELECT SUM(qte_panier_client*tarif_service) FROM detail_factures
				INNER JOIN factures ON factures.id_facture=detail_factures.id_facture
				WHERE date_facture LIKE '$maintenant[0]-$maintenant[1]%'";
		echo number_format(mysql_result(mysql_query($query),0),2,'.',' ');
    ?></font>
    </td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<br>
<table width="991px" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><?php
					if ($offset>0) {
				?>
                  <a href="facts.php?offset=<?php echo $previousoffset ; ?>"> 
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
                  <a href="facts.php?offset=<?php echo $x ; ?>"> 
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
                  <a href="facts.php?offset=<?php echo $nextoffset; ?>"> 
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