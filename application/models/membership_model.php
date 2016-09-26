<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function validate(){
		$this->db->where('username', $_SERVER['uid']);
		
		$query = $this->db->get('users');

		if($query->num_rows() ==1){
			$row = $query->row();
			return $row;
		}else {
			return false;			
		}
	}

	public function add_temp_user($key) {

		$data = array (
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email_address' => $this->input->post('email'),
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'),
						'student_id' => $this->input->post('student_id'),
						'key' => $key
					);

		$query = $this->db->insert('temp_users',$data);
		if($query) {
			return true;
		} else return false;
	}

	public function is_key_valid($key) {
		$this->db->where('key', $key);
		$query = $this->db->get('temp_users');

		if ($query) {
			return true;
		} else return false;
	}

	public function create_account() {
			$new_member_insert_data = array('first_name' => $this->input->post('first_name'),
											'last_name' => $this->input->post('last_name'),
											'email_address' => $this->input->post('email'),
											'username' => $this->input->post('username'),
											'password' => $this->input->post('password'),
											'student_id' => $this->input->post('student_id'),
											);
			$new_member_insert_data_2 = array(
											'username' => $this->input->post('username'),
											'password' => $this->input->post('password'),
											'user_type' => "student",
											'ref_id' => $this->input->post('student_id'),
											'user_id' => 41
											);
			$insert = $this->db->insert('students' , $new_member_insert_data);
			$insert_2 = $this->db->insert('users' , $new_member_insert_data_2);
				return true;
	}

}

/* End of file membership_model.php */
/* Location: ./application/models/membership_model.php */