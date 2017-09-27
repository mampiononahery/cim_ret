<?php
	require ("includes/const_decl.php");
	//require ("includes/class.phpmailer.php");
	require("includes/langues.php");
	
	//set_time_limit(0);
	
	@session_start();
	
	$NC='';
	$PC='';
	$LC='';
	$MDPC='';
	$mel=$_REQUEST['email'];
	
	//envoi mail au traiteur
	$mail = new PHPmailer();
	$mail->IsSMTP();
	$mail->IsHTML(true);
	$mail->Host='smtp.barence.com';
	$mail->From='myretooch@gmail.com';
	$mail->FromName='myretooch.com';
	$mail->AddAddress($mel,$PC.' '.$NC);
	$mail->AddBCC('j.iboura@live.fr', 'James IBOURA');
	$mail->AddBCC('andry.ratobison@gmail.com', 'Andrianandraina RATOBISON');
	
	//subject
	$mail->Subject='myretooch.com - Demande de code d\'accès oublié ou perdu du '. date('d/m/Y');
	
	$sql="SELECT * FROM clients WHERE email_client='$mel'";
	$result=mysql_query($sql);
	if ($row=mysql_fetch_array($result)) {
		extract($row);
		$NC=$nom_client;
		$PC=$prenom_client;
		$LC=$login_client;
		$MDPC=$mot2passe_client;
		//message
		$mail->Body='<html>
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
	<p><a href="http://www.myretooch.com" title="www.myretooch.com"><img src="http://www.myretooch.com/images/myretooch_logo.png" border="0"></a><br>
	  <br>
	  Nous vous remercions de l\'int&eacute;r&ecirc;t que vous portez &agrave; notre 
	  soci&eacute;t&eacute;.<br>
	  <br>
	  Voici les informations dont vous avez besoin :<br>
	  <br>
	  <u><strong>Nom d\'utilisateur</strong></u> : <font color="#FF0000"><strong>'.$LC.'</strong></font><br>
	  <u><strong>Mot de passe</strong></u> : <font color="#FF0000"><strong>'.$MDPC.'</strong></font> 
	<p> Bien &agrave; vous,<br>
	  <a href="http://www.myretooch.com">www.myretooch.com</a></p>
				</body>
				</html>';
	}
	else {
		//message
		$mail->Body='<html>
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
	<p><a href="http://www.myretooch.com" title="www.myretooch.com"><img src="http://www.myretooch.com/images/myretooch_logo.png" border="0"></a><br>
	  <br>
	  Nous vous remercions de l\'int&eacute;r&ecirc;t que vous portez &agrave; notre 
	  soci&eacute;t&eacute;.<br>
	  <br>
	  Il n\'y a pas d\'informations correspondantes à <b>'.$mel.'<br>
	  <br>
	<p> Bien &agrave; vous,<br>
	  <a href="http://www.myretooch.com">www.myretooch.com</a></p>
				</body>
				</html>';		
	}
	
	//post
	//echo $mail->Body;
	$mail->Send();
	$mail->SmtpClose();
	unset($mail);
	//
	echo '<script>alert("'._INFO.$mel.'.");
			location.href="connexion.php?lang='.$lang.'"
		</script>';
?>