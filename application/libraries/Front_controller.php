<?php
	
class Front_Controller extends CI_Controller {
	
	var $content = array();

	function __construct() {

		parent::__construct();
		date_default_timezone_set('Asia/Makassar');
		
	}

	function load_content($title, $subtitle, $content) {

		$kategori = $this->db->order_by('id', 'ASC')->get('kategori')->result();
	
		$data = array(
				'title' 	=> $title,
				'subtitle'	=> $subtitle,
				'content'	=> $content,
				'kat'		=> $kategori
			);

		$this->load->view('user/user_themes.php', $data);	

	} 

	function alert_info() {

		$pesan = "<div class='alert alert-info'>Success !!!</div>";

		$this->session->set_flashdata('message', $pesan);

	}

	function alert_error() {

		$pesan = "<div class='alert alert-warning'>Failed !!!</div>";

		$this->session->set_flashdata('message', $pesan);

	}
	
}