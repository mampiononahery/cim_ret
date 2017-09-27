<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {


    public function index()
    {
        // read the post from PayPal system and add 'cmd' //

        //TODO revoir cet IPN
        $req = 'cmd=_notify-validate';

        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }

        // post back to PayPal system to validate //
        $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
        $header .= "Host: www.sandbox.paypal.com\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

        $payment_status = $_POST['payment_status'];
        $payer_email = $_POST['payer_email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address_street = $_POST['address_street'];
        $address_city = $_POST['address_city'];
        $address_state = $_POST['address_state'];
        $address_zip = $_POST['address_zip'];
        $address_country = $_POST['address_country'];
        $mc_gross = $_POST['mc_gross'];
        $mc_fee = $_POST['mc_fee'];
        $memo = $_POST['memo'];
        $payment_type = $_POST['payment_type'];
        $payment_date = $_POST['payment_date'];
        $txn_id = $_POST['txn_id'];
        $pending_reason = $_POST['pending_reason'];
        $reason_code = $_POST['reason_code'];
        $tax = $_POST['tax'];
        $item_number = $_POST['item_number'];
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];
        $payment_amount = $_POST['mc_gross'];
        $payment_currency = $_POST['mc_currency'];
        $invoice = $_POST['invoice'];
        $receiver_email = $_POST['receiver_email'];
        $nb_images = $_POST['custom'];
        $datecreation= date("d")."/".date("m")."/".date("Y");
        $code_client=$this->generateRandomString();

        $this->load->model("model");
        if (!$fp) {

        } else {
            fputs ($fp, $header . $req);
            while (!feof($fp)) {
                $res = fgets ($fp, 1024);


                if (strcmp ($res, "VERIFIED") == 0) {

                    if ($payment_status=='Completed') {
                        $test=$this->base_model->verif_txnid($txn_id);
                        if($test==0){
                            if ($receiver_email=='soiby-facilitator@gmail.com') {



                                $donnes_commande=array(
                                    'id_client'   => $code_client,
                                    'txnid'   => $txn_id ,
                                    'date'   => $datecreation,
                                    'formule'   => $item_name,
                                    'quantite'   => $quantity,
                                    'total'   => $payment_amount,
                                    'nb_images'   => $nb_images
                                );
                                //Insertion donnes paniers
                                $this->base_model->save('commande', $donnes_commande);

                                $donnes_paypal=array(
                                    'idclient'   => $code_client,
                                    'txnid'   => $txn_id ,
                                    'date'   => $datecreation,
                                    'statut'   =>  $payment_status,
                                    'payer_name'   => $first_name,
                                    'payer_last_name'   => $last_name,
                                    'payer_adresse'   => $address_street,
                                    'payer_country'   => $address_country,
                                    'payer_city'   => $address_city,
                                    'total'   => $payment_amount
                                );

                                $this->base_model->save('infos_paypal', $donnes_paypal);

                                $infos_client=array(
                                    'idclient'   => $code_client,
                                    'date_ajout'   => $datecreation,
                                    'nom'   =>$first_name,
                                    'prenom'   => $last_name,
                                    'email'   =>  $payer_email,
                                    'password'   => "",
                                    'nb_images'   => $nb_images,
                                    'actif'   => 0
                                );
                                $this->base_model->save('les_clients', $infos_client);

                            }

                        }

                    }
                }
                else if (strcmp ($res, "INVALID") == 0) {

                }
            }
            fclose ($fp);
        }



    }


    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    function envoie_mail(){


    }

}

