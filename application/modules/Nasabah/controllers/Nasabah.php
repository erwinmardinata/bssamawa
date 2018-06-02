<?php

class Nasabah extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('mnasabah', 'mdl');
		
	}
	
	function index() {
		
		$data_array = array();
		
		$data_array['data']	= $this->mdl->get_data()->result();

		$title = "Data Nasabah";
		$subtitle = "Data Nasabah";
		$content = $this->load->view('list.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function add() {
		
		$data_array = array();
		$data_array['norek'] = $this->mdl->set_norek();
		$data_array['kecamatan'] = $this->mdl->get_kecamatan();
		// $data_array['desa'] = $this->mdl->get_desa();

		$title = "Tambah Berita";
		$subtitle = "Tambah Berita";
		$content = $this->load->view('add.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function edit($id) {
		
		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['kecamatan'] = $this->mdl->get_kecamatan();
		$data_array['desa'] = $this->mdl->get_desa($data_array['data']->id_kec);
		
		// echo json_encode($data_array['desa']);exit;
		
		$title = "Edit Nasabah";
		$subtitle = "Edit Nasabah";
		$content = $this->load->view('edit.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function get_desa() {
		
		$id = $this->input->get('id_kec');
		
		$desa = $this->mdl->get_desa($id);
		
		// echo $id;exit;
		
		echo "<option value=''>- Desa -</option>";
		foreach($desa as $row){
			echo "<option value='".$row->id_kel."'>".$row->nama."</option>";
		}
		
	}
	
	function insert() {
				
		$post = $this->input->post();
		
		// print_r($post);exit;
		
		$query = $this->mdl->insert_data($post);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Nasabah/add');
		
	}
	
	function update() {
		
		$post = $this->input->post();
		
		$id = $post['id'];
		unset($post['id']);
		// echo json_encode($id);exit;

		$query = $this->mdl->update_data($post, $id);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Nasabah');
		
	}
	
	function delete($id) {
		
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Nasabah');
		
	} 

	function excel() {
		
		$data_array['data'] = $this->mdl->get_data()->result();		

		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data_Nasabah.xls");
		$this->load->view('excel', $data_array);		

	}

	
}