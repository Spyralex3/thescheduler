<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_msgs($trig) {

 switch ($trig)
 {
    //------------COURSES--------------------------------------------------
    case 'labs_insert_success_msg':
      $msg='<div class="alert alert-success alert-dismissable" style="position:fixed; z-index:1; width:100%;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Επιτυχής εισαγωγή <strong>εργαστηρίων </strong>στο σύστημα.
        </div>';
    break;
    case 'labs_insert_failure_msg':
      $msg='<div class="alert alert-danger alert-dismissable" style="position:fixed; z-index:1; width:100%;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Η εισαγωγή στοιχείων δεν ήταν εφικτή!Παρακαλώ επικοινωνήστε με τον διαχειριστή.
        </div>';
    break;
    case 'info_msg':
      $msg='<div class="alert alert-info alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <p style="font-size:1.1em;"><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-info-sign"></span> Κάντε <em>click</em> σε ένα μάθημα για να δείτε περισσότερες πληροφορίες. Τα θεωρητικά μέρη των μαθημάτων απεικονίζονται με γκρι χρώμα, ενώ τα εργαστηριακά με μπλε.</p>
				</div>';
    break;
    case 'warning_msg':
      $msg='<div class="alert alert-warning alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p style="font-size:1.1em;"><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-warning-sign"></span>Υπάρχουν εργαστήρια για τα οποία δεν έχετε δηλώσει προτίμηση ώρας. Παρακαλώ μεταβείτε στο τέλος της σελίδας. <br><br><b>Προσοχή! </b>Μετά την λήξη της περιόδου των εγγραφών, δεν θα έχετε το δικαίωμα να αλλάξετε τις επιλογές σας. Θα πρέπει να παρακολουθείτε το σύστημα για την τελική διαμόρφωση του προγράμματός σας.</p>
            </div>';
    break;
    case 'reset_labs_success_msg':
      $msg='<div class="alert alert-success alert-dismissable" style="position:fixed; z-index:1; width:100%;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Επιτυχής διαγραφή επιλογής <strong>εργαστηριακών τμημάτων</strong>. Μπορείτε να επιλέξετε ξανά εργαστηριακά τμήματα.
        </div>';
    break;
    case 'reset_labs_failure_msg':
      $msg='<div class="alert alert-danger alert-dismissable" style="position:fixed; z-index:1; width:100%;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Η διαγραφή των επιλογών σας δεν ήταν εφικτή! Πιθανόν να έχει λήξει η περίοδος των δηλώσεων. Σε αντίθετη περίπτωση παρακαλώ επικοινωνήστε με τον διαχειρηστή.
        </div>';
    break;
    default:
  		$msg='';
    break;
  }

	return $msg;
}

/* End of file messages_helper.php */
/* Location: ./application/models/messages_helper.php */
