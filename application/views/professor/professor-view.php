<?php echo $query_messages;?>
<div class="custom-container">
	<h1 style="text-align: center; text-decoration: underline;"></h1>

	<div class="row">
	   <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                <?php
                        $professor_session = $this->session->userdata('prof');
                        if($professor_session["is_admin"] == 1){
                        echo '
                <div class = " ">
                        
                   <div style="float:right; z-index: 0;">
                                <div class="btn-group" style="vertical-align:middle ">
                                        <button  style="z-index: 1;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Αλλαγή Πάνελ<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                        <li style="z-index: 0;"><a href="'. site_url('professor/prof/change_panel'). '">Πάνελ Διαχειριστή</a></li>
                                        </ul>
                                </div>
                        </div>
                        <p style="visibility:hidden; margin-bottom:20px;" >div_helper</p>
                </div>';
                }?>
			<span id="info_msg">
				<div class="alert alert-info ">
				  <p ><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-info-sign"></span> Εξαγωγή στοιχείων σε μορφή Excel. </p>
				</div>
			</span>

	  		<ul class="nav nav-tabs">
	  		  <li id="Tab_lectures" class="active"><a   href="#lectures">Θεωρίες</a></li>
			  <li id="Tab_labs" ><a   href="#labs">Εργαστήρια</a></li>
<?php
if($professor_session["is_admin"] == 1){
	echo '<li id="Tab_import_list" ><a   href="#import_list">Διαμόρφωση τμημάτων</a></li>';
}
?>
			  <li id="Tab_prof_schedule" ><a   href="#prof_schedule">Το Προγραμμα μου</a></li>
			  <li id="Tab_classroom_schedule" ><a   href="#classroom_schedule">Αιθουσόγραμμα</a></li>
			</ul>

			<div class="tab-content scroller">

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

				<div class="tab-pane fade in active " id="lectures">
					<div class="panel panel-default ">
			 			<div class="panel-body ">
							<div class="scroller">
					 			  	<?php echo $lectures;?>
							</div>
						</div>
			 		</div>
				</div>

				<div class="tab-pane fade " id="labs">
				 	<div class="panel panel-default">
				 		<div class="panel-body">
				 			<div style="width: auto;" class="scroller">
					 			<?php echo $labs; ?>
							</div>
						</div>
			 		</div>
				</div>

				<div class="tab-pane fade " id="import_list">
				 	<div class="panel panel-default">
				 		<div class="panel-body">
				 			<div style="width: auto;" class="scroller">

								<form method="post" action="<?php echo base_url('index.php/professor/prof/do_upload'); ?>" enctype="multipart/form-data">

									<div class="col-lg-3 fileinput fileinput-new" data-provides="fileinput" style="display:block; ">
										<input type="submit" class="btn btn-info" style="float:right;  margin-left:10px;text-align: left !important;" value="Καταχώρηση">
									  
									  <div class="input-group" >
									    <div class="form-control span3" data-trigger="fileinput" ><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
									    <span class=" btn btn-default btn-file"><span class="fileinput-new ">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="userfile" accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"></span>
									    <a href="#" class=" btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									  </div>
									</div>
									
								</form>

							</div>
						</div>
			 		</div>
				</div>

				<div class="tab-pane fade " id="prof_schedule">
				 	<div class="panel panel-default">
				 		<div class="panel-body">
				 			<div style="width: auto; " class="scroller">
					 				<?php echo $prof_schedule; ?>
							</div>
						</div>
			 		</div>
				</div>

			</div>


	    </div>
	</div>
</div>

<!--
<div class="col-lg-12 ">
	<div style="float:left; margin:0px 300px 100px 5px;">
	<iframe scrolling="no" frameborder="0" allowtransparency="true" src="http://www.weather.gr/gr/gr/widgets/weather_w9.aspx?p=3" style="width: 300px; height: 502px"></iframe><a target="blank" style="color: #999999; width: 300px; display: block; text-align: center; font: 10px/10px Arial,san-serif; text-decoration: none;" href="http://www.weather.gr">πρόγνωση καιρού από το weather.gr</a>
	</div>

	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
	</script>

	<script>
		var myCenter=new google.maps.LatLng(38.00315,23.67702);

		function initialize()
		{
		var mapProp = {
		  center:myCenter,
		  zoom:15,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		  };

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker=new google.maps.Marker({
		  position:myCenter,
		  });

		marker.setMap(map);

		var infowindow = new google.maps.InfoWindow({
		  content:"Τι λες να το αφήσουμε στην πτυχιακή?"
		  });

		google.maps.event.addListener(marker, 'click', function() {
		  infowindow.open(map,marker);
		  });
		}

		google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	<div id="googleMap" style="width:500px;height:380px;"></div>
</div>
-->
