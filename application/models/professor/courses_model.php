<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}
	public function retrieve_lectures(){
		$prof=$this->session->userdata('prof');
		$query_str="SELECT cs.course_id as course_id, cs.official_course_id as official_course_id, cr.classroom as classroom, pr.name || ' ' || pr.surname as professor_name, cs.type as type, cs.name as name, cs.semester as semester FROM courses cs JOIN professors pr ON cs.professor_id=pr.professor_id JOIN classrooms cr ON cs.classroom_id = cr.classroom_id WHERE pr.professor_id=".$prof['ref_id']." AND cs.type='lecture'";
		$query=$this->db->query($query_str);
		$result=$query->result_array();
		return $result;
	}

	public function retrieve_labs(){
		$prof=$this->session->userdata('prof');
		$query_str="SELECT cs.course_id as course_id, cs.official_course_id as official_course_id, cr.classroom as classroom, pr.name || ' ' || pr.surname as professor_name, cs.type as type, cs.name as name, cs.semester as semester, get_classes(course_id) as classes_xml FROM courses cs JOIN professors pr ON cs.professor_id=pr.professor_id JOIN classrooms cr ON cs.classroom_id = cr.classroom_id WHERE pr.professor_id=".$prof['ref_id']." AND cs.type='lab';";
		$query=$this->db->query($query_str);
		$result=$query->result_array();
		return $result;
	}

	public function update_labs_classes(){
		$classes_choice_array = $this->input->post('onoffswitch');
		$choice_to_num=0;
		$temp_array_1 = NULL;
		$temp_array = 'ARRAY[';
		foreach ($classes_choice_array as  $choice) {
			if ($choice=="true") {
				$choice_to_num=1;
			}else{
				$choice_to_num=0;
			}
			$temp_array .= $choice_to_num.',';
		}
		$temp_array_1 .= rtrim($temp_array, ",");
		$temp_array_1 .= ']';
		
		$query_str="UPDATE course_timeframes SET registrable=".$temp_array_1." WHERE course_id=".$this->input->post('course_id');
		$query=$this->db->query($query_str);

		return $query_str;

	}

    public function retrieve_classes($course_id){
		$query_str="SELECT retrieve_classes_json(".$course_id.")";
		$query=$this->db->query($query_str);
		$result=$query->result_array();
		return $result;
	}

	public function retrieve_lab_courses() {
		$query_str = "SELECT retrieve_schedule_xml('".$student_id."') AS result_xml";
		$query = $this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		return $content;
	}

    public function retrieve_student_keys() {
        $query_str = "SELECT * from students LIMIT 1";
        $query = $this->db->query($query_str);
        $row = $query->row();
        return $row;
    }

    public function set_classes($professor_id, $course_id, $tf_selection, $student_ids) {
        $student_ids_str = 'ARRAY[';
        $st_counter = 0;
        if ($student_ids[0]!=null) {
            foreach ($student_ids as $student_id) {
                if ($st_counter!=0) {
                    $student_ids_str .= ',';
                }
                $student_ids_str .= $student_id;
                $st_counter++;
            }
        }
        else {
            $student_ids_str .= '1000';
        }
        $student_ids_str .= ']';

        $query_str = "SELECT set_classes(". $professor_id .",". $course_id .",". $tf_selection .",". $student_ids_str .")";
        $query = $this->db->query($query_str);
        return $query;
    }

    public function retrieve_prof_schedule() {
    	$prof=$this->session->userdata('prof');
		$query_str = "SELECT retrieve_schedule_xml(1001".$prof['ref_id'].") AS result_xml";
		$query = $this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		return $content;
	}

	public function retrieve_classroom_schedule($class_id) {
		$query_str = "SELECT retrieve_schedule_xml(1002". $class_id.") AS result_xml";
		$query = $this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		return $content;
	}

}

/* End of file courses_lecture_model.php */
/* Location: ./application/models/professor/courses_lecture_model.php */