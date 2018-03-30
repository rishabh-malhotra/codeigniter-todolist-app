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
		$data['lists']=$this->List_model->get_lists($user_id);
		

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
		} else{
			$data= array(
					'list_name'    => $this->input->post('list_name'),
					'list_body'    => $this->input->post('list_body'),
					'list_user_id' => $this->session->userdata('user_id')
			);
			if($this->List_model->create_list($data)){
				$this->session->set_flashdata('list_created',"Your Task List has been created");
				//redirect to index page with error above
				redirect('lists/index');
			}	
		}
	}

	public function edit($list_id){
		$this->form_validation->set_rules('list_name','List Name','trim|required|xss_clean');
		$this->form_validation->set_rules('list_body','List Body','trim|xss_clean');
		if($this->form_validation->run()==FALSE){
			//get the current list info
			$data['this_list']=$this->List_model->get_list_data($list_id);
			//load view and layout
			$data['main_content']='lists/edit_list';
			$this->load->view('layouts/main',$data);
		}else{
			//validation has ran and passed
			//post values to array
			$data=array(
				'list_name'    => $this->input->post('list_name'),
				'list_body'    => $this->input->post('list_body'),
				'list_user_id' => $this->session->userdata('user_id')
			);
			if($this->List_model->edit_list($list_id,$data)) {
				$this->session->set_flashdata('list_updated','Your list has been updated');
				//redirect to index page
				redirect('lists/index');
			}
		}
	}


	public function delete($list_id){
		$this->List_model->delete_list($list_id);
		$this->session->set_flashdata('list_deleted','Your List has been deleted');
		redirect('lists/index');
	} 

}
?>