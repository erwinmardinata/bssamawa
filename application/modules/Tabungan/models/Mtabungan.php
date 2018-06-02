<?php

class Mtabungan extends CI_Model {
		
	function get_data() {
		
		$this->db->select('n.*, k.nama n, d.nama d')
				 ->from("nasabah n")
 				 ->join('kelurahan d','d.id_kel=n.id_desa')
 				 ->join('kecamatan k','k.id_kec=d.id_kec')
				 ->order_by('n.no_rekening', 'DESC');
				 
		return $this->db->get()->result();

		// $sql = "SELECT n.*, SUM(t.harga) - SUM(t.ambil) saldo 
				// FROM nasabah n
				// JOIN kecamatan k ON k.id_kec=n.id_kecamatan
				// JOIN kelurahan d ON d.id_kel=n.id_desa 
				// JOIN transaksi t on t.no_rekening=n.no_rekening
				// GROUP BY n.no_rekening
				// ORDER BY id DESC";
				
		// return $this->db->query($sql)->result();
		
	}
	
	function cek_data($id) {
		
		$this->db->select('n.*, k.nama kecamatan, d.nama desa')
				 ->from("nasabah n")
 				 ->join('kelurahan d','d.id_kel=n.id_desa')
 				 ->join('kecamatan k','k.id_kec=d.id_kec')
				 ->where('n.no_rekening', $id);
				 
		return $this->db->get()->row();
		
	}
	
	function get_transaksi($id) {
		
		// $this->db->select('t.*')
				 // ->from("transaksi t")
 				 // ->join('nasabah n','n.no_rekening=t.no_rekening')
 				 // ->join('sampah s','s.id=t.id_sampah')
 				 // ->where('t.no_rekening', $id)
				 // ->order_by('id', 'ASC');
				 
		// return $this->db->get()->result();
		
		$sql = "SELECT t.tanggal, 
				SUM(t.harga) harga, 
				SUM(t.ambil) ambil, t.ket 
				FROM transaksi t 
				JOIN nasabah n 
				ON n.no_rekening=t.no_rekening 
				WHERE `t`.`no_rekening` = '".$id."' 
				GROUP BY t.tanggal
				ORDER BY t.id ASC";
				
		return $this->db->query($sql)->result();
		
	}
	
	function get_saldo($id) {
			
		$sql = "SELECT SUM(t.harga) - SUM(t.ambil) saldo 
				FROM transaksi t 
				JOIN nasabah n 
				ON n.no_rekening=t.no_rekening 
				WHERE t.no_rekening = '".$id."' 
				ORDER BY t.id ASC";
				
		return $this->db->query($sql)->row();
		
	}
	
	function get_sampah() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('sampah')->result();
		
	}
	
	
}