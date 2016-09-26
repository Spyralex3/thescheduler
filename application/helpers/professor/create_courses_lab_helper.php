<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_labs($labs){
/*$table='<table id="lectures" class="table table-bordered ">
			<thead>
				<tr>
					<th class="table-header">Κωδικός Μαθήματος</th>
					<th class="table-header">Αίθουσα</th>
					<th class="table-header">Καθηγητής</th>
					<th class="table-header">Τύπος Μαθήματος</th>
					<th class="table-header">Μάθημα</th>
					<th class="table-header">Εξάμηνο</th>
					<th class="table-header">Εξαγωγή σε Excel</th>
				</tr>
			</thead>
			<tbody>';
			foreach ($labs as $lab) {
			
				$table.='<td >
							 <input name="official-course-id" style="text-align:center;" type="text" class="form-control " id="official-course-id" value="'.$lab['official_course_id'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="classroom" style="text-align:center;" type="text" class="form-control " id="classroom" value="'.$lab['classroom'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="professor_name" style="text-align:center;" type="text" class="form-control " id="professor_name" value="'.$lab['professor_name'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="type" style="text-align:center;" type="text" class="form-control " id="type" value="'.$lab['type'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="name" style="text-align:center;" type="text" class="form-control " id="name" value="'.$lab['name'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="semester" style="text-align:center;" type="text" class="form-control " id="semester" value="'.$lab['semester'].'" disabled="disabled">
						</td>'.
						'<td style="text-align:center;">
							<a href="'.site_url('professor/prof/file_xls').'/'.$lab['course_id']. '" /> <span style="vertical-align:sub; font-size: 1.5em;" class="glyphicon glyphicon-download"> </span></a>
						</td>';

				$table.='</tr>';
			
	$table.='</tbody>
		</table></br>';}*/
			$counter = 0;
			$table='<div id="labs">
			
			<table id="labs-header" class="table table-bordered">
                <tbody>
                    <tr >
                        <td class="first-table-header"></td>
						<td class="table-header">Κωδικός Μαθήματος</td>
						<td class="table-header">Αίθουσα</td>
						<td class="table-header">Καθηγητής</td>
						<td class="table-header">Τύπος Μαθήματος</td>
						<td class="table-header">Μάθημα</td>
						<td class="table-header">Εξάμηνο</td>
						<td class="table-header">Εξαγωγή σε Excel</td>
	                </tr>
                </tbody>
            </table>';

            foreach ($labs as $lab) {
            	$classes_xml = (empty($lab['classes_xml'])) ? NULL : new SimpleXMLElement($lab['classes_xml']);
            	
	$table.='<form id="labs_form" method="post" action='. site_url("professor/prof/ajax_update_classes").'enctype="multipart/form-data">
			<table id="labs" class="table table-bordered research">
                
                <tbody>
                    <tr class="accordion">
                    	<td class="first-table-header" id="testtd"><span class="glyphicon glyphicon-arrow-right"></span></td>
						<td class="table-header">
							 <input name="official-course-id" style="text-align:center;" type="text" class="form-control " id="official-course-id" value="'.$lab['official_course_id'].'" disabled="disabled">
						</td>
						<td class="table-header">
							 <input name="classroom" style="text-align:center;" type="text" class="form-control " id="classroom" value="'.$lab['classroom'].'" disabled="disabled">
						</td>
						<td class="table-header">
							 <input name="professor_name" style="text-align:center;" type="text" class="form-control " id="professor_name" value="'.$lab['professor_name'].'" disabled="disabled">
						</td>
						<td class="table-header">
							 <input name="type" style="text-align:center;" type="text" class="form-control " id="type" value="'.$lab['type'].'" disabled="disabled">
						</td>
						<td class="table-header">
							 <input name="name" style="text-align:center;" type="text" class="form-control " id="name" value="'.$lab['name'].'" disabled="disabled">
						</td>
						<td class="table-header">
							 <input name="semester" style="text-align:center;" type="text" class="form-control " id="semester" value="'.$lab['semester'].'" disabled="disabled">
						</td>
						<td style="text-align:center;" class="table-header">
							<a href="'.site_url('professor/prof/file_xls').'/'.$lab['course_id']. '" /> <span style="vertical-align:sub; font-size: 1.5em;" class="glyphicon glyphicon-download"> </span></a>
							<input type="text" name="course_id" id="course_id" style="display:none;" value='.$lab['course_id'].'>
						</td>
					</tr>';

                 		if (!empty($classes_xml)) {
							foreach ($classes_xml->time  as $timeframe) {
							$checked=($timeframe->registrable == 1) ? 'checked' : '';

					$table.='<tr style="text-algn:center; style="border-bottom-color: transparent;" >
				                <td colspan="3" class="table-header" style="border-bottom-color: transparent;"></td>
				                <td colspan="2" class="table-header" style="vertical-align:middle;">'.$timeframe->day.' '.$timeframe->hr_begin.' - '.$timeframe->hr_end.' </td>
				                
		                        <td  class="table-header"  >

		                        	 <div class="onoffswitch" style=" margin-left: auto; margin-right: auto; ">

									    <input type="checkbox" name="classes_choice[]" class="onoffswitch-checkbox" id="'.$counter.'" value="'.$timeframe->registrable.'" '.$checked.'>
									    <label class="onoffswitch-label" for="'.$counter.'">
									    <span class="onoffswitch-inner"></span>
									    <span class="onoffswitch-switch"></span>
									    </label>
									</div> 
		                        </td>
		                        <td colspan="2" class="table-header"  style="border-bottom-color: transparent;"></td>
		                    </tr>';
		                     $counter++;
                    		}
                 		}

           $table.=' 	<tr style="border_color: #F5F5F5;">
           					<td colspan="3"></td>
           					<td colspan="3">
           						<div style="max-width:150px; margin-left: auto; margin-right: auto;">
           							<button name="submit" id="submitbtn" type="submit" class="btn btn-info btn-block" value="update">Αποθήκευση</button>
           						</div>
           					</td>
           					<td colspan="2"></td>
           				</tr>';

            $table.=' </tbody>
            		</table>
           		</form>';

            }
            $table.='</div>';
	return $table;
}

/* End of file create_courses_labs_helper.php */
/* Location: ./application/helpers/professor/create_courses_labs_helper.php */