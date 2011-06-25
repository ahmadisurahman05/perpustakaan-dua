<?php
class Logout extends CI_Controller {
	function index() {
		$this->session->sess_destroy();
//		redirect('login');
		$data['teks'] = "Anda Sudah Berhasil Logout...";
		$data['main_view']='view_logout.php';
		$this->load->view('tampil.php',$data);
	}
	
	function pesan() {
		echo "anda berhasil logout...";
	}
}
?>