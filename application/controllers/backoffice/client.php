<?php

class Client extends CI_Controller{
    private $dataBase;
    private $dataMenu;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('base_model');
        $this->load->model('client_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->dataBase["header"] = $this->load->view("backoffice/include/header", null, true);
        $this->dataBase["breadcrumbs"] = $this->load->view("backoffice/include/breadcrumbs", null, true);
        $this->dataBase["pageheader"] = $this->load->view("backoffice/include/pageheader", null, true);
        $this->dataBase["footer"] = $this->load->view("backoffice/include/footer", null, true);

        $this->dataMenu["clientsActive"] = "active";

    }

    public function index(){
        $this->liste();
    }

    public function liste(){
        $data["menu"] = $this->load->view("backoffice/include/menu", $this->dataMenu, true);
        $data["titreTab"] = "Les clients";
        $data["title"] = "Les clients - MyRetooch";

        $data["clients"] = $this->base_model->findAll("les_clients");

        $dataRessources["css_files"] = array('responsive-tables');
        $dataRessources["js_files"] = array('jquery.dataTables.min', 'responsive-tables');
        $data["ressources"] = $this->load->view("backoffice/include/ressources", $dataRessources, true);
        $data = array_merge($this->dataBase, $data, $dataRessources);
        $this->load->view("backoffice/client/liste", $data);
    }

    public function nouveaux(){
        $data["menu"] = $this->load->view("backoffice/include/menu", $this->dataMenu, true);
        $data["titreTab"] = "Les clients";
        $data["title"] = "Les nouveaux clients - MyRetooch";

        $data["clients"] = $this->client_model->findAllNew()->result();

        $dataRessources["css_files"] = array('responsive-tables');
        $dataRessources["js_files"] = array('jquery.dataTables.min', 'responsive-tables');
        $data["ressources"] = $this->load->view("backoffice/include/ressources", $dataRessources, true);
        $data = array_merge($this->dataBase, $data, $dataRessources);
        $this->load->view("backoffice/client/liste", $data);
    }

    public function add(){
        $data["menu"] = $this->load->view("backoffice/include/menu", $this->dataMenu, true);
        $data["title"] = "Ajouter un client - MyRetooch";
        $dataRessources["css_files"] = array('bootstrap-fileupload.min.css', 'bootstrap-timepicker.min');
        $dataRessources["js_files"] = array('jquery.validate.min', 'jquery.tagsinput.min', 'jquery.autogrow-textarea', 'ui.spinner.min');
        $data["ressources"] = $this->load->view("backoffice/include/ressources", $dataRessources, true);

        $data = array_merge($this->dataBase, $data, $dataRessources);
        $this->load->view("backoffice/client/add", $data);
    }

    public function addAction(){

        /*if($this->input->post('submit')){*/

        $this->form_validation->set_rules('nom', 'Nom', 'required|alpha');
        $this->form_validation->set_rules('prenom', 'Prénom(s)', 'required|alpha');
        /*$this->form_validation->set_rules('adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('ville', 'Ville', 'required');
        $this->form_validation->set_rules('numero', 'Numéro', 'required|numeric|min_length[10]|max_length[13]');*/
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirmer le mot de passe', 'required');

        $this->form_validation->set_message('required', 'Le champ %s est requis!');
        $this->form_validation->set_message('alpha', 'Le champ %s ne peut contenir que des lettres!');
        $this->form_validation->set_message('numeric', 'Le champ %s ne peut contenir que des chiffres!');
        $this->form_validation->set_message('min_length', 'Le champ %s doit avoir au moins %s caractères!');
        $this->form_validation->set_message('max_length', 'Le champ %s doit avoir au plus %s caractères!');
        $this->form_validation->set_message('matches', 'Le champ %s doit correspondre au champ %s !');

        if($this->form_validation->run() == FALSE){
            $this->add();
        }
        else{
            $data['nom'] = $this->input->post('nom');
            $data['prenom'] = $this->input->post('prenom');
            /*$data['sexe'] = $this->input->post('sexe');
            $data['adresseclient'] = $this->input->post('adresse');
            $data['villeclient'] = $this->input->post('ville');
            $data['numeroclient'] = $this->input->post('numero');*/
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            //TODO Mila ovaina
            $data['date_ajout'] = date('Y-m-d', now());
            $data['nb_images'] = '0';

            if(notEmptyStringArray($data) && $data['password'] == $confirm_password){
                if($this->base_model->save("les_clients", $data))
                    redirect(base_url('backoffice4682/client'), 'refresh');
                else
                    redirect(base_url('backoffice4682/client/add'), 'refresh');
            }
            else{
                print_r($data);
            }
        }
    }

    public function update($id_client){
        $data["menu"] = $this->load->view("backoffice/include/menu", $this->dataMenu, true);
        $data["title"] = "Modifier un client - MyRetooch";
        $dataRessources["css_files"] = array('bootstrap-fileupload.min.css', 'bootstrap-timepicker.min');
        $dataRessources["js_files"] = array('jquery.validate.min', 'jquery.tagsinput.min', 'jquery.autogrow-textarea', 'ui.spinner.min');
        $data["ressources"] = $this->load->view("backoffice/include/ressources", $dataRessources, true);

        $params['idclient'] = $id_client;
        $data["client"] = $this->base_model->findWhereArray("les_clients", $params)->result()[0];

        $data = array_merge($this->dataBase, $data, $dataRessources);
        $this->load->view("backoffice/client/update", $data);
    }

    public function updateAction(){
        $id_client = $this->input->post('id_client');
        $data['nom'] = $this->input->post('nom');
        $data['prenom'] = $this->input->post('prenom');
        /*$data['sexe'] = $this->input->post('sexe');
        $data['adresseclient'] = $this->input->post('adresse');
        $data['villeclient'] = $this->input->post('ville');
        $data['numeroclient'] = $this->input->post('numero');*/
        $data['email'] = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        if($password != "")
            $data['password'] = $password;

        if(notEmptyStringArray($data) && $password == $confirm_password){
            if($this->base_model->update("les_clients", $data, "idclient", $id_client))
                redirect(base_url('backoffice4682/client'), 'refresh');
            else
                redirect(base_url('backoffice4682/client/update'), 'refresh');
        }
    }

    public function delete($id_client){
        if($this->base_model->delete("les_clients", "idclient", $id_client))
            redirect(base_url('backoffice4682/client'), 'refresh');
        else
            redirect(base_url('backoffice4682/client'), 'refresh');
        //TODO améliorer ceci, misy message de retour
    }

} 