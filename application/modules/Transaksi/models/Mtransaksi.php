<?php

class Mtransaksi extends CI_Model {
		
	function get_data() {
		
		$this->db->select('n.*, k.nama kecamatan, d.nama desa')
				 ->from("nasabah n")
 				 ->join('kecamatan k','k.id_kec=n.id_kecamatan')
 				 ->join('kelurahan d','d.id_kel=n.id_desa')
				 ->order_by('id', 'DESC');
				 
		return $this->db->get();
		
	}
	
	function insert_data($data) {
		
		return $this->db->insert('transaksi', $data);
		
	}
	
	function get_sampah() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('sampah')->result();
		
	}
	
	function cek_sampah($id) {
		
		$this->db->where('id', $id);
		$harga = $this->db->get('sampah')->row();
		
		return $harga->harga_beli;
	}
	
}