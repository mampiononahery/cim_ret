<?php
	//header("location:accueil.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
<meta name="google-site-verification" content="2GVojP0OSQORvMFHXyrWzxXjprdupfIAi3S_30Q5vNU" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>myretooch.com</title>
<link rel="stylesheet" href="design/styles.css" type="text/css" media="all" />
<link rel="icon" href="favicon.ico"/>
<script language="JavaScript" type="text/javascript">
	function verifier() {
		var form=document.forms["entree"]
		
		if (form.login.value=='') {
			form.login.focus()
			return false
		}
		
		if (form.mot2passe.value=='') {
			form.mot2passe.focus()
			return false
		}
		
		if (form.login.value!='james' && form.mot2passe.value!='james') {
			form.login.focus()
			return false
		}
		else if (form.login.value=='james' && form.mot2passe.value=='james'){
			form.action='accueil.php'
			form.submit()
		}
	}
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19855778-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body> 
<form name="entree" method="post" action="" onSubmit="return verifier();">
  <table width="264" border="0" align="center" cellpadding="2" cellspacing="0" class="table">
    <tr class="tr">  
      <td>Login :</td>
      <td><input type="text" name="login"></td>
    </tr>
    <tr class="tr">
      <td>Mot de passe :</td>
      <td><input type="password" name="mot2passe"></td>
    </tr>
    <tr class="tr">
      <td colspan="2"><div align="center"><input type="submit" name="button" id="button" value="OK" class="submit"></div></td>
    </tr>
  </table>
</form>
</body>
</html>