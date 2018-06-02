<?php  

class Mhome extends CI_Model {
	
	function get_data($page, $num) {
				
		$this->db->select('b.*, k.kategori kategori')
				 ->from("berita b")
 				 ->join('kategori k','k.id=b.id_kategori')
				 ->limit($page, $num)
				 ->order_by('b.id', 'DESC');
				 
		return $this->db->get()->result();
		
	}
	
	function get_slider() {
		
		$this->db->order_by('posisi', 'ASC');
		return $this->db->get('slider')->result();
		
	}
	
}