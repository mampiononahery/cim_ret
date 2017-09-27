<?php
	require("../includes/const_decl.php");

	$opt=$_REQUEST['opt'];
	switch ($opt) {
		case 'new':
			$id_equipe=$_REQUEST['id_equipe'];
			$login_pers=$_REQUEST['login_pers'];
			$pwd_pers=$_REQUEST['pwd_pers'];
			$sexe_pers=$_REQUEST['sexe_pers'];
			$nom_pers=$_REQUEST['nom_pers'];
			$prenom_pers=$_REQUEST['prenom_pers'];
			$mail_pers=$_REQUEST['mail_pers'];
			if (checkdate($_REQUEST['mois'],$_REQUEST['jour'],$_REQUEST['annee']))
				$datenais_pers=$_REQUEST['annee'].'-'.$_REQUEST['mois'].'-'.$_REQUEST['jour'];
			else
				$datenais_pers='0000-00-00';
			$lieunais_pers=$_REQUEST['lieunais_pers'];
			$tel_pers=$_REQUEST['tel_pers'];
			$portable_pers=$_REQUEST['portable_pers'];
			$adr_pers=$_REQUEST['adr_pers'];
			$ville_pers=$_REQUEST['ville_pers'];
			$cp_pers=$_REQUEST['cp_pers'];
			$date_insertion=date('Y-m-d');
			$sql="INSERT INTO personnel (id_equipe, login_pers, pwd_pers, sexe_pers, prenom_pers, nom_pers, datenais_pers, lieunais_pers, adr_pers, cp_pers, ville_pers, tel_pers, portable_pers, mail_pers, date_insertion)
				VALUES ('$id_equipe', '$login_pers', '$pwd_pers', '$sexe_pers', '$prenom_pers', '$nom_pers', '$datenais_pers', '$lieunais_pers', '$adr_pers', '$cp_pers', '$ville_pers', '$tel_pers', '$portable_pers', '$mail_pers', '$date_insertion')";
			mysql_query($sql);	
			header("location:personnels.php");
			break;
		case 'maj':
			$id_pers=$_REQUEST['id_pers'];
			$id_equipe=$_REQUEST['id_equipe'];
			$pwd_pers=$_REQUEST['pwd_pers'];
			$sexe_pers=$_REQUEST['sexe_pers'];
			$nom_pers=$_REQUEST['nom_pers'];
			$prenom_pers=$_REQUEST['prenom_pers'];
			$mail_pers=$_REQUEST['mail_pers'];
			if (checkdate($_REQUEST['mois'],$_REQUEST['jour'],$_REQUEST['annee']))
				$datenais_pers=$_REQUEST['annee'].'-'.$_REQUEST['mois'].'-'.$_REQUEST['jour'];
			else
				$datenais_pers='0000-00-00';
			$lieunais_pers=$_REQUEST['lieunais_pers'];
			$tel_pers=$_REQUEST['tel_pers'];
			$portable_pers=$_REQUEST['portable_pers'];
			$adr_pers=$_REQUEST['adr_pers'];
			$ville_pers=$_REQUEST['ville_pers'];
			$cp_pers=$_REQUEST['cp_pers'];
			$sql="UPDATE personnel SET
				id_equipe='$id_equipe',
				pwd_pers='$pwd_pers',
				sexe_pers='$sexe_pers',
				prenom_pers='$prenom_pers',
				nom_pers='$nom_pers',
				datenais_pers='$datenais_pers',
				lieunais_pers='$lieunais_pers',
				adr_pers='$adr_pers',
				cp_pers='$cp_pers',
				ville_pers='$ville_pers',
				tel_pers='$tel_pers',
				portable_pers='$portable_pers',
				mail_pers='$mail_pers'
				WHERE id_pers='$id_pers'";
			mysql_query($sql);
			//echo $sql;
			header("location:personnels.php");
			break;
		case 'suppr':
			$id=$_REQUEST['id'];
			$sql="DELETE FROM personnel WHERE id_pers='$id'";
			mysql_query($sql);
			header("location:personnels.php");
			break;
	}
?>