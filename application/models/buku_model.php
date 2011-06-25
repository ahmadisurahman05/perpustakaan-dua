<?php
class Buku_model extends CI_Model {
	function get($query=FALSE,$id=FALSE,$limit=FALSE,$offset=FALSE) {
	if ($query=='all') {
			$this->db->limit($limit,$offset);
			return $this->db->get('tb_buku')->result_array();
	}
	elseif ($query=='by_id') {
			$this->db->where('id_buku',$id);
			return $this->db->get('tb_buku')->row();
	}
	}
	
	function add($data) {
		return $this->db->insert('tb_buku',$data);
	}
	
	function delete() {
		return $this->db->delete('tb_buku');
	}
	
	function update($id,$data) {
	$this->db->where('id_buku',$id);
	return $this->db->update('tb_buku',$data);
	}
}
?>