<?php  

class Mkat extends CI_Model {
	
	function get_data($id, $page, $num) {
				
		$this->db->select('b.*, k.kategori kategori')
				 ->from("berita b")
 				 ->join('kategori k','k.id=b.id_kategori')
 				 ->where('k.id', $id)
				 ->limit($page, $num)
				 ->order_by('b.id', 'DESC');
				 
		return $this->db->get()->result();
		
	}
	
	function get_kategori($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('kategori')->row();
		
	}
	
}