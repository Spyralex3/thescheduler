<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function pairing_day_and_time_lab($day,$start_time,$end_time){

	$counter=count($day);
	$final_results=array();
	for ($i=0; $i <$counter; $i++) {

	    $diff=$end_time[$i]-$start_time[$i];
	    $hr_begin=$day[$i].$start_time[$i];
	    $hr_end=$day[$i].$end_time[$i];

	    $tf_ids=array($hr_begin);

		for ($j=0; $j<$diff-1; $j++) {
			$tf_ids[]=$day[$i].''.$start_time[$i]+$j+1;
		}
		if ($diff!=0) {
			$tf_ids[]=$hr_end;
		}

	    array_push($final_results, $tf_ids);
	}

    return $final_results;
}

function pairing_day_and_time_lecture($day,$start_time,$end_time){

	$counter=count($day);
	$tf_ids=array();
	for ($i=0; $i <$counter; $i++) {

	    $diff=$end_time[$i]-$start_time[$i];
	    $hr_begin=$day[$i].$start_time[$i];
	    $hr_end=$day[$i].$end_time[$i];

	    array_push($tf_ids,$hr_begin);

		for ($j=0; $j<$diff-1; $j++) {
			array_push($tf_ids,$day[$i].''.$start_time[$i]+$j+1);
		}
		if ($diff!=0) {
			array_push($tf_ids,$hr_end);
		}

	}

    return $tf_ids;
}

/* End of file create_custom_classrooms_helper.php */
/* Location: ./application/helpers/administrator/create_custom_classrooms_helper.php */
