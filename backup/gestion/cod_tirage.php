<?php
	require("../includes/const_decl.php");
	$opt=$_REQUEST['opt'];
	switch ($opt) {
		case 'new':
			$lib_tirage=$_REQUEST['lib_tirage'];
			if (!empty($_REQUEST['tarif_tirage']))
				$tarif_tirage=$_REQUEST['tarif_tirage'];
			else
				$tarif_tirage=0;
			$date_insertion=date('Y-m-d');
			$sql="INSERT INTO tirages (lib_tirage, tarif_tirage, date_insertion)
				VALUES ('$lib_tirage', '$tarif_tirage', '$date_insertion')";
			mysql_query($sql);	
			header("location:tirages.php");
			break;
		case 'maj':
			$id_tirage=$_REQUEST['id_tirage'];
			$lib_tirage=$_REQUEST['lib_tirage'];
			if (!empty($_REQUEST['tarif_tirage']))
				$tarif_tirage=$_REQUEST['tarif_tirage'];
			else
				$tarif_tirage=0;
			$sql="UPDATE tirages SET
				lib_tirage='$lib_tirage',
				tarif_tirage='$tarif_tirage'
				WHERE id_tirage='$id_tirage'";
			mysql_query($sql);
			//echo $sql;
			header("location:tirages.php");
			break;
		case 'suppr':
			$id=$_REQUEST['id'];
			$sql="DELETE FROM tirages WHERE id_tirage='$id'";
			mysql_query($sql);
			//echo $sql;
			header("location:tirages.php");
			break;
	}
?>