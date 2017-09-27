<?php
	require("includes/const_decl.php");
	$query="SELECT id_promo FROM promos WHERE id_promo='".$_GET["code_promo"]."' AND active='1'";
	$result = mysql_query($query);
	if (mysql_num_rows($result)>=1 && strlen($_GET["code_promo"])==6)
			echo "2";
	else if (mysql_num_rows($result)<1 && strlen($_GET["code_promo"])==6)
			echo "1";
?>