<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_cust_courses($xmlstr,$classrooms,$professors) {

	$str='<form action="'.site_url('administrator/admin/update_custom_courses').'" role="form" method="post" accept-charset="utf-8" id="custom-courses">
			<table id="custom_courses" class="table table-bordered  ">
			<thead> 
				<tr >
					<th id="edit"></th>
					<th class="table-header" style="min-width: 70px; width:70px; display:none; ">Κωδικός</th>
					<th class="table-header" style="min-width: 100px; width:100px; ">Κωδικός Μαθήματος</th>
					<th class="table-header" style="min-width: 100px; max-width: 100px;">Μάθημα</th>
					<th class="table-header" style="min-width: 140px; max-width: 140px;">Τύπος</th>
					<th class="table-header" style="min-width: 80px; max-width: 80px;">Εξάμηνο</th> 
					<th class="table-header">Καθηγητής</th>
					<th class="table-header" style="min-width:295px; max-width:295px;">Βοηθός Καθηγητή</th>
					<th class="table-header" style="min-width: 120px; max-width: 120px;">Αίθουσα</th>
					<th class="table-header" id="day">Ημέρα</th>
					<th class="table-header" id="start-time">Ώρα Έναρξης</th>
					<th class="table-header" id="end-time">Ώρα Λήξης</th>
					<th class="table-header" >Προσθήκη</th>
					<th class="table-header" >Εισαγωγή / Ενημέρωση</th>
					<th class="table-header">Διαγραφή</th>
				</tr>
			</thead>
			<tbody>';
			$courses = ( isset($xmlstr) ? new SimpleXMLElement($xmlstr) : ""); 
			//$courses = new SimpleXMLElement($xmlstr);
			if (empty($courses)) {
            $str.= '<tr element="added">

                    <td id="edit" style="padding-top:15px;"><a href="#" id="edit">Edit</a></td>
					<td id="course-id" style="display:none;">
						<input name="course-id" type="hidden" class="form-control" id="course-id_hidden" style="text-align:center;" value="1_new" disabled="disabled">
						<input name="course-id" type="text" class="form-control" style="text-align:center;" id="course-id" value="1" disabled="disabled">
					</td>
                    <td  id="official-course-id" >
                        <input name="official-course-id" type="text" class="form-control" id="official-course-id" value="" disabled="disabled">
                    </td>
                    <td  id="course">
                        <input name="course" type="text" class="form-control" id="course" value="" disabled="disabled">
                    <td id="type">
						<select name="type" class="form-control " id="type_hidden" style="display:none;" disabled="disabled">
								 <option value="lecture" >Θεωρία</option>
								 <option value="lab" >Εργαστήριο</option>
						</select>
						<select name="type" class="form-control " id="type" disabled="disabled">
							 <option value="lecture" >Θεωρία</option>
							 <option value="lab" >Εργαστήριο</option>
						</select>
					</td >

					<td id="semester">
					    <select name="semester" class="form-control " id="semester" disabled="disabled">
					      <option value="1" >1</option>
						  <option value="2" >2</option>
						  <option value="3" >3</option>
						  <option value="4" >4</option>
						  <option value="5" >5</option>
						  <option value="6" >6</option>
						  <option value="7" >7</option>

						</select>
					 </td>';
					 $str.='<td id="professor"  >
					    <select name="professor" class="form-control " id="professor" disabled="disabled">';
						  foreach ($professors as  $professor) {
						  		$str.='<option value="'.$professor['professor_id'].'">'.$professor['name'].' '.$professor['surname'].'</option>';
						  }
					$str.='</select>
					</td>';
					$str.='<td id="professor_assistant"  >
					<table id="custom_professor_assistant" class="table-1" >
						<tbody>
							<tr>
								<td > 
									<select name="professor_assistant[]" class="form-control-2 " id="professor" disabled="disabled" style="width:200px;">
									  <option value=0></option>';
									  foreach ($professors as  $professor) {
											$str.='<option value="'.$professor['professor_id'].'">'.$professor['name'].' '.$professor['surname'].'</option>';
									  }
								$str.='</select>
										<button id="add_professor_assistant" type="button" class="btn btn-default btn-sm" disabled="disabled">
											<span class="glyphicon glyphicon-plus-sign"></span>
										</button>
										<button id="abstract_professor_assistant" type="button" class="btn btn-default btn-sm" disabled="disabled">
											<span class="glyphicon glyphicon-remove"></span>
										</button>		
								</td>
							</tr>
						</tbody>
					</table>	
					</td>';
					$str.='<td id="classroom" >
					    <select name="classroom" class="form-control " id="classroom" disabled="disabled">';
						  foreach ($classrooms as  $classroom) {

						  		$str.='<option value="'.$classroom['classroom_id'].'">'.$classroom['classroom'].'</option>';

						  }
					$str.='</select>
					</td>';
					$str.='<td id="inner" colspan="3">
						<table id="custom_day" class="table-1" >
							<tbody>
								<tr>
									<td id="day" style="min-width: 226px; max-width: 226px; padding-right:10px;">
										<span>
										    <select name="day[]" class="form-control-2 " disabled="disabled">
										   	  <option value="01" >Δευτέρα</option>
											  <option value="02" >Τρίτη</option>
											  <option value="03" >Τετάρτη</option>
											  <option value="04" >Πέμπτη</option>
											  <option value="05" >Παρασκευή</option>
                                            </select>
                                            <button id="add_day" type="button" class="btn btn-default" disabled="disabled">
                                            <span class="glyphicon glyphicon-plus-sign"></span>
                                            </button>
                                            <button id="abstract_day" type="button" class="btn btn-default" disabled="disabled">
                                            <span class="glyphicon glyphicon-remove"></span>
                                            </button>
										</span>
									</td>
									<td id="start-time" style="min-width:95px; max-width:95px; ">
									    <select id="start-time" name="start-time[]" class="form-control " disabled="disabled">
										  <option value="01" >08:00</option>
										  <option value="02" >09:00</option>
										  <option value="03" >10:00</option>
										  <option value="04" >11:00</option>
										  <option value="05" >12:00</option>
										  <option value="06" >13:00</option>
										  <option value="07" >14:00</option>
										  <option value="08" >15:00</option>
										  <option value="09" >16:00</option>
										  <option value="10" >17:00</option>
										  <option value="11" >18:00</option>
										  <option value="12" >19:00</option>
										  <option value="13" >20:00</option>
										  <option value="14" >21:00</option>

										</select>
									</td>
									<td id="end-time" style="padding-left:15px; min-width:110px; max-width:110px; ">
									    <select id="end-time" name="end-time[]" class="form-control " disabled="disabled">

										  <option value="01" >09:00</option>
										  <option value="02" >10:00</option>
										  <option value="03" >11:00</option>
										  <option value="04" >12:00</option>
										  <option value="05" >13:00</option>
										  <option value="06" >14:00</option>
										  <option value="07" >15:00</option>
										  <option value="08" >16:00</option>
										  <option value="09" >17:00</option>
										  <option value="10" >18:00</option>
										  <option value="11" >19:00</option>
										  <option value="12" >20:00</option>
										  <option value="13" >21:00</option>
										  <option value="14" >22:00</option>
										</select>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
					<td id="button-a" style="text-align: center;">
					  <button id="add_course" type="button" class="btn btn-default">
					  <span class="glyphicon glyphicon-plus-sign"></span>
					  </button>
					</td>
					<td style="text-align: center;">
						<input class="cust-class-add-icon cust-class-add-icon-default" id="add-data" name="add-data" type="submit" value=" "  disabled="disabled"/>
					</td>
					<td style="text-align:center;">
						<input class="cust-class-delete-icon cust-class-delete-icon-default" id="delete-data" name="delete-data" type="submit" value=" "  disabled="disabled"/>
					</td>
				</tr>';

			}else{
				$courses = new SimpleXMLElement($xmlstr);

				foreach ($courses->course as $key => $course) {

					$str.= '<tr>

						<td id="edit" style="padding-top:15px;"><a href="#" id="edit">Edit</a></td>
						<td id="course-id" style="display:none;">
							<input name="course-id" type="hidden" class="form-control" id="course-id_hidden" style="text-align:center;" value="'.$course['cs_id'].'" disabled="disabled">
							<input name="course-id" type="text" class="form-control" id="course-id" style="text-align:center;" value="'.$course['cs_id'].'" disabled="disabled">
						</td>
						<td id="official-course-id" >
						    <input name="official-course-id" type="text" class="form-control" id="official-course-id" value="'.$course->official_course_id.'" disabled="disabled">
						</td>
						<td id="course">
						    <input name="course" type="text" class="form-control" id="course" value="'.$course->course_title.'" disabled="disabled">
						</td>
						<td id="type">';
							$selected_lab='';
							$selected_lecture='';
							if ($course->course_type=='lab') {
								$selected_lab='selected';
							}else if($course->course_type=='lecture'){
								$selected_lecture='selected';
							}
					$str.='	<select name="type" class="form-control " id="type_hidden" style="display:none;" disabled="disabled">
								 <option value="lab" '.$selected_lab.'>Εργαστήριο</option>
								 <option value="lecture" '.$selected_lecture.'>Θεωρία</option>
							</select>
							<select name="type" class="form-control " id="type" disabled="disabled">
								<option value="lab" '.$selected_lab.'>Εργαστήριο</option>
								 <option value="lecture" '.$selected_lecture.'>Θεωρία</option>
							</select>
						</td >';

					$str.='<td id="semester">

					    <select name="semester" class="form-control " id="semester" disabled="disabled">';
					      $select_31='';
					      $select_32='';
					      $select_33='';
					      $select_34='';
					      $select_35='';
					      $select_36='';
					      $select_37='';

					      switch ($course->semester) {
					      	case '1':
					      		$select_31='selected';
					      		break;
					      	case '2':
					      		$select_32='selected';
					      		break;
					      	case '3':
					      		$select_33='selected';
					      		break;
					      	case '4':
					      		$select_34='selected';
					      		break;
					      	case '5':
					      		$select_35='selected';
					      		break;
					      	case '6':
					      		$select_36='selected';
					      		break;

					      	default:
					      		$select_37='selected';
					      		break;
					      }
						  $str.='<option value="1" '.$select_31.'>1</option>
						  <option value="2" '.$select_32.'>2</option>
						  <option value="3" '.$select_33.'>3</option>
						  <option value="4" '.$select_34.'>4</option>
						  <option value="5" '.$select_35.'>5</option>
						  <option value="6" '.$select_36.'>6</option>
						  <option value="7" '.$select_37.'>7</option>

						</select>
					 </td>';

			$str.='<td id="professor"  >	
						<select name="professor" class="form-control-2 " id="professor" disabled="disabled" style="width:200px;">
						  ';
						  foreach ($professors as  $professor) {
							if ($course->professor_name==$professor['name'].' '.$professor['surname']) {
								$str.='<option value="'.$professor['professor_id'].'" selected>'.$course->professor_name.'</option>';
							}else{
								$str.='<option value="'.$professor['professor_id'].'">'.$professor['name'].' '.$professor['surname'].'</option>';
							}
						  }
					$str.='</select>
					</td>';
					
					$str.='<td id="professor_assistant"  >
					<table id="custom_professor_assistant" class="table-1" >
						<tbody>';
						
						if(!empty($course->helper_professor_names)) {
							 $helper_professor_names_array=explode(", ",$course->helper_professor_names);  
								foreach($helper_professor_names_array as $professor_assistant){
										
									$str.='<tr>';
									$str.='<td > 
											<select name="professor_assistant[]" class="form-control-2 " id="professor" disabled="disabled" style="width:200px;">
											  <option value=0></option>';
												foreach ($professors as  $professor) {
													
													if ($professor_assistant==$professor['name'].' '.$professor['surname']) {
														
														$str.='<option value="'.$professor['professor_id'].'" selected>'.$professor_assistant.'</option>';
													}else{
														$str.='<option value="'.$professor['professor_id'].'">'.$professor['name'].' '.$professor['surname'].'</option>';
													}
												}
										$str.='</select>
												<button id="add_professor_assistant" type="button" class="btn btn-default btn-sm" disabled="disabled">
													<span class="glyphicon glyphicon-plus-sign"></span>
												</button>
												<button id="abstract_professor_assistant" type="button" class="btn btn-default btn-sm" disabled="disabled">
													<span class="glyphicon glyphicon-remove"></span>
												</button>		
										</td>';
									$str.='</tr>';
								}
							}else {
								$str.='<tr>';
									$str.='<td > 
											<select name="professor_assistant[]" class="form-control-2 " id="professor" disabled="disabled" style="width:200px;">
											  <option value=0 selected></option>';
												foreach ($professors as  $professor) {
													
														$str.='<option value="'.$professor['professor_id'].'">'.$professor['name'].' '.$professor['surname'].'</option>';
													
												}
										$str.='</select>
												<button id="add_professor_assistant" type="button" class="btn btn-default btn-sm" disabled="disabled">
													<span class="glyphicon glyphicon-plus-sign"></span>
												</button>
												<button id="abstract_professor_assistant" type="button" class="btn btn-default btn-sm" disabled="disabled">
													<span class="glyphicon glyphicon-remove"></span>
												</button>		
										</td>';
									$str.='</tr>';
							}
							
						$str.='</tbody>
					</table>	
					</td>';

					$str.='<td id="classroom" >
					    <select name="classroom" class="form-control " id="classroom" disabled="disabled">
						  ';
						  foreach ($classrooms as  $key => $classroom) {
						  		if ($course->classroom==$classroom['classroom']) {
						  			$str.=' <option value="'.$classroom['classroom_id'].'" selected>'.$course->classroom.'</option>';
						  		}else{
						  			$str.='<option value="'.$classroom['classroom_id'].'">'.$classroom['classroom'].'</option>';
						  		}
						  }
					$str.='</select>
					</td>';

					$str.='<td id="inner" colspan="3">
						<table id="custom_day" class="table-1" >
							<tbody>';
							foreach ($course->time_intervals->time as $time) {

							$str.='<tr>
									<td id="day" style="min-width: 285px; max-width: 285px; margin-left:-10px;">
										<span style="margin-left:-10px;">
										    <select name="day[]" class="form-control-2 " disabled="disabled" style="margin-left:-10px;">';
										       	  $select_41='';
											      $select_42='';
											      $select_43='';
											      $select_44='';
											      $select_45='';
											      $select_46='';
											      switch ($time->day) {
											      	case 'Δευτέρα':
											      		$select_41='selected';
											      		break;
											      	case 'Τρίτη':
											      		$select_42='selected';
											      		break;
											      	case 'Τετάρτη':
											      		$select_43='selected';
											      		break;
											      	case 'Πέμπτη':
											      		$select_44='selected';
											      		break;
											      	case 'Παρασκευή':
											      		$select_45='selected';
											      		break;
											      	default:
											      		$select_46='selected';
											      		break;
											      }
									$str.= '<option value="1" '.$select_41.'>Δευτέρα</option>
												<option value="2"'.$select_42.'>Τρίτη</option>
												<option value="3"'.$select_43.'>Τετάρτη</option>
												<option value="4"'.$select_44.'>Πέμπτη</option>
												<option value="5"'.$select_45.'>Παρασκευή</option>
												<option value="6"'.$select_46.'>Χωρίς Παρακολούθηση</option>
											</select>
										  <button id="add_day" type="button" class="btn btn-default btn-sm" disabled="disabled">
											  <span class="glyphicon glyphicon-plus-sign"></span>
										  </button>
										  <button id="abstract_day" type="button" class="btn btn-default btn-sm" disabled="disabled">
											  <span class="glyphicon glyphicon-remove"></span>
										  </button>
										</span>
									</td>';

									  $select_51='';
								      $select_52='';
								      $select_53='';
								      $select_54='';
								      $select_55='';
								      $select_56='';
								      $select_57='';
								      $select_58='';
								      $select_59='';
								      $select_510='';
								      $select_511='';
								      $select_512='';
								      $select_513='';
								      $select_514='';
								      $select_515='';
								      switch ($time->hr_begin) {
								      	case '8:00':
								      		$select_51='selected';
								      		break;
								      	case '9:00':
								      		$select_52='selected';
								      		break;
								      	case '10:00':
								      		$select_53='selected';
								      		break;
								      	case '11:00':
								      		$select_54='selected';
								      		break;
								      	case '12:00':
								      		$select_55='selected';
								      		break;
								      	case '13:00':
								      		$select_56='selected';
								      		break;
								      	case '14:00':
								      		$select_57='selected';
								      		break;
								      	case '15:00':
								      		$select_58='selected';
								      		break;
								      	case '16:00':
								      		$select_59='selected';
								      		break;
								      	case '17:00':
								      		$select_510='selected';
								      		break;
								      	case '18:00':
								      		$select_511='selected';
								      		break;
                                        				case '19:00':
								      		$select_512='selected';
								      		break;
                                        				case '20:00':
								      		$select_513='selected';
								      		break;
                                        				case '21:00':
								      		$select_514='selected';
								      		break;
								      	default:
								      		$select_515='selected';
								      		break;
										}
									if ($select_515!='selected'){
									$str.='<td id="start-time" style="min-width:95px; max-width:95px; padding-right10px;">
									    <select id="start-time" name="start-time[]" class="form-control " disabled="disabled">
										  <option value="01" '.$select_51.'>08:00</option>
										  <option value="02" '.$select_52.'>09:00</option>
										  <option value="03" '.$select_53.'>10:00</option>
										  <option value="04" '.$select_54.'>11:00</option>
										  <option value="05" '.$select_55.'>12:00</option>
										  <option value="06" '.$select_56.'>13:00</option>
										  <option value="07" '.$select_57.'>14:00</option>
										  <option value="08" '.$select_58.'>15:00</option>
										  <option value="09" '.$select_59.'>16:00</option>
										  <option value="10" '.$select_510.'>17:00</option>
										  <option value="11" '.$select_511.'>18:00</option>
										  <option value="12" '.$select_512.'>19:00</option>
										  <option value="13" '.$select_513.'>20:00</option>
										  <option value="14" '.$select_514.'>21:00</option>
										  <option value="15" '.$select_515.'></option>

										</select>
									</td>';
									}

								      $select_62='';
								      $select_63='';
								      $select_64='';
								      $select_65='';
								      $select_66='';
								      $select_67='';
								      $select_68='';
								      $select_69='';
								      $select_610='';
								      $select_611='';
								      $select_612='';
								      $select_613='';
				                                      $select_614='';
				                                      $select_615='';
				                                      $select_616='';
								      switch ($time->hr_end) {

								      	case '9:00':
								      		$select_62='selected';
								      		break;
								      	case '10:00':
								      		$select_63='selected';
								      		break;
								      	case '11:00':
								      		$select_64='selected';
								      		break;
								      	case '12:00':
								      		$select_65='selected';
								      		break;
								      	case '13:00':
								      		$select_66='selected';
								      		break;
								      	case '14:00':
								      		$select_67='selected';
								      		break;
								      	case '15:00':
								      		$select_68='selected';
								      		break;
								      	case '16:00':
								      		$select_69='selected';
								      		break;
								      	case '17:00':
								      		$select_610='selected';
								      		break;
								      	case '18:00':
								      		$select_611='selected';
								      		break;
								      	case '19:00':
								      		$select_612='selected';
								      		break;
								      	case '20:00':
								      		$select_613='selected';
								      		break;
								      	case '21:00':
								      		$select_614='selected';
								      		break;
								      	case '22:00':
								      		$select_615='selected';
								      		break;
								      	default:
								      		$select_616='selected';
								      		break;
										}
									if ($select_616!='selected'){

									$str.='<td id="end-time" style="padding-left:15px; min-width:110px; max-width:110px;">
									    <select id="end-time" name="end-time[]" class="form-control " disabled="disabled">

										  <option value="01" '.$select_62.'>09:00</option>
										  <option value="02" '.$select_63.'>10:00</option>
										  <option value="03" '.$select_64.'>11:00</option>
										  <option value="04" '.$select_65.'>12:00</option>
										  <option value="05" '.$select_66.'>13:00</option>
										  <option value="06" '.$select_67.'>14:00</option>
										  <option value="07" '.$select_68.'>15:00</option>
										  <option value="08" '.$select_69.'>16:00</option>
										  <option value="09" '.$select_610.'>17:00</option>
										  <option value="10" '.$select_611.'>18:00</option>
										  <option value="11" '.$select_612.'>19:00</option>
										  <option value="12" '.$select_613.'>20:00</option>
										  <option value="13" '.$select_614.'>21:00</option>
										  <option value="14" '.$select_615.'>22:00</option>
										  <option value="15" '.$select_616.'></option>
										</select>
									</td>';}
								$str.='</tr>';
								
							}
							$str.='</tbody>
						</table>
					</td>';


					$str.='<td id="button-a" style="text-align: center;">
					  <button id="add_course" type="button" class="btn btn-default">
					  <span class="glyphicon glyphicon-plus-sign"></span>
					  </button>
					</td>
					<td style="text-align: center;">
						<input class="cust-class-add-icon cust-class-add-icon-default" id="add-data" name="add-data" type="submit" value=" "  disabled="disabled"/>
					</td>
					<td style="text-align:center;">
						<input class="cust-class-delete-icon cust-class-delete-icon-default" id="delete-data" name="delete-data" type="submit" value=" "  disabled="disabled"/>
					</td>
				</tr>';
			}

		}
			$str.='</tbody>
		</table>
		</form>';

	return $str;
}

/* End of file create_custom_courses_helper.php */
/* Location: ./application/helpers/administrator/create_custom_courses_helper.php */
