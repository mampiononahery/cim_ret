<?php
	require ("includes/ipinfodb.class.php");
	
	$adr_ip=$_SERVER['REMOTE_ADDR'];
	$ip=explode('.',$adr_ip);
	
	if ($ip[0]=='124' && $ip[1]=='115') {
		echo '<script>document.location.href="http://www.domain.fr"</script>';
		//header("location:http://www.domain.fr");
		exit();
	}
	if ($ip[0]=='114' && $ip[1]=='80') {
		echo '<script>document.location.href="http://www.domain.fr"</script>';
		//header("location:http://www.domain.fr");
		exit();
	}
	if ($ip[0]=='58' && $ip[1]=='248') {
		echo '<script>document.location.href="http://www.domain.fr"</script>';
		//header("location:http://www.domain.fr");
		exit();
	}
	if ($ip[0]=='58' && $ip[1]=='61') {
		echo '<script>document.location.href="http://www.domain.fr"</script>';
		//header("location:http://www.domain.fr");
		exit();
	}
	if ($ip[0]=='123' && $ip[1]=='125') {
		echo '<script>document.location.href="http://www.domain.fr"</script>';
		//header("location:http://www.domain.fr");
		exit();
	}
	$aujourdhui=date('Y-m-d');
	$heure=date('H:i:s');
	$nb_visiteurs=0;
	$nb_visiteurs=@mysql_num_rows(mysql_query("SELECT ip FROM visiteurs WHERE ip='$adr_ip' AND datevisite='$aujourdhui'"));
	
	if ($nb_visiteurs==0) {
		//Load the class
		$ipinfodb = new ipinfodb;
		$ipinfodb->setKey('565f9eb2a200596c2ded99232f0fff766751c424dacc7baa2ae9221a53227f2e');
		//Get errors and locations
		$locations = $ipinfodb->getGeoLocation($adr_ip);
		//$errors = $ipinfodb->getErrors();
		if (!empty($locations) && is_array($locations)) {
			foreach ($locations as $field => $val) {
				//echo $field . ' : ' . $val . "<br />\n";
				if ($field=='CountryCode') {
					//echo $field . ' : ' . $val . "<br />\n";
					$flags=strtolower($val);
					$sql="INSERT INTO visiteurs(ip, datevisite, heurevisite, flags)
						VALUES ('$adr_ip', '$aujourdhui', '$heure', '$flags')";
						mysql_query($sql);
				}
			}
		}
	}
	
	if (!empty($_REQUEST['id']))
		$id=$_REQUEST['id'];
	else
		$id='';
	
	if (!empty($_REQUEST['pr']))
		$pr=$_REQUEST['pr'];
	else
		$pr='';
	
	if (!empty($_REQUEST['idf']))
		$idf=$_REQUEST['idf'];
	else
		$idf='';
	
	if (!empty($_REQUEST['f_a']))
		$f_a=$_REQUEST['f_a'];
	else
		$f_a=0;
?>
<div id="drapeaux" align="center"><a href="?lang=fr&id=<?php echo $id; ?>&pr=<?php echo $pr; ?>&idf=<?php echo $idf; ?>&f_a=<?php echo $f_a; ?>" alt="<?php echo _FR; ?>" title="<?php echo _FR; ?>"><img src="images/FR.gif" width="28" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?lang=en&id=<?php echo $id; ?>&pr=<?php echo $pr; ?>&idf=<?php echo $idf; ?>&f_a=<?php echo $f_a; ?>" alt="<?php echo _EN; ?>" title="<?php echo _EN; ?>"><img src="images/GB.gif" width="28" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?lang=es&id=<?php echo $id; ?>&pr=<?php echo $pr; ?>&idf=<?php echo $idf; ?>&f_a=<?php echo $f_a; ?>" alt="<?php echo _ES; ?>" title="<?php echo _ES; ?>"><img src="images/ES.gif" width="28" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?lang=ru&id=<?php echo $id; ?>&pr=<?php echo $pr; ?>&idf=<?php echo $idf; ?>&f_a=<?php echo $f_a; ?>" alt="<?php echo _RU; ?>" title="<?php echo _RU; ?>"><img src="images/RU.gif" width="28" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?lang=jp&id=<?php echo $id; ?>&pr=<?php echo $pr; ?>&idf=<?php echo $idf; ?>&f_a=<?php echo $f_a; ?>" alt="<?php echo _JP; ?>" title="<?php echo _JP; ?>"><img src="images/JP.gif" width="28" /></a></div>