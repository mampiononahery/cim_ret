<?php
	require("../includes/const_decl.php");
	include 'menu.php';
	set_time_limit(0);
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
function factures() {
		var form=document.forms["ftp_local"]
		var option='<select name="id_facture">'
		option=option+'<option value name="id_facture" style="color:#FF0000">[factures]</option>'
		texte = file('verif_fact.php?id_client='+escape(form.id_client.value))
		tab=texte.split("/")
		for (var i=0; i<tab.length-1; i++) {
			tabl=tab[i].split("*")
			option=option+'<option value="'.concat(tabl[0])+'">'+'FACTURE N° '.concat(tabl[0])+' du '.concat(tabl[1])+'</input>'
		}
		inputtext=option+'</select>'
		writediv(option);
	}

function file(fichier)
	{
		if(window.XMLHttpRequest) // FIREFOX
			xhr_object = new XMLHttpRequest();
		else if(window.ActiveXObject) // IE
			xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		else
			return(false);
		xhr_object.open("GET", fichier, false);
		xhr_object.send(null);
		if(xhr_object.readyState == 4) return(xhr_object.responseText);
		else return(false);
	}
	
function writediv(texte)
	{
		document.getElementById('det_fact').innerHTML = texte;
	}	
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function completer() {
	var form=document.forms["ftp_local"]
	if (form.id_client.value=="") {
		form.id_client.focus()
		return false
	}
	if (form.id_facture.value=="") {
		form.id_facture.focus()
		return false
	}
}
//-->
</script>
</head>

<body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status=''; return true;">
<div id="main">
<form name="ftp_local" action="myretooch.php" enctype="multipart/form-data" method="post" onsubmit="return completer()">
  <table width="991px" border="0" align="center" cellpadding="2" cellspacing="1">
    <caption>
    myretooch.com 
    </caption>
    <tr bgcolor="#000000" class="table_entete"> 
        <td width="15%">CLIENT :</td>
      <td width="85%"><select name="id_client" onChange="factures()">
          <option value="" style="color:#FF0000">[client]</option>
          <?php
			$sql="SELECT * FROM clients ORDER BY prenom_client";
			$results=mysql_query($sql);
			while ($rows=mysql_fetch_array($results)) {
				extract($rows);
		?>
          <option value="<?php echo $id_client; ?>"><?php echo $prenom_client.' '.$nom_client; ?></option>
          <?php
			}
		?>
        </select></td>
    </tr>
    <tr bgcolor="#000000" class="table_entete"> 
        <td>FACTURE :</td>
      <td><div id="det_fact"></div></td>
    </tr>
    <tr bgcolor="#000000" class="table_entete">
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Go" class="submit"></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>