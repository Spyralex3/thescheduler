<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classroom_schedule_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}
	public function retrieve_classroom_schedule($class_id) {
		$query_str = "SELECT retrieve_schedule_xml(1002". $class_id.") AS result_xml";
		$query = $this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		return $content;
	}
}
/* End of file classroom_schedule_model.php */
/* Location: ./application/models/administrator/classroom_schedule_model.php */