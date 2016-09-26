<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_custom_professors($custom_professors_db_result) {

		$table='<form action="'.site_url('administrator/admin/update_custom_professors') .'" role="form" method="post" accept-charset="utf-8" id="custom-professors">
				<table id="custom_professors" class="table table-bordered  ">
					<thead>
						<tr>
							<th></th>
							<th class="table-header">Κωδικός Καθηγητή</th>
							<th class="table-header">Όνομα</th>
							<th class="table-header">Επίθετο</th>
							<th class="table-header">Προσθήκη</th>
							<th class="table-header" style="width:150px;">Εισαγωγή / Ενημέρωση</th>
							<th class="table-header">Διαγραφή</th>


						</tr>
					</thead>
					<tbody>';
					if (empty($custom_professors_db_result)) {
						$table.='<tr >
							<td id="edit" style="vertical-align:middle; text-align:center;"><a href="#" id="edit">Edit</a></td>
							<td id="professor-id" >
								<input type="hidden" class="form-control" name="professor-id" id="professor-id_hidden" style="text-align:center;" value="1_new" disabled="disabled">
							    <input type="text" class="form-control" name="professor-id" id="professor-id" style="text-align:center;" value="1" disabled="disabled">
							</td>
							<td id="professor-first-name" class="table-data-timeframes">
							   <input type="text" class="form-control" name="name" id="professor-name" style="text-align:center;" value=""  disabled="disabled">
							</td>
							<td id="professor-last-name" class="table-data-timeframes">
							    <input type="text" class="form-control" name="surname" id="professor-surname" style="text-align:center;" value=""  disabled="disabled">
							</td>
							<td id="button-a" style="text-align: center;">
							  <button id="add_professor" type="button" class="btn btn-default">
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
					foreach ($custom_professors_db_result as $professor) {
						$table.='<tr >
							<td id="edit" style="vertical-align:middle; text-align:center;"><a href="#" id="edit">Edit</a></td>
							<td id="professor-id" >
								<input type="hidden" class="form-control" name="professor-id" id="professor-id_hidden" style="text-align:center;" value="'.$professor['professor_id'].'" disabled="disabled">
							    <input type="text" class="form-control" name="professor-id" id="professor-id" style="text-align:center;" value="'.$professor['professor_id'].'" disabled="disabled">
							</td>
							<td id="professor-first-name" class="table-data-timeframes">
							   <input type="text" class="form-control" name="name" id="professor-name" style="text-align:center;" value="'.$professor['name'].'"  disabled="disabled">
							</td>
							<td id="professor-last-name" class="table-data-timeframes">
							    <input type="text" class="form-control" name="surname" id="professor-surname" style="text-align:center;" value="'.$professor['surname'].'"  disabled="disabled">
							</td>
							<td id="button-a" style="text-align: center;">
							  <button id="add_professor" type="button" class="btn btn-default">
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

/* End of file helper_create_custom_professors_helper.php */
/* Location: ./application/helpers/administrator/helper_create_custom_professors_helper.php */