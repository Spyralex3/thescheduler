<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prof extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 15 Jun 1987 09:00:00 GMT"); 
		$this->_is_logged_in();
	}

        public function red_to_panel(){
                $uri_str = uri_string();
                $prof = explode("/",uri_string());
                if (!empty($prof[3])) {
                        $username = $prof[3];
                        $user_type = $prof[4];
                        $ref_id = $prof[5];
                        $is_admin = $prof[6];
                        $data = array(
                                'username' => $username,
                                'user_type' => $user_type,
                                'ref_id' => $ref_id,
                                'is_admin' => $is_admin
                                );
                        $this->session->set_userdata('prof',$data);
                        return true;

                }
        }

	public function _is_logged_in () {
        $prof = $this->session->userdata('prof');
		
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			if ($prof['user_type']!='prof') {
				echo $result="sess_expired"; 
				die();
			}
		}

		if ( $prof['user_type']!='prof') {
			redirect('https://accounts.rdetl.teiath.gr/secure/');
			die();
		}
	}

	public function logout() {
		$this->session->unset_userdata('prof');
		$this->session->sess_destroy();
		redirect('https://accounts.rdetl.teiath.gr/Shibboleth.sso/Logout');
	}

        public function change_panel() {
                //change panel
                $prof = $this->session->userdata('prof');
                redirect('administrator/admin/red_to_panel/'.$prof['username'].'/'.$prof['user_type'].'/'.$prof['ref_id'].'/'.$prof['username'].'/'.$prof['is_admin'].'/');
        }

	public function index()
	{
		$this->load->helper('professor/messages');
		$trig=$this->session->flashdata('msg');
		$data['query_messages']=create_msgs($trig);

       	$data['lectures']=$this->create_lectures()!='No values'? $this->create_lectures():'Δεν υπάρχουν δηλωμένες θεωρίες';
		$data['labs']=$this->create_labs()!='No values'? $this->create_labs():'Δεν υπάρχουν δηλωμένα εργαστήρια';
       	$data['prof_schedule']=$this->create_prof_schedule();
        $data['classroom_schedule']=$this->create_classroom_schedule();

		$datar=$this->config->item('visited');
		$datar['visited_professor']='active';

		$this->load->view('professor/templates/header-view',$datar);
		$this->load->view('professor/professor-view',$data);
		$this->load->view('professor/templates/footer-view');

	}

	public function create_lectures() {
		$this->load->model('professor/courses_model');
		$lectures=$this->courses_model->retrieve_lectures();
		if (empty($lectures)) {
			$table='No values';
			return $table;
		}

		$this->load->helper('professor/create_courses_lecture');
		$table=create_lectures($lectures);
		return $table;
	}

	public function create_labs() {
		$this->load->model('professor/courses_model');
		$labs=$this->courses_model->retrieve_labs();

		if (empty($labs)) {
			$table='No values';
			return $table;
		}
		$this->load->helper('professor/create_courses_lab');
		$table=create_labs($labs);
		return $table;
	}

	public function ajax_update_classes(){
		
		$this->load->model('professor/courses_model');
		$query = $this->courses_model->update_labs_classes();
		echo $this->create_labs();
		
	}

	public function file_xls($course_id) {
	    $this->load->model('professor/courses_model');
            $classes=$this->courses_model->retrieve_classes($course_id);

            $this->load->model('professor/courses_model');
            $student_keys=$this->courses_model->retrieve_student_keys();

            require_once 'application/libraries/PHPExcel/IOFactory.php';
            $objPHPExcel = new PHPExcel();
            $class_sheets = array();
            $class_arrays = array();
            $xls_header = array_keys((array) $student_keys);
            $cl_counter = 0;
            $sh_counter = 0;
            $course_name = '';

            foreach ($classes as $class) {
                $class_array = json_decode($class['retrieve_classes_json'],true);
                if (array_key_exists('day', $class_array)) {
                    $course_name = $class_array['course_name'];
                    if ($cl_counter != 0) {
                        $class_sheet->fromArray($xls_header,'','A1');
                        $class_sheet->fromArray($class_arrays,'','A2');
                        array_push($class_sheets, $class_sheet);
                    }
                    $class_arrays = array();
                    if ($class_array['tf']!=0) {
                        $class_sheet = new PHPExcel_Worksheet($objPHPExcel, str_replace(":", ".", $class_array['course_id'].'-'.$class_array['tf'].'-'.$class_array['day'].' '.$class_array['start_time'].' - '.$class_array['end_time']));
                    }
                    else {
                        $class_sheet = new PHPExcel_Worksheet($objPHPExcel, $class_array['course_id'].'-'.$class_array['tf'].'-'."Pending student's choice");
                                        }
                }
                else {
                    array_push($class_arrays,$class_array);
                }
                $cl_counter++;

            }

            $class_sheet->fromArray($xls_header,'','A1');
            $class_sheet->fromArray($class_arrays,'','A2');
            array_push($class_sheets, $class_sheet);
            foreach ($class_sheets as $class_sheet) {
                $objPHPExcel->addSheet($class_sheet, $sh_counter);
                $sh_counter++;
            }
            $objPHPExcel->removeSheetByIndex($sh_counter);
            $objPHPExcel->setActiveSheetIndex(0);
                        header('Content-Type: application/vnd.ms-excel');//Important to understand browser that is for downloading and not for displaying
                        header('Content-Disposition: attachment;filename="'.$course_id.'-'.$course_name.'.xls"');
                        /*header('Cache-Control: max-age=0');
                        header('Cache-Control: max-age=1');
                        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified*/
                        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                        header ('Pragma: public'); // HTTP/1.0
            // Save Excel 2007 file
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
            // We'll be outputting an excel file
            $objWriter->save('php://output');
            redirect('login');
	}

	 public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['overwrite'] = TRUE;
		$this->load->helper("file");
		$this->load->library('upload', $config);
		$prof = $this->session->userdata('prof');

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		}
		else
		{
		   require_once 'application/libraries/PHPExcel/IOFactory.php';
		    $objPHPExcel = new PHPExcel();
			$db_results = array();
		    $data = array('upload_data' => $this->upload->data());
		    $objPHPExcel = IOFactory::load($this->upload->upload_path.$this->upload->file_name);
		    $sheet_count = $objPHPExcel->getSheetCount();
		    for ($i=0;$i<$sheet_count;$i++) {
		        $class_sheet = $objPHPExcel->getSheet($i);
				$title_exploded = explode('-',$class_sheet->getTitle());
				$course_id = $title_exploded[0];
				$tf_selection = $title_exploded[1];
		        $highest_col = $class_sheet->getHighestColumn();
		        $highest_row = $class_sheet->getHighestRow();
		        $class_array = $class_sheet->rangeToArray('A2:'.$highest_col.$highest_row);

		        $student_ids = array();
		        foreach ($class_array as $student) {
		            array_push($student_ids, $student[0]);
		        }

		        $this->load->model('professor/courses_model');
		        $db_result=$this->courses_model->set_classes($prof['ref_id'], $course_id, $tf_selection, $student_ids);
				array_push($db_results, $db_result);
		    }
			$found_error = false;
			foreach($db_results as $db_result) {
				foreach ($db_result->result() as $row) {
					$db_result_ok=$row->set_classes;
				}
				if ($db_result_ok!='OK') {
					$found_error = true;
					break;
				}
			}
			if ($found_error==false) {
					$this->session->set_flashdata('msg','labs_update_success_msg');
					redirect('professor/prof');
			}else{
				$this->session->set_flashdata('msg',$db_result_ok);
				redirect('professor/prof');
			}
		}
		delete_files($this->upload->upload_path.$this->upload->file_name);
	}

    public function create_prof_schedule() {
        $this->load->model('professor/courses_model');
        $prof_schedule=$this->courses_model->retrieve_prof_schedule();
        if ($prof_schedule=='Schedule is not available for this student.') {
            $table='Δεν υπάρχουν δηλωμένα μαθήματα.';
            return $table;
        }else {
			$this->load->helper('professor/create_prof_schedule_table');
			$table=create_table($prof_schedule);
			return $table;
		}
    }
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
}

/* End of file prof.php */
/* Location: ./application/controllers/professor/prof.php */
