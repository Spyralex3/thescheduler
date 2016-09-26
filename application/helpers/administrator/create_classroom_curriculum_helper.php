<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function create_table($classroom_schedule){
	$schedule = new SimpleXMLElement($classroom_schedule);
	$tf_hours = array("08:00-09:00","09:00-10:00","10:00-11:00","11:00-12:00","12:00-13:00","13:00-14:00","14:00-15:00","15:00-16:00","16:00-17:00","17:00-18:00","18:00-19:00","19:00-20:00","20:00-21:00","21:00-22:00");
	$result_columns = _xml_num_of_columns($schedule);

	foreach ($result_columns as $key => $value) {
		if ($key == 'num_of_columns'){ $num_of_columns = $value;}
		else if ($key == 'max_courses_per_day_fri') {
			$max_courses_per_day["fri"] = $value;
		}
		else if ($key == 'max_courses_per_day_thu') {
			$max_courses_per_day["thu"] = $value;
		}
		else if ($key == 'max_courses_per_day_wed') {
			$max_courses_per_day["wed"] = $value;
		}
		else if ($key == 'max_courses_per_day_tue') {
			$max_courses_per_day["tue"] = $value;
		}
		else if ($key == 'max_courses_per_day_mon') {
			$max_courses_per_day["mon"] = $value;
		}
	}

	$table_result = '<div class="table-responsive first-scroller">
					 <table class="table table-bordered " id="professor_schedule">
					  <thead>
						<tr>
						  <th class="table-data-timeframes" id="header_timeframe" style="min-width: 94px; max-width: 94px;"></th>
						  <th class="table-header mon"  colspan="'. $max_courses_per_day["mon"] .'" rowspan="1" >ΔΕΥΤΕΡΑ</th>
						  <th class="table-header"  colspan="'. $max_courses_per_day["tue"] .'" rowspan="1">ΤΡΙΤΗ</th>
						  <th class="table-header wed"  colspan="'. $max_courses_per_day["wed"] .'" rowspan="1">ΤΕΤΑΡΤΗ</th>
						  <th class="table-header"  colspan="'. $max_courses_per_day["thu"] .'" rowspan="1">ΠΕΜΠΤΗ</th>
						  <th class="table-header fri"  colspan="'. $max_courses_per_day["fri"] .'" rowspan="1">ΠΑΡΑΣΚΕΥΗ</th>
						  <th class="table-header"  rowspan="1" style="display:none;" id="hidden_column_header"></th>
						</tr>
					  </thead>
					  <tbody>';

	$courses_on_mon = array();
	$courses_on_tue = array();
	$courses_on_wed = array();
	$courses_on_thu = array();
	$courses_on_fri = array();
	$counter_1=0;
	$counter_2=1000;

	for ($i=1; $i<=14; $i++) {
		$table_result .= '<tr>';
		$table_result .= '<td class="table-data-timeframes" id="timeframes">'.$tf_hours[$i-1].'</td>';
		if ($i<10) {
			$temp_i = '0'.$i;
		}
		else {
			$temp_i = $i;
		}
		for ($j=1; $j<=5; $j++) {
			$cur_tf_id = $j.$temp_i;
			$cur_course_in_tf = 0;
			$xpath_s = '//timeframe[@tf_id=\''.$cur_tf_id.'\']/courses/course';
			$course_count = count($schedule->xpath($xpath_s));
			if ($course_count == 0) {
				if ($j==1) {
					for ($k=1; $k<=$max_courses_per_day['mon']; $k++) {
						$table_result .= '<td class="table-data mon"></td>';
					}
				}
				elseif ($j==2) {
					for ($k=1; $k<=$max_courses_per_day['tue']; $k++) {
						$table_result .= '<td class="table-data"></td>';
					}
				}
				elseif ($j==3) {
					for ($k=1; $k<=$max_courses_per_day['wed']; $k++) {
						$table_result .= '<td class="table-data wed"></td>';
					}
				}
				elseif ($j==4) {
					for ($k=1; $k<=$max_courses_per_day['thu']; $k++) {
						$table_result .= '<td class="table-data"></td>';
					}
				}
				elseif ($j==5) {
					for ($k=1; $k<=$max_courses_per_day['fri']; $k++) {
						$table_result .= '<td class="table-data fri"></td>';
					}
				}
			}
			else {
				foreach ($schedule->xpath($xpath_s) as $course) {
					$cs_id = (int) $course['cs_id'];
					$cur_course_in_tf+=1;
					if ($j==1) {
						if (!in_array($cs_id, $courses_on_mon)) {

							$table_result .= '<td class="table-data mon" rowspan="'.$course['duration'].'">'. _collapse_view($course->course_title ,$course->official_course_id ,$course->semester ,$course->course_type ,$course->professor_name ,$course->classroom ,$counter_1 ,$counter_2) .'</td>';
							array_push($courses_on_mon, $cs_id);
							$counter_1++;
							$counter_2++;
						}
						if ($course_count==$cur_course_in_tf) {
							$max_cur_course_dif = $max_courses_per_day['mon'] - $course_count;
							for ($l=1; $l<=$max_cur_course_dif; $l++) {
								$table_result .= '<td class="table-data mon"></td>';
							}
						}
					}
					elseif ($j==2) {
						if (!in_array($cs_id, $courses_on_tue)) {
							$table_result .= '<td class="table-data"  rowspan="'.$course['duration'].'">'. _collapse_view($course->course_title ,$course->official_course_id ,$course->semester ,$course->course_type ,$course->professor_name ,$course->classroom ,$counter_1 ,$counter_2) .'</td>';
							array_push($courses_on_tue, $cs_id);
							$counter_1++;
							$counter_2++;
						}
						if ($course_count==$cur_course_in_tf) {
							$max_cur_course_dif = $max_courses_per_day['tue'] - $course_count;
							for ($l=1; $l<=$max_cur_course_dif; $l++) {
								$table_result .= '<td class="table-data" ></td>';
							}
						}
					}
					elseif ($j==3) {
						if (!in_array($cs_id, $courses_on_wed)) {
							$table_result .= '<td class="table-data wed"  rowspan="'.$course['duration'].'">'. _collapse_view($course->course_title ,$course->official_course_id ,$course->semester ,$course->course_type ,$course->professor_name ,$course->classroom ,$counter_1 ,$counter_2) .'</td>';
							array_push($courses_on_wed, $cs_id);
							$counter_1++;
							$counter_2++;
						}
						if ($course_count==$cur_course_in_tf) {
							$max_cur_course_dif = $max_courses_per_day['wed'] - $course_count;
							for ($l=1; $l<=$max_cur_course_dif; $l++) {
								$table_result .= '<td class="table-data wed" ></td>';
							}
						}
					}
					elseif ($j==4) {
						if (!in_array($cs_id, $courses_on_thu)) {
							$table_result .= '<td class="table-data"  rowspan="'.$course['duration'].'">'._collapse_view($course->course_title ,$course->official_course_id ,$course->semester ,$course->course_type ,$course->professor_name ,$course->classroom ,$counter_1 ,$counter_2).'</td>';
							array_push($courses_on_thu, $cs_id);
							$counter_1++;
							$counter_2++;
						}
						if ($course_count==$cur_course_in_tf) {
							$max_cur_course_dif = $max_courses_per_day['thu'] - $course_count;
							for ($l=1; $l<=$max_cur_course_dif; $l++) {
								$table_result .= '<td class="table-data" ></td>';
							}
						}
					}
					elseif ($j==5) {
						if (!in_array($cs_id, $courses_on_fri)) {
							$table_result .= '<td class="table-data fri"  rowspan="'.$course['duration'].'">'._collapse_view($course->course_title ,$course->official_course_id ,$course->semester ,$course->course_type ,$course->professor_name ,$course->classroom ,$counter_1 ,$counter_2).'</td>';
							array_push($courses_on_fri, $cs_id);
							$counter_1++;
							$counter_2++;
						}
						if ($course_count==$cur_course_in_tf) {
							$max_cur_course_dif = $max_courses_per_day['fri'] - $course_count;
							for ($l=1; $l<=$max_cur_course_dif; $l++) {
								$table_result .= '<td class="table-data fri" ></td>';
							}
						}
					}
				}
			}
		}
	$table_result .= '<td class="table-data" style="display:none;" id="hidden_column_cell"></td>';
	$table_result .= '</tr> ';
	}
	$table_result .= '</tbody>
						</table>
					  </div></div>';
	return $table_result;
}

function _collapse_view($course_title ,$official_course_id ,$semester ,$course_type ,$professor_name ,$classroom ,$counter_1 ,$counter_2) {
	$panel_lab_style=($course_type=='lab') ? 'background-color:#679FD2;' : '' ;

	$string = '<div class="panel-group" id="'
				. $counter_2 . '">
				  <div class="panel panel-default">
					<div class="panel-heading " style="'.$panel_lab_style.'"">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#' . $counter_2 . '"
						 href="#' . $counter_1 . '" id="course_link">'
						  .  $course_title .
						'</a>
					  </h4>
					</div>
					<div id="' . $counter_1 . '" class="panel-collapse collapse in">
					  <div class="panel-body " >' .
							$professor_name . '</br>'.
													translate_cs_type($course_type) . '</br>'.
							'Εξάμηνο: ' .	$semester . '</br>' .
													'Αίθουσα: ' .	$classroom. '</br>'.
													'Κωδικός: ' .	$official_course_id. '</br>'.
					  '</div>
					</div>
				  </div>
				</div>';
	return $string;
}
function _xml_num_of_columns($schedule) {

	$max_courses_per_day = array("mon"=>1,"tue"=>1,"wed"=>1,"thu"=>1,"fri"=>1);

	foreach ($schedule->timeframes->timeframe as $timeframe) {
	   if (round($timeframe['tf_id']/100,0)==1) {
			if ($timeframe->courses->course->count() > $max_courses_per_day['mon']) {
				$max_courses_per_day['mon'] = $timeframe->courses->course->count();
			}
	   }
	   if (round($timeframe['tf_id']/100,0)==2) {
			if ($timeframe->courses->course->count() > $max_courses_per_day['tue']) {
				$max_courses_per_day['tue'] = $timeframe->courses->course->count();
			}
	   }
	   if (round($timeframe['tf_id']/100,0)==3) {
			if ($timeframe->courses->course->count() > $max_courses_per_day['wed']) {
				$max_courses_per_day['wed'] = $timeframe->courses->course->count();
			}
	   }
	   if (round($timeframe['tf_id']/100,0)==4) {
			if ($timeframe->courses->course->count() > $max_courses_per_day['thu']) {
				$max_courses_per_day['thu'] = $timeframe->courses->course->count();
			}
	   }
	   if (round($timeframe['tf_id']/100,0)==5) {
			if ($timeframe->courses->course->count() > $max_courses_per_day['fri']) {
				$max_courses_per_day['fri'] = $timeframe->courses->course->count();
			}
	   }
	}
	$num_of_columns = $max_courses_per_day['fri']+$max_courses_per_day['thu']+$max_courses_per_day['wed']+$max_courses_per_day['tue']+$max_courses_per_day['mon'];

	$result_columns = array('num_of_columns'=> $num_of_columns, 'max_courses_per_day_fri' => $max_courses_per_day['fri'], 'max_courses_per_day_thu' => $max_courses_per_day['thu'], 'max_courses_per_day_wed' => $max_courses_per_day['wed'], 'max_courses_per_day_tue' => $max_courses_per_day['tue'], 'max_courses_per_day_mon' => $max_courses_per_day['mon']);
	return $result_columns;
}
 function translate_cs_type($cs_type) {
	if ($cs_type=='lab') {
		return 'Εργαστήριο';
	}
	else {
		return 'Θεωρία';
	}
}
/* End of file create_classroom_curriculum_helper.php */
/* Location: ./application/helpers/administrator/create_classroom_curriculum_helper.php */

	
