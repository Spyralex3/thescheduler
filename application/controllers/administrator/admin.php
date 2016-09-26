<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 15 Jun 1987 09:00:00 GMT"); 
		if ($this->red_to_panel()) {
			$this->_is_logged_in();
//			echo "start".$this->red_to_panel();
//			die();
		}
	}

        public function red_to_panel(){
                $uri_str = uri_string();
//		echo uri_string();
		
		
                $admin = explode("/",uri_string() );
//		print_r($admin);
//		die();
                if (!empty($admin[4]) AND !empty($admin[5]) AND !empty($admin[6]) AND !empty($admin[7]) AND !empty($admin[8]) AND $admin[8]==1) {
                        $username = $admin[4];
                        $user_type = $admin[5];
                        $ref_id = $admin[6];
			$display_name = $admin[7];
                        $is_admin = $admin[8];
                        $data = array(
                                'username' => $username,
                                'user_type' => $user_type,
                                'ref_id' => $ref_id,
				'display_name' => $display_name,
                                'is_admin'=> $is_admin,
                                );
                        $this->session->set_userdata('admin',$data); 
			redirect('administrator/admin');
                        return false;
                }else{
			return true;
		}
        }

	public function _is_logged_in () {
               /* if($this->red_to_panel() == true){
                        redirect('administrator/admin');
                        return false;
                }*/
		$admin = $this->session->userdata('admin');
		//Checks if the request is an Ajax Request. If true then checks if the session is expired. If true sends a flag as an Ajax response in order to log out the user
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			if ($admin['is_admin']!=1) {
				echo $result="sess_expired"; 
				die();
			}
		}
		//Checks if the session is expired. If true  log out and redirect user to login page
		if ( ($admin['is_admin'] != 1)) {
		//	echo "prin";
		//	print_r($admin);
		//	echo "meta";
		//	die();
			redirect('https://accounts.rdetl.teiath.gr/secure/'); 		
		} 
	}

	public function logout() {
		//Delete Codeigniter Session
		$this->session->unset_userdata('admin');
		$this->session->sess_destroy();
		redirect('https://accounts.rdetl.teiath.gr/Shibboleth.sso/Logout');
	}

        public function change_panel($user_type) {
                //change panel
                if ($user_type == 'prof') {
                        $admin = $this->session->userdata('admin');
                        //print_r($admin);
                        //die();
                        //redirect('professor/prof/red_to_panel/'.$admin['username'].'/'.$admin['user_type'].'/'.$admin['ref_id'].'/'.$admin['is_admin'].'/');
                        redirect('professor/');
                }else if ($user_type == 'student') {
                        $admin = $this->session->userdata('admin');
                        //redirect('student/schedule/red_to_panel/'.$admin['username'].'/'.$admin['user_type'].'/'.$admin['ref_id'].'/'.$admin['is_admin'].'/');
                        redirect('student/');
                }
                //print_r($user_type);
                //die();
        }

	public function index()
	{
		
		$this->load->helper('administrator/messages');
		$trig=$this->session->flashdata('msg');
		$data['query_messages']=create_msgs($trig,'NULL');
		
		$data['date_and_time_module']=$this->set_declaration_date();
		$data['custom_courses']=$this->create_custom_courses();
		$data['custom_professors']=$this->create_custom_professors();
		$data['custom_classrooms']=$this->create_custom_classrooms();
		$data['classroom_schedule']=$this->create_classroom_schedule();
		$data['curriculum_schedule']=$this->create_curriculum_schedule();
		$data['professor_curriculum_options']=$this->create_professor_curriculum_schedule();
		$data['students_choices_info'] = $this->create_students_choices_options();

		$datar=$this->config->item('admin_visited');
		$datar['visited_administrator']='active';

		$this->load->view('administrator/templates/header-view',$datar);
		$this->load->view('administrator/admin-view',$data);
		$this->load->view('administrator/templates/footer-view');

	}
//------------CUSTOM_COURSES--------------------------------
	public function create_custom_courses(){
		$this->load->model('administrator/custom_professors_model');
		$professors = $this->custom_professors_model->retrieve_custom_professors();
		
		$this->load->model('administrator/custom_classrooms_model');
		$classrooms = $this->custom_classrooms_model->retrieve_custom_classrooms();

		$this->load->model('administrator/custom_courses_model');
		$xmlstr = $this->custom_courses_model->retrieve_custom_courses();
		//$total_of_students = $this->custom_courses_model->get_total_of_students();
		
		if(!empty($professors)&&!empty($classrooms)&&!empty($xmlstr)) {
			$custom_courses_db_result = new SimpleXMLElement($xmlstr);
			$this->load->helper('administrator/create_custom_courses');
			$custom_courses = create_cust_courses($xmlstr,$classrooms,$professors);
		}else if(!empty($professors)&&!empty($classrooms)) {
			$this->load->helper('administrator/create_custom_courses');
			$custom_courses = create_cust_courses($xmlstr,$classrooms,$professors);	
		}else {
			$custom_courses="Παρακαλώ εισάγετε πρώτα καθηγητές και αίθουσες στο σύστημα!";
		}	
		return $custom_courses;
	} 


	public function update_custom_courses() {

	        $this->load->model('administrator/custom_courses_model');
		if ($this->input->post('add-data')) {
			$course_id_already_exist=true;
			
			$pieces = explode("_", $this->input->post('course-id'));
			if (isset($pieces[1]) && $pieces[1]=='new') {
				$course_id_already_exist=false;
			}
			
			if ($course_id_already_exist==true) {
                if($this->input->post('type')=='lab'){

                    $day = $this->input->post('day');
                    $start_time = $this->input->post('start-time');
                    $end_time = $this->input->post('end-time');

                    $this->load->helper('administrator/update_custom_courses');
                    $timeframe_ids= pairing_day_and_time_lab($day,$start_time,$end_time);
					
                    if ($this->custom_courses_model->update_custom_courses()==1) {
	        	    	if ($this->custom_courses_model->update_course_timeframes_lab($timeframe_ids)==1) {
	        	    		$this->session->set_flashdata('msg','custom_courses_update_success_msg');
							redirect('administrator/admin');
	        	    	}else{
	        	    		$this->session->set_flashdata('msg','custom_courses_update_failure_msg');
							redirect('administrator/admin');
	        	    	}
	        	    }else{
	        	    	$this->session->set_flashdata('msg','custom_courses_update_failure_msg');
						redirect('administrator/admin');
	        	    }

                 }else if($this->input->post('type')=='lecture'){
                       $day = $this->input->post('day');
                	   $start_time = $this->input->post('start-time');
                	   $end_time = $this->input->post('end-time');
                	   $this->load->helper('administrator/update_custom_courses');
                	   $timeframe_ids= pairing_day_and_time_lecture($day,$start_time,$end_time);

                	if ($this->custom_courses_model->update_custom_courses()==1) {
	        	    	if ($this->custom_courses_model->update_course_timeframes_lecture($timeframe_ids)==1) {
	        	    		$this->session->set_flashdata('msg','custom_courses_update_success_msg');
							redirect('administrator/admin');
	        	    	}else{
	        	    		$this->session->set_flashdata('msg','custom_courses_update_failure_msg');
							redirect('administrator/admin');
	        	    	}
	        	    }else{
	        	    	$this->session->set_flashdata('msg','custom_courses_update_failure_msg');
						redirect('administrator/admin');
	        	    } 
                 }
			}
			else{
				if ($this->input->post('type')=='lab') {
					$day = $this->input->post('day');
	        	    $start_time = $this->input->post('start-time');
	        	    $end_time = $this->input->post('end-time');

	        	    $this->load->helper('administrator/update_custom_courses');
	        	    $timeframe_ids= pairing_day_and_time_lab($day,$start_time,$end_time);

	        	    if ($this->custom_courses_model->insert_custom_courses()==1) {
	        	    	if ($this->custom_courses_model->insert_course_timeframes_lab($timeframe_ids)==1) {
	        	    		$this->session->set_flashdata('msg','custom_courses_insert_success_msg');
							redirect('administrator/admin');
	        	    	}else{
	        	    		$this->session->set_flashdata('msg','custom_courses_insert_failure_msg');
							redirect('administrator/admin');
	        	    	}
	        	    }else{
	        	    	$this->session->set_flashdata('msg','custom_courses_insert_failure_msg');
						redirect('administrator/admin');
	        	    }
				}
				else if($this->input->post('type')=='lecture'){
					$day = $this->input->post('day');
	        	    $start_time = $this->input->post('start-time');
	        	    $end_time = $this->input->post('end-time');

	        	    $this->load->helper('administrator/update_custom_courses');
	        	    $timeframe_ids= pairing_day_and_time_lecture($day,$start_time,$end_time);

	        	    if ($this->custom_courses_model->insert_custom_courses()==1) {
	        	    	if ($this->custom_courses_model->insert_course_timeframes_lecture($timeframe_ids)==1) {
	        	    		$this->session->set_flashdata('msg','custom_courses_insert_success_msg');
							redirect('administrator/admin');
	        	    	}else{
	        	    		$this->session->set_flashdata('msg','custom_courses_insert_failure_msg');
							redirect('administrator/admin');
	        	    	}
	        	    }else{
	        	    	$this->session->set_flashdata('msg','custom_courses_insert_failure_msg');
						redirect('administrator/admin');
	        	    }
        		}
			}
		}else if($this->input->post('delete-data')){
			$this->load->helper('administrator/update_custom_courses');
			if ($this->custom_courses_model->delete_custom_courses()==1 && $this->custom_courses_model->delete_custom_course_timeframes()==1 &&$this->custom_courses_model->delete_custom_course_selections()==1) {
				$this->session->set_flashdata('msg','custom_courses_delete_success_msg');
				redirect('administrator/admin');
			}else{
				$this->session->set_flashdata('msg','custom_courses_delete_failure_msg');
				redirect('administrator/admin');
			}
		}
		else {
			redirect('administrator/admin');
		}
	}


//------------CUSTOM_PROFESSORS--------------------------------
	public function create_custom_professors(){
		$this->load->helper('administrator/create_custom_professors');
		$this->load->model('administrator/custom_professors_model');
		$custom_professors_db_result=$this->custom_professors_model->retrieve_custom_professors();
		$table=create_custom_professors($custom_professors_db_result);
		return $table;
	}

	public function update_custom_professors() {
		//echo '<meta charset="utf-8" />'.$this->input->post('name').$this->input->post('surname').$this->input->post('professor-id');
		$this->load->model('administrator/custom_professors_model');
		if ($this->input->post('add-data')) {
			$professor_id_already_exist=true;
			
			$pieces = explode("_", $this->input->post('professor-id'));
			if (isset($pieces[1]) && $pieces[1]=='new') {
				$professor_id_already_exist=false;
			}
			
			if ($professor_id_already_exist==true) {
				if ($this->custom_professors_model->update_custom_professors()==1) {
					$this->session->set_flashdata('msg','custom_professors_update_success_msg');
					redirect('administrator/admin');
				}else{
					$this->session->set_flashdata('msg','custom_professors_update_failure_msg');
					redirect('administrator/admin');
				}
			}else{
				if ($this->custom_professors_model->insert_custom_professors()==1) {
					$this->session->set_flashdata('msg','custom_professors_insert_success_msg');
					redirect('administrator/admin');
				}else{
					$this->session->set_flashdata('msg','custom_professors_insert_failure_msg');
					redirect('administrator/admin');
				}
			}
		}else if($this->input->post('delete-data')){

			if ($this->custom_professors_model->delete_custom_professors()==1) {
				$this->session->set_flashdata('msg','custom_professors_delete_success_msg');
				redirect('administrator/admin');
			}else{
				$this->session->set_flashdata('msg','custom_professors_delete_failure_msg');
				redirect('administrator/admin');
			}
		}
		else {
			redirect('administrator/admin');
		}
	}



//------------CUSTOM_CLASSROOMS--------------------------------
	public function create_custom_classrooms(){
		$this->load->helper('administrator/create_custom_classrooms');
		$this->load->model('administrator/custom_classrooms_model');
		$custom_classrooms_db_result=$this->custom_classrooms_model->retrieve_custom_classrooms();
		$table=create_custom_classrooms($custom_classrooms_db_result);
		return $table;
	}

	public function update_custom_classrooms() {

		$this->load->model('administrator/custom_classrooms_model');

		if ($this->input->post('add-data')) {
			$classroom_id_already_exist=true;
			
			$pieces = explode("_", $this->input->post('classroom-id'));
			if (isset($pieces[1]) && $pieces[1]=='new') {
				$classroom_id_already_exist=false;
			}
			
			if ($classroom_id_already_exist==true) {
				if ($this->custom_classrooms_model->update_custom_classrooms()==1) {
					$this->session->set_flashdata('msg','custom_classrooms_update_success_msg');
					redirect('administrator/admin');
				}else{
					$this->session->set_flashdata('msg','custom_classrooms_update_failure_msg');
					redirect('administrator/admin');
				}
			}else{
				if ($this->custom_classrooms_model->insert_custom_classrooms()==1) {

					$this->session->set_flashdata('msg','custom_classrooms_insert_success_msg');
					redirect('administrator/admin');
				}else{
					$this->session->set_flashdata('msg','custom_classrooms_insert_failure_msg');
					redirect('administrator/admin');
				}
			}
		}else if($this->input->post('delete-data')){
			if ($this->custom_classrooms_model->delete_custom_classrooms()==1) {
				$this->session->set_flashdata('msg','custom_classrooms_delete_success_msg');
				redirect('administrator/admin');
			}else{
				$this->session->set_flashdata('msg','custom_classrooms_delete_failure_msg');
				redirect('administrator/admin');
			}
		}
		else {
			redirect('administrator/admin');
		}
	}
//--------------VARIOUS ACTIONS-----------------------------------------------------
	public function delete_course_selections(){
		if ($this->input->post("submit")) {
			$this->load->model("administrator/delete_course_selections_model");
			if($this->delete_course_selections_model->delete_crs_sel()==1){
				$this->session->set_flashdata('msg','delete_course_selections_success_msg');
				redirect('administrator/admin');
			}else{
				$this->session->set_flashdata('msg','delete_course_selections_failure_msg');
				redirect('administrator/admin');//---------douleia akomh
			}
		}else{
			redirect('administrator/admin');
		}
	}
 
	public function set_declaration_date() {
		$this->load->model("administrator/lab_subscription_model");
		$date_and_time_values = $this->lab_subscription_model->retrieve_date_time();
		$this->load->helper('administrator/create_set_declaration_date');
		
		return create_declaration_date($date_and_time_values);
	}

	public function ajax_response_set_date() {
		//if ($this->input->post("submit_date_hour")) { 
			$dates_array = array('start_date' => $this->input->post("start_date"),'start_hour' => $this->input->post("start_hour"),
			'start_minutes' => $this->input->post("start_minutes"), 'end_date' => $this->input->post("end_date"),
			'end_hour' => $this->input->post("end_hour"), 'end_minutes' => $this->input->post("end_minutes") );
			
			$this->load->model('administrator/lab_subscription_model');
			$this->lab_subscription_model->set_labs_date_time($dates_array);

			$this->load->helper('administrator/messages');
			$query_messages=create_msgs("lab_subscription_period",json_encode($dates_array));

			echo $query_messages;
		//}
	}


//---------------------CREATE CLASSROOM SCHEDULE-----------
	public function create_classroom_schedule() {
		$this->load->model('administrator/custom_classrooms_model');
		$classrooms = $this->custom_classrooms_model->retrieve_custom_classrooms();
		$this->load->helper('administrator/curriculum_professor_classroom_select_tag');
		$html_select_tag=create_classrooms_choices($classrooms);
	    return $html_select_tag;
    }
	public function ajax_response_classrooms_schedule() {
		$this->load->model('administrator/classroom_schedule_model');  
		$classroom_schedule=$this->classroom_schedule_model->retrieve_classroom_schedule($this->input->post("classroom_choice"));
		if($classroom_schedule=="Schedule is not available for this student."){
			echo "<p>Το πρόγραμμα δεν είναι διαθέσιμο για αυτήν την αίθουσα.</p>";  
		}else {
			$this->load->helper('administrator/create_classroom_curriculum'); 
			$table=create_table($classroom_schedule);
			echo $table; 
		}
	}
//---------------------CREATE CURRICULUM SCHEDULE-----------
	public function create_curriculum_schedule() {		
		$semesters=array(1,2,3,4,5,6,7);
		$this->load->helper('administrator/curriculum_professor_classroom_select_tag');
		$html_select_tag=create_curriculum_choices($semesters);
	    return $html_select_tag;
	}
	public function ajax_response_curriculum_schedule() {
		$this->load->model('administrator/curriculum_model');
		$semester_schedule=$this->curriculum_model->retrieve_curriculum_schedule($this->input->post("curriculum_choice"));
		if($semester_schedule=="Schedule is not available for this student."){
			echo "<p>Δεν υπάρχουν μαθήματα για αυτό το εξάμηνο.</p>";  
		}else {
			$this->load->helper('administrator/create_curriculum_schedule_table'); 
			$table=create_curriculum_table($semester_schedule);
			echo $table; 
		}
	}
//---------------------CREATE PROFFESOR CURRICULUM SCHEDULE-----------
	public function create_professor_curriculum_schedule() {	    
		$this->load->model('administrator/custom_professors_model');
		$professors = $this->custom_professors_model->retrieve_custom_professors();
		$this->load->helper('administrator/curriculum_professor_classroom_select_tag');
		$html_select_tag=create_prof_choices($professors);
	    return $html_select_tag;
	}
	
	public function ajax_response_prof_schedule() {
		$this->load->model('administrator/professor_schedule_model');  
		$prof_schedule=$this->professor_schedule_model->retrieve_prof_schedule($this->input->post("prof_choice"));
		if($prof_schedule=="Schedule is not available for this student."){
			echo "<p>Το πρόγραμμα δεν είναι διαθέσιμο για αυτόν τον καθηγητή.</p>";  
		}else {
			$this->load->helper('administrator/create_professor_curriculum'); 
			$table=create_table($prof_schedule);
			echo $table; 
		}
	}

	public function create_students_choices_options(){
		$this->load->model('administrator/students_choices_model');
		$courses = $this->students_choices_model->get_students_choices_options();
		//$students_choices_query_query = 'this is a test.';
		$this->load->helper('administrator/create_students_info_helper');
		$table = create_courses_dropdown($courses);
		return $table;
	}

	public function ajax_response_course_selections() {
		$this->load->model('administrator/students_choices_model');  
		$all_courses = $this->students_choices_model->get_students_choices_options();
		//echo '<pre>'; print_r($all_courses); echo '</pre>';
		//die();
		foreach ($all_courses as  $one_course) {
			//echo '<pre>'; print_r($one_course["course_id"]); echo '</pre>';
			//die();
			$course_info = $this->students_choices_model->get_students_choices_info($one_course["course_id"]);
	                //echo '<pre>'; print_r($course_info); echo '</pre>';
	                //die();
			//$course_info = $this->students_choices_model->get_students_choices_info($this->input->post("course_id"));		
			if($course_info == NULL){
				echo "<p>Δεν υπάρχει αυτό το μάθημα.</p>";  
			}else {
				$this->load->helper('administrator/create_students_info'); 
				$table=create_students_info($course_info);
				echo $table;
			}
		}
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/administrator/admin.php */
