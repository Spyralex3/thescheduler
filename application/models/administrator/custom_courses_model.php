<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_courses_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function retrieve_custom_courses() {
		$query_str='SELECT retrieve_courses_xml() AS result_xml';
		$query=$this->db->query($query_str);
		$row = $query->row();
		$content = $row->result_xml;
		return $content ;
	}

	public function update_custom_courses() {
		$there_is_prof_ass=false;
		foreach($this->input->post('professor_assistant') as $professor_assistant){
				if($professor_assistant!=0){
					$there_is_prof_ass=true;
				}
			}
		if($there_is_prof_ass==false){
				$query_str=" UPDATE courses SET official_course_id='".trim($this->input->post('official-course-id'))."',
					 classroom_id=".trim($this->input->post('classroom')).",
					 professor_id=".trim($this->input->post('professor')).",helper_professor_ids=NULL, 
					 type='".trim($this->input->post('type'))."',
					 name='".trim($this->input->post('course'))."',semester=".trim($this->input->post('semester'))."
					  WHERE course_id=".trim($this->input->post('course-id'));
		}else {
			$professor_assistant_str='ARRAY[';
			foreach($this->input->post('professor_assistant') as $professor_assistant){
				if($professor_assistant!=0){
					$professor_assistant_str.=$professor_assistant.',';
				}
			}
			$professor_assistant_array= rtrim($professor_assistant_str,",");
			$professor_assistant_array.="]";
		
			$query_str=" UPDATE courses SET official_course_id='".trim($this->input->post('official-course-id'))."',
					 classroom_id=".trim($this->input->post('classroom')).",
					 professor_id=".trim($this->input->post('professor')).",helper_professor_ids=".$professor_assistant_array.", 
					 type='".trim($this->input->post('type'))."',
					 name='".trim($this->input->post('course'))."',semester=".trim($this->input->post('semester'))."
					  WHERE course_id=".trim($this->input->post('course-id'));
		}			  
		$query=$this->db->query($query_str);
		return $query;
	}

	public function update_course_timeframes_lab($timeframe_ids) {
		$course_id_pieces = explode("_", trim($this->input->post('course-id')));
		$str='ARRAY[';
		foreach ($timeframe_ids as $value) {
			$str.='ARRAY[';
			foreach ($value as  $value_1) {
				$str.=$value_1.",";
			}
			$str= rtrim($str,",");
			$str.= '],';
		}

		$str= rtrim($str, ",");
		$str.= ']';

		$query_str="UPDATE course_timeframes SET timeframe_ids=".$str."
					WHERE course_id=".$course_id_pieces[0];
		$query=$this->db->query($query_str);
		return $query;
	}

	public function update_course_timeframes_lecture($timeframe_ids) {
		$course_id_pieces = explode("_", trim($this->input->post('course-id')));
		$str='ARRAY[ARRAY[';
		foreach ($timeframe_ids as $value) {
			$str.=$value.",";
		}
		$str= rtrim($str,",");
		$str.= ']]';

		$query_str=" UPDATE course_timeframes SET timeframe_ids=".$str."
					 WHERE course_id=".$course_id_pieces[0];
		$query=$this->db->query($query_str);
		return $query;
	}
//----------------------------Insert------------------------------------------------------------------
	public function insert_custom_courses() {
		$course_id_pieces = explode("_", trim($this->input->post('course-id')));
		
		$there_is_prof_ass=false;
		foreach($this->input->post('professor_assistant') as $professor_assistant){
				if($professor_assistant!=0){
					$there_is_prof_ass=true;
				}
			}
		if($there_is_prof_ass==false){
				$query_str=" INSERT INTO courses (course_id, official_course_id,
		 			classroom_id, professor_id, type, name, semester)
		 			VALUES (".$course_id_pieces[0].",'".trim($this->input->post('official-course-id'))
	 				."',".trim($this->input->post('classroom')).",".trim($this->input->post('professor')).","
	 				."'".trim($this->input->post('type'))."','".trim($this->input->post('course'))
	 				."',".trim($this->input->post('semester')).")";
		}else {
			$professor_assistant_str='ARRAY[';
			foreach($this->input->post('professor_assistant') as $professor_assistant){
				if($professor_assistant!=0){
					$professor_assistant_str.=$professor_assistant.',';
				}
			}
			$professor_assistant_array= rtrim($professor_assistant_str,",");
			$professor_assistant_array.="]";
		
			$query_str=" INSERT INTO courses (course_id, official_course_id,
		 			classroom_id, professor_id,helper_professor_ids, type, name, semester)
		 			VALUES (".$course_id_pieces[0].",'".trim($this->input->post('official-course-id'))
	 				."',".trim($this->input->post('classroom')).",".trim($this->input->post('professor')).","
	 				.$professor_assistant_array.",'".trim($this->input->post('type'))."','".trim($this->input->post('course'))
	 				."',".trim($this->input->post('semester')).")";
		}
		$query=$this->db->query($query_str);
		return $query;
	}

	public function insert_course_timeframes_lab($timeframe_ids) {
		$course_id_pieces = explode("_", trim($this->input->post('course-id')));
		$str='ARRAY[';
		foreach ($timeframe_ids as $value) {
			$str.='ARRAY[';
			foreach ($value as  $value_1) {
				$str.=$value_1.",";
			}
			$str= rtrim($str,",");
			$str.= '],';
		}

		$str= rtrim($str, ",");
		$str.= ']';

		$query_str="INSERT INTO course_timeframes (course_id, timeframe_ids)
					VALUES (".$course_id_pieces[0].
					",".$str.")";
		$query=$this->db->query($query_str);
		return $query;
	}

	public function insert_course_timeframes_lecture($timeframe_ids) {
		$course_id_pieces = explode("_", trim($this->input->post('course-id')));
		$str='ARRAY[ARRAY[';
		foreach ($timeframe_ids as $value) {
			$str.=$value.",";
		}
		$str= rtrim($str,",");
		$str.= ']]';

		$query_str=" INSERT INTO course_timeframes (course_id, timeframe_ids)
					VALUES (".$course_id_pieces[0].",".$str.")";

		$query=$this->db->query($query_str);
		return $query;
	}

	//-------------------DELETE-----------------------
	public function delete_custom_courses() {
		$query_str="DELETE FROM courses WHERE course_id=".$this->input->post('course-id');
		$query=$this->db->query($query_str);
		return $query;
	}
	public function delete_custom_course_timeframes() {
		$query_str="DELETE FROM course_timeframes WHERE course_id=".$this->input->post('course-id');
		$query=$this->db->query($query_str);
		return $query;
	}

	public function delete_custom_course_selections() {
  		$query_str="DELETE FROM course_selections WHERE course_id=".$this->input->post('course-id');
  		$query=$this->db->query($query_str);
  		return $query;
 	}
}

/* End of file custom_courses_model.php */
/* Location: ./application/models/administrator/custom_courses_model.php */