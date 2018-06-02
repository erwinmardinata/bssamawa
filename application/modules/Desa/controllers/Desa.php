<?php

class Desa extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mdesa', 'mdl');
		
	}
	
	function index() {
		
		$data_array = array();
		
		$data_array['data']	= $this->mdl->get_data();

		$title = "Master Desa";
		$subtitle = "Master Desa";
		$content = $this->load->view('list.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function add() {
		
		$data_array = array();
		$data_array['kecamatan'] = $this->mdl->get_kecamatan();

		$title = "Tambah Desa";
		$subtitle = "Tambah Desa";
		$content = $this->load->view('add.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function edit($id) {
		
		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['kecamatan'] = $this->mdl->get_kecamatan();
		$data_array['desa'] = $this->mdl->get_desa2($data_array['data']->id_kecamatan);
		
		$title = "Edit Desa";
		$subtitle = "Edit Desa";
		$content = $this->load->view('edit.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function insert() {
				
		$post = $this->input->post();
				
		$query = $this->mdl->insert_data($post);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Desa/add');
		
	}
	
	function update() {
		
		$post = $this->input->post();

		$query = $this->mdl->update_data($post, $post['id']);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Desa');
		
	}
	
	function delete($id) {
		
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Desa');
		
	} 
	
	function get_desa() {
		
		$id = $this->input->get('id_kec');
		
		$desa = $this->mdl->get_desa($id);
		
		echo "<option value=''>- Desa -</option>";
		foreach($desa as $row){
			echo "<option value='".$row->id_kel."'>".$row->nama."</option>";
		}
		
	}
	
}