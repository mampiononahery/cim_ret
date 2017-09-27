<?php

    
    $DB_Username   ='u24myretooch'; //db username
    $DB_Password   ='XRI0g05rfPVYO'; //db password
    $DB_Server     ='localhost'; //db host
    $DB_DBName     ='db24Myretooch'; //db name
// Connect to database
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password)
or die("Impossible de se connecter a MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
//select database
$Db = @mysql_select_db($DB_DBName, $Connect)
or die("Impossible de selectionner la base de donnees:<br>" . mysql_error(). "<br>" . mysql_errno());
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}
// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
$posted_data = print_r($_POST,true);
file_put_contents('IPN_data.txt',$posted_data);
// assign posted variables to local variables
$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$username = $_POST['custom']; // Identify User
if (!$fp) {
// HTTP ERROR
} else {
fputs ($fp, $header . $req);
while (!feof($fp)) {
$res = fgets ($fp, 1024);
if (strcmp ($res, "VERIFIED") == 0) {
if ($payment_status=='Completed'){
$txn_id_check = mysql_query("SELECT 'txn_id' FROM 'log' WHERE 'txn_id'='".$txn_id."'");
if (mysql_num_rows($txn_id_check) !=1){
if ($receiver_email=='messange2009@gmail.com'){
   
    if ($payment_currency=='EUR'){
   
	 // add txn_id to database
	 $log_query = mysql_query("INSERT INTO 'log' ('id','txn_id','payer_email') VALUES (NULL,'".$txn_id."','".$payer_email."')");
   
	 // update premium to 1
	// $update_premium = mysql_query("UPDATE 'members' SET premium='1' WHERE 'username'='".$username."'");
   
    }
}
}
}
}
else if (strcmp ($res, "INVALID") == 0) {
		 // log for manual investigation
}
}
fclose ($fp);
}
?>