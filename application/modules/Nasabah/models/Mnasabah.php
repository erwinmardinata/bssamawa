<?php

class Mnasabah extends CI_Model {
		
	function get_data() {
		
		$this->db->select('n.*, k.nama kecamatan, d.nama desa')
				 ->from("nasabah n")
 				 ->join('kelurahan d','d.id_kel=n.id_desa')
 				 ->join('kecamatan k','k.id_kec=d.id_kec')
				 ->order_by('n.no_rekening', 'DESC');
				 
		return $this->db->get();
		
	}
	
	function cek_data($id) {
		
		$this->db->select('n.*, k.id_kec, k.nama kecamatan, d.nama desa')
				 ->from("nasabah n")
 				 ->join('kelurahan d','d.id_kel=n.id_desa')
 				 ->join('kecamatan k','k.id_kec=d.id_kec')
				 ->where('n.no_rekening', $id);
				 
		return $this->db->get()->row();
		
	}
	
	function insert_data($data) {
		
		return $this->db->insert('nasabah', $data);
		
	}
	
	function update_data($data, $id) {
		
		$this->db->where('no_rekening', $id);
		return $this->db->update('nasabah', $data);
		
	}
	
	function delete_data($id) {
		
		$this->db->where('no_rekening', $id);
		return $this->db->delete('nasabah');
		
	}
		
	function get_kecamatan() {
						 
		return $this->db->get('kecamatan')->result();
		
	}
	
	function get_desa($id) {
		
		$this->db->select('d.*')
				 ->from("kelurahan d")
 				 ->join('kecamatan k','k.id_kec=d.id_kec')
 				 ->where('k.id_kec', $id);
				 
		return $this->db->get()->result();
		
	}
		
	function set_norek() {
		
		$cek = $this->get_data()->row();
		
		if(empty($cek)) {
			return "BSS-01-0001";
		} else {
			$no = explode("-", $cek->no_rekening);
			$norek = sprintf('%04s', $no[2]+1);
			
			return "BSS-01-".$norek;

		}
		
	} 
	
}