<?php
	require("../includes/const_decl.php");
	require ("../includes/class.phpmailer.php");
	
	$opt=$_REQUEST['opt'];
	$offset=$_REQUEST['offset'];
	switch ($opt) {
		case 'new':
			$chaine="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$attribuer=$_REQUEST['attribuer'];
			$nb_photo=$_REQUEST['nb_photo'];
			$date_creation=date('Y-m-d');
			$code_promo=rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).$chaine[rand(0,25)];
			$sql="INSERT INTO promos (id_promo, attribuer, nb_photo, date_creation)
			VALUES ('$code_promo', '$attribuer', '$nb_photo', '$date_creation')";
			//echo $sql;
			mysql_query($sql);
			//echo $code_promo.'<br>';
			header("location:promos.php?offset=".$offset);
			break;
		case 'distribue':
			$id_promo=$_REQUEST['id_promo'];
			$sql="UPDATE promos SET 
				active='1'
				WHERE id_promo='$id_promo'";
			mysql_query($sql);
		
			header("location:promos.php?offset=".$offset);
			break;
		case 'dedistribue':
			$id_promo=$_REQUEST['id_promo'];
			$sql="UPDATE promos SET 
				active='0'
				WHERE id_promo='$id_promo'";
			mysql_query($sql);
		
			header("location:promos.php?offset=".$offset);
			break;
		case 'suppr':
			$id=$_REQUEST['id'];
			$sql="DELETE FROM promos WHERE id_promo='$id'";
			mysql_query($sql);
			//echo $sql;
			header("location:promos.php.offset=".$offset);
			break;
		case 'maj':
			$id=$_REQUEST['id'];
			$attribuer=$_POST['attribuer'];
			$nb_photo=$_REQUEST['nb_photo'];
			$sql="UPDATE promos SET 
				attribuer='$attribuer',
				nb_photo='$nb_photo'
				WHERE id_promo='$id'";
			mysql_query($sql);
			//echo $sql;
			header("location:promos.php?offset=".$offset);
			break;
	}
?>