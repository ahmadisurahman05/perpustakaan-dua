<?php
class Login_model extends CI_Model {
	function index() {
//	{
//		parent::Model();
//	}
	
	}
	var $table= 'tb_admin';
	function check_user($username, $password)
	{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
		return	$this->db->get ('tb_admin')->num_rows();
			
	}
	
}
?>