<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	public function retrieve_schedule($student_id){
		$query_str = "SELECT retrieve_schedule_xml('".$student_id."') AS result_xml";
		$query = $this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		return $content;
	}

	public function update_lab_hours($student_id,$lab_hours_choices){
		$query_str="SELECT update_lab_selections(".$student_id.",ARRAY[";
		for ($i=0;$i<count($lab_hours_choices);++$i) {
			$query_str.= "ARRAY[".$lab_hours_choices[$i][0].",".$lab_hours_choices[$i][1].",".$lab_hours_choices[$i][2]."]";
			if ($i!=count($lab_hours_choices)-1) {
				$query_str.=",";
			}
		}
		$query_str.="])";
		$query = $this->db->query($query_str);
		return $query;
	}

	public function retrieve_student_info(){
		$sess_student = $this->session->userdata('student');
		$query_str = "SELECT * FROM students WHERE student_id=".$sess_student['ref_id'];
		$query = $this->db->query($query_str);
		$row = $query->row();
		return $row;

	}

	public function reset_labs_selection($student_id){
		$sess_student = $this->session->userdata('student');
		$query_str = "SELECT reset_labs_selection(".$sess_student['ref_id'].")";
		$query = $this->db->query($query_str);
		$row = $query->row();
		return $row;
	}

	public function is_reg(){
		$query_str = "SELECT is_registrable(0,0);";
		$query = $this->db->query($query_str);
		$row = $query->row();
		return $row;
	}
}
/* End of file schedule_model.php */
/* Location: ./application/models/student/schedule_model.php */
