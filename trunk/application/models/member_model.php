<?php
class Member_model extends CI_Model {
	function get($query=FALSE,$id=FALSE,$limit=FALSE,$offset=FALSE) {
	if ($query=='all') {
			$this->db->limit($limit,$offset);
			return $this->db->get('tb_member')->result_array();
	}
	elseif ($query=='by_id') {
			$this->db->where('id_member',$id);
			return $this->db->get('tb_member')->row();
	}
	}
	
	function add($data) {
		return $this->db->insert('tb_member',$data);
	}
	
	function delete() {
		return $this->db->delete('tb_member');
	}
	
	function update($id,$data) {
	$this->db->where('id_member',$id);
	return $this->db->update('tb_member',$data);
	}
}
?>