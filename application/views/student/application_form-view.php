<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

  <title>Application form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" >
		<link href="<?php echo base_url('assets/bootstrap/css/student/student-view.css'); ?>" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="row ">
	 <div class = "col-lg-12 col-lg-offset-0 " style="text-align: center; text-decoration: underline;">

		<div class="panel panel-default">
			<div class="panel-heading"><h1 style="text-align: center; text-decoration: underline;">Δήλωση Μαθημάτων</h1></div>
				<div class="panel-body">
				<form action="<?php echo base_url('index.php/student/application_form/create_schedule'); ?>"
		 				role="form" method="post" accept-charset="utf-8">
					<table class="table" border="1">
						<thead>
							<tr>
								<th style="text-align:center;">Κωδικός</th>
								<th style="text-align:center;">Τίτλος</th>
								<th style="text-align:center;">Τύπος</th>
								<th style="text-align:center;">Εξάμηνο</th>
								<th style="text-align:center;"><input type="checkbox" name="checkAll" value="" id="checkAll" style="width:25px; height:25px;" ></th>
							</tr>
						</thead>
						<tbody>
			<?php
			//print_r($courses);
			foreach ($courses as $key => $course) {
					echo '<tr>'	;
						echo '<td>' . $course['official_course_id'] .'</td>' .
							 '<td style="text-align:left;">' . $course['name']				.'</td>' .
							 '<td>';
							 if($course['type']=="lab"){
							 	echo "Εργαστήριο";
							 }else if($course['type']=="lecture"){
							 	echo "Θεωρία";
							 }

						echo '</td>' .
							 '<td>' . $course['semester'] 			. '</td>';
						
						echo '<td>
							<input type="checkbox" name="'.$course['official_course_id'] .'" value="'.$course['official_course_id'] .'_'. $course['course_id'].'" style="width:25px; height:25px;">
							</td>';
					echo '</tr>';
			}
			?>
						</tbody>
					</table>
				</br>
				<div class="col-lg-4 col-lg-offset-4">
					<button name="submit" type="submit" class="btn btn-primary btn-block">Καταχώρηση</button>
          		</div>


          		</br>
			</form>
			</div>
			</div>
		 </br>
		<p ><?php echo anchor('student/schedule', 'Επιστροφή στην Αρχική') ; ?></p>

		</div>

</div>
</div>
</div>
	<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src = "<?php echo base_url('assets/bootstrap/js/bootstrap.js');?>"></script>
	<script src = "<?php echo base_url('assets/bootstrap/js/student/application-form.js');?>"></script>
</body>
</html>
