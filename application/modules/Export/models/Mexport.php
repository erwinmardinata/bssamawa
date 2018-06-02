<?php

class Mexport extends CI_Model {
		
	function cek_data($id) {
		
		$this->db->select('n.*, k.nama kecamatan, d.nama desa')
				 ->from("nasabah n")
 				 ->join('kelurahan d','d.id_kel=n.id_desa')
 				 ->join('kecamatan k','k.id_kec=k.id_kec')
				 ->where('n.no_rekening', $id)
				 ->order_by('n.no_rekening', 'DESC');
				 
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
	
}