<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Professor_schedule_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}
	public function retrieve_prof_schedule($prof) {
    	//$prof=$this->input->post('prof');
		$query_str = "SELECT retrieve_schedule_xml(1001".$prof.") AS result_xml";
		$query = $this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		return $content;
	}
}
/* End of file delete_course_selection_model.php */
/* Location: ./application/models/administrator/professor_schedule_model.php */