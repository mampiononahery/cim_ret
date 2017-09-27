<?php
	require("../includes/const_decl.php");
	
	if (!empty($_REQUEST['nb_formule'])) {
		$nb_formule=$_REQUEST['nb_formule'];
	}
	else {
		$nb_formule=0;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="design/styles.css" type="text/css" media="screen" />
<title>ajout de formules</title>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center" <?php if ($nb_formule==0) { ?>style="display:none"<?php } ?>>
	<tr>
    	<td align="center" width="10%">#</td>
        <td align="center">D&eacute;signation formule</td>
        <td align="center">Nombre de photos</td>
        <td align="center">Remise (%)</td>
    </tr>
    <?php
		for($i=0;$i<$nb_formule;$i++) {
	?>
    		<tr>
            	<td align="center"><?php echo $i+1; ?></td>
            	<td align="center"><input type="text" name="lib_formule[]" autocomplete="off" /></td>
                <td align="center"><input type="text" name="nb_photos[]" value="0" onKeyPress="return checkIt(event)" style="text-align:right" autocomplete="off" /></td>
                <td align="center"><input type="text" name="remise[]" value="0" onKeyPress="return checkIt(event)" style="text-align:right" autocomplete="off" /></td>
            </tr>
	<?php
		}
	?>
</table>
</body>
</html>