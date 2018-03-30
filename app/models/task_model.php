<?php


class Task_model extends CI_Model
{
	
	public function get_task($id)
	{	
		$this->db->where('id',$id);
		$query=$this->db->get('tasks');
		return $query->row();

	}

	public function check_if_complete($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('tasks');
		return $query->row()->is_completed;
	}
	public function get_list_name($list_id){
		$this->db->where('id',$list_id);
		$query=$this->db->get('lists');
		return $query->row()->list_name;
	}
	public function create_task($data){
		$insert=$this->db->insert('tasks',$data);
		return $insert;
	}

	public function get_task_list_id($task_id){
		$this->db->where('id',$task_id);
		$query=$this->db->get('tasks');
		return $query->row()->list_id;
	}

	public function get_task_data($task_id){
		$this->db->where('id',$task_id);
		$query=$this->db->get('tasks');
		return $query->row();
	}

	public function edit_task($task_id,$data){
		$this->db->where('id',$task_id);
		$update=$this->db->update('tasks',$data);
		return $update;
	}	
}
?>