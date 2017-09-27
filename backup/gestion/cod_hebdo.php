<?php
	require("../includes/const_decl.php");
	$id_pers=$_REQUEST['id_pers'];
	$id_equipe=$_REQUEST['id_equipe'];
	$jour_planning=$_REQUEST['jour_planning'];
	$type_planning=$_REQUEST['type_planning'];
	$heure_planning=$_REQUEST['heure_planning'];
	$duree_planning=$_REQUEST['duree_planning'];
	$date_planning=$_REQUEST['date_planning'];
	$commentaire=$_REQUEST['commentaire'];
	$opt=$_REQUEST['opt'];
	$nQuart=$duree_planning/15;
	//echo $type_planning;
	switch ($type_planning) {
		case 'RESERVE':
			for($i=1;$i<=$nQuart;$i++) {
				$Quart=15;
				$id_client=$_REQUEST['id_client'];
				if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$jour_planning' AND heure_planning='$heure_planning' AND duree_planning='$Quart' AND id_equipe='$id_equipe'"))!=0) {
					$sql="INSERT INTO mouvements (jour_planning, date_planning, heure_planning, type_planning, id_client, id_pers, duree_planning, commentaire)
						VALUES ('$jour_planning', '$date_planning', '$heure_planning', '$type_planning', '$id_client', '$id_pers', '$Quart', '$commentaire')";
					mysql_query($sql);
				}
				$heure_planning=AjoutHeure($heure_planning,"m",15);
			}
			break;
			
		case 'PAUSE':
			for($i=1;$i<=$nQuart;$i++) {
				$Quart=15;
				if (mysql_num_rows(mysql_query("SELECT * FROM plannings WHERE jour_planning='$jour_planning' AND heure_planning='$heure_planning' AND duree_planning='$Quart' AND id_equipe='$id_equipe'"))!=0) {
					$sql="INSERT INTO mouvements (jour_planning, date_planning, heure_planning, type_planning, duree_planning, commentaire)
						VALUES ('$jour_planning', '$date_planning', '$heure_planning', '$type_planning', '$Quart', '$commentaire')";
					mysql_query($sql);
				}
				$heure_planning=AjoutHeure($heure_planning,"m",15);
			}
			break;
		
		case 'ANNULE':
			for($i=1;$i<=$nQuart;$i++) {
				$Quart=15;
				$sql="UPDATE mouvements
					SET type_planning='ANNULE', commentaire=CONCAT(commentaire,'<br>','$commentaire')
					WHERE jour_planning='$jour_planning' AND date_planning='$date_planning' AND heure_planning='$heure_planning' AND id_pers='$id_pers' AND duree_planning='$Quart'";
				mysql_query($sql);
				$heure_planning=AjoutHeure($heure_planning,"m",15);
			}
			break;
			
		case 'FAIT':
			for($i=1;$i<=$nQuart;$i++) {
				$Quart=15;
				$sql="UPDATE mouvements
					SET type_planning='FAIT', commentaire=CONCAT(commentaire,'<br>','$commentaire')
					WHERE jour_planning='$jour_planning' AND date_planning='$date_planning' AND heure_planning='$heure_planning' AND id_pers='$id_pers' AND duree_planning='$Quart'";
				mysql_query($sql);
				$heure_planning=AjoutHeure($heure_planning,"m",15);
			}
			break;
	}
	switch($opt) {
		case 'hebdo':
			header("location:hebdomadaire.php");
			break;
		case 'quot':
			header("location:quotidien.php");
			break;
	}
?>