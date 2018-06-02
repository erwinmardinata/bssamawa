<?php

class Msampah extends CI_Model {
		
	function get_data() {
		
		$this->db->order_by('id', 'DESC');
		return $this->db->get('sampah')->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('sampah')->row();
		
	}
	
	function insert_data($data) {
		
		return $this->db->insert('sampah', $data);
		
	}
	
	function update_data($data, $id) {
		
		$this->db->where('id', $id);
		return $this->db->update('sampah', $data);
		
	}
	
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('sampah');
		
	}
	
	
}