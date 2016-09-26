<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		//$this->load->view('login-view');
		$this->database_query_validation();
	}

	public function validate_credentials() {

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username' , 'trim|required');
		$this->form_validation->set_message('required', 'Παρακαλώ συμπληρώστε τo πεδίo %s.');
		$this->form_validation->set_rules('password' , 'password' ,'trim|required|callback_database_query_validation');
		$this->form_validation->set_message('database_query_validation', 'Tο όνομα χρήστη ή ο κωδικός πρόσβασης είναι λάθος.');
		if($this->form_validation->run() == FALSE) {
			$this->index();
		}
	}

	public function database_query_validation() {

		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		//print_r($query);
                //die();
                if($query != NULL){
                        //print_r($query);
                        //die();
			$sess_data = array(
				'user_type' => $query->user_type,
				'ref_id' => $query->ref_id,
				'username' => $_SERVER['uid'],
				'display_name' => $_SERVER['displayName'],
                                'first_name' => $_SERVER['givenName'],
                                'last_name' => $_SERVER['sn'],
                                'email_address' => $_SERVER['mail'],
                                'orgunit-dn' => $_SERVER['orgunit-dn'], //ou=ee,ou=stef,dc=teiath,dc=gr
//				'is_logged_in' => true,
                                'is_admin' => $query->is_admin
				);
			// This reads the database names' columns and not the session values $_SERVER['primary-affiliation']

                        if ($query->user_type=="student") {
                                $this->session->set_userdata('student',$sess_data);
                                redirect('student/schedule');
                                return true;
                        } else if ($query->user_type=="prof") {
                                $this->session->set_userdata('prof',$sess_data);
                                redirect('professor/prof');
                                return true;
                        } else if ($query->user_type=="admin"){
                                $this->session->set_userdata('admin',$sess_data);
                                redirect('administrator/admin');
                                return true;
                        }
/*
			if ($query->is_admin == 1) {
				$this->session->set_userdata('admin',$data);
				redirect('administrator/admin');
				return true;
			}else if ($query->user_type == "student") {
				$this->session->set_userdata('student',$data);
				redirect('student/schedule');
				return true;
			}else if ($query->user_type =="prof") {
				$this->session->set_userdata('prof',$data);
				redirect('professor/prof');
				return true;
                        }
*/
		} else {

			//redirect('https://accounts.rdetl.teiath.gr/secure/');
			$this->load->view('no-db-record');
                        return false;
		}
	}

	public function signup() {
		$data['first_name'] = array(  'name'        => 'first_name',
									  'type'        => 'text',
						              'id'          => 'first_name',
						              'class'       => 'form-control input-lg',
						              'placeholder' => 'First name',
						              'value'       => set_value('first_name', '')
						              );
		$data['last_name'] = array(  'name'        => 'last_name',
									  'type'        => 'text',
						              'id'          => 'last_name',
						              'class'       => 'form-control input-lg',
						              'placeholder' => 'Last name',
						              'value'       => set_value('last_name', '')
						              );
		$data['username'] = array(  'name'        => 'username',
									  'type'        => 'text',
						              'id'          => 'username',
						              'class'       => 'form-control input-lg',
						              'placeholder' => 'Username',
						              'value'       => set_value('username', '')
						              );
		$data['student_id'] = array(  'name'        => 'student_id',
									  'type'        => 'text',
						              'id'          => 'student_id',
						              'class'       => 'form-control input-lg',
						              'placeholder' => 'Student ID',
						              'value'       => set_value('student_id', '')
						              );

		$this->load->view('signup-view',$data);
	}

	public function create_account () {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name' , 'First_name' ,'trim|required');
		$this->form_validation->set_rules('last_name' , 'Last_name' ,'trim|required');

		$this->form_validation->set_rules('email' , 'Email' ,'trim|required|valid_email|is_unique[students.email_address]');
		$this->form_validation->set_message('is_unique' , 'That email address already exist');

		$this->form_validation->set_rules('student_id' , 'Student ID' , 'trim|required|integer|exact_length[4]' );
		$this->form_validation->set_rules('username' , 'Username' , 'trim|required|min_length[4]|max_length[32]' );
		$this->form_validation->set_rules('password' , 'Password' , 'trim|required|min_length[4]|max_length[32]' );
		$this->form_validation->set_rules('confirm_password' , 'Confirm_password' , 'trim|required|matches[password]' );

		if( $this->form_validation->run() == FALSE) {
			$this->signup();
		}
		else
		{
			$this->register_user();
			//generate a random key;
		/*	$key=md5(uniqid());


			echo $key;
			//send email to the user

			$this->load->library('email', array('mailtype'=>'html'));

			$this->email->from('me@mywebsite.com' , "Alex");
			$this->email->to($this->input->post('email'));
			$this->email->subject("Confirm your account");

			$message = "<p>Thank you for signing up!</p>";
			$message .= "<p><a href='". base_url(). "login/register_user/$key'>Click here</a>
			to confirm your account</p>";

			$this->email->message($message);

			// add the user to the temporary table (temp_user) in order to confirm the key.
			$this->load->model('membership_model');

			if ($this->membership_model->add_temp_user($key)){
				if($this->email->send()) {
					echo 'the email has been send.';
				} else {
					echo 'could not send the email.';
				}
			} else echo "there was a problem adding key to database.";
			*/
		}
	}

	public function register_user() {
		$this->load->model('membership_model');

		//if($this->membership_model->is_key_valid($key)) {

			if($this->membership_model->create_account()) {
				echo 'registration complete' . anchor('login' ,'Login');
			} else {
				echo 'could not complete registration';
			}
		//} else {
			//echo 'invalid key' .anchor('login' ,'login');;
		//}
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
