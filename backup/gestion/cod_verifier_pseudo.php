<?php
	require("../includes/const_decl.php");
	$query="SELECT login_pers FROM personnel WHERE UPPER(login_pers)='".strtoupper($_GET["login_pers"])."'";
	$result = mysql_query($query);
	if (mysql_num_rows($result)>=1)
			echo "1";
	else
			echo "2";
?>