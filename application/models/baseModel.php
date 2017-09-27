<?php

class BaseModel extends CI_Model {
	
	
	function save($table, $data){
		$inserrer=$this->db->insert($table,$data);
		return $inserrer;
	}

    function update($table, $valuesArray, $idname, $idvalue){
        $this->db->where($idname, $idvalue);
        return $this->db->update($table, $valuesArray);
    }

    function findWhereArray($table, $values_array){
        $this->db->where($values_array);
        return $this->db->get($table);
    }

    // Récupération de  tous les enregistrements
    function findAll($table){
        $query= $this->db->get($table);

        if($query->num_rows>0){
            foreach ($query-> result() as $row) { //la fonction result() retourne un tableau d'objets
                $data[]= $row;
            }
            return $data;
        }
    }

    function delete($table,$parameter,$value){
        $this->db->where($parameter,$value);
        return $this->db->delete($table);
    }

    public function findAllNew()
    {
        $this->db->where('CURRENT_DATE - dateinscriptionclient <= 7 ', null, false);
        $this->db->order_by('idclient');
        return $this->db->get("client_vue");
    }

	function modifier($tab,$table,$condition,$value){
		$this->db->where($condition,$value);
		$this->db->update($table, $tab);
	}
	function updater($tab,$table,$condition){
		$this->db->where($condition);
		$this->db->update($table, $tab);
	}
	function nb_enregistrement($table){
	
	return $this->db->count_all($table);
	
	}
	
	function get_desc($table){
	$this->db->from($table);
	$this->db->order_by("Id", "desc");
	$query = $this->db->get(); 
	if($query->num_rows>0){
		foreach ($query-> result() as $row) { //la fonction result() retourne un tableau d'objets
			$data[]= $row;
		}
		return $data;
		}
	}
	function select_distinct($table,$chp){
	//$this->db->select($chp);
	$this->db->distinct($chp);
	$this->db->from($table);
	
	$query = $this->db->get(); 
	if($query->num_rows>0){
		foreach ($query-> result() as $row) { //la fonction result() retourne un tableau d'objets
			$data[]= $row;
		}
		return $data;
		}
	}


	// Récupération d'un enregistrement  à travers l'id
	function get_by($table,$condition,$value){
	$this->db->where($condition,$value);
	$query=$this->db->get($table);
	$data=$query->result_array();
	return $data;
	}
	
	
	function get_by_object($table,$condition,$value){
	$this->db->where($condition,$value);
	$query=$this->db->get($table);
	if($query->num_rows>0){
		foreach ($query-> result() as $row) { //la fonction result() retourne un tableau d'objets
			$data[]= $row;
		}
		return $data;
		}
	}
	
	function get_or($condition){
	$query=$this->db->query($condition);
	//$query=$this->db->get($table);
	if($query->num_rows>0){
		foreach ($query-> result() as $row) { //la fonction result() retourne un tableau d'objets
			$data[]= $row;
		}
		return $data;
		}
	}
	
	function getVar1($id,$table,$chp,$nomf){
	    $query=$this->db->query('select '.$id.' FROM '.$table.' WHERE '.$chp.'="'.$nomf.'"');
		
		if($query->num_rows()>0){
		foreach ($query-> result() as $row){
			$data[]=$row;
		}
		}else {
			return null;
		}
		return $data;
	}//fingetId
	function verifid($table ,$condition){
		$this->db->where($condition);
        $num = $this->db->count_all_results($table);
		
		return $num;
	}
		
	function get2Cond($id,$table,$chp1,$nom1,$chp2,$nom2){
	    $query=$this->db->query('select '.$id.' FROM '.$table.' WHERE '.$chp1.'="'.$nom1.'" AND '.$chp2.'="'.$nom2.'"');
		
		if($query->num_rows()>0){
		foreach ($query-> result() as $row){
			$data[]=$row;
			
		}
		}else {
			return null;
		}
		return $data;
		
	}//fingetId
	
	function get3Cond($id,$table,$chp1,$nom1,$chp2,$nom2,$chp3,$nom3){
	    $query=$this->db->query('select '.$id.' FROM '.$table.' WHERE '.$chp1.'="'.$nom1.'" AND '.$chp2.'="'.$nom2.'" AND '.$chp3.'="'.$nom3.'"');
		
		if($query->num_rows()>0){
		foreach ($query-> result() as $row){
			$data[]=$row;
			
		}
		}else {
			return null;
		}
		return $data;
		
	}//fingetId
	
	function get2Var($id,$id2,$table,$chp,$nomf){
	    $query=$this->db->query('select '.$id.', '.$id2.' FROM '.$table.' WHERE '.$chp.'="'.$nomf.'"');
		
		if($query->num_rows()>0){
		foreach ($query-> result() as $row){
			$data[]=$row;
		}
		}else {
			return null;
		}
		return $data;
	}//fingetId
	
	function check_entry_1cond($var,$table,$cond1,$ver1) {
		$query=$this->getVar1($var,$table,$cond1,$ver1);

		if($query){
			return TRUE;
		}else{
			return FALSE;
		}	
	}
	function verif_txnid($id){
	$query = $this->db->get_where('infos_paypal', array('txnid' => $id));
	$count = $query->num_rows(); 
	return $count;
	
	}
}
