<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function create_declaration_date($date_and_time_values) {
	//$test1 = $date_and_time_values['date_and_time_from'];
	//$test2 = $date_and_time_values[1]['date_and_time_to'];

	$date_and_time_from_temp_string = $date_and_time_values['date_and_time_from'][0]["value"];
	$date_and_time_to_temp_string = $date_and_time_values['date_and_time_to'][0]["value"];

	
	$date_and_time_from_array = explode(" ", $date_and_time_from_temp_string);  
	$time_from_array = explode(":", $date_and_time_from_array[1]);

	$date_and_time_to_array = explode(" ", $date_and_time_to_temp_string);
	$time_to_array = explode(":", $date_and_time_to_array[1]); 

	$declaration_date_module='<div class="panel panel-default">
								  <div class="panel-body">
									  	<h3 class="panel-title" style="margin-bottom:10px;">Περίοδος εγγραφών εργαστηρίων.</h3>
									    <div class="" style="width: 50%;margin: 0 auto;">
											<form action="'.site_url("administrator/admin/set_declaration_date").'" role="form" method="post" accept-charset="utf-8">
											  				<table class="table table-bordered " id="set_date">
											  					<body>
											  						<tr>
											  							<td></td>
											  							<td>
											  								<h4>ΗΜΕΡΟΜΗΝΙΑ</h4>
											  							</td>
											  							<td>
											  								<h4 style="width:150px;">ΩΡΑ</h4>
											  							</td>
											  						</tr>
											  						<tr>
											  							<td>
											  								<h4>ΑΠΟ</h4>
											  							</td>
											  							<td>
											  								<input name="start_date" type="text" class="form-control input-lg" id="start_date" placeholder="" value="'.$date_and_time_from_array[0].'">
											  							</td>
											  							<td>
											  								<table>
											  								<tr>
											  								<td>
											  								<select name="start_hour" class="form-control " id="start_hour" style="width:auto;" >
											  									'; 
											  								$option00 = $option01 = $option02 = $option03 = $option04 = $option05 = $option06 = $option07 = $option08
											  								= $option09 = $option10 = $option11 = $option12 = $option13 = $option14 = $option15 = $option16
											  								= $option17 = $option18 = $option19 = $option20 = $option21 = $option22 = $option23 = null;
											  								switch ($time_from_array[0]) {
											  									case '01':
											  										$option01 ='selected';
											  										break;
											  									case '02':
											  										$option02 ='selected';
											  										break;
											  									case '03':
											  										$option03 ='selected';
											  										break;
											  									case '04':
											  										$option04 ='selected';
											  										break;
											  									case '05':
											  										$option05 ='selected';
											  										break;
											  									case '06':
											  										$option06 ='selected';
											  										break;
											  									case '07':
											  										$option07 ='selected';
											  										break;
											  									case '08':
											  										$option08 ='selected';
											  										break;
											  									case '09':
											  										$option09 ='selected';
											  										break;
											  									case '10':
											  										$option10 ='selected';
											  										break;
											  									case '11':
											  										$option11 ='selected';
											  										break;
											  									case '12':
											  										$option12 ='selected';
											  										break;
											  									case '13':
											  										$option13 ='selected';
											  										break;
											  									case '14':
											  										$option14 ='selected';
											  										break;
											  									case '15':
											  										$option15='selected';
											  										break;
											  									case '16':
											  										$option16='selected';
											  										break;
											  									case '17':
											  										$option17='selected';
											  										break;
											  									case '18':
											  										$option18='selected';
											  										break;
											  									case '19':
											  										$option19='selected';
											  										break;
											  									case '20':
											  										$option20='selected';
											  										break;
											  									case '21':
											  										$option21='selected';
											  										break;
											  									case '01':
											  										$option01='selected';
											  										break;
											  									case '22':
											  										$option22='selected';
											  										break;
											  									case '23':
											  										$option23='selected';
											  										break;
											  									
											  									default:
											  										$option00='selected';
											  										break;
											  								}
											  								
											  	$declaration_date_module.='		<option '.$option00.'>00</option>
											  									<option '.$option01.'>01</option>
											  									<option '.$option02.'>02</option>
											  									<option '.$option03.'>03</option>
											  									<option '.$option04.'>04</option>
											  									<option '.$option05.'>05</option>
											  									<option '.$option06.'>06</option>
											  									<option '.$option07.'>07</option>
											  									<option '.$option08.'>08</option>
											  									<option '.$option09.'>09</option>
											  									<option '.$option10.'>10</option>
											  									<option '.$option11.'>11</option>
											  									<option '.$option12.'>12</option>
											  									<option '.$option13.'>13</option>
											  									<option '.$option14.'>14</option>
											  									<option '.$option15.'>15</option>
											  									<option '.$option16.'>16</option>
											  									<option '.$option17.'>17</option>
											  									<option '.$option18.'>18</option>
											  									<option '.$option19.'>19</option>
											  									<option '.$option20.'>20</option>
											  									<option '.$option21.'>21</option>
											  									<option '.$option22.'>22</option>
											  									<option '.$option23.'>23</option>
											  								</select>
											  								</td>
											  								<td>
											  								<select name="start_minutes" class="form-control " id="start_minutes" style="width:auto;" >'; 
											  								$option00 = $option15 = $option30 = $option45 = null;
											  								switch ($time_from_array[1]) {
											  									case '15':
											  										$option15='selected';
											  										break;
											  									case '30':
											  										$option30='selected';
											  										break;
											  									case '45':
											  										$option45='selected';
											  										break;
											  									default:
											  										$option00='selected';
											  										break;
											  								}
											  								
											  	$declaration_date_module.='		<option '.$option00.'>00</option>
											  									<option '.$option15.'>15</option>
											  									<option '.$option30.'>30</option>
											  									<option '.$option45.'>45</option>
											  								</select>
											  								</td>
											  								</tr>
											  								</table>
											  							</td>
											  						</tr>
											  						<tr>
											  							<td>
											  								<h4>ΜΕΧΡΙ</h4>
											  							</td>
											  							<td>
											  								<input name="end_date" type="text" class="form-control input-lg" id="end_date" placeholder="" value="'.$date_and_time_to_array[0].'">
											  							</td>
											  							<td>
											  								<table>
											  								<tr>
											  								<td>
											  								<select name="end_hour" class="form-control " id="end_hour" style="width:auto;" >
											  									'; 
											  								$option00 = $option01 = $option02 = $option03 = $option04 = $option05 = $option06 = $option07 = $option08
											  								= $option09 = $option10 = $option11 = $option12 = $option13 = $option14 = $option15 = $option16
											  								= $option17 = $option18 = $option19 = $option20 = $option21 = $option22 = $option23 = null;
											  								switch ($time_to_array[0]) {
											  									case '01':
											  										$option01 ='selected';
											  										break;
											  									case '02':
											  										$option02 ='selected';
											  										break;
											  									case '03':
											  										$option03 ='selected';
											  										break;
											  									case '04':
											  										$option04 ='selected';
											  										break;
											  									case '05':
											  										$option05 ='selected';
											  										break;
											  									case '06':
											  										$option06 ='selected';
											  										break;
											  									case '07':
											  										$option07 ='selected';
											  										break;
											  									case '08':
											  										$option08 ='selected';
											  										break;
											  									case '09':
											  										$option09 ='selected';
											  										break;
											  									case '10':
											  										$option10 ='selected';
											  										break;
											  									case '11':
											  										$option11 ='selected';
											  										break;
											  									case '12':
											  										$option12 ='selected';
											  										break;
											  									case '13':
											  										$option13 ='selected';
											  										break;
											  									case '14':
											  										$option14 ='selected';
											  										break;
											  									case '15':
											  										$option15='selected';
											  										break;
											  									case '16':
											  										$option16='selected';
											  										break;
											  									case '17':
											  										$option17='selected';
											  										break;
											  									case '18':
											  										$option18='selected';
											  										break;
											  									case '19':
											  										$option19='selected';
											  										break;
											  									case '20':
											  										$option20='selected';
											  										break;
											  									case '21':
											  										$option21='selected';
											  										break;
											  									case '01':
											  										$option01='selected';
											  										break;
											  									case '22':
											  										$option22='selected';
											  										break;
											  									case '23':
											  										$option23='selected';
											  										break;
											  									
											  									default:
											  										$option00='selected';
											  										break;
											  								}
											  								
											  	$declaration_date_module.='		<option '.$option00.'>00</option>
											  									<option '.$option01.'>01</option>
											  									<option '.$option02.'>02</option>
											  									<option '.$option03.'>03</option>
											  									<option '.$option04.'>04</option>
											  									<option '.$option05.'>05</option>
											  									<option '.$option06.'>06</option>
											  									<option '.$option07.'>07</option>
											  									<option '.$option08.'>08</option>
											  									<option '.$option09.'>09</option>
											  									<option '.$option10.'>10</option>
											  									<option '.$option11.'>11</option>
											  									<option '.$option12.'>12</option>
											  									<option '.$option13.'>13</option>
											  									<option '.$option14.'>14</option>
											  									<option '.$option15.'>15</option>
											  									<option '.$option16.'>16</option>
											  									<option '.$option17.'>17</option>
											  									<option '.$option18.'>18</option>
											  									<option '.$option19.'>19</option>
											  									<option '.$option20.'>20</option>
											  									<option '.$option21.'>21</option>
											  									<option '.$option22.'>22</option>
											  									<option '.$option23.'>23</option>
											  								</select>
											  								</td>
											  								<td>
											  								<select name="end_minutes" class="form-control " id="end_minutes" style="width:auto;" >
											  									'; 
											  								$option00 = $option15 = $option30 = $option45 = null;
											  								switch ($time_to_array[1]) {
											  									case '15':
											  										$option15='selected';
											  										break;
											  									case '30':
											  										$option30='selected';
											  										break;
											  									case '45':
											  										$option45='selected';
											  										break;
											  									default:
											  										$option00='selected';
											  										break;
											  								}
											  								
											  	$declaration_date_module.='		<option '.$option00.'>00</option>
											  									<option '.$option15.'>15</option>
											  									<option '.$option30.'>30</option>
											  									<option '.$option45.'>45</option>
											  								</select>
											  								</td>
											  								</tr>
											  								</table>
											  							</td>
											  						</tr>
											  						<tr>
											  							<td></td>

											  							<td  colspan="2">
											  								<button name="submit_date_hour" id="submit_date_hour" type="submit" class="btn btn-info " value="submit_date_hour">Καταχώρηση</button>
											  							</td>
											  							
											  						</tr>
										
											  						
											  					</body>

											  				</table>

											  			</form>
											  			<br/>
											  		</div>
											  </div>
											</div>';
		return $declaration_date_module;
}

/* End of file create_set_declaration_date.php */
/* Location: ./application/helpers/administrator/create_set_declaration_date.php */