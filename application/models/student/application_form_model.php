<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application_form_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	public function create_schedule()
	{	$student= $this->session->userdata('student');
		$student_id =  intval($student['ref_id']);
		$query_str='';
		$courses_retrieved=$this->retrieve_courses();
		foreach ($courses_retrieved as $key => $course) {
			if ($this->input->post($course['official_course_id'])!=null) {
				$pieces = explode("_", $this->input->post($course['official_course_id']));
				if ($course['course_id']==$pieces[1]) {
					$query_str.="'".$pieces[0]."',";
				}
			}
		}
		$query_str = rtrim($query_str, ",");

		$query_str = "SELECT insert_course_selections('".$student_id."' ,ARRAY[".$query_str."]) AS result_xml";
		
		$query = $this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		
		return $content;
	}

	public function retrieve_courses() {
		$query_str = "SELECT * FROM courses ORDER BY semester ASC";
		$query = $this->db->query($query_str);
		$row = $query->result_array();
	return $row;
	}

}

/* End of file application_form_model.php */
/* Location: ./application/models/application_form_model.php */