<?php
function getImgResize($dossier, $taille_x, $taille_y, $file_name){ // $dossier = destination, $taille_x = largeur maximum, $taille_y = hauteur maximum, $file_name = LE NOM DU $_FILES DANS CODE HTML 
        $content_dir =  $dossier; // Dossier où sera déplacé le fichier (mini/)
        $tmp_file = $_FILES[$file_name]['tmp_name'];
		// Vérifie si le fichier peu étre updater.
        if(!is_uploaded_file($tmp_file)){ $erreur = array(TRUE,1,'Le fichier est introuvable'); }
        // On vérifie maintenant l'extension ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $type_file = $_FILES[$file_name]['type']; // Type du fichier envoyer
		// Recherche du type de fichier et appel de la variable $type si fichier valide !
		if(($type_file=='image/pjpeg') || ($type_file=='image/jpeg'))
		{ $type = 'jpeg'; }elseif($type_file=='image/x-png' || $type_file=='image/png')
		{ $type = 'png'; }elseif($type_file=='image/gif')
		{ $type = 'gif'; } // Recherche du type de fichier
		// Vérifie si la variable $type (Qui est appeler ci-haut!) est vide car elle devrais étre appeler en haut si c'est le bon fichier
        if(!isset($type)){ $erreur = array(TRUE,2,'Le fichier n\'est pas une image') ; } 
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $name_file = $_FILES[$file_name]['name'];
        if(preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $name_file)){ $erreur = array(TRUE, 3, 'Nom de fichier non valide'); } // Vérifie si les caractéres sont valide.
		
		if(!isset($erreur)) //S'il n'y a pas d'erreur on continue...
		{
			$OriSize=getimagesize($tmp_file); // Cherche les dimentions original de l'image
			// Vérifie le types (JPG,GIF,PNG) et crée la première image !/////////
			switch($type) 
			{	case 'jpeg': $image = imagecreatefromjpeg($tmp_file); break;
				case 'png': $image = imagecreatefrompng($tmp_file); break;
				case 'gif': $image = imagecreatefromgif($tmp_file); break; }
			///////////////////////////////////////////////////////////////////////
			if ($OriSize[0] < $OriSize[1]) {	$largeur_finale=round(($OriSize[0]*$taille_y)/$OriSize[1]); $hauteur_finale=$taille_y; 
			} else { 							$hauteur_finale=round(($OriSize[1]*$taille_x)/$OriSize[0]); $largeur_finale=$taille_x; }
			$image_mini = imagecreatetruecolor($largeur_finale, $hauteur_finale); // CRÉATION DE L'IMAGE FINALE
			imagecopyresampled($image_mini, $image, 0, 0, 0, 0, $largeur_finale, $hauteur_finale, $OriSize[0], $OriSize[1]);// COPIE FINALE
			// Vérifie le types (JPG,GIF,PNG) FINALISATION...///////////
			switch($type) {	
			case 'jpeg': imagejpeg ($image_mini, $content_dir.$name_file); break; 
			case 'png': imagepng ($image_mini, $content_dir.$name_file); break; 
			case 'gif': imagegif ($image_mini, $content_dir.$name_file); break; }
			//////////////////////////////////////////////////////////////////////////
			$link = 'http://www.'.$_SERVER["SERVER_NAME"].'/'.$content_dir.$name_file;
			echo $link.'<BR>';
			echo '<img src="'.$link.'" />';
		}else{
			echo $erreur[2]; // SI UNE ERREUR C'EST PRODUITE VA AFFICHER L'ERREUR !
			$link = ''; // Na pas de lien si pas d'image...
		}
}
/* Les valeurs pour $erreur sont 	[0]=TRUE [1]=1 [2]='Le fichier est introuvable'
									[0]=TRUE [1]=2 [2]='Le fichier n\'est pas une image'
									[0]=TRUE [1]=3 [2]='Nom de fichier non valide'
									
									Je vous rappel que si vous désirer supprimer une photo en php c'est unlink($file); ! xD Petit truc de débutant.
*/
function convertBytes( $value ) {
 if ( is_numeric( $value ) ) {
 return $value;
 } else {
 $value_length = strlen( $value );
 $qty = substr( $value, 0, $value_length - 1 );
 $unit = strtolower( substr( $value, $value_length - 1 ) );
 switch ( $unit ) {
 case 'k':
 $qty *= 1024;
 break;
 case 'm':
 $qty *= 1048576;
 break;
 case 'g':
 $qty *= 1073741824;
 break;
 }
 return $qty;
 }
 }
?>