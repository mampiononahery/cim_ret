<?php

class Commande extends CI_Controller{
    private $dataBase;
    private $dataMenu;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('base_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->dataBase["header"] = $this->load->view("backoffice/include/header", null, true);
        $this->dataBase["breadcrumbs"] = $this->load->view("backoffice/include/breadcrumbs", null, true);
        $this->dataBase["pageheader"] = $this->load->view("backoffice/include/pageheader", null, true);
        $this->dataBase["footer"] = $this->load->view("backoffice/include/footer", null, true);

        $this->dataMenu["commandesActive"] = "active";

    }

    public function index(){
        $this->liste();
    }

    public function liste(){
        $data["menu"] = $this->load->view("backoffice/include/menu", $this->dataMenu, true);
        $data["titreTab"] = "Les commandes";
        $data["title"] = "Les commandes - MyRetooch";

        $data["commandes"] = $this->base_model->findAll("commande");
        foreach($data["commandes"] as $commande){
            $params['idclient'] = $commande->id_client;
            $commande->client = $this->base_model->findWhereArray("les_clients", $params)->result()[0];
        }

        $dataRessources["css_files"] = array('responsive-tables');
        $dataRessources["js_files"] = array('jquery.dataTables.min', 'responsive-tables');
        $data["ressources"] = $this->load->view("backoffice/include/ressources", $dataRessources, true);
        $data = array_merge($this->dataBase, $data, $dataRessources);
        $this->load->view("backoffice/commande/liste", $data);
    }
    public function nonTraite(){
        $data["menu"] = $this->load->view("backoffice/include/menu", $this->dataMenu, true);
        $data["titreTab"] = "Les commandes non traitées";
        $data["title"] = "Les commandes non traitées - MyRetooch";

        $where = "nb_images_traites != nb_images";
        $data["commandes"] = $this->base_model->findWhereArray("commande", $where)->result();
        foreach($data["commandes"] as $commande){
            $params['idclient'] = $commande->id_client;
            $commande->client = $this->base_model->findWhereArray("les_clients", $params)->result()[0];
        }

        $dataRessources["css_files"] = array('responsive-tables');
        $dataRessources["js_files"] = array('jquery.dataTables.min', 'responsive-tables');
        $data["ressources"] = $this->load->view("backoffice/include/ressources", $dataRessources, true);
        $data = array_merge($this->dataBase, $data, $dataRessources);
        $this->load->view("backoffice/commande/liste", $data);
    }
    public function traite(){
        $data["menu"] = $this->load->view("backoffice/include/menu", $this->dataMenu, true);
        $data["titreTab"] = "Les commandes traitées";
        $data["title"] = "Les commandes tratées - MyRetooch";

        $where = "nb_images_traites = nb_images";
        $data["commandes"] = $this->base_model->findWhereArray("commande", $where)->result();
        foreach($data["commandes"] as $commande){
            $params['idclient'] = $commande->id_client;
            $commande->client = $this->base_model->findWhereArray("les_clients", $params)->result()[0];
        }

        $dataRessources["css_files"] = array('responsive-tables');
        $dataRessources["js_files"] = array('jquery.dataTables.min', 'responsive-tables');
        $data["ressources"] = $this->load->view("backoffice/include/ressources", $dataRessources, true);
        $data = array_merge($this->dataBase, $data, $dataRessources);
        $this->load->view("backoffice/commande/liste", $data);
    }



} 