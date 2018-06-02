<?php

class Transaksi extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mtransaksi', 'mdl');
		
	}
	
	// function setor($id) {
		
		// $data_array = array();
		
		// $data_array['norek']  = $id;
		// $data_array['sampah'] = $this->mdl->get_sampah();

		// $title = "Data Nasabah";
		// $subtitle = "Data Nasabah";
		// $content = $this->load->view('setor.php', $data_array, true);
		
		// $this->load_content($title, $subtitle, $content);		
		
	// }
	
	function get_harga() {
		
		$data = $this->input->get();
			
		if(!$data['sampah']) {
			$harga_sampah = 0;
		} else {
			$harga_sampah = $this->mdl->cek_sampah($data['sampah']);			
		}
			
		$harga_transaksi = $harga_sampah * $data['jumlah'];

		echo '<input type="text" name="harga" id="harga" readonly value="'.$harga_transaksi.'" class="form-control" placeholder="Harga" required>';
		
	}
	
	function setor() {
		$data = $this->input->post();
				
		$query = $this->mdl->insert_data($data);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Tabungan/lihat/'.$data['no_rekening']);
	}
	
	function ambil() {
		$data = $this->input->post();
				
		$query = $this->mdl->insert_data($data);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Tabungan/lihat/'.$data['no_rekening']);
	}
	
	
}