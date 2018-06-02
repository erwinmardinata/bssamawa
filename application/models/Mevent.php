<?php  

class Mevent extends CI_Model {
	
	function get_data() {
		
		$this->db->order_by('id', 'DESC');
		return $this->db->get('event')->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('event')->row();
		
	}
	
	function get_akan() {
		
		$sql = "SELECT * FROM event
				WHERE tanggal_mulai > '".date("Y-m-d")."'";
				
		return $this->db->query($sql)->result();
		
	}

	function get_sedang() {
		
		$sql = "SELECT * FROM event 
			    WHERE tanggal_mulai <= '".date('Y-m-d')."' 
				AND tanggal_selesai >= '".date('Y-m-d')."'";
				
		return $this->db->query($sql)->result();
		
	}

	function get_sudah() {
	
		$sql = "SELECT * FROM event
				WHERE tanggal_selesai < '".date('Y-m-d')."'";
				
		return $this->db->query($sql)->result();
	
	}

	function get_tema() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tema_wisata')->result();
		
	}
	
	function get_lokasi() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('lokasi_wisata')->result();
		
	}
	
	function cek_data2($id) {
		
		$query = "SELECT * FROM `event` 
				  WHERE id <> ".$id."
				  LIMIT 0, 6";
				  
		return $this->db->query($query)->result();
			
	}
	
}