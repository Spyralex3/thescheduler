<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_custom_classrooms($custom_classrooms_db_result){

	$table='<form action="'.site_url('administrator/admin/update_custom_classrooms') .'" role="form" method="post" accept-charset="utf-8" id="custom-classrooms" >
			<table id="custom_classrooms" class="table table-bordered ">
				<thead>
					<tr>
						<th></th>
						<th class="table-header">Κωδικός Αίθουσας</th>

						<th class="table-header">Αίθουσα</th>

						<th class="table-header">Προσθήκη</th>
						<th class="table-header" style="width:150px;">Εισαγωγή / Ενημέρωση</th>
						<th class="table-header">Διαγραφή</th>
					</tr>
				</thead>

				<tbody>';
				if (empty($custom_classrooms_db_result)) {
					$table.='

					<tr element="added">
						<td id="edit" style="vertical-align:middle; text-align:center;"><a href="#" id="edit" > Edit</a></td>

						<td id="classroom-id" class="table-data-timeframes">
						 	<input name="classroom-id" style="text-align:center;" type="hidden" class="form-control " id="classroom-id_hidden" value="1_new" disabled="disabled">
						   <input name="classroom-id" style="text-align:center;" type="text" class="form-control " id="classroom-id" value="1" disabled="disabled">
						</td>

						<td id="classroom" >
						    <input name="classroom" style="text-align:center;" type="text" class="form-control " id="classroom" value="" disabled="disabled">
						</td>

						<td id="button-a" style="text-align: center;">
						  <button id="add_classroom" type="button" class="btn btn-default">
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
				foreach ($custom_classrooms_db_result as $classroom) {
				$table.='

					<tr >
						<td id="edit" style="vertical-align:middle; text-align:center;"><a href="#" id="edit" > Edit</a></td>

						<td id="classroom-id" class="table-data-timeframes">
						<input name="classroom-id" style="text-align:center;" type="hidden" class="form-control " id="classroom-id_hidden" value="'.$classroom['classroom_id'].'" disabled="disabled">
						   <input name="classroom-id" style="text-align:center;" type="text" class="form-control " id="classroom-id" value="'.$classroom['classroom_id'].'" disabled="disabled">
						</td>

						<td id="classroom" >
						    <input name="classroom" style="text-align:center;" type="text" class="form-control " id="classroom" value="'.$classroom['classroom'].'" disabled="disabled">
						</td>

						<td id="button-a" style="text-align: center;">
						  <button id="add_classroom" type="button" class="btn btn-default">
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
		$table.='</tbody>
			</table>
		</form>';
	return $table;
}



/* End of file create_custom_classrooms_helper.php */
/* Location: ./application/models/administrator/create_custom_classrooms_helper.php */