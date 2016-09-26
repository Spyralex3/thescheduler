<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function create_courses_dropdown($courses){
		 $str='<form class="form-inline" role="form">
			 <div class="form-group">
			<select name="professor" class="form-control " id="courses_selections" style="display:none" >';
						  foreach ($courses as  $course) {
						  		$str.='<option value="'.$course['course_id'].'">'.$course['official_course_id'].': '.$course['name'].'</option>';
						  }
					$str.='</select></div>
					 <div class="form-group">
							<div style="width:100px; display:block; margin:auto;" id="submit_div">
		                        <button type="submit" class="btn btn-primary" id="submit_courses_selection" >Εμφάνιση</button>
		                      </div>
						</div>	  
							  </form>';
	    return $str;

	}
	function create_students_info($course_info) {
			
			$table_result=
					'<div class="table-responsive first-scroller">
							 <table class="table table-bordered " id="students_choices_info">
			                  <thead>
			                    <tr>
			                     
			                      <th class="table-header" >Κωδικός Μαθήματος</th>
			                      <th class="table-header" >Μάθημα</th>
			                      <th class="table-header" >Τύπος</th>
			                      <th class="table-header" colspan="2">Δηλώσεις Φοιτητών</th>
			                      
			                     </tr>
			                  </thead>
			                  <tbody>
			                  		
			                  		';

			foreach ($course_info as $value) {
				$table_result .= '
							<tr> 
								<td class="table-data" >'.$value['official_course_id'].'</td>
								<td class="table-data" >'.$value['name'].'</td>
								<td class="table-data" >'.($value['type'] == "lab" ? "Εργαστήριο" : "Θεωρία") .'</td>
								<td class="table-data" colspan="2">
								<table class="table table-bordered ">
									<thead>
										<th class="table-header" >Αριθμός</th>
			                      		<th class="table-header" >Τμήματα</th>
									</thead>
									<tbody>
									   ';
				if ($value['day_time_class_1']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_1'].'</td>
											<td class="table-data" >'.$value['day_time_class_1'].'</td>
										</tr>';
				}
				if ($value['day_time_class_2']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_2'].'</td>
											<td class="table-data" >'.$value['day_time_class_2'].'</td>
										</tr>';
				}
				if ($value['day_time_class_3']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_3'].'</td>
											<td class="table-data" >'.$value['day_time_class_3'].'</td>
										</tr>';
				}
				if ($value['day_time_class_4']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_4'].'</td>
											<td class="table-data" >'.$value['day_time_class_4'].'</td>
										</tr>';
				}
				if ($value['day_time_class_5']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_5'].'</td>
											<td class="table-data" >'.$value['day_time_class_5'].'</td>
										</tr>';
				}
				if ($value['day_time_class_6']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_6'].'</td>
											<td class="table-data" >'.$value['day_time_class_6'].'</td>
										</tr>';
				}
				if ($value['day_time_class_7']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_7'].'</td>
											<td class="table-data" >'.$value['day_time_class_7'].'</td>
										</tr>';
				}
				if ($value['day_time_class_8']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_8'].'</td>
											<td class="table-data" >'.$value['day_time_class_8'].'</td>
										</tr>';
				}
				if ($value['day_time_class_9']!=NULL) {
						$table_result .='<tr>
											<td class="table-data" >'.$value['selected_class_9'].'</td>
											<td class="table-data" >'.$value['day_time_class_9'].'</td>
										</tr>';
				}

					
				if ($value['type'] == "lab") {
						$table_result .='<tr>
											<td class="table-data" >'.$value['total_pending_class'].'</td>
											<td class="table-data" >Αδήλωτοι</td>
										</tr> ';
					}	
						

						$table_result .='<tr>
											<td class="table-data" ><b>'.$value['total_registered'].'</b></td>
											<td class="table-data" ><b>Σύνολο</b></td>
										</tr> 
									</tbody>
								</table>

								</td>
								
							</tr>
						</tbody>
				       </table>

						';
			}
			
			$table_result .= '
								</tbody>
				            </table>
				        </div></br></br>';
	

		 	return $table_result;
	}
	
	
/* End of file curriculum_professor_classroom_select_tag_helper.php */
/* Location: ./application/helpers/administrator/curriculum_professor_classroom_select_tag_helper.php */
	
