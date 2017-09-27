<?php
	require("../includes/const_decl.php");
	$id_equipe=$_REQUEST['id_equipe'];
	$jour_planning=$_REQUEST['jour_planning'];
	$type_planning=$_REQUEST['type_planning'];
	$heure_planning=$_REQUEST['heure_planning'];
	$duree_planning=$_REQUEST['duree_planning'];
	$nQuart=$duree_planning/15;
	for($i=1;$i<=$nQuart;$i++) {
		$Quart=15;
		if (mysql_num_rows(mysql_query("SELECT id_planning FROM plannings WHERE heure_planning='$heure_planning' AND jour_planning='$jour_planning'"))==0) {
			$sql="INSERT INTO plannings(jour_planning, heure_planning, type_planning, duree_planning, id_equipe)
				VALUES ('$jour_planning', '$heure_planning', '$type_planning', '$Quart', '$id_equipe')";
			mysql_query($sql);
		}
		else {
			$sql="UPDATE plannings
				SET
				heure_planning='$heure_planning',
				type_planning='$type_planning',
				duree_planning='$Quart',
				id_equipe='$id_equipe'
				WHERE
				heure_planning='$heure_planning' AND jour_planning='$jour_planning'";
			mysql_query($sql);
		}
		$heure_planning=AjoutHeure($heure_planning,"m",15);
	}
	$sql="DELETE FROM plannings WHERE type_planning='INDISPONIBLE'";
	mysql_query($sql);
	header("location:planning.php");
?>