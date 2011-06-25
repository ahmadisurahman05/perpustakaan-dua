<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	function __construct() {
		parent::__construct();
				$this->load->model ('Profil_model');
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
	{		
	$this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	$this->form_validation->set_rules('telpon', 'Nomor Telpon', 'required');
		if ($this->form_validation->run()==FALSE) {
		
				
	$offset=$this->uri->segment(3);
	$config['base_url']=site_url().'data/index';
	$config['total_rows']=$this->db->count_all_results('profil');
	$config['uri_segment']=3;
	$config['per_page']=2;
	$data['query']=$this->Profil_model->get('all',FALSE,$config['per_page'],$offset);
	$this->pagination->initialize($config);

		
//		$data['query']=$this->db->get('profil')->result_array();
//		$data['query']=$this->Profil_model->get('all',FALSE);
		$data['main_view']='view_data.php';
		$this->load->view('index.php',$data);
		}
		else {
		$data=array('nama'=>$this->input->post('nama'),
		'jenis_kel'=>$this->input->post('jenis_kel'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp'=>$this->input->post('telpon'));
//		$this->db->insert('profil',$data);
//		$this->load->model ('Profil_model');
		$this->Profil_model->add($data);
//		redirect ('welcome');
		$data['query']=$this->db->get('profil')->result_array();
		$data['main_view']='view_data.php';
		$this->load->view('index.php',$data);
			}
	}
// FUNGSI DELETE DATA
	function delete_data() {
	$id=$this->uri->segment(3);
	$this->db->where('id_data',$id);
//	$this->db->delete('profil'); 
//	$this->load->model ('Profil_model');
	$this->Profil_model->delete($id);
	redirect ('welcome');
	//	$this->db->delete('profil', array('id' => $id)); 
	}
	
// FUNGSI GABUNGAN
	function gabungan() {
	
	}
// FUNGSI EDIT DATA
	function edit_data() {
	$this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	$this->form_validation->set_rules('telpon', 'Nomor Telpon', 'required');

	if ($this->form_validation->run()==FALSE) {
//		$this->load->model ('Profil_model');
		$id=$this->uri->segment(3);
		$this->db->where('id_data',$id);
		$data['row']=$this->Profil_model->get('by_id',$id);
		$this->load->view('edit_data',$data);
		}
		
	else {
		$data=array('nama'=>$this->input->post('nama'),
		'jenis_kel'=>$this->input->post('jenis_kel'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp'=>$this->input->post('telpon'));
		$id=$this->uri->segment(3);
//		$this->db->where('id_data', $id);
//		$this->db->update('profil', $data); 
//		$this->load->model ('Profil_model');
		$this->Profil_model->update($id,$data);
		
		redirect ('welcome');
//		$data['query']=$this->db->get('profil')->result_array();
//		$this->load->view('welcome_message',$data);
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */