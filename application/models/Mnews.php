<?php  

class Mnews extends CI_Model {
	
	function get_data() {
		
		$this->db->order_by('id', 'DESC');
		return $this->db->get('berita')->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->select('b.*, k.kategori kategori')
				 ->from("berita b")
 				 ->join('kategori k','k.id=b.id_kategori')
				 ->where('b.id', $id);
				 
		return $this->db->get()->row();
		
	}

	function get_photo($id) {
		
		$this->db->where('id_berita', $id);
		return $this->db->get('photo')->result();
		
	}	

	function get_kategori() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('kategori')->result();
		
	}
		
	function cek_data2($id) {
		
		$this->db->select('b.*, k.kategori kategori')
				 ->from("berita b")
 				 ->join('kategori k','k.id=b.id_kategori')
				 ->where('b.id <>', $id)
				 ->limit(0, 3)
				 ->order_by('b.id', 'DESC');
				 
		return $this->db->get()->result();
			
	}
	
}