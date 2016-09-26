<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class My_Session extends CI_Session{

	public function __construct()
	{
		if($this->session->userdata('student')!='') {
			$student = $this->session->userdata('student')
			$data = array(
			'user_type' => $student['user_type'],
			'ref_id'=> $student['ref_id'],
			'username'=> $student['username'],
			'is_logged_in'=> true
			);
			$this->session->set_userdata('student',$data);
		}
	}
}
