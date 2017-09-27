<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transfert extends CI_Controller {
    private $nb_abonnements;
    private $abonnements;
    private $abonnement;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Europe/Paris');
        $this->load->library('session');
        $this->load->model('base_model');

        $data["nb_images_traites"] = "is not 'nb_images'";
        $data["date"] = "is not 'nb_images'";
        $formule = "Abonnement 50 photos";
        $id_client = $this->session->userdata('id_client');

        if($id_client){
            //TODO voir opérations de date mysql, mila manana doc mysql
            $where = "id_client = '$id_client' AND formule = '$formule' AND nb_images_traites != nb_images AND DATEDIFF(CURDATE(), STR_TO_DATE(date, '%d/%m/%Y')) < 7";

            $this->abonnements = $this->base_model->findWhereArray("commande", $where)->result();
            $this->nb_abonnements = count($this->abonnements);
            if($this->nb_abonnements != 0){
                $this->abonnement = $this->abonnements[$this->nb_abonnements - 1];
                $this->session->set_userdata('abonnement', true);
            }
        }
    }


    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {   $this->load->view('template/assets');
        $this->load->view('template/entete');
        $this->load->view('transfert');
        $this->load->view('template/footer');
    }
    public function upload()
    {
        error_reporting(E_ALL | E_STRICT);
        $this->load->helper("UploadHandler.class");
        $upload_handler = new UploadHandler();
    }
}