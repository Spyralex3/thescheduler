<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_msgs($trig) {
	if(!empty($trig)){
		 switch ($trig)
		 {
			case 'labs_update_success_msg':
				$msg='<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Επιτυχής εισαγωγή <strong>εργαστηρίων</strong> στο σύστημα.
						</div>';
				break;
			//-------------PROFESSORS----------------------------------------------------------
			case 'labs_update_failure_msg':
				$msg='<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Η εισαγωγή στοιχείων δεν ήταν εφικτή! Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
						</div>';
				break;
			
			default:
				$msg='<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						'.$trig.'
						</div>';
				break;
		  }
	}else{
		$msg="";
	}
	return $msg;
}

/* End of file messages_helper.php */
/* Location: ./application/helpers/professor/messages_helper.php */
