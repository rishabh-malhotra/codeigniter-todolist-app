<?php

class Users extends CI_Controller{
	public function  register(){
		$this->form_validation->set_rules('first_name','First Name','trim|required|max_length[50]|min_length[2]|xss_clean');
		$this->form_validation->set_rules('last_name','Last Name','trim|required|max_length[50]|min_length[2]|xss_clean');
		$this->form_validation->set_rules('email','Email','trim|required|max_length[100]|min_length[5]|xss_clean|valid_email');
		$this->form_validation->set_rules('username','User Name','trim|required|max_length[20]|min_length[4]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|min_length[4]|xss_clean');
		$this->form_validation->set_rules('password2','Confirm Password','trim|required|max_length[20]|min_length[4]|xss_clean|matches[password]');
		if($this->form_validation->run() == FALSE){
			$data['main_content']='users/register';
			$this->load->view('layouts/main',$data);
		}else{
			if($this->User_model->create_member()){
				$this->session->set_flashdata('registered','You are now registered and can log in!!');
				redirect('home/index');
			}
		}
	}


public function login(){

	$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');      
     $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');        
        
    if($this->form_validation->run() == FALSE){
            //Set error
        $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
        redirect('home/index');
        } 
        else {
           //Get from post
           $username = $this->input->post('username');
           $password = $this->input->post('password');
               
           //Get user id from model
           $user_id = $this->User_model->login_user($username,$password);
               
           //Validate user
           if($user_id){
               //Create array of user data
               $user_data = array(
                       'user_id'   => $user_id,
                       'username'  => $username,
                       'logged_in' => TRUE
                );
                //Set session userdata
               //$this->session->set_flashdata('login_success','You are now logged in');
               $this->session->set_userdata($user_data);
               
               
				
				redirect('home/index');
		    }
		else{
			$this->session->set_flashdata('login_failed','Sorry, the login info you entered is invalid');
			redirect('home/index'); 
			}
		}
}

public function logout(){
	//unset session data
	$this->session->unset_userdata('user_id');
	$this->session->unset_userdata('username');
	$this->session->unset_userdata('logged_in');
	$this->session->sess_destroy();
	redirect('home/index');
}

}
