<?php
	require ("includes/const_decl.php");
	require("includes/langues.php");	
	//require ("includes/class.phpmailer.php");
	include('includes/ipinfodb.class.php');
	
	
	//set_time_limit(0);
	
	session_start();
	
	$ip = $_SERVER['REMOTE_ADDR'];//On obtient l'adresse IP
	$Fai='';
	$Pai='';
	$Vil='';
	$Region='';
	$gethostbyaddr = gethostbyaddr($ip);
	$dyn = explode('.', $gethostbyaddr);
	$nb_points = substr_count($gethostbyaddr, '.');// Nombre de point(s) dans la ligne
	if(IsSet($dyn[$nb_points],$dyn[$nb_points - 1])){
	 $fichier = $dyn[$nb_points - 1].'.'.$dyn[$nb_points];// Adresse du fichier
	}
	if(@fopen('http://www.'.$fichier,'r') || @fopen('http://'.$fichier,'r')){//Il existe ;-)
	$Fai='www.'.$dyn[$nb_points - 1].'.'.$dyn[$nb_points];
	}
	else {
	$Fai='Inconnu';	
	}
	
	//Load the class
	$ipinfodb = new ipinfodb;
	$ipinfodb->setKey('565f9eb2a200596c2ded99232f0fff766751c424dacc7baa2ae9221a53227f2e');
	//Get errors and locations
	$locations = $ipinfodb->getGeoLocation($ip);
	if (!empty($locations) && is_array($locations)) {
		foreach ($locations as $field => $val) {
			//echo $field . ' : ' . $val . "<br />\n";
			if ($field=='CountryName')
				//echo $field . ' : ' . $val . "<br />\n";
				$Pai=$val;
			if ($field=='City')
				//echo $field . ' : ' . $val . "<br />\n";
				$Vil=$val;
			if ($field=='RegionName')
				//echo $field . ' : ' . $val . "<br />\n";
				$Region=$val;
  		}
	}
	
	$civilite=$_REQUEST['civilite'];
	$nom_pnom=$_REQUEST['nom_pnom'];
	$activite=$_REQUEST['activite'];
	$email=$_REQUEST['email'];
	$tel=$_REQUEST['tel'];
	$id_pays=$_REQUEST['id_pays'];
	$ville=$_REQUEST['ville'];
	$adresse=$_REQUEST['adresse'];
	if (!empty($_REQUEST['codepostal_client']))
		$codepostal_client=$_REQUEST['codepostal_client'];
	else
		$codepostal_client='';
	$zone_info=nl2br($_REQUEST['zone_info']);	

	/*envoi mail de identification et facture*/
	$mail = new PHPmailer();
	$mail->IsSMTP();
	$mail->IsHTML(true);
	$mail->Host='smtp.barence.com';
	$mail->From=$email;
	$mail->FromName=$nom_pnom;
	$mail->AddAddress('j.iboura@live.fr', 'James IBOURA');
	$mail->AddCC($email, $nom_pnom);
	$mail->AddBCC('andry.ratobison@gmail.com', 'Andrianandraina RATOBISON');
	
	//subject
	$mail->Subject='Demande d\'informations';
	//message
	$mail->Body='
			<html>
				<head>
				<style type="text/css">
					body {
						font-family:"Trebuchet MS", Verdana, sans-serif;
						font-size:14px;
					}
					img {
						border:none;
					}
					a {
						text-decoration:none;
					}
					a:hover {
						text-decoration:none;
						font-weight:bold;
					}
					table {
						border:1px solid #000000;
						background-color:#E5E5E5;
						color:#6B6B6B;
						font-size:12px;
					}
					.tr {
						background-color:#000000;
						color:#eedfda;
					}
				</style>		
				</head>
			<body>
			<p><u>Source</u> : '.$ip.' - '.$Fai.' - '.$Region.' ('.$Vil.') - '.$Pai.'</p>
			<p>'.ereg_replace('[\]','',$zone_info).'</p>
			<p><b>'.$nom_pnom.' ('.$civilite.')<br>
			  '.$activite.'
			  <br>
			  '.$tel.'
				<br>
				'.$email.'<br>
				'.$adresse.'<br>
			  '.$codepostal.' - '.$ville.'
			  <br>
			  '.mysql_result(mysql_query("SELECT nom_pays FROM pays WHERE id_pays='$id_pays'"),0).'
			</b></p>
			</body>
			</html>';
	//post
	$mail->Send();
	$mail->SmtpClose();
	unset($mail);
	//echo $ip.' - '.$Fai. ' - '.$Region.' ('.$Vil.') - '.$Pai;
	echo '<script>alert("Votre demande est envoyée avec succes.\nUne copie vous sera aussi envoyée a '.$email.'.");
			location.href="contact.php?lang='.$lang.'"
		</script>';
?>