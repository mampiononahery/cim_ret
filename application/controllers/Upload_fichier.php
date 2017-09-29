<?php
class Upload_fichier extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url','file'));
	}

	public function index(){
		$this->load->view('upload_view');
	}

	// Upload in process 
	
	public function upload_files(){

		$config['upload_path']   = './files/';
		$config['allowed_types'] = '*';
		$this->load->library('upload',$config);

		if($this->upload->do_upload('userfile'))
		{
			/*$token=$this->input->post('token');
			$file_name=$this->upload->data('file_name');
			$this->db->insert('file',array('file_name'=>$file_name,'token'=>$token));*/
		}


	}


	// Delete Image

	public function delete_image(){

		$token=$this->input->post('token');		
		//$query=$this->db->get_where('file',array('token'=>$token));

		/*if($query->num_rows()>0){

			$data=$query->row();
			$file_name=$data->file_name;


				if(file_exists($file=FCPATH.'/files/'.$file_name)){
				unlink($file);
			}
			}
		$this->db->delete('file',array('token'=>$token));*/
		echo json_encode(array('deleted'=>true));

		}

	}
