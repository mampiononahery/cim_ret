<?php
	require("includes/const_decl.php");
	$query="SELECT login_client FROM clients WHERE UPPER(login_client)='".strtoupper($_GET["login_client"])."'";
	$result = mysql_query($query);
	if (mysql_num_rows($result)>=1)
			echo "1";
	else
			echo "2";
?>