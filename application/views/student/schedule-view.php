
  <?php echo $msg; ?>

    <div class="schedule-container-1">

         <h1 style="text-align: center; text-decoration: underline;"><?php echo $table_title ?></h1>

         <div class="row">
		   <div class = "col-xs-12 col-sm-12 col-md-12 " >
                        <?php
                                $student_session = $this->session->userdata('student');
                                if($student_session["is_admin"] == 1){
                                echo '
                        <div class = " ">
                   		<div style="float:right; z-index: 0;">
                                        <div class="btn-group" style="vertical-align:middle ">
                                                <button  style="z-index: 1;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Αλλαγή Πάνελ<span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                <li style="z-index: 0;"><a href="'. site_url('student/schedule/change_panel'). '">Πάνελ Διαχειριστή</a></li>
                                                </ul>
                                        </div>
                                </div>
                                <p style="visibility:hidden; margin-bottom:20px;" >div_helper</p>
                        </div>';
                        }
?>
				<span id="info_msg">
				<?php echo $warning_msg; ?>
				<?php echo $info_msg; ?>
				</span>
				<div class="fix_last_row">
					<?php echo $courses_table;?>  
					</br>
<?php 
if ($dt_greg==1){	
	echo '<div id=submitdiv style="width:200px;margin:auto;display:block;padding:10px;"><a href="' .site_url('student/schedule/reset_labs'). '"><button class="btn btn-primary btn-block" type="button">Καθαρισμός Δηλώσεων</button></a></div>';
}
//echo '<pre>'; print_r($dt_greg); echo '</pre>';
?>
					<?php echo $lab_time; ?>
				</div>	
            </div>
          </div>
    </div>

