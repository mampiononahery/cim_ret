<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    private $nb_abonnements;
    private $abonnements;
    private $abonnement;

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Europe/Paris');
        
        $this->auth = new stdClass;
        $this->load->library('flexi_auth');


        $this->load->model('base_model');

       /* $data["nb_images_traites"] = "is not 'nb_images'";
        $data["date"] = "is not 'nb_images'";
        $formule = "Abonnement 50 photos";
        $id_client = $this->session->userdata('id_client');

        if ($id_client) {
            //TODO voir opérations de date mysql, mila manana doc mysql
            $where = "id_client = '$id_client' AND formule = '$formule' AND nb_images_traites != nb_images AND DATEDIFF(CURDATE(), STR_TO_DATE(date, '%d/%m/%Y')) < 7";

            $this->abonnements = $this->base_model->findWhereArray("commande", $where)->result();
            $this->nb_abonnements = count($this->abonnements);
            if ($this->nb_abonnements != 0) {
                $this->abonnement = $this->abonnements[$this->nb_abonnements - 1];
                $this->session->set_userdata('abonnement', true);
            }
        }*/


        if(!$this->flexi_auth->is_logged_in()){
            redirect('auth');


        } 
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {

        

        if($this->flexi_auth->is_logged_in()){
           $this->load->view('template/assets');
            $this->load->view('template/entete');
            $this->load->view('home');
            $this->load->view('template/footer');

        }
        else{

            
            $this->load->view('log');
            
        }
       

    }

    public function log() {
        $login = $this->input->post('login');
        $password = $this->input->post('mot2passe');
        if ($login == "james" && $password == "james") {
            session_start();
            $_SESSION['user'] = "manolo";
            redirect(base_url("home"), "refresh");
        } else {
            redirect(base_url(), "refresh");
        }
    }

    public function chaine_aleatoire($nb_car, $chaine = '0123456789') {
        $nb_lettres = strlen($chaine) - 1;
        $generation = '';
        for ($i = 0; $i < $nb_car; $i++) {
            $pos = mt_rand(0, $nb_lettres);
            $car = $chaine[$pos];
            $generation .= $car;
        }
        return $generation;
    }

    public function exemplesretouches() {

        $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('exemplesretouches');
        $this->load->view('template/footer');
    }

    public function retouchesbeaute() {
        //http://stackoverflow.com/questions/36608780/ogimage-could-not-be-downloaded-because-it-exceeded-the-maximum-allowed-sized-o
        //https://developers.facebook.com/bugs/1626463061012181/
        if (isset($_GET['class'])) {
            $splited = explode(",", $_GET['class']);
            $data["class"] = $splited[0];
            $data["id"] = $splited[1];
            $data["src"] = $splited[2];
            $this->load->view('template/assets', $data);
        } else {
            $this->load->view('template/assets');
        }
        $this->load->view('template/entete');
        $this->load->view('retouchesbeaute');
        $this->load->view('template/footer');
    }

    public function retouchesmontage() {
        if (isset($_GET['class'])) {
            $splited = explode(",", $_GET['class']);
            $data["class"] = $splited[0];
            $data["id"] = $splited[1];
            $data["src"] = $splited[2];
            $this->load->view('template/assets', $data);
        } else {
            $this->load->view('template/assets');
        }
        $this->load->view('template/entete');
        $this->load->view('retouchesmontage');
        $this->load->view('template/footer');
    }

    public function retouchesmagazine() {
        if (isset($_GET['class'])) {
            $splited = explode(",", $_GET['class']);
            $data["class"] = $splited[0];
            $data["id"] = $splited[1];
            $data["src"] = $splited[2];
            $this->load->view('template/assets', $data);
        } else {
            $this->load->view('template/assets');
        }
        $this->load->view('template/entete');
        $this->load->view('retouchesmagazine');
        $this->load->view('template/footer');
    }

    public function retouchesobjet() {
        if (isset($_GET['class'])) {
            $splited = explode(",", $_GET['class']);
            $data["class"] = $splited[0];
            $data["id"] = $splited[1];
            $data["src"] = $splited[2];
            $this->load->view('template/assets', $data);
        } else {
            $this->load->view('template/assets');
        }
        $this->load->view('template/entete');
        $this->load->view('retouchesobjet');
        $this->load->view('template/footer');
    }

    public function login() {
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        if ($data['email'] != '' && $data['password'] != '') {
            $result = $this->base_model->findWhereArray("les_clients", $data)->result();
            if (count($result) > 0) {
                $this->session->set_userdata('id_client', $result[0]->idclient);
                $this->session->set_userdata('email', $result[0]->email);
                $this->session->set_userdata('nom', $result[0]->nom);
                $this->session->set_userdata('prenom', $result[0]->prenom);
                $next = $this->session->userdata('next');
                if ($next) {
                    $this->session->unset_userdata('next');
                    redirect(base_url($next), "refresh");
                } else {
                    redirect(base_url(), "refresh");
                }
            } else {
                redirect(base_url("home/formules"), "refresh");
            }
        } else {
            redirect(base_url("home/formules"), "refresh");
        }
    }

    public function nouveau_client() {
        $this->session->set_userdata('nouveau_client', true);
        $next = $this->session->userdata('next');
        if ($next) {
            $this->session->unset_userdata('next');
            redirect(base_url($next), "refresh");
        } else {
            redirect(base_url(), "refresh");
        }
    }

    public function logout() {
        $this->session->unset_userdata('id_client');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nom');
        $this->session->unset_userdata('prenom');
        $this->session->unset_userdata('abonnement');
        redirect(base_url(), "refresh");
    }

    public function authentification() {
//        $next = $_GET["next"];
//        $nouveau_client = $this->session->userdata('nouveau_client');
//        if ($next && !$nouveau_client) {
//            $this->session->set_userdata('next', $next);
        $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('authentification');
        $this->load->view('template/footer');
//        } else {
//            redirect(base_url(), "refresh");
//        }
    }

    public function formules() {
        if ($this->session->userdata('id_client')) {
            //connecté izy matoa tonga eto

            if ($this->nb_abonnements != 0) {
                $data['id_commande'] = $this->abonnement->id;
                //TODO Personnaliser le transert selon une commande
                $data['nb_images'] = $this->abonnement->nb_images - $this->abonnement->nb_images_traites;
                $data['abonnement'] = $this->abonnement;

                $dataRessources["css_files"] = array('../plupload/jquery.ui.plupload/css/jquery.ui.plupload');
                $dataRessources["js_files"] = array('../plupload/plupload.full.min', '../plupload/jquery.ui.plupload/jquery.ui.plupload', '../plupload/i18n/fr');

                $this->load->view('template/assets', $dataRessources);
                $this->load->view('template/entete');
                $this->load->view('transfert', $data);
                $this->load->view('template/footer');
            } else {
                $this->load->view('template/assets');
                $this->load->view('template/entete');
                $this->load->view('formules');
                $this->load->view('template/footer');
            }
        } else {
            //TODO pas besoin de code client car ary aloha efa misy génération hafa
            //$code_client=date("Y").date("m").date("d").$code;
            //$this->session->set_userdata("code_client", $code_client);
            //$data["code_client"]=$code_client;
            $this->load->view('template/assets');
            $this->load->view('template/entete');
            $this->load->view('formules');
            $this->load->view('template/footer');
        }
        //TODO langues paypal selon la langue choisie
    }

    public function formules_avant() {
        $code = $this->chaine_aleatoire(6);
        if (!$this->session->userdata('id_client') && !$this->session->userdata('nouveau_client')) {
            //si pas encore connecté, proposé connexion si efa ao - ou nouveau client
            redirect(base_url("home/authentification?next=home/formules"), "refresh");
        } else {
            if (!$this->session->userdata('nouveau_client')) {
                //connecté izy matoa tonga eto
                $data["nb_images_traites"] = "is not 'nb_images'";
                $data["date"] = "is not 'nb_images'";
                $formule = "Abonnement 50 photos";
                $id_client = $this->session->userdata('id_client');

                //TODO voir opérations de date mysql, mila manana doc mysql
                $where = "id_client = '$id_client' AND formule = '$formule' AND nb_images_traites != nb_images AND DATEDIFF(CURDATE(), STR_TO_DATE(date, '%d/%m/%Y')) < 7";

                $abonnements = $this->base_model->findWhereArray("commande", $where)->result();
                $nb_abonnements = count($abonnements);
                if ($nb_abonnements != 0) {
                    $abonnement = $abonnements[$nb_abonnements - 1];
                    $data['id_commande'] = $abonnement->id;
                    //TODO Personnaliser le transert selon une commande
                    $data['nb_images'] = $abonnement->nb_images - $abonnement->nb_images_traites;
                    $data['abonnement'] = $abonnement;

                    $dataRessources["css_files"] = array('../plupload/jquery.ui.plupload/css/jquery.ui.plupload');
                    $dataRessources["js_files"] = array('../plupload/plupload.full.min', '../plupload/jquery.ui.plupload/jquery.ui.plupload', '../plupload/i18n/fr');

                    $this->load->view('template/assets', $dataRessources);
                    $this->load->view('template/entete');
                    $this->load->view('transfert', $data);
                    $this->load->view('template/footer');
                } else {
                    $this->load->view('template/assets');
                    $this->load->view('template/entete');
                    $this->load->view('formules');
                    $this->load->view('template/footer');
                }
            } else {

                //TODO pas besoin de code client car ary aloha efa misy génération hafa
                //$code_client=date("Y").date("m").date("d").$code;
                //$this->session->set_userdata("code_client", $code_client);
                //$data["code_client"]=$code_client;
                $this->load->view('template/assets');
                $this->load->view('template/entete');
                $this->load->view('formules');
                $this->load->view('template/footer');
            }
            //TODO langues paypal selon la langue choisie
        }
    }

    public function contact() {
        $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('contact');
        $this->load->view('template/footer');
    }

    public function aboutus() {
        $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('quisommesnous');
        $this->load->view('template/footer');
    }

    public function transfert() {
        $donnee['id_client'] = $this->session->userdata('id_client');
        //TODO optimisation de la requette
        $result = $this->base_model->findWhereArray("commande", $donnee)->result();
        $commande = $result[count($result) - 1];
        $data['nb_images'] = $commande->quantite * $commande->nb_images;
        $data['id_commande'] = $commande->id;
        //TODO Personnaliser le transert selon une commande
        //$dataRessources["css_files"] = array('fileupload/css/jquery.fileupload.css','fileupload/css/jquery.fileupload-ui.css');
        //$dataRessources["js_files"] = array('fileupload/plupload.full.min', 'plupload/jquery.ui.plupload/jquery.ui.plupload');

        $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('transfert', $data);
        $this->load->view('template/footer');
    }

    public function upload() {
        //http://stackoverflow.com/questions/16555550/how-do-i-return-data-via-ajax-using-plupload-on-upload-complete?rq=1
        //http://stackoverflow.com/questions/13367897/unable-to-pass-additional-parameters-in-plupload/13382331#13382331
        // Make sure file is not cached (as it happens for example on iOS devices)
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        /*
          // Support CORS
          header("Access-Control-Allow-Origin: *");
          // other CORS headers if any...
          if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
          exit; // finish preflight CORS requests here
          }
         */

// 5 minutes execution time
        @set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);
// Settings
        //$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = "/images_retoucher";
//$targetDir = 'uploads';
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
// Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

// Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;


// Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}.part") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


// Open temp file
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }

        @fclose($out);
        @fclose($in);

// Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off
            rename("{$filePath}.part", $filePath);
        }

// Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }

    public function complete_profile_action() {
        $password = $this->input->post('password');
        $id_client = $this->session->userdata('id_client');
        //TODO si tsy updaté
        echo $this->base_model->update("les_clients", array('password' => $password), 'idclient', $id_client);
        $next = $this->input->post('next');
        $this->session->unset_userdata('next', $next);
        redirect(base_url($next), "refresh");
    }

    public function complete_profile() {
        //$next = $_GET["next"];
        $next = "hery";
        if ($next) {
            $this->session->set_userdata('next', $next);
            $data["next"] = $next;
            $this->load->view('template/assets');
            $this->load->view('template/entete');
            $this->load->view('complete_profile', $data);
            $this->load->view('template/footer');
        } else {
            redirect(base_url(), "refresh");
        }
    }

    public function finpaiement() {
        //PDT identity token : mpNv8TxyeIOk4uFeie0vBtVBfp_QSC17oWjExKCXENTQH3hDSMNxL4k2JkC
        //James Soiby
        //Secure Merchant Account ID : HQJB2644GHPKS
        $pp_hostname = "www.sandbox.paypal.com"; // Change to www.sandbox.paypal.com to test against sandbox
        // read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-synch';


        $tx_token = $_GET['tx'];
        $auth_token = "mpNv8TxyeIOk4uFeie0vBtVBfp_QSC17oWjExKCXENTQH3hDSMNxL4k2JkC";
        $req .= "&tx=$tx_token&at=$auth_token";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
        //if your server does not bundled with default verisign certificates.
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
        $res = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if (!$res) {
            echo $error;
            //http://127.0.0.1:8080/myretooch2/index.php/home/finpaiement?tx=7514096072772520F&st=Pending&amt=6%2e90&cc=EUR&cm=1&item_number=1
            //HTTP ERROR
        } else {
            // parse the data
            $lines = explode("\n", $res);

          

            $keyarray = array();
            if (strcmp($lines[0], "SUCCESS") == 0) {
                for ($i = 1; $i < count($lines); $i++) {
                    if ($lines[$i] != '') {
                        list($key, $val) = explode("=", $lines[$i]);
                        $keyarray[urldecode($key)] = urldecode($val);
                    }
                }
                // check the payment_status is Completed
                // check that txn_id has not been previously processed
                // check that receiver_email is your Primary PayPal email
                // check that payment_amount/payment_currency are correct
                // process payment
                $payment_status = $keyarray['payment_status'];
                if ($payment_status == 'Completed') {
                    $first_name = $keyarray['first_name'];
                    $last_name = $keyarray['last_name'];
                    $item_name = $keyarray['item_name'];
                    $amount = $keyarray['payment_gross'];
                    $address_street = @$keyarray['address_street'];
                    $address_country = @$keyarray['address_country'];
                    $address_city = @$keyarray['address_city'];

                    //TODO rehefa milog dia tadidina 'le email
                    $payer_email = $keyarray['payer_email'];
                    $receiver_email = $keyarray['receiver_email'];
                    $quantity = $keyarray['quantity'];
                    $payment_amount = $keyarray['mc_gross'];

                    $nb_images = $keyarray['custom'];
                    $datecreation = date("d") . "/" . date("m") . "/" . date("Y");
                    $code_client = "";
                    $data["email"] = $payer_email;
                    $result = $this->base_model->findWhereArray("les_clients", $data)->result();
                    if ($this->session->userdata('id_client')) {
                        $code_client = $this->session->userdata('id_client');
                    } else if (count($result) > 0) {
                        //efa inscrit
                        $code_client = $result[0]->idclient;
                    } else {
                        //nouveau client
                        $code_client = $this->generateRandomString();
                    }

                    $this->load->model("base_model");
                    $test = $this->base_model->verif_txnid($tx_token);
                    if ($test == 0) {
                        //TODO Ajouter payer_email to if
                        if ($receiver_email == 'rainad.pay-facilitator@gmail.com') {
                            $donnes_commande = array(
                                'id_client' => $code_client,
                                'txnid' => $tx_token,
                                'date' => $datecreation,
                                'formule' => $item_name,
                                'quantite' => $quantity,
                                'total' => $payment_amount,
                                'nb_images' => $nb_images
                            );
                            //Insertion donnes paniers
                            $this->base_model->save('commande', $donnes_commande);

                            $donnes_paypal = array(
                                'idclient' => $code_client,
                                'txnid' => $tx_token,
                                'date' => $datecreation,
                                'statut' => $payment_status,
                                'payer_name' => $first_name,
                                'payer_last_name' => $last_name,
                                'payer_adresse' => $address_street,
                                'payer_country' => $address_country,
                                'payer_city' => $address_city,
                                'total' => $payment_amount
                            );

                            $this->base_model->save('infos_paypal', $donnes_paypal);

                            if (count($result) > 0) {
                                //inscrit
                                $data['nb_images'] = $nb_images;
                                $this->base_model->update('les_clients', $data, 'idclient', $this->session->userdata('id_client'));
                                //connecter
                                $this->session->set_userdata('id_client', $code_client);
                                $this->session->set_userdata('email', $payer_email);
                                $this->session->set_userdata('nom', $first_name);
                                $this->session->set_userdata('prenom', $last_name);
                                redirect(base_url('home/transfert'), 'refresh');
                            } else {
                                //nouveau client
                                $infos_client = array(
                                    'idclient' => $code_client,
                                    'date_ajout' => $datecreation,
                                    'nom' => $first_name,
                                    'prenom' => $last_name,
                                    'email' => $payer_email,
                                    'password' => "",
                                    'nb_images' => $nb_images,
                                    'actif' => 0
                                );
                                $this->base_model->save('les_clients', $infos_client);

                                //connecter
                                $this->session->set_userdata('id_client', $code_client);
                                $this->session->set_userdata('email', $payer_email);
                                $this->session->set_userdata('nom', $first_name);
                                $this->session->set_userdata('prenom', $last_name);

                                //rediriger vers compléter son mot de passe
                                redirect(base_url('home/complete_profile?next=home/transfert'), 'refresh');
                            }
                        }
                    } else {
                        
                    }
                } else {
                    //log for manual investigation
                }
            } else if (strcmp($lines[0], "FAIL") == 0) {
                // log for manual investigation
            }
        }

        //TODO tsy tokony ho any rehefa inscrit, fa arakaraka 'le placen'le inscription dia esorina raha ohatra ka
          $donnees["idclient"]="12345";
          if (isset($nb_images)){
              $donnees["nbimages"]=$nb_images;
          }else{
              $donnees["nbimages"]=10;
          }
          
          $this->load->view('template/assets');
          $this->load->view('template/entete');
          $this->load->view('transfert', $donnees);
          $this->load->view('template/footer'); 
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function envoyerPhoto() {
        $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('envoyerPhoto');
        $this->load->view('template/footer');
    }

    public function inscription() {
        $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('inscription');
        $this->load->view('template/footer');
    }

    public function register() {
//        $this->load->model('client_model');
//        echo $this->input->post('email');
//        $data = array(
//            'email_client' => $this->input->post('email'),
//            'login_client' => $this->input->post('login'),
//            'mot2passe_client' => $this->input->post('password'),
//            'nom_client' => $this->input->post('nom'),
//            'prenom_client' => $this->input->post('prenoms'),
//            'adresse_client' => $this->input->post('adresse')
//        );
////Transfering data to Model
//        $this->client_model->form_insert($data);
//        $data['message'] = 'Data Inserted Successfully';
//        echo ici;
//        die();
////Loading View
        $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('confirmation');
        $this->load->view('template/footer');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */