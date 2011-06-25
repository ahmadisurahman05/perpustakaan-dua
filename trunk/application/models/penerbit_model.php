<?php
class Penerbit_model extends CI_Model {
	function get($query=FALSE,$id=FALSE,$limit=FALSE,$offset=FALSE) {
	if ($query=='all') {
			$this->db->limit($limit,$offset);
			return $this->db->get('tb_penerbit')->result_array();
	}
	elseif ($query=='by_id') {
			$this->db->where('id_penerbit',$id);
			return $this->db->get('tb_penerbit')->row();
	}
	}
	
	function add($data) {
		return $this->db->insert('tb_penerbit',$data);
	}
	
	function delete() {
		return $this->db->delete('tb_penerbit');
	}
	
	function update($id,$data) {
	$this->db->where('id_penerbit',$id);
	return $this->db->update('tb_penerbit',$data);
	}
}
?>