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
		$data['lists']=$this->List_model->get_lists();
		

		$data['main_content']='lists/index';
		$this->load->view('layouts/main',$data);
	}



	public function show($id){
		//Get list from model
		$data['list']=$this->List_model->get_list($id);

		//get all completed tasks from this list
		//$data['completed_tasks']=$this->List_model->get_list_tasks($id,true);
		
		//get all uncompleted tasks from this list
		//$data['uncompleted_tasks']=$this->List_model->get_list_tasks($id,false);
		
		//load the view and layout
		$data['main_content']='lists/show';
		$this->load->view('layouts/main',$data);
	}

	public function add(){
		$this->form_validation->set_rules('list_name','List Name','trim|required|xss_clean');
		$this->form_validation->set_rules('list_body','List Body','trim|required|xss_clean');

		if($this->form_validation->run() == FALSE){
			$data['main_content']='lists/add_list';
			$this->load->view('layouts/main',$data);
		}else{
			$data= array(
					'list_name' => $this->input->post('list_name'),
					'list_body' => $this->input->post('list_body'),
					'list_user_id' => $this->session->userdata('user_id')
			);
			if($this->List_model->create_list($data)){
				$this->session->set_flashdata('list_created',"Your Task List has been created");
				//redirect to index page with error above
				redirect('lists/index');
			}	
		}
	}

}
?>