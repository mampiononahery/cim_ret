<?php
	require("../includes/const_decl.php");
	$opt=$_REQUEST['opt'];
	switch ($opt) {
		case 'new':
			$lib_equipe=$_REQUEST['lib_equipe'];
			$date_insertion=date('Y-m-d');
			$sql="INSERT INTO equipe (lib_equipe, date_insertion)
				VALUES ('$lib_equipe', '$date_insertion')";
			mysql_query($sql);	
			header("location:equipes.php");
			break;
		case 'maj':
			$id_equipe=$_REQUEST['id_equipe'];
			$lib_equipe=$_REQUEST['lib_equipe'];
			$sql="UPDATE equipe SET
				lib_equipe='$lib_equipe'
				WHERE id_equipe='$id_equipe'";
			mysql_query($sql);
			//echo $sql;
			header("location:equipes.php");
			break;
		case 'suppr':
			$id=$_REQUEST['id'];
			$sql="DELETE FROM equipe WHERE id_equipe='$id'";
			mysql_query($sql);
			//echo $sql;
			header("location:equipes.php");
			break;
			
	}
?>