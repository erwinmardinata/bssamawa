<?php

class Tabungan extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mtabungan', 'mdl');
		
	}
	
	function index() {
		
		$data_array = array();
		
		$data_array['data']	= $this->mdl->get_data();

		$title = "Tabungan Nasabah";
		$subtitle = "Tabungan Nasabah";
		$content = $this->load->view('list.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function lihat($id) {
		
		$data_array = array();
		
		$data_array['data']	     = $this->mdl->cek_data($id);
		$data_array['transaksi'] = $this->mdl->get_transaksi($id);
		$data_array['saldo']     = $this->mdl->get_saldo($id);
		$data_array['sampah']    = $this->mdl->get_sampah();

		$title = "Tabungan Nasabah";
		$subtitle = "Tabungan Nasabah";
		$content = $this->load->view('lihat.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
}