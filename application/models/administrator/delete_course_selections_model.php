<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delete_course_selections_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function delete_crs_sel(){
		$query_str="DELETE FROM course_selections";
		$query=$this->db->query($query_str);
		return $query;
	}
}

/* End of file delete_course_selection_model.php */
/* Location: ./application/models/administrator/delete_course_selection_model.php */