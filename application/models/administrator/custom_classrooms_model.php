<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_classrooms_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function retrieve_custom_classrooms() {
		$query_str='SELECT * FROM classrooms ORDER BY classroom_id ASC ';
		$query=$this->db->query($query_str);
		$result=$query->result_array();
		return $result;
	}

	public function update_custom_classrooms() {
		$query_str="UPDATE classrooms SET classroom='".trim($this->input->post('classroom'))
		 ."' WHERE classroom_id=".$this->input->post('classroom-id');
		$query=$this->db->query($query_str);
		return $query;
	}

	public function insert_custom_classrooms() {
		$classroom_id_pieces = explode("_", $this->input->post('classroom-id'));
		$query_str="INSERT INTO classrooms VALUES
					 (".trim($classroom_id_pieces[0])
					.",'".trim($this->input->post('classroom'))."')";
		$query=$this->db->query($query_str);
		return $query;
	}

	public function delete_custom_classrooms() {
			$query_str="DELETE FROM classrooms WHERE classroom_id=".$this->input->post('classroom-id');
			$query=$this->db->query($query_str);
			return $query;
	}
}

/* End of file custom_classrooms_model.php */
/* Location: ./application/models/administrator/custom_classrooms_model.php */