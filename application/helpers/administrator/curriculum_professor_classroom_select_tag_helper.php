<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	function create_classrooms_choices($classrooms) {
		 $str='<form class="form-inline" role="form">
			 <div class="form-group">
			<select name="classroom" class="form-control " id="classroom_choice" >';
						  foreach ($classrooms as  $classroom) {
						  		$str.='<option value="'.$classroom['classroom_id'].'">'.$classroom['classroom'].'</option>';
						  }
					$str.='</select></div>
					 <div class="form-group">
							<div style="width:100px; display:block; margin:auto;" id="submit_div">
		                        <button type="submit" class="btn btn-primary" id="submit_classroom_schedule" >Εμφάνιση</button>
		                      </div>
						</div>	  
							  </form>';
	    return $str;
	}
	function create_curriculum_choices($semesters) {
		 $str='<form class="form-inline" role="form">
			 <div class="form-group">
			<select name="curriculum" class="form-control " id="curriculum_choice" >';
						  foreach ($semesters as  $semester) {
						  		$str.='<option value="'.$semester.'">'.$semester.'</option>';
						  }
					$str.='</select></div>
					 <div class="form-group">
							<div style="width:100px; display:block; margin:auto;" id="submit_div">
		                        <button type="submit" class="btn btn-primary" id="submit_curriculum_schedule" >Εμφάνιση</button>
		                      </div>
						</div>	  
							  </form>';
	    return $str;
	}
	function create_prof_choices($professors) {
		 $str='<form class="form-inline" role="form">
			 <div class="form-group">
			<select name="professor" class="form-control " id="professor_choice" >';
						  foreach ($professors as  $professor) {
						  		$str.='<option value="'.$professor['professor_id'].'">'.$professor['name'].' '.$professor['surname'].'</option>';
						  }
					$str.='</select></div>
					 <div class="form-group">
							<div style="width:100px; display:block; margin:auto;" id="submit_div">
		                        <button type="submit" class="btn btn-primary" id="submit_prof_schedule" >Εμφάνιση</button>
		                      </div>
						</div>	  
							  </form>';
	    return $str;
	}
	
/* End of file curriculum_professor_classroom_select_tag_helper.php */
/* Location: ./application/helpers/administrator/curriculum_professor_classroom_select_tag_helper.php */
	