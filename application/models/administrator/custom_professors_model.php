<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_professors_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function retrieve_custom_professors() {
		$query_str='SELECT * FROM professors ORDER BY professor_id ASC ';
		$query=$this->db->query($query_str);
		$result=$query->result_array();
		return $result;
	}

	public function update_custom_professors() {
		$query_str="UPDATE professors SET name='".trim($this->input->post('name'))
		 ."' ,surname='".trim($this->input->post('surname'))
		 ."' WHERE professor_id=".$this->input->post('professor-id');
		$query=$this->db->query($query_str);
		return $query;
	}

	public function insert_custom_professors() {
		$professor_id_pieces = explode("_", $this->input->post('professor-id'));
		$query_str="INSERT INTO professors VALUES
					 (".trim($professor_id_pieces[0])
					.",'".trim($this->input->post('name'))
					."','".trim($this->input->post('surname'))."')";
		$query=$this->db->query($query_str);
		return $query;
	}

	public function delete_custom_professors() {
		$query_str="DELETE FROM professors WHERE professor_id=".$this->input->post('professor-id');
		$query=$this->db->query($query_str);
		return $query;
	}
}

/* End of file custom_professors.php */
/* Location: ./application/models/administrator/custom_professors.php */