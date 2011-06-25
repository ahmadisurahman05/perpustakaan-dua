<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerbit extends CI_Controller {
	function __construct() {
		parent::__construct();
				$this->load->model ('Penerbit_model');
	}
	public function index()
	{		
	$this->form_validation->set_rules('nama_penerbit', 'Nama Penerbit', 'required');
	
	if ($this->form_validation->run()==FALSE) {
						
	$offset=$this->uri->segment(3);
	$config['base_url']=site_url().'/penerbit/index';
	$config['total_rows']=$this->db->count_all_results('tb_penerbit');
	$config['uri_segment']=3;
	$config['per_page']=2;
	$data['query']=$this->Penerbit_model->get('all',FALSE,$config['per_page'],$offset);
	$this->pagination->initialize($config);

		$data['main_view']='view_penerbit.php';
		$this->load->view('tampil.php',$data);
		}
		else {
		$data=array('nama_penerbit'=>$this->input->post('nama_penerbit'));

		$this->Penerbit_model->add($data);
		$data['query']=$this->db->get('tb_penerbit')->result_array();
		$data['main_view']='view_penerbit.php';
		$this->load->view('tampil.php',$data);
			}
	}
// FUNGSI DELETE DATA
	function hapus_penerbit() {
	$id=$this->uri->segment(3);
	$this->db->where('id_penerbit',$id);
	$this->Penerbit_model->delete($id);
	redirect ('penerbit');	}
	
// FUNGSI EDIT DATA
	function edit_penerbit() {
	$this->form_validation->set_rules('id_penerbit', 'ID Penerbit', 'required');
	$this->form_validation->set_rules('nama_penerbit', 'Nama Penerbit', 'required');

	if ($this->form_validation->run()==FALSE) {
		$id=$this->uri->segment(3);
		$this->db->where('id_penerbit',$id);
		$data['row']=$this->Penerbit_model->get('by_id',$id);
		$data['main_view']='edit_penerbit.php';
		$this->load->view('tampil',$data);
		}
		
	else {
		$data=array('id_penerbit'=>$this->input->post('id_penerbit'),
		'nama_penerbit'=>$this->input->post('nama_penerbit'));
		$id=$this->uri->segment(3);
		$this->Penerbit_model->update($id,$data);
		
		redirect ('penerbit');
			}
	}
	}