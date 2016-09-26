<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_msgs($trig, $arr) {
$obj = ($arr == 'NULL' ?  : json_decode($arr)); 

 switch ($trig)
 { 
    //------------COURSES--------------------------------------------------
  	case 'custom_courses_insert_success_msg':
      $msg='<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Επιτυχής εισαγωγή <strong>μαθημάτων </strong>στο σύστημα.
        </div>';
      break;
    case 'custom_courses_insert_failure_msg':
      $msg='<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Η εισαγωγή στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
        </div>';
      break;
    case 'custom_courses_update_success_msg':
      $msg='<div class="alert alert-success alert-dismissable" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Επιτυχής ενημέρωση <strong>μαθημάτων </strong>στο σύστημα.
      </div>';
      break;
    case 'custom_courses_update_failure_msg':
      $msg='<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Η ενημέρωση στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
        </div>';
      break;
    case 'custom_courses_delete_success_msg':
      $msg='<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Επιτυχής διαγραφή <strong>μαθημάτων </strong>στο σύστημα.
        </div>';
      break;
    case 'custom_courses_delete_failure_msg':
      $msg='<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Η διαγραφή στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
        </div>';
      break;
  	//-------------PROFESSORS----------------------------------------------------------
  	case 'custom_professors_insert_success_msg':
  		$msg='<div class="alert alert-success alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Επιτυχής εισαγωγή <strong>καθηγητών </strong>στο σύστημα.
				</div>';
  		break;
  	case 'custom_professors_insert_failure_msg':
  		$msg='<div class="alert alert-danger alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Η εισαγωγή στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
				</div>';
  		break;
  	case 'custom_professors_update_success_msg':
  		$msg='<div class="alert alert-success alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Επιτυχής ενημέρωση <strong>καθηγητών </strong>στο σύστημα.
			</div>';
  		break;
  	case 'custom_professors_update_failure_msg':
  		$msg='<div class="alert alert-danger alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Η ενημέρωση στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
				</div>';
  		break;
  	case 'custom_professors_delete_success_msg':
  		$msg='<div class="alert alert-success alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Επιτυχής διαγραφή <strong>καθηγητών </strong>στο σύστημα.
				</div>';
  		break;
  	case 'custom_professors_delete_failure_msg':
  		$msg='<div class="alert alert-danger alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Η διαγραφή στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
				</div>';
  		break;
  	//-------------CLASSROOMS----------------------------------------------------------
  	case 'custom_classrooms_insert_success_msg':
  		$msg='<div class="alert alert-success alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Επιτυχής εισαγωγή <strong>αιθουσών </strong>στο σύστημα.
				</div>';
  		break;
  	case 'custom_classrooms_insert_failure_msg':
  		$msg='<div class="alert alert-danger alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Η εισαγωγή στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
				</div>';
  		break;
  	case 'custom_classrooms_update_success_msg':
  		$msg='<div class="alert alert-success alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Επιτυχής ενημέρωση <strong>αιθουσών </strong>στο σύστημα.
			</div>';
  		break;
  	case 'custom_classrooms_update_failure_msg':
  		$msg='<div class="alert alert-danger alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Η ενημέρωση στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
				</div>';
  		break;
  	case 'custom_classrooms_delete_success_msg':
  		$msg='<div class="alert alert-success alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Επιτυχής διαγραφή <strong>αιθουσών </strong>στο σύστημα.
				</div>';
  		break;
  	case 'custom_classrooms_delete_failure_msg':
  		$msg='<div class="alert alert-danger alert-dismissable">
			    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Η διαγραφή στοιχείων δεν ήταν εφικτή!<strong>Ο Κωδικός Αίθουσας χρησιμοποιείται από κάποιο άλλο μάθημα</strong>.Παρακαλώ αποδεσμεύστε τον για να γίνει η διαγραφή!
				</div>';
  		break;
    //-------------VARIOUS ACTIONS----------------------------------------------------------
    case 'delete_course_selections_success_msg':
      $msg='<div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Επιτυχής διαγραφή <strong>δηλώσεων </strong>στο σύστημα.
        </div>';
      break;
    case 'delete_course_selections_failure_msg':
      $msg='<div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Η διαγραφή δηλώσεων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον δημιουργό αυτού του προγράμματος.
        </div>';
      break;
    case 'lab_subscription_period':
      $msg='<div class="alert alert-warning alert-dismissable">
        Περίοδος εγραφών εργαστηρίων:'.$obj->{'start_date'}.' '.$obj->{'start_hour'}.':'.$obj->{'start_minutes'}.' - '.
        $obj->{'end_date'}.' '.$obj->{'end_hour'}.':'.$obj->{'end_minutes'}.' '.'
        </div>';
      break;
  	default:
  		$msg='';
  		break;
  }

	return $msg;
}

/* End of file messages.php */
/* Location: ./application/helpers/administrator/messages.php */