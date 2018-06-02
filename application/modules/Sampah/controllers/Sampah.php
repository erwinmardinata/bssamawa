<?php

class Sampah extends Back_controller {
	
	function __construct() {
		
		parent::__construct();
		$this->load->model('msampah', 'mdl');
		
	}
	
	function index() {
		
		$data_array = array();
		
		$data_array['data']	= $this->mdl->get_data();

		$title = "Jenis Sampah";
		$subtitle = "Jenis Sampah";
		$content = $this->load->view('list.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function add() {
		
		$data_array = array();

		$title = "Tambah Jenis Sampah";
		$subtitle = "Tambah Jenis Sampah";
		$content = $this->load->view('add.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function edit($id) {
		
		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);
		
		$title = "Edit Sampah";
		$subtitle = "Edit Sampah";
		$content = $this->load->view('edit.php', $data_array, true);
		
		$this->load_content($title, $subtitle, $content);		
		
	}
	
	function insert() {
				
		$post = $this->input->post();
				
		$query = $this->mdl->insert_data($post);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Sampah/add');
		
	}
	
	function update() {
		
		$post = $this->input->post();

		$query = $this->mdl->update_data($post, $post['id']);
		
		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Sampah');
		
	}
	
	function delete($id) {
		
		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info() : $this->alert_error();

		redirect('Sampah');
		
	} 
	
}