<?php  

class Mlokasi extends CI_Model {
	
	function get_data() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('lokasi_wisata')->result();
		
	}
	
	function get_data_top() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('lokasi_wisata')->row();
		
	}
		
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('lokasi_wisata')->row();
	}
	
	function get_data_objek($lokasi) {
		
		$this->db->select('o.*, l.nama_lokasi lokasi, t.nama_tema tema')
				 ->from("objek_wisata o")
 				 ->join('lokasi_wisata l','o.id_lokasi=l.id')
 				 ->join('tema_wisata t','o.id_tema=t.id')
				 ->where('l.id', $lokasi)
				 ->order_by('o.id', 'DESC');
				 
		return $this->db->get();
		
	}
	
	function get_photo($lokasi) {
		
		$this->db->select('p.*, o.judul')
				 ->from("photo p")
 				 ->join('objek_wisata o','o.id=p.id_objek')
 				 ->join('lokasi_wisata l','l.id=o.id_lokasi')
				 ->where('l.id', $lokasi)
				 ->group_by('p.id_objek');
						
		return $this->db->get();
		
	}
	
}