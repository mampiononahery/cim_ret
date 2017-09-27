<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model{

    public function findAllNew()
    {
        $this->db->where('CURRENT_DATE - date_ajout <= 7 ', null, false);
        $this->db->order_by('idclient');
        return $this->db->get("les_clients");
    }

}