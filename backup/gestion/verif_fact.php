<?php
	require("../includes/const_decl.php");
	
	$result = mysql_query("SELECT * FROM factures WHERE id_client='".$_GET["id_client"]."' AND date_livraison='0000-00-00' ORDER BY id_facture");
	if(mysql_num_rows($result)>=1) {
		while ($rows=mysql_fetch_array($result)) {
				extract($rows);
				echo utf8_encode($id_facture.'*'.FormatDate($date_facture,'d-m-y').'/');
		}
	}
	else {
		echo '';
	}
?>