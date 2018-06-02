<?php  

class Mtema extends CI_Model {
	
	function get_data() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tema_wisata')->result();
		
	}
	
	function get_data_top() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tema_wisata')->row();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('tema_wisata')->row();
	}
	
	function get_data_objek($tema) {
		
		$this->db->select('o.*, l.nama_lokasi lokasi, t.nama_tema tema')
				 ->from("objek_wisata o")
 				 ->join('lokasi_wisata l','o.id_lokasi=l.id')
 				 ->join('tema_wisata t','o.id_tema=t.id')
				 ->where('t.id', $tema)
				 ->order_by('o.id', 'DESC');
				 
		return $this->db->get();
		
	}
	
	function get_photo($tema) {
		
		$this->db->select('p.*, o.judul')
				 ->from("photo p")
 				 ->join('objek_wisata o','o.id=p.id_objek')
 				 ->join('tema_wisata t','t.id=o.id_tema')
				 ->where('t.id', $tema)
				 ->group_by('p.id_objek');
						
		return $this->db->get();
		
	}
	
}