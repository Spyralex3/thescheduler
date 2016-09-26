<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lab_subscription_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}
	
	public function retrieve_date_time(){
		$query_str = "SELECT value FROM PROPERTIES WHERE key='LAB_REGS_DATE_FROM'";
		$query = $this->db->query($query_str);
		$date_from_query = $query->result_array();
		

		$query_str = "SELECT value FROM PROPERTIES WHERE key='LAB_REGS_DATE_TO'";
		$query = $this->db->query($query_str);
		$date_to_query = $query->result_array();

		
		if (!empty($date_from_query) AND !empty($date_to_query)) {
			return $date_and_time_values = array('date_and_time_from'=>$date_from_query, 'date_and_time_to'=>$date_to_query);
		}else{
			return  FALSE;
		}
		
	}

	public function set_labs_date_time($dates_array) {
		$query_str = "UPDATE PROPERTIES SET VALUE='".$dates_array["start_date"].' '.$dates_array["start_hour"].':'.$dates_array["start_minutes"]."' WHERE KEY='LAB_REGS_DATE_FROM';";
		$date_from_query = $this->db->query($query_str);

		$query_str = "UPDATE PROPERTIES SET VALUE='".$dates_array["end_date"].' '.$dates_array["end_hour"].':'.$dates_array["end_minutes"]."' WHERE KEY='LAB_REGS_DATE_TO';";
		$date_to_query = $this->db->query($query_str);
		
		if (($date_from_query == TRUE) AND ($date_from_query == TRUE)) {
			$query = TRUE;
		}else{
			$query = FALSE;
		}
		return $query;

	}
}
/* End of file lab_subscription_model.php */
/* Location: ./application/models/administrator/lab_suscription_model.php */