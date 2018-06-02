<?php

class Grafik extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mgrafik', 'mdl');
		
	}
	
	function nasabah() {
		
		$data_array = array();
		
		$title = "Laporan Nasabah";
		$subtitle = "Laporan Nasabah";
		$content = $this->load->view('nasabah/list.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function sampah() {

		$data_array = array();
		
		$title = "Laporan Nasabah";
		$subtitle = "Laporan Nasabah";
		$content = $this->load->view('sampah/list.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function get_laporan() {
		
		$filter = $this->input->get('filter');
		$tahun = $this->input->get('tahun');
		
		switch($filter) {

			//Laporan berdasarkan data Nasabah
			case 1 : 
			$data_array['data'] = $this->mdl->get_jenis($tahun);			
			$data_array['kelompok'] = $this->mdl->get_desa_kelompok($tahun);			
			$data_array['individu'] = $this->mdl->get_desa_individu($tahun);			
			$data_array['transaksi'] = $this->mdl->get_jenis_transaksi($tahun);			
			$data_array['saldo'] = $this->mdl->get_nilai_saldo($tahun);			
			$data_array['tarik'] = $this->mdl->get_nilai_tarik($tahun);			
			$view = 'nasabah/semua';
			break;

			case 2 : 
			$data_array['data'] = $this->mdl->get_jenis($tahun);			
			$view = 'nasabah/jenis';
			break;

			case 3 : 
			$data_array['kelompok'] = $this->mdl->get_desa_kelompok($tahun);			
			$data_array['individu'] = $this->mdl->get_desa_individu($tahun);			
			$view = 'nasabah/desa';
			break;
		
			case 4 : 
			$data_array['transaksi'] = $this->mdl->get_jenis_transaksi($tahun);			
			$view = 'nasabah/jenis_transaksi';
			break;
		
			case 5 : 
			$data_array['saldo'] = $this->mdl->get_nilai_saldo($tahun);			
			$data_array['tarik'] = $this->mdl->get_nilai_tarik($tahun);			
			$view = 'nasabah/nilai_transaksi';
			break;
			
			//laporan berdasarkan Sampah
			case 6 : 
			$data_array['vol_sampah'] = $this->mdl->get_vol_sampah($tahun);			
			$data_array['jml_sampah'] = $this->mdl->get_jml_sampah($tahun);			
			$data_array['nilai_sampah'] = $this->mdl->get_nilai_sampah($tahun);			
			$view = 'sampah/semua';
			break;
		
			case 7 : 
			$data_array['vol_sampah'] = $this->mdl->get_vol_sampah($tahun);			
			$view = 'sampah/vol_sampah';
			break;
		
			case 8 : 
			$data_array['jml_sampah'] = $this->mdl->get_jml_sampah($tahun);			
			$view = 'sampah/jml_sampah';
			break;
		
			case 9 : 
			$data_array['nilai_sampah'] = $this->mdl->get_nilai_sampah($tahun);			
			$view = 'sampah/nilai_sampah';
			break;
		
		} 
		
		$this->load->view($view, $data_array);		
		
	}
	
	function get_grafik() {
		
		$filter = $this->input->get('filter');
		$tahun = $this->input->get('tahun');
		
		switch($filter) {
			
			//Laporan berdasarkan data Nasabah
			case 1 : 
			$data_array['data'] = $this->mdl->get_jenis($tahun);			
			$data_array['kelompok'] = $this->mdl->get_desa_kelompok($tahun);			
			$data_array['individu'] = $this->mdl->get_desa_individu($tahun);			
			$data_array['transaksi'] = $this->mdl->get_jenis_transaksi($tahun);			
			$data_array['saldo'] = $this->mdl->get_nilai_saldo($tahun);			
			$data_array['tarik'] = $this->mdl->get_nilai_tarik($tahun);			
			$judul = 'Laporan Bulanan Bank Sampah Tahun '.$tahun;
			$view = 'nasabah/semua';
			break;

			case 2 : 
			$data_array['data'] = $this->mdl->get_jenis($tahun);			
			$judul = 'Jumlah Nasabah Baru Bank Sampah(Individu-Kelompok) '.$tahun;
			$view = 'nasabah/jenis';
			break;

			case 3 : 
			$data_array['kelompok'] = $this->mdl->get_desa_kelompok($tahun);			
			$data_array['individu'] = $this->mdl->get_desa_individu($tahun);			
			$judul = 'Jumlah Nasabah Baru Bank Sampah(Berdasarkan Desa) '.$tahun;
			$view = 'nasabah/desa';
			break;
		
			case 4 : 
			$data_array['transaksi'] = $this->mdl->get_jenis_transaksi($tahun);			
			$judul = 'Jumlah Transaksi Setoran Nasabah Baru Bank Sampah(Individu-Kelompok) '.$tahun;
			$view = 'nasabah/jenis_transaksi';
			break;

			case 5 : 
			$data_array['saldo'] = $this->mdl->get_nilai_saldo($tahun);			
			$data_array['tarik'] = $this->mdl->get_nilai_tarik($tahun);			
			$judul = 'Jumlah Total Transaksi Setoran dan Penarikan Nasabah '.$tahun;
			$view = 'nasabah/nilai_transaksi';
			break;
	
			//laporan berdasarkan Sampah
			case 6 : 
			$data_array['vol_sampah'] = $this->mdl->get_vol_sampah($tahun);			
			$data_array['jml_sampah'] = $this->mdl->get_jml_sampah($tahun);			
			$data_array['nilai_sampah'] = $this->mdl->get_nilai_sampah($tahun);			
			$judul = 'Laporan Bulanan Bank Sampah Berdasakan Jenis Sampah '.$tahun;
			$view = 'sampah/semua';
			break;
		
			case 7 : 
			$data_array['vol_sampah'] = $this->mdl->get_vol_sampah($tahun);			
			$judul = 'Volume Pembelian Sampah Berdasarkan Jenis Sampah(KG) '.$tahun;
			$view = 'sampah/vol_sampah';
			break;
		
			case 8 : 
			$data_array['jml_sampah'] = $this->mdl->get_jml_sampah($tahun);			
			$judul = 'Jumlah Transaksi Nasabah(Berdasarkan Jenis Sampah) '.$tahun;
			$view = 'sampah/jml_sampah';
			break;		
		
		} 

		$data_array['title'] = $judul;
		$this->load->view($view, $data_array);		
		
	}
	
	
}