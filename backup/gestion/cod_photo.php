<?php
	require("../includes/const_decl.php");
	//require("../includes/fctredimimage.php");
	//require("../includes/fonction.php");
	
	$opt=$_REQUEST['opt'];
	$dossier=$_REQUEST['dossier'];
	
	switch($opt) {
		case 'nouveau' :
			if ($dossier!='../photos/presse-magazine/') {
				$tmp_avant=$_FILES['avant']['tmp_name'];
				$nom_avant=ereg_replace(" ","_",$_FILES['avant']['name']);
				$nom_avant=strtr($nom_avant,'àâäçéèëêïîôöùûüÿ/','aaaceeeeiioouuuy/');
				
				$tmp_apres=$_FILES['apres']['tmp_name'];
				$nom_apres=$_FILES['apres']['name'];
				
				//echo $dossier.' '.$nom_avant.' '.$nom_apres;
				$new_avant="ftp://user06:321JamesiG@ftp.myretooch.com//".$dossier."avant/".$nom_avant;
				@copy($tmp_avant, $new_avant);
				
				$new_apres="ftp://user06:321JamesiG@ftp.myretooch.com//".$dossier."apres/".$nom_avant;
				@copy($tmp_apres, $new_apres);
			}
			else {
				$tmp_presse=$_FILES['presse']['tmp_name'];
				$nom_presse=ereg_replace(" ","_",$_FILES['presse']['name']);
				$nom_presse=strtr($nom_presse,'àâäçéèëêïîôöùûüÿ/','aaaceeeeiioouuuy/');
				
				//echo $dossier.' '.$nom_presse.' '.$nom_presse;
				//getImgResize($dossier,366,550,'presse');
				$new_presse="ftp://user06:321JamesiG@ftp.myretooch.com//".$dossier.$nom_presse;
				@copy($tmp_presse, $new_presse);
			}
			break;
		case 'suppr' :
			if ($dossier!='../photos/presse-magazine/') {
				$connexion = ftp_connect(FTP_SERVER);
				$login = ftp_login($connexion, FTP_LOGIN, FTP_PASSWORD);
				if (!$connexion || !$login) { die('Connexion réfusée!'); }
				
				$avant=$_REQUEST['avant'];
				@ftp_delete($connexion, $avant);
				$apres=$_REQUEST['apres'];
				@ftp_delete($connexion, $apres);
				
				@ftp_close($connexion);
			}
			else {
				$connexion = ftp_connect(FTP_SERVER);
				$login = ftp_login($connexion, FTP_LOGIN, FTP_PASSWORD);
				if (!$connexion || !$login) { die('Connexion réfusée!'); }
				
				$apres=$_REQUEST['apres'];
				@ftp_delete($connexion, $apres);
				
				@ftp_close($connexion);
			}
			break;
	}
	
	echo '<script>location.href="photos.php?dossier='.$dossier.'"</script>';
?>