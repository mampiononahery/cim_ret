<?php

	//header("location:accueil.php");

?>

<!DOCTYPE html>

<meta charset="utf-8">

<head>

<meta name="google-site-verification" content="2GVojP0OSQORvMFHXyrWzxXjprdupfIAi3S_30Q5vNU" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>myretooch.com::accés restreint</title>

<!--<link rel="stylesheet" href="design/styles.css" type="text/css" media="all" />-->

<style type="text/css">

<!--

body {

	margin:0px 0px 0px 0px; 				  			 	 

	padding:0px 0px 0px 0px;

	background:#000000;

	background-image:url(images/fond_login.jpg);

	font:normal 11px Tahoma, Arial;

	color:#00000;	

}

#message p.error_msg {
    text-align: center;
    color: #ffffff;
    font-size: 14px;
}

#btn_postuler {

	position:absolute;

	margin:0 0 0 0;

	top:700px;

	left:287px;

}

-->

</style>

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

<?php if (! empty($message)) { ?>
	<div id="message">
		<?php echo $message; ?>
	</div>
<?php } ?>

<!--https://www.myretooch.com/home/log-->


<?php echo form_open("auth/login", array('name' => 'entree', 'style' => 'vertical-align:middle; margin-top:220px'));?>
<!--<form name="entree" method="post" action="https://www.myretooch.com/home/log" style="vertical-align:middle; margin-top:220px">-->

  <table width="264" border="0" align="center" cellpadding="2" cellspacing="0" class="table">

    <tr class="tr">

      <td colspan="2"><div align="center"><img src="images/retooch_logo.png" /></div></td>

    </tr>

    <tr class="tr">  

      <td>Login :</td>

      <td><input type="text" id="identity" name="login_identity" value="<?php echo set_value('login_identity', '');?>" class="tooltip_parent"/></td>

    </tr>

    <tr class="tr">

      <td>Mot de passe :</td>

      <td><input type="password" id="password" name="login_password" value="<?php echo set_value('login_password', '');?>"/></td>

    </tr>

    <tr class="tr">

      <td colspan="2"><div align="center">
<!--			  <input type="submit" name="button" id="button" value="OK" class="submit">-->
			  <input type="submit" name="login_user" id="submit" value="OK" class="submit"/>
		  </div></td>

    </tr>

  </table>

<!--</form>-->
<?php echo form_close();?>
<!--<div align="center" style="font-weight:bold">Site en cours de construction ...</div>-->

</body>

</html>