<?php

class Mlaporan extends CI_Model {
		
	function get_jenis($tahun) {
		
		$sql = "SELECT jenis, 
				SUM(IF(MONTH(tanggal_daftar)=1, 1, 0)) jan,
				SUM(IF(MONTH(tanggal_daftar)=2, 1, 0)) feb,
				SUM(IF(MONTH(tanggal_daftar)=3, 1, 0)) mar,
				SUM(IF(MONTH(tanggal_daftar)=4, 1, 0)) apr,
				SUM(IF(MONTH(tanggal_daftar)=5, 1, 0)) mei,
				SUM(IF(MONTH(tanggal_daftar)=6, 1, 0)) jun,
				SUM(IF(MONTH(tanggal_daftar)=7, 1, 0)) jul,
				SUM(IF(MONTH(tanggal_daftar)=8, 1, 0)) agu,
				SUM(IF(MONTH(tanggal_daftar)=9, 1, 0)) sep,
				SUM(IF(MONTH(tanggal_daftar)=10, 1, 0)) okt,
				SUM(IF(MONTH(tanggal_daftar)=11, 1, 0)) nov,
				SUM(IF(MONTH(tanggal_daftar)=12, 1, 0)) des
				FROM nasabah
				WHERE YEAR(tanggal_daftar)=".$tahun."
				GROUP BY jenis";
				
		return $this->db->query($sql)->result();
		
	}	
	
	function get_desa_individu($tahun) {

		$sql = "SELECT  k.nama, 
				SUM(IF(MONTH(n.tanggal_daftar)=1, 1, 0)) jan, 
				SUM(IF(MONTH(n.tanggal_daftar)=2, 1, 0)) feb, 
				SUM(IF(MONTH(n.tanggal_daftar)=3, 1, 0)) mar, 
				SUM(IF(MONTH(n.tanggal_daftar)=4, 1, 0)) apr, 
				SUM(IF(MONTH(n.tanggal_daftar)=5, 1, 0)) mei, 
				SUM(IF(MONTH(n.tanggal_daftar)=6, 1, 0)) jun, 
				SUM(IF(MONTH(n.tanggal_daftar)=7, 1, 0)) jul, 
				SUM(IF(MONTH(n.tanggal_daftar)=8, 1, 0)) agu, 
				SUM(IF(MONTH(n.tanggal_daftar)=9, 1, 0)) sep, 
				SUM(IF(MONTH(n.tanggal_daftar)=10, 1, 0)) okt, 
				SUM(IF(MONTH(n.tanggal_daftar)=11, 1, 0)) nov, 
				SUM(IF(MONTH(n.tanggal_daftar)=12, 1, 0)) des 
				FROM nasabah n
				JOIN kelurahan k ON k.id_kel = n.id_desa
				WHERE n.jenis = 'i'
				AND YEAR(tanggal_daftar) = ".$tahun."
				GROUP BY k.nama";
				
		return $this->db->query($sql)->result();
	
	}

	function get_desa_kelompok($tahun) {

		$sql = "SELECT  k.nama, 
				SUM(IF(MONTH(n.tanggal_daftar)=1, 1, 0)) jan, 
				SUM(IF(MONTH(n.tanggal_daftar)=2, 1, 0)) feb, 
				SUM(IF(MONTH(n.tanggal_daftar)=3, 1, 0)) mar, 
				SUM(IF(MONTH(n.tanggal_daftar)=4, 1, 0)) apr, 
				SUM(IF(MONTH(n.tanggal_daftar)=5, 1, 0)) mei, 
				SUM(IF(MONTH(n.tanggal_daftar)=6, 1, 0)) jun, 
				SUM(IF(MONTH(n.tanggal_daftar)=7, 1, 0)) jul, 
				SUM(IF(MONTH(n.tanggal_daftar)=8, 1, 0)) agu, 
				SUM(IF(MONTH(n.tanggal_daftar)=9, 1, 0)) sep, 
				SUM(IF(MONTH(n.tanggal_daftar)=10, 1, 0)) okt, 
				SUM(IF(MONTH(n.tanggal_daftar)=11, 1, 0)) nov, 
				SUM(IF(MONTH(n.tanggal_daftar)=12, 1, 0)) des 
				FROM nasabah n
				JOIN kelurahan k ON k.id_kel = n.id_desa
				WHERE n.jenis = 'k'
				AND YEAR(tanggal_daftar) = ".$tahun."
				GROUP BY k.nama";
				
		return $this->db->query($sql)->result();
	
	}
	
	function get_jenis_transaksi($tahun) {

		$sql = "SELECT  n.jenis, 
				SUM(IF(MONTH(t.tanggal)=1, 1, 0)) jan, 
				SUM(IF(MONTH(t.tanggal)=2, 1, 0)) feb, 
				SUM(IF(MONTH(t.tanggal)=3, 1, 0)) mar, 
				SUM(IF(MONTH(t.tanggal)=4, 1, 0)) apr, 
				SUM(IF(MONTH(t.tanggal)=5, 1, 0)) mei, 
				SUM(IF(MONTH(t.tanggal)=6, 1, 0)) jun, 
				SUM(IF(MONTH(t.tanggal)=7, 1, 0)) jul, 
				SUM(IF(MONTH(t.tanggal)=8, 1, 0)) agu, 
				SUM(IF(MONTH(t.tanggal)=9, 1, 0)) sep, 
				SUM(IF(MONTH(t.tanggal)=10, 1, 0)) okt, 
				SUM(IF(MONTH(t.tanggal)=11, 1, 0)) nov, 
				SUM(IF(MONTH(t.tanggal)=12, 1, 0)) des 
				FROM nasabah n
				JOIN transaksi t ON t.no_rekening = n.no_rekening
				WHERE YEAR(tanggal) = ".$tahun."
				AND t.harga != 0
				GROUP BY n.jenis";
				
		return $this->db->query($sql)->result();
		
	}
	
	function get_nilai_saldo($tahun) {

		$sql = "SELECT  n.jenis, 
				SUM(IF(MONTH(t.tanggal)=1, t.harga, 0)) jan, 
				SUM(IF(MONTH(t.tanggal)=2, t.harga, 0)) feb, 
				SUM(IF(MONTH(t.tanggal)=3, t.harga, 0)) mar, 
				SUM(IF(MONTH(t.tanggal)=4, t.harga, 0)) apr, 
				SUM(IF(MONTH(t.tanggal)=5, t.harga, 0)) mei, 
				SUM(IF(MONTH(t.tanggal)=6, t.harga, 0)) jun, 
				SUM(IF(MONTH(t.tanggal)=7, t.harga, 0)) jul, 
				SUM(IF(MONTH(t.tanggal)=8, t.harga, 0)) agu, 
				SUM(IF(MONTH(t.tanggal)=9, t.harga, 0)) sep, 
				SUM(IF(MONTH(t.tanggal)=10, t.harga, 0)) okt, 
				SUM(IF(MONTH(t.tanggal)=11, t.harga, 0)) nov, 
				SUM(IF(MONTH(t.tanggal)=12, t.harga, 0)) des 
				FROM nasabah n
				JOIN transaksi t ON t.no_rekening = n.no_rekening
				WHERE YEAR(tanggal) = ".$tahun."
				GROUP BY n.jenis";
				
		return $this->db->query($sql)->result();
		
	}
	
	function get_nilai_tarik($tahun) {

		$sql = "SELECT  n.jenis, 
				SUM(IF(MONTH(t.tanggal)=1, t.ambil, 0)) jan, 
				SUM(IF(MONTH(t.tanggal)=2, t.ambil, 0)) feb, 
				SUM(IF(MONTH(t.tanggal)=3, t.ambil, 0)) mar, 
				SUM(IF(MONTH(t.tanggal)=4, t.ambil, 0)) apr, 
				SUM(IF(MONTH(t.tanggal)=5, t.ambil, 0)) mei, 
				SUM(IF(MONTH(t.tanggal)=6, t.ambil, 0)) jun, 
				SUM(IF(MONTH(t.tanggal)=7, t.ambil, 0)) jul, 
				SUM(IF(MONTH(t.tanggal)=8, t.ambil, 0)) agu, 
				SUM(IF(MONTH(t.tanggal)=9, t.ambil, 0)) sep, 
				SUM(IF(MONTH(t.tanggal)=10, t.ambil, 0)) okt, 
				SUM(IF(MONTH(t.tanggal)=11, t.ambil, 0)) nov, 
				SUM(IF(MONTH(t.tanggal)=12, t.ambil, 0)) des 
				FROM nasabah n
				JOIN transaksi t ON t.no_rekening = n.no_rekening
				WHERE YEAR(tanggal) = ".$tahun."
				GROUP BY n.jenis";
				
		return $this->db->query($sql)->result();
		
	}
	
	function get_vol_sampah($tahun) {
		
		$sql = "SELECT  s.nama, 
				SUM(IF(MONTH(t.tanggal)=1, t.jumlah, 0)) jan, 
				SUM(IF(MONTH(t.tanggal)=2, t.jumlah, 0)) feb, 
				SUM(IF(MONTH(t.tanggal)=3, t.jumlah, 0)) mar, 
				SUM(IF(MONTH(t.tanggal)=4, t.jumlah, 0)) apr, 
				SUM(IF(MONTH(t.tanggal)=5, t.jumlah, 0)) mei, 
				SUM(IF(MONTH(t.tanggal)=6, t.jumlah, 0)) jun, 
				SUM(IF(MONTH(t.tanggal)=7, t.jumlah, 0)) jul, 
				SUM(IF(MONTH(t.tanggal)=8, t.jumlah, 0)) agu, 
				SUM(IF(MONTH(t.tanggal)=9, t.jumlah, 0)) sep, 
				SUM(IF(MONTH(t.tanggal)=10, t.jumlah, 0)) okt, 
				SUM(IF(MONTH(t.tanggal)=11, t.jumlah, 0)) nov, 
				SUM(IF(MONTH(t.tanggal)=12, t.jumlah, 0)) des 
				FROM transaksi t
				JOIN sampah s ON s.id = t.id_sampah
				WHERE YEAR(t.tanggal) = ".$tahun."
				GROUP BY s.nama";
				
		return $this->db->query($sql)->result();		
		
	}
	
	function get_jml_sampah($tahun) {
		
		$sql = "SELECT  s.nama, 
				SUM(IF(MONTH(t.tanggal)=1, t.harga, 0)) jan, 
				SUM(IF(MONTH(t.tanggal)=2, t.harga, 0)) feb, 
				SUM(IF(MONTH(t.tanggal)=3, t.harga, 0)) mar, 
				SUM(IF(MONTH(t.tanggal)=4, t.harga, 0)) apr, 
				SUM(IF(MONTH(t.tanggal)=5, t.harga, 0)) mei, 
				SUM(IF(MONTH(t.tanggal)=6, t.harga, 0)) jun, 
				SUM(IF(MONTH(t.tanggal)=7, t.harga, 0)) jul, 
				SUM(IF(MONTH(t.tanggal)=8, t.harga, 0)) agu, 
				SUM(IF(MONTH(t.tanggal)=9, t.harga, 0)) sep, 
				SUM(IF(MONTH(t.tanggal)=10, t.harga, 0)) okt, 
				SUM(IF(MONTH(t.tanggal)=11, t.harga, 0)) nov, 
				SUM(IF(MONTH(t.tanggal)=12, t.harga, 0)) des 
				FROM transaksi t
				JOIN sampah s ON s.id = t.id_sampah
				WHERE YEAR(t.tanggal) = ".$tahun."
				GROUP BY s.nama";
				
		return $this->db->query($sql)->result();		
		
	}
	
	function get_nilai_sampah($tahun) {
		
		$sql = "SELECT s.nama, 
				s.harga_jual,
				s.harga_beli,
				SUM(t.jumlah) jumlah
				FROM transaksi t
				JOIN sampah s ON s.id = t.id_sampah
				WHERE YEAR(t.tanggal) = ".$tahun."
				GROUP BY s.nama";
				
		return $this->db->query($sql)->result();		
		
	}
	
}