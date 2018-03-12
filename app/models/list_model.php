<?php
class List_Model extends CI_Model{
	public function get_lists(){
		$query=$this->db->get('lists');
		return $query->result();
	}


	public function get_list($id){
		$query=$this->db->get('lists');
		$this->db->where('id',$id);
		return $query->row();
	}

	public function create_list($data){
		$insert=$this->db->insert('lists',$data);
		return $insert;
	}
}


?>