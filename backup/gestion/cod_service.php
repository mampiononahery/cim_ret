<?php
	require("../includes/const_decl.php");
	$opt=$_REQUEST['opt'];
	switch ($opt) {
		case 'new':
			$lib_service=$_REQUEST['lib_service'];
			if (!empty($_REQUEST['tarif_service']))
				$tarif_service=$_REQUEST['tarif_service'];
			else
				$tarif_service=0;
			if (!empty($_REQUEST['tarif_autre']))
				$tarif_autre=$_REQUEST['tarif_autre'];
			else
				$tarif_autre=0;
			if (!empty($_REQUEST['tarif_ladisse']))
				$tarif_ladisse=$_REQUEST['tarif_ladisse'];
			else
				$tarif_ladisse=0;
			if (!empty($_REQUEST['tarif_public']))
				$tarif_public=$_REQUEST['tarif_public'];
			else
				$tarif_public=0;
			$date_insertion=date('Y-m-d');
			$sql="INSERT INTO services (lib_service, tarif_service, tarif_autre, tarif_ladisse, tarif_public, date_insertion)
				VALUES ('$lib_service', '$tarif_service', '$tarif_autre', '$tarif_ladisse', '$tarif_public', '$date_insertion')";
			mysql_query($sql);
			
			$id_service=mysql_insert_id();
			
			$nb_formule=$_REQUEST['nb_formule'];
			
			for ($i=0;$i<$nb_formule;$i++) {
				if (!empty($_REQUEST['lib_formule'][$i]) && !empty($_REQUEST['nb_photos'][$i]) && !empty($_REQUEST['remise'][$i])) {
					$lib_formule=$_REQUEST['lib_formule'][$i];
					$nb_photos=$_REQUEST['nb_photos'][$i];
					$remise=$_REQUEST['remise'][$i]/100;
					$lib_formule=ucfirst(strtr($lib_formule,'אגהחיטכךןמפצשûüÿ/','aaaceeeeiioouuuy/'));
					$sql="INSERT INTO formules (id_service, lib_formule, nb_photos, remise)
						VALUES ('$id_service', '$lib_formule', '$nb_photos', '$remise')";
					mysql_query($sql);
				}
			}
			
			header("location:services.php");
			break;
		case 'maj':
			$id_service=$_REQUEST['id_service'];
			$lib_service=$_REQUEST['lib_service'];
			if (!empty($_REQUEST['tarif_service']))
				$tarif_service=$_REQUEST['tarif_service'];
			else
				$tarif_service=0;
			if (!empty($_REQUEST['tarif_autre']))
				$tarif_autre=$_REQUEST['tarif_autre'];
			else
				$tarif_autre=0;
			if (!empty($_REQUEST['tarif_ladisse']))
				$tarif_ladisse=$_REQUEST['tarif_ladisse'];
			else
				$tarif_ladisse=0;
			if (!empty($_REQUEST['tarif_public']))
				$tarif_public=$_REQUEST['tarif_public'];
			else
				$tarif_public=0;
			$sql="UPDATE services SET
				lib_service='$lib_service',
				tarif_service='$tarif_service',
				tarif_autre='$tarif_autre',
				tarif_ladisse='$tarif_ladisse',
				tarif_public='$tarif_public'
				WHERE id_service='$id_service'";
			mysql_query($sql);
			
			$nb_f=$_REQUEST['nb_f'];
			$nb_formule=$_REQUEST['nb_formule'];
			
			for ($i=0;$i<$nb_f;$i++) {
				if (!empty($_REQUEST['lib_f'][$i]) && !empty($_REQUEST['nb_p'][$i]) && !empty($_REQUEST['rem'][$i])) {
					$id_formule=$_REQUEST['id_formule'][$i];
					$lib_f=$_REQUEST['lib_f'][$i];
					$nb_p=$_REQUEST['nb_p'][$i];
					$rem=$_REQUEST['rem'][$i]/100;
					$lib_f=ucfirst(strtr($lib_f,'אגהחיטכךןמפצשûüÿ/','aaaceeeeiioouuuy/'));
					$sql="UPDATE formules
						 SET
						 lib_formule='$lib_f',
						 nb_photos='$nb_p',
						 remise='$rem'
						 WHERE id_service='$id_service' && id_formule='$id_formule'";
					mysql_query($sql);
				}
			}
			
			for ($i=0;$i<$nb_formule;$i++) {
				if (!empty($_REQUEST['lib_formule'][$i]) && !empty($_REQUEST['nb_photos'][$i]) && !empty($_REQUEST['remise'][$i])) {
					$lib_formule=$_REQUEST['lib_formule'][$i];
					$nb_photos=$_REQUEST['nb_photos'][$i];
					$remise=$_REQUEST['remise'][$i]/100;
					$lib_formule=ucfirst(strtr($lib_formule,'אגהחיטכךןמפצשûüÿ/','aaaceeeeiioouuuy/'));
					$sql="INSERT INTO formules (id_service, lib_formule, nb_photos, remise)
						VALUES ('$id_service', '$lib_formule', '$nb_photos', '$remise')";
					mysql_query($sql);
				}
			}
			
			header("location:services.php");
			break;
		case 'suppr':
			$id=$_REQUEST['id'];
			$sql="DELETE FROM services WHERE id_service='$id'";
			mysql_query($sql);
			$sql="DELETE FROM formules WHERE id_service='$id'";
			mysql_query($sql);
			//echo $sql;
			header("location:services.php");
			break;
			
		case 'suppr_f':
			$id=$_REQUEST['id'];
			$id_f=$_REQUEST['id_f'];
			$sql="DELETE FROM formules WHERE id_service='$id' & id_formule='$id_f'";
			mysql_query($sql);
			//echo $sql;
			header("location:services.php");
			break;
	}
?>