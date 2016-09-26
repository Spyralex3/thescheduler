<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Students_choices_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}
	public function get_students_choices_options() {
    	
		$query_str='SELECT course_id, official_course_id, name FROM courses ORDER bY 1 ';
		$query=$this->db->query($query_str);
		$result=$query->result_array();
		return $result;
	
	}

	public function get_students_choices_info($course_id) {
    	
		/*$query_str='select course_id, official_course_id, name, type, (select count(student_id) from course_selections WHERE course_id='.$course_id.') as total_registered , (	select count(student_id) from course_selections WHERE course_id='.$course_id.' AND timeframe_selection=0) as total_pending_class FROM courses WHERE course_id='.$course_id.';';*/

		$query_str = "select course_id, official_course_id, name, type, (select count(student_id) from course_selections WHERE course_id=".$course_id.") as total_registered , (select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=0) as total_pending_class, 
---day_time_class_1 + selected_class_1
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[1:1][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[1:1][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[1:1][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_1, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=1) as selected_class_1, 
---day_time_class_2 + selected_class_2
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[2:2][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[2:2][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[2:2][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_2, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=2) as selected_class_2, 
---day_time_class_3 + selected_class_3
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[3:3][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[3:3][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[3:3][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_3, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=3) as selected_class_3, 
---day_time_class_4 + selected_class_4
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[4:4][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[4:4][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[4:4][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_4, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=4) as selected_class_4, 
---day_time_class_5 + selected_class_5
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[5:5][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[5:5][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[5:5][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_5, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=5) as selected_class_5, 
---day_time_class_6 + selected_class_6
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[6:6][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[6:6][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[6:6][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_6, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=6) as selected_class_6, 
---day_time_class_7 + selected_class_7
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[7:7][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[7:7][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[7:7][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_7, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=7) as selected_class_7, 
---day_time_class_8 + selected_class_8
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[8:8][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[8:8][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[8:8][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_8, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=8) as selected_class_8, 
---day_time_class_4 + selected_class_4
(select day from timeframes_ref where timeframe_id=(restack((select timeframe_ids[9:9][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' ' || (select start_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[9:9][1:1] from course_timeframes where course_id=".$course_id.")))[1]) || ' - ' || (select end_hour_str from timeframes_ref where timeframe_id=(restack((select timeframe_ids[9:9][2:2] from course_timeframes where course_id=".$course_id.")))[1]) as day_time_class_9, 
(select count(student_id) from course_selections WHERE course_id=".$course_id." AND timeframe_selection=9) as selected_class_9 
--the rest of it
FROM courses WHERE course_id=".$course_id.";";
		$query=$this->db->query($query_str);
		$result=$query->result_array();
		return $result;
	
	}
}
/* End of file delete_course_selection_model.php */
/* Location: ./application/models/administrator/professor_schedule_model.php */