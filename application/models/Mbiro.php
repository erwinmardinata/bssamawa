<?php  

class Mbiro extends CI_Model {
	
	function get_data() {
		
		$this->db->order_by('id', 'DESC');
		return $this->db->get('biro', 0, 12)->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('biro')->row();
		
	}
	
	function get_photo($id) {
		
		$this->db->where('id_biro', $id);
		return $this->db->get('photo')->result();
		
	}
	
	function get_paket($id) {
		
		$this->db->select('p.*, t.nama_tema tema')
				 ->from('paket p')
 				 ->join('tema_wisata t','t.id=p.id_tema')
				 ->where('p.id_biro', $id)
				 ->order_by('p.id', 'DESC');
				 
		return $this->db->get()->result();
		
	}
	
	function cek_paket($hari, $budget) {
		
		$this->db->select('p.*, t.nama_tema tema, b.nama nama_biro')
				 ->from('paket p')
 				 ->join('tema_wisata t','t.id=p.id_tema')
 				 ->join('biro b','b.id=p.id_biro')
				 ->where('p.hari <=', $hari)
				 ->or_where('p.harga <=', $budget)
				 ->order_by('p.hari', 'DESC');
				 
		return $this->db->get()->result();
		
	}
	
	function detail_paket($id) {
		
		$this->db->select('p.*, t.nama_tema tema, b.nama nama_biro')
				 ->from('paket p')
 				 ->join('tema_wisata t','t.id=p.id_tema')
 				 ->join('biro b','b.id=p.id_biro')
				 ->where('p.id', $id)
				 ->order_by('p.id', 'DESC');
				 
		return $this->db->get()->row();
		
	}
	
}