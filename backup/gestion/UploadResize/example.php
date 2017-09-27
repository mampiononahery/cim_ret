<?php 
session_start();
require('fonction.php'); //On appel nos fonctions
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Example</title>
</head>

<body>
<form action="#" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>Formulaire example :</p>
  <p>
    <label>
    <input type="file" name="xxx" id="xxx" />
    <?php //echo 'Maximum file size: ' . convertBytes( ini_get( 'upload_max_filesize' ) ) / 1048576 . 'Mo'; ?>    </label>
    <label>
    <input type="submit" name="Submit" id="Submit" value="Envoyer" />
    </label>
  </p>
</form>
<?php 
if(isset($_POST['Submit']))
{
	// UploadChangeSize($dossier, $taille_x, $taille_y, $file_name);
    getImgResize('miniature/',366,550,'xxxx'); // Modifie la photo pour avoir 150x200px.
} 
?>
</body>
</html>
