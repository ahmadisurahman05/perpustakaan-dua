<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	function __construct() {
		parent::__construct();
				$this->load->model ('Member_model');
	}
	public function index()
	{		
	$this->form_validation->set_rules('nim', 'NIM', 'required');
	$this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
	$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	$this->form_validation->set_rules('no_telp', 'Nomor Telpon', 'required');
	
	if ($this->form_validation->run()==FALSE) {
						
	$offset=$this->uri->segment(3);
	$config['base_url']=site_url().'/member/index';
	$config['total_rows']=$this->db->count_all_results('tb_member');
	$config['uri_segment']=3;
	$config['per_page']=2;
	$data['query']=$this->Member_model->get('all',FALSE,$config['per_page'],$offset);
	$this->pagination->initialize($config);

		$data['main_view']='view_member.php';
		$this->load->view('tampil.php',$data);
		}
		else {
		$data=array('nim'=>$this->input->post('nim'),
		'nama'=>$this->input->post('nama'),
		'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
		'tgl_lahir'=>$this->input->post('tgl_lahir'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp'=>$this->input->post('no_telp')
		);

		$this->Member_model->add($data);
		$data['query']=$this->db->get('tb_member')->result_array();
		$data['main_view']='view_member.php';
		$this->load->view('tampil.php',$data);
			}
	}
// FUNGSI DELETE DATA
	function hapus_member() {
	$id=$this->uri->segment(3);
	$this->db->where('id_member',$id);
	$this->Member_model->delete($id);
	redirect ('member');
	//	$this->db->delete('profil', array('id' => $id)); 
	}
	
// FUNGSI EDIT DATA
	function edit_member() {
	$this->form_validation->set_rules('id_member', 'ID Member', 'required');
	$this->form_validation->set_rules('nim', 'NIM', 'required');
	$this->form_validation->set_rules('nama', 'Nama', 'required');
	$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
	$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
	$this->form_validation->set_rules('no_telp', 'Nomor Telpon', 'required');

	if ($this->form_validation->run()==FALSE) {
		$id=$this->uri->segment(3);
		$this->db->where('id_member',$id);
		$data['row']=$this->Member_model->get('by_id',$id);
		$data['main_view']='edit_member.php';
		$this->load->view('tampil',$data);
		}
		
	else {
		$data=array('id_member'=>$this->input->post('id_member'),
		'nim'=>$this->input->post('nim'),
		'nama'=>$this->input->post('nama'),
		'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
		'tgl_lahir'=>$this->input->post('tgl_lahir'),
		'alamat'=>$this->input->post('alamat'),
		'no_telp'=>$this->input->post('no_telp'));
		$id=$this->uri->segment(3);
		$this->Member_model->update($id,$data);
		
		redirect ('member');
			}
	}
}