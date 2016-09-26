<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 15 Jun 1987 09:00:00 GMT"); 
		$this->_is_logged_in();
		//$this->output->cache(60);
	}

        public function red_to_panel(){
                $uri_str = uri_string();
                $student = explode("/",uri_string() );
                if (!empty($student[3])) {
                        $username = $student[3];
                        $user_type = $student[4];
                        $ref_id = $student[5];
                        $is_admin = $student[6];
                        $data = array(
                                'username'=>$username,
                                'user_type' => $user_type,
                                'ref_id'=>$ref_id,
                                'is_admin'=> $is_admin
                                );
                        //$this->session->unset_userdata('student');
                        //$this->session->sess_destroy();
                        $this->session->set_userdata('student',$data);
                        //$this->index(); 
                        return true;

                }
        }

        public function _is_logged_in () {
                /*if($this->red_to_panel() == true){
                        redirect('student/schedule');
                        return false;
                }*/

                $student = $this->session->userdata('student');
                $user_type = $student['user_type'];
                //print_r($student);
                //die();
                if ($student['user_type']!="student") {
                        redirect('login');
                        die();
                }
        }

/*
	public function _is_logged_in () {
		$student = $this->session->userdata('student');
		$is_logged_in = $student['is_logged_in'];
		$user_type = $student['user_type'];

		if (!isset($student['is_logged_in'])|| $student['is_logged_in']!=true || $student['user_type']!="student") {
			redirect('login');
			die();
		}
	}
*/
	public function logout() {
		//Delete Codeigniter Session
		$this->session->unset_userdata('student');
		$this->session->sess_destroy();
		redirect('https://accounts.rdetl.teiath.gr/Shibboleth.sso/Logout');
	}

        public function change_panel() {
                //change panel
                $student = $this->session->userdata('student');
                redirect('administrator/admin/red_to_panel/'.$student['username'].'/'.$student['user_type'].'/'.$student['ref_id'].'/'.$student['is_admin'].'/');
        }

	public function index()
	{
		if (! file_exists('application/views/student/schedule-view.php'))
		{
			show_404();
		}
		$this->load->helper('student/messages');
		$trig=$this->session->flashdata('msg');
		$data['msg']=create_msgs($trig);

		$this->load->helper('student/create_schedule_and_lab_choices_tables');

		$datar = $this->config->item('visited');
		$datar['visited_schedule'] = 'active';
		$this->load->view('student/templates/header-view',$datar);

		$student = $this->session->userdata('student');
		$student_id = $student['ref_id'];

		$this->load->model('student/schedule_model');
		$xmlstr = $this->schedule_model->retrieve_schedule($student_id);
                $dtgreg=$this->schedule_model->is_reg()->is_registrable;

		if (empty($xmlstr) || $xmlstr == 'Schedule is not available for this student.') {
			$data['table_title'] ='';
			$data['courses_table'] ='Δεν βρέθηκαν μαθήματα με αυτά τα στοιχεία. Παρακαλώ ' . anchor('student/application_form', 'Καντε δήλωση μαθημάτων');
			$data['lab_time']='';
			$data['info_msg']='';
			$data['warning_msg']='';
			$data['dt_greg']=$dtgreg;
		}
		else {
			$schedule = new SimpleXMLElement($xmlstr);
			$data['table_title'] = '';
			$data['courses_table'] = _create_schedule($schedule);
			$data['lab_time'] = (!isset($schedule->pending_courses->course)) ? '' : _create_lab_choices_table($schedule);
			//$data['info_msg']=(!isset($schedule->show_hint)) ? '' : create_msgs('info_msg');
			$data['info_msg']=create_msgs('info_msg');
			$data['warning_msg']=(!isset($schedule->pending_courses->course)) ? '' : create_msgs('warning_msg');
			$data['dt_greg']=$dtgreg;
		}	
		$this->load->view('student/schedule-view',$data);
		$this->load->view('student/templates/footer-view');
	}
	
	
	public function student_info() {
	
		if (! file_exists('application/views/student/student_info-view.php'))
		{
			show_404();
		}
		$this->load->model('student/schedule_model');
		$data['student_info']=$this->schedule_model->retrieve_student_info();
        $data['student_info']=$this->session->userdata('student');

		$datar = $this->config->item('visited');
		$datar['visited_student_info'] = 'active';
		
		$this->load->view('student/templates/header-view',$datar);
		$this->load->view('student/student_info-view',$data);
		$this->load->view('student/templates/footer-view');

	}

	public function course_pending() {
		
		$student = $this->session->userdata('student');
		$student_id = $student['ref_id'];
		$this->load->model('student/schedule_model');
		$lab_hours_choices=array();

		foreach($this->input->post('labs') as $lab){		
			if ($lab!=0) {
				$pieces = explode("_", $lab);
				$lab_hours_choices[] = array(intval($pieces[0]) , intval($pieces[1]), intval($pieces[2]));
			}
		}
		
		if (empty($lab_hours_choices)) {	
			redirect("student/schedule");
		}else{
			$query=$this->schedule_model->update_lab_hours($student_id,$lab_hours_choices);
			if ($query) {
				$this->session->set_flashdata('msg','labs_insert_success_msg');
				redirect("student/schedule");
			}else{
				$this->session->set_flashdata('msg','labs_insert_failure_msg');
				redirect("student/schedule");
			}
		}
	}

	public function reset_labs() {
                $student = $this->session->userdata('student');
                $student_id = $student['ref_id'];
		$this->load->model('student/schedule_model');
		$query=$this->schedule_model->reset_labs_selection($student_id);
                //echo '<pre>'; print_r($query); echo '</pre>';
		//echo $query->reset_labs_selection;
		//die();
		if ($query->reset_labs_selection=='OK'){
			$this->session->set_flashdata('msg','reset_labs_success_msg');
			redirect("student/schedule");
		}else{
			$this->session->set_flashdata('msg','reset_labs_failure_msg');
			redirect("student/schedule");
		}
	}
}

/* End of file schedule.php */
/* Location: ./application/controllers/student/schedule.php */
