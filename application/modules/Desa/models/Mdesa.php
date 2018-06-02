<?php

class Mdesa extends CI_Model {
		
	function get_data() {
		
		$this->db->select('md.*, d.nama')
				 ->from("master_desa md")
 				 ->join('kelurahan d','d.id_kel=md.id_desa')
				 ->order_by('id', 'DESC');
				 
		return $this->db->get()->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->get('master_desa')->row();
		
	}
	
	function insert_data($data) {
		
		return $this->db->insert('master_desa', $data);
		
	}
	
	function update_data($data, $id) {
		
		$this->db->where('id', $id);
		return $this->db->update('master_desa', $data);
		
	}
	
	function delete_data($id) {
		
		$this->db->where('id', $id);
		return $this->db->delete('master_desa');
		
	}

	function get_kecamatan() {
		
		$this->db->order_by('id_kec', 'ASC');
		return $this->db->get('kecamatan')->result();
		
	}
	
	function get_desa($id) {

		$this->db->select('*')
				 ->from("kelurahan")
				 ->where('id_kel NOT IN ( SELECT id_desa FROM master_desa)')
				 ->where('id_kec', $id)
				 ->order_by('id_kel', 'DESC');
				 
		return $this->db->get()->result();
		
		// $this->db->where('id_kec', $id);
		// return $this->db->get('kelurahan')->result();
		
	}
	
	function get_desa2($id) {

		// $this->db->select('*')
				 // ->from("kelurahan")
				 // ->where('id_kel NOT IN ( SELECT id_desa FROM master_desa)')
				 // ->where('id_kec', $id)
				 // ->order_by('id_kel', 'DESC');
				 
		// return $this->db->get()->result();
		
		$this->db->where('id_kec', $id);
		return $this->db->get('kelurahan')->result();
		
	}
	
}