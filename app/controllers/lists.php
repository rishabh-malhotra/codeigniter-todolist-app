<?php

class Lists extends CI_Controller{
	public function __construct(){

		parent::__construct();

			if(!$this->session->userdata('logged_in')){
				$this->session->set_flashdata('noaccess','Sorry, you are not logged in');
				redirect('home/index');

			}
	}




	public function index(){
		$user_id=$this->session->userdata('user_id');
		$data['main_content']='lists/index';
		$this->load->view('layouts/main',$data);
	}
}


?>