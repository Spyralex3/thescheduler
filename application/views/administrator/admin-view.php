<div id="query_messages"><?php echo $query_messages;?></div>

<span id="validation_msg"></span>


<div class="custom-container" style="margin-top:70px;">
	<h1 style="text-align: center; text-decoration: underline;"></h1>

	<div class="row">
	   <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 ">


        <?php
                $administrator_session = $this->session->userdata('admin');
                if($administrator_session["user_type"] == "prof"){
                        echo '
                <div class = " ">
                       <div style="float:right; z-index: 0;">
                                <div class="btn-group" style="vertical-align:middle ">
                                        <button  style="z-index: 1;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Αλλαγή Πάνελ<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                        <li style="z-index: 0;"><a href="'. site_url('administrator/admin/change_panel/prof'). '">Πάνελ Καθηγητή</a></li>
                                        </ul>
                                </div>
                        </div>
                        <p style="visibility:hidden; margin-bottom:20px;" >div_helper</p>
                </div>';
                }else if($administrator_session["user_type"] == "student"){
                        echo '
        <div class = " ">
                
           <div style="float:right; z-index: 0;">
                        <div class="btn-group" style="vertical-align:middle ">
                                <button  style="z-index: 1;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Αλλαγή Πάνελ<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                <li style="z-index: 0;"><a href="'. site_url('administrator/admin/change_panel/student'). '">Πάνελ Φοιτητή</a></li>
                                </ul>
                        </div>
                </div>
                <p style="visibility:hidden; margin-bottom:20px;" >div_helper</p>
        </div>';
                }?>
	   	<span id="lab_subscription_date_msg"></span>
		<span id="info_msg"></span>

	  		<ul class="nav nav-tabs">
	  		  <li id="Tab_custom_courses" class="active"><a   href="#custom_courses">Μαθήματα</a></li>
			  <li id="Tab_custom_professors" ><a   href="#custom_professors">Καθηγητές</a></li>
			  <li id="Tab_custom_classrooms"><a   href="#custom_classrooms">Αίθουσες</a></li>
			  <li id="Tab_var_actions"><a   href="#var_actions">Διάφορες ενέργειες</a></li>
			  <li id="Tab_classroom_schedule"><a   href="#classroom_schedule">Αιθουσόγραμμα</a></li>
			  <li id="Tab_curriculum"><a   href="#curriculum">Ωρολόγιο Πρόγραμμα</a></li>
			  <li id="Tab_prof_curriculum"><a   href="#prof_curriculum">Πρόγραμμα Καθηγητών</a></li>
			  <li id="Tab_students_choices"><a   href="#students_choices">Δηλώσεις Φοιτητών</a></li>
			</ul>

			<div class="tab-content scroller">

				<div class="tab-pane fade in active " id="custom_courses">
					<div class="panel panel-default ">
			 			<div class="panel-body ">
							<div class="scroller">
					 			  	<?php echo $custom_courses; ?>
							</div>
						</div>
			 		</div>
				</div>

				<div class="tab-pane fade" id="custom_professors">
				 	<div class="panel panel-default">
				 		<div class="panel-body">
				 			<div style="width: auto;" class="scroller">
					 				<?php echo $custom_professors; ?>
							</div>
						</div>
			 		</div>
				</div>

				<div class="tab-pane fade " id="custom_classrooms">
					<div class="panel panel-default">
						<div class="panel-body">
							<div style="width: auto;" class="scroller">
								<?php echo $custom_classrooms; ?>
							</div>
						</div>
					</div>
				</div>

                <div class="tab-pane fade " id="var_actions">
					<div class="panel panel-default">
						<div class="panel-body">
							<div style="width: auto;" class="scroller">

								<div class="panel panel-default">
								  <div class="panel-body">
									  	<h3 class="panel-title" style="margin-bottom:10px;">Για να διαγράψετε τις δηλώσεις όλων των φοιτητών του εξαμήνου πατήστε το παρακάτω κουμπί.</h3>
									    <div class="col-lg-2 col-lg-offset-5">
									    	<form action="<?php echo site_url('administrator/admin/delete_course_selections'); ?>" role="form" method="post" id="delete_courses" accept-charset="utf-8">
								  				<button name="submit" type="submit" class="btn btn-danger btn-block" value="delete">Διαγραφή</button>
								  			</form>
								  			<br/>
								  		</div>
								  </div>
								</div>

								<?php echo $date_and_time_module; ?>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade " id="classroom_schedule">
					<div class="panel panel-default">
						<div class="panel-body">
							<div style="width: auto;" class="scroller">
								<?php echo $classroom_schedule; ?>
								</br>
									<div id="ajax_classroom_table">
									</div>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade  " id="curriculum">
					<div class="panel panel-default ">
			 			<div class="panel-body ">
							<div class="scroller">
					 			  	<?php echo $curriculum_schedule; ?>
									</br>
									<div id="ajax_curriculum_table">
									</div>
							</div>
						</div>
			 		</div>
				</div>
				
				<div class="tab-pane fade" id="prof_curriculum">
				 	<div class="panel panel-default">
				 		<div class="panel-body">
				 			<div style="width: auto;" class="scroller">
					 				<?php echo $professor_curriculum_options; ?>
									</br>
									<div id="ajax_prof_table">
									</div>
							</div>
						</div>
			 		</div>
				</div>

				<div class="tab-pane fade" id="students_choices">
				 	<div class="panel panel-default">
				 		<div class="panel-body">
				 			<div style="width: auto;" class="scroller">
					 				<?php echo $students_choices_info; ?>
									</br>
									<div id="ajax_courses_info">
									</div>
							</div>
						</div>
			 		</div>
				</div>
				
			</div>
			
	    </div>
	</div>
</div>

