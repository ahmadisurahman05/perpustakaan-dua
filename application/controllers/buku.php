<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buku extends CI_Controller {
	function __construct() {
		parent::__construct();
				$this->load->model ('Buku_model');
	}
	public function index()
	{		
	$this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
	$this->form_validation->set_rules('judul', 'Judul', 'required');
	$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
	$this->form_validation->set_rules('no_buku', 'Nomor Bulu', 'required');
	$this->form_validation->set_rules('kategori', 'Kategori', 'required');
	$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
	$this->form_validation->set_rules('kode_rak', 'Kode Rak', 'required');
	
	if ($this->form_validation->run()==FALSE) {
						
	$offset=$this->uri->segment(3);
	$config['base_url']=site_url().'/buku/index';
	$config['total_rows']=$this->db->count_all_results('tb_buku');
	$config['uri_segment']=3;
	$config['per_page']=2;
	$data['query']=$this->Buku_model->get('all',FALSE,$config['per_page'],$offset);
	$this->pagination->initialize($config);

		$data['main_view']='view_buku.php';
		$this->load->view('tampil.php',$data);
		}
		else {
		$data=array('kode_buku'=>$this->input->post('kode_buku'),
		'judul'=>$this->input->post('judul'),
		'pengarang'=>$this->input->post('pengarang'),
		'no_buku'=>$this->input->post('no_buku'),
		'id_kategori'=>$this->input->post('kategori'),
		'id_penerbit'=>$this->input->post('penerbit'),
		'kode_rak'=>$this->input->post('kode_rak')
		);

		$this->Buku_model->add($data);
		$data['query']=$this->db->get('tb_buku')->result_array();
		$data['main_view']='view_buku.php';
		$this->load->view('tampil.php',$data);
			}
	}
// FUNGSI DELETE DATA
	function delete_buku() {
	$id=$this->uri->segment(3);
	$this->db->where('id_buku',$id);
	$this->Buku_model->delete($id);
	redirect ('buku');
	//	$this->db->delete('profil', array('id' => $id)); 
	}
	
// FUNGSI EDIT DATA
	function edit_buku() {
	$this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
	$this->form_validation->set_rules('judul', 'Judul', 'required');
	$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
	$this->form_validation->set_rules('no_buku', 'Nomor Bulu', 'required');
	$this->form_validation->set_rules('kategori', 'Kategori', 'required');
	$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
	$this->form_validation->set_rules('kode_rak', 'Kode Rak', 'required');

	if ($this->form_validation->run()==FALSE) {
		$id=$this->uri->segment(3);
		$this->db->where('id_buku',$id);
		$data['row']=$this->Buku_model->get('by_id',$id);
		$data['main_view']='edit_buku.php';
		$this->load->view('tampil',$data);
		}
		
	else {
		$data=array('kode_buku'=>$this->input->post('kode_buku'),
		'judul'=>$this->input->post('judul'),
		'pengarang'=>$this->input->post('pengarang'),
		'no_buku'=>$this->input->post('no_buku'),
		'id_kategori'=>$this->input->post('kategori'),
		'id_penerbit'=>$this->input->post('id_penerbit'),
		'kode_rak'=>$this->input->post('kode_rak'));
		$id=$this->uri->segment(3);
		$this->Buku_model->update($id,$data);
		
		redirect ('buku');
			}
	}
}