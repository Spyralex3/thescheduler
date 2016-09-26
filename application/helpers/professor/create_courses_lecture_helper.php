<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_lectures($lectures){
$table='<table id="lectures" class="table table-bordered ">
			<thead>
				<tr>
					<th class="table-header">Κωδικός Μαθήματος</th>
					<th class="table-header">Αίθουσα</th>
					<th class="table-header">Καθηγητής</th>
					<th class="table-header">Τύπος Μαθήματος</th>
					<th class="table-header">Μάθημα</th>
					<th class="table-header">Εξάμηνο</th>
				</tr>
			</thead>
			<tbody>';
			foreach ($lectures as $lecture) {
				$table.='<tr>';

				$table.=
						'<td >
							 <input name="classroom-id" style="text-align:center;" type="text" class="form-control " id="classroom-id" value="'.$lecture['official_course_id'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="classroom-id" style="text-align:center;" type="text" class="form-control " id="classroom-id" value="'.$lecture['classroom'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="classroom-id" style="text-align:center;" type="text" class="form-control " id="classroom-id" value="'.$lecture['professor_name'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="classroom-id" style="text-align:center;" type="text" class="form-control " id="classroom-id" value="'.$lecture['type'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="classroom-id" style="text-align:center;" type="text" class="form-control " id="classroom-id" value="'.$lecture['name'].'" disabled="disabled">
						</td>'.'<td >
							 <input name="classroom-id" style="text-align:center;" type="text" class="form-control " id="classroom-id" value="'.$lecture['semester'].'" disabled="disabled">
						</td>';

				$table.='</tr>';
			}
	$table.='</tbody>
		</table>';
	return $table;
}

/* End of file create_courses_lecture_helper.php */
/* Location: ./application/helpers/professor/create_courses_lecture_helper.php */