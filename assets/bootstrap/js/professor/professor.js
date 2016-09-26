$(document).ready(function() {

$( "span#info_msg" ).html('<div class="alert alert-info "><p ><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-info-sign"></span> Για αλλαγές στις επιλογές διώρου των φοιτητών επιλέξτε την καρτέλα Εργαστήρια.</p></div>');

		//Init tabs-----------------------------------------------
		$('#Tab_lectures a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable"><p ><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-info-sign"></span> Για αλλαγές στις επιλογές διώρου των φοιτητών επιλέξτε την καρτέλα Εργαστήρια.</p></div>');
		});
		$('#Tab_labs a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable"><p ><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-info-sign"></span> Κάντε <em><u>click</u></em> δίπλα από κάθε εργαστήριο για να κατεβάσετε τη λίστα με τους φοιτητές που το έχουν δηλώσει.</p></div>');
		});
		$('#Tab_import_list a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable"><p ><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-info-sign"></span> <u><strong>Προσοχή</strong></u> για να γίνουν οι όποιες αλλαγές στο πρόγραμμα πρέπει το excel που θα ανεβάσετε να είναι  <u><strong>της ίδιας μορφής με αυτό που κατεβάσατε!</strong></u></p></div>');
		});
		$('#Tab_prof_schedule a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info "><p ><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-info-sign"></span> Το Προγραμμα μου.</p></div>');
		});
		$('#Tab_classroom_schedule a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info "><p ><span style="vertical-align:sub; font-size: 1.5em; padding-right:5px;" class="glyphicon glyphicon-info-sign"></span> Αιθουσόγραμμα.</p></div>');
		});
		//----Labs Accordion---------------------------------------------------------------------
		function accordion() {
					    var $research = $('.research');
					    $research.find("tr").not('.accordion').hide();
					    $research.find("tr").eq(0).show();
					    
					    $research.find(".accordion").click(function(){
					        $research.find('.accordion').not(this).siblings().fadeOut(500);
					        $(this).siblings().fadeToggle(500);
					    }).eq(0).trigger('click');
					}
	 	accordion();
		//Ajax call for classes choices.
		$(document.body).on('click', "#submitbtn", function(){
			
			var form_path = $(this).parent().parent().parent().parent();
			var tableVal = form_path.find('input.onoffswitch-checkbox').map(function(i,v) {return $(this).is(':checked');
																		   			}).toArray();
			
			var request_data= {onoffswitch: tableVal, course_id: form_path.find("tr td input#course_id").val()};
			var request=$.ajax({
								 url: $("body").attr("url") + "/professor/prof/ajax_update_classes", 
								 type: "POST",
					 			 data: request_data
								});
			request.done(function( result ) { 
				if(result=="sess_expired"){alert("Παρακαλώ συνδεθείτε για να συνεχίσετε");window.location.assign($("body").attr("url")+"login");}
				jQuery.isEmptyObject(result); 
				$("div#labs").empty(); 
				$(result).hide().appendTo("div#labs").fadeIn(1000);
				accordion();

			});
			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
			 return false;
		 });

		//Ajax call for classroom's schedule
		$("button#submit_classroom_schedule").click(function(){  
			var request_data= {classroom_choice: $("select#classroom_choice").val()};
			var request=$.ajax({
								 url: $("body").attr("url") + "/professor/prof/ajax_response_classrooms_schedule", 
								 type: "POST",
					 			 data: request_data
								});
			request.done(function( result ) { 
				if(result=="sess_expired"){alert("Παρακαλώ συνδεθείτε για να συνεχίσετε");window.location.assign($("body").attr("url")+"login");}
				$("div#ajax_classroom_table").empty(); 
				$(result).hide().appendTo("div#ajax_classroom_table").fadeIn(1000);
			});
			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
			 return false;
		});
});
/* End of file prof.js */
/* Location: ./assets/bootstrap/js/professor/prof.js */
