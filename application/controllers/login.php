<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
				$this->load->model ('Login_model');
				$this->load->helper('url'); 
	}

	function index() {
	$this->form_validation->set_rules('username', 'Input Username', 'required');
	$this->form_validation->set_rules('password', 'Kata Sandi', 'required');
	if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
		
			if ($this->Login_model->check_user($username,$password) == 1)
			{
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('password',$password);
			$lihatsesi=$this->session->userdata('username');

				redirect('aplikasi_perpus');
			echo "anda berhasil";
			}
			else
			{
//				redirect('login');
			echo "silahkan ulangi lagi...";
			}
		}
		else
		{

		$data['main_view']='view_login.php';
		$this->load->view('index.php',$data);
		}
		}
}
?>