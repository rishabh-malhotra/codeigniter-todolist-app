<?php


class Task_model extends CI_Model
{
	
	public function get_task($id)
	{	
		$this->db->select('
						tasks.task_name,
						tasks.id,
						tasks.create_date,
						tasks.task_body,
						tasks.is_completed,
						tasks.due_date,
						lists.id as list_id,
						lists.list_name,
						lists.list_body
						');

		$this->db->from('tasks');
		$this->db->join('lists','lists.id = tasks.list_id');
		$this->db->where('tasks.id',$id);
		$query =$this->db->get();
		if($query->num_rows()!=1){
			return false;
		}
		else{
			return $query->row();
		}

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

	public function delete_task($task_id){ 

		$this->db->where('id',$task_id);
		$this->db->delete('tasks');
		return;
		}	
}
?>