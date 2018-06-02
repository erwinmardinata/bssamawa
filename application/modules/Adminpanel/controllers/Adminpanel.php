<?php

class Adminpanel extends CI_Controller {
	
	function __construct() {
		
		parent::__construct();
		
	}
	
	function index() {
		
		if($this->session->userdata('logged_in')) redirect('Dashboard');
		
		if(!$this->input->post('submit')) {

			$data['title'] = '';
			$this->load->view('form', $data);
	
		} else {
						
			$user = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			
			$cek = $this->db->where('username', $user)
							->where('password', $pass)
							->get('admin')
							->row();
			
			if(count($cek) > 0) {
				
				$data = array(
					'logged_in' => 'yes',
					'id' 		=> $cek->id,
					'username'	=> $cek->username,
					'name' 		=> $cek->name
				);
			
				$this->session->set_userdata($data);
			
				redirect('Dashboard');
			
			} else {
				
				$pesan = "<div class='callout callout-warning'>
							<h4>username atau password salah !</h4>
						  </div>";
				
				$this->session->set_flashdata('message', $pesan);
				
				redirect('Adminpanel');
				
			}
			
			
		}
			
		
	}
	
	public function logout() {
		
		$data = array(

			'logged_in' => '',
			'id' 		=> '',
			'username' 	=> '',
			'name' 		=> ''
		
		);
		
		$this->session->set_userdata($data);

		redirect('Adminpanel');
		
	}

	
	
}