<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application_form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	public function is_logged_in () {
		$student = $this->session->userdata('student');
		$is_logged_in = $student['is_logged_in'];
		$user_type = $student['user_type'];

		if (!isset($is_logged_in)|| $is_logged_in!=true || $user_type!="student") {
			redirect('login');
			die();
		}
	}
	public function logout() {
		$this->session->unset_userdata('student');
		redirect('login');
	}
	public function index()
	{
		$this->load->model('student/application_form_model');
		$data['courses']=$this->application_form_model->retrieve_courses();
		$this->load->view('student/application_form-view',$data);
	}
	public function create_schedule() {
		$this->load->model('student/application_form_model');
		$query = $this->application_form_model->create_schedule();

		if ($query=='OK') {
			$this->session->set_flashdata('success_msg', 'TRUE');
			redirect('student/schedule');
		}
	}
}

/* End of file application.php */
/* Location: ./application/controllers/student/application.php */