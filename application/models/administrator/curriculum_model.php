<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curriculum_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}
	public function retrieve_curriculum_schedule($semester) {
		$query_str = "SELECT retrieve_schedule_xml(1003". $semester.") AS result_xml";
		$query = $this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		return $content;
	}
}

/* End of file curriculum_model.php */
/* Location: ./application/models/administrator/curriculum_model.php */
