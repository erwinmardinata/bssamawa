<?php  

class Mcontact extends CI_Model {
		
	function get_data() {
		
		return $this->db->get('kontak')->row();
		
	}
	
	function insert_kontak($data) {
		
		return $this->db->insert('kontak_masuk', $data);		
	}
	
}