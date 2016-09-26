<!DOCTYPE html>

<html >
	<head>
		<link rel="shortcut icon" href="<?php echo base_url('assets/icons/Logo_teiath.ico'); ?>">
		<title>TEI Αθήνας</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" >
		<link href="<?php echo base_url('assets/bootstrap/css/student/student-view.css'); ?>" rel="stylesheet">

	</head>
	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="schedule-container-1">
				<a href="#" class = "navbar-brand"></a>
				<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse" >
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>



				<div class = "collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav ">
						<li class = "<?php echo $visited_schedule ?>"><a href="<?php echo site_url('student/schedule'); ?>">Πρόγραμμα</a></li>
					
					<li class = "<?php echo $visited_student_info ?>"><a href="<?php echo site_url('student/schedule/student_info'); ?>" data-toggle="modal">Στοιχεία φοιτητή</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
							<li class="hidden-xs hidden-sm" ><a class = "">Καλωσήρθες <?php $student=$this->session->userdata('student');echo $student['display_name'];?> </a></li>
							<li><?php echo anchor('student/schedule/logout', 'Αποσύνδεση') . ' '; ?></li>
					</ul>
				</div>

			</div>
		</div>
		<noscript>
		<div align="center" style="color:#ff0000;border:1px solid #ff0000;padding:4px;font-size:14px;">
		JavaScript is turned off in your web browser. Turn it on to take full advantage of this site, then refresh the page.
		</div>
		</noscript>
