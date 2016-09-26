$(document).ready(function() {

	window.w=0;

		$( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Μαθήματα</div>');

		//Init tabs-----------------------------------------------
		$('#Tab_custom_courses a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Μαθήματα</div>');
		});
		$('#Tab_custom_professors a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Καθηγητές</div>');
		});
		$('#Tab_custom_classrooms a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Αίθουσες</div>');
		});
		$('#Tab_var_actions a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Διάφορες Ενέργειες</div>');
		});
		$('#Tab_classroom_schedule a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Αιθουσόγραμμα</div>');
		});
		$('#Tab_curriculum a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Ωρολόγιο Πρόγραμμα</div>');
		});
		$('#Tab_prof_curriculum a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Προγραμμα Καθηγητών</div>');
		});
		$('#Tab_students_choices a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		  $( "span#info_msg" ).html('<div class="alert alert-info alert-dismissable">Δηλώσεις Φοιτητών</div>');
		});


//--------------CUSTOM COURSES--------------------------------------------------------------------------------------
		//get Width for day,start-time.end-time----------------------
		var day = $( "table#custom_day tbody tr td#day" );
		var d= day.innerWidth();
		$("th#day").css( "min-width", d );

		var start_time = $( "table#custom_day tbody tr td#start-time" );
		var st= start_time.innerWidth();
		$("th#start-time").css( "min-width", st );

		var end_time = $( "table#custom_day tbody tr td#end-time" );
		var et= end_time.innerWidth();
		$("th#end-time").css( "min-width", et );

		//-----------CHANGE INPUT FIELDS WIDTH----------------------------------------
		$("table#custom_courses").on("click","input#professor",
		 function () {
		 	$(this).css("min-width","250px");
		});
		$("table#custom_courses").on("focusout","input#professor",
		 function () {
		 	$(this).css("min-width","80px");
		});
		$("table#custom_courses").on("click","input#course",
		 function () {
		 	$(this).css("min-width","250px");
		});
		$("table#custom_courses").on("focusout","input#course",
		 function () {
		 	$(this).css("min-width","80px");
		});

          //MAIN table BUTTONS ----------------------------------------------------------
		$("table#custom_courses").on("click","button#add_course",
		 function () {
		 	var a = $(this).parent().parent().clone();
		 	$(a).attr("element","added");
		 	$(a).css("background-color","rgb(245,245,245)");
		 	$(a).find("td").css('background-color','rgb(245,245,245)');
		 	$(a).find("input,button").not("input#add-data, input#delete-data").each(function(){
		 		$(this).attr("value","");
		 		});
		 	$(a).find("option").each(function(){
		 		$(this).removeAttr("selected");
		 		});
		 	$(a).find("input,select,button").not("button#add_course").each(function(){
		 		$(this).attr("disabled","disabled");
		 		});
			$(a).find("a#edit").removeAttr( "status" );
			if ($(a).find("a#edit").attr( "class")=="turned-on-edit") {
				$(a).find("a#edit").attr( "class","disabled-edit");
			};


			$(a).find("table#custom_day tr").each(function(){
				tr_size = $(a).find("table#custom_day tr").size();
				if (tr_size!=1) {
					$(this).first().remove();
				};
			});
			$(a).find("table#custom_professor_assistant tr").each(function(){
				tr_size = $(a).find("table#custom_professor_assistant tr").size();
				if (tr_size!=1) {
					$(this).first().remove();
				};
			});
		//--------------GENERATE COURSE-ID FOR NEW INSERTION-------------------------------------------------
			var max_ids_array = $("input[id='course-id']").map(function(){ return $(this).val();}).get();
			max_ids_array.sort(function(a,b){return a-b});
			for (var i = 0; i < max_ids_array.length; i++) {
				$j=i+1;
				var idx = jQuery.inArray($j.toString(),max_ids_array);
				if (idx==-1) {
					$(a).find("input#course-id").attr("value",$j);
					$(a).find("input#course-id_hidden").attr("value",$j+"_new");
					break;
				}else{
					$(a).find("input#course-id").attr("value",$j+1);
					$(a).find("input#course-id_hidden").attr("value",$j+1+"_new");
				}
			}
		 	$(this).parent().parent().parent().append(a);
		 	$("html, body").animate({ scrollTop: $(document).height() }, "slow");
		});
		//---------------------------------------------------------------------------------------------------
			//PROFESSOR_ASSISTANT_TABLE_BUTTONS------------------------------------------------------
			$("table#custom_courses").on("click","button#abstract_professor_assistant",
			 function () {
			 		var n =$(this).closest("tbody").find("button#abstract_professor_assistant").size();
			 		if (n==1) {
					return false;
					}else{
						$(this).closest("tr").remove();
					};
			});
			$("table#custom_courses").on("click","button#add_professor_assistant",
			 function () {
			 	$var = $(this).parent().parent().clone();
			 	$(this).parent().parent().parent().parent().append($var);
			});
			//INNER TABLE-----------------------------------------------
			$("table#custom_courses").on("click","button#abstract_day",
			 function () {
			 		var n =$(this).closest("tbody").find("button#abstract_day").size();
			 		if (n==1) {
					return false;
					}else{
						$(this).closest("tr").remove();
					};
			});
			$("table#custom_courses").on("click","button#add_day",
			 function () {
			 	$var = $(this).parent().parent().parent().clone();
			 	$(this).parent().parent().parent().parent().append($var);
			});

		//----------------EDIT BUTTON BEHAVIOUR-----------------------------------------
		$("table#custom_courses").on("click","a#edit",
			function () {
				if ($flag==true) {
					$(this).parent().parent().find("input,select,button").not("input#course-id,select#type").removeAttr( "disabled" );
					$(this).parent().parent().attr('id','donothover');
					$(this).parent().parent().parent().find("table#custom_day tr").attr('id','donothover');
					//Only for additional lines remove disabled atrribute from select tag.
					if ($(this).parent().parent().attr('element')=='added') {
						$(this).parent().parent().find('select#type').removeAttr("disabled");
					};
					//----------------EMPHASIZED GREEN COLOUR TABLE ROWS ON FOCUS------------------------------
					//$(this).parent().parent().css('background-color','#dff0d8');
					//---------------------------------------------------------------------
					$(this).attr('status', 'edited');
					$flag=false;

					$(this).attr( "class","turned-on-edit" );

					$(this).parent().parent().parent().find("a#edit").not(this).attr( "class","disabled-edit" );
				}
				else if ($flag==false) {

					if ($(this).attr("status")=="edited") {
						$(this).removeAttr( "status" );
						$(this).parent().parent().removeAttr('id');
						$(this).parent().parent().parent().find("table#custom_day tr").removeAttr('id');
						$(this).parent().parent().find("input,select,button").not("button#add_course,input#course-id,select#type").each(function(){
												$(this).attr( "disabled","disabled" );
												});
						if ($(this).parent().parent().attr('element')=='added') {
							$(this).parent().parent().find('select#type').attr("disabled","disabled");
						};
						//---------------UNDO COLOUR TABLE ROWS--------------------------
						$(this).parent().parent().css('background-color','#F5F5F5');
						//-------------------------------------------------------------
						$(this).parent().parent().parent().find("a#edit").removeAttr( "class");
						$flag=true;

					}
				}
				return false;
			});
		//SUBMIT BUTTON VALIDATION-----------------------------------------------
		$("table#custom_courses").on("click","input#add-data,input#delete-data",
		 function (){
		 	var button=$(this).attr('id');
		 	var hout=$(this).parent().parent();
		 	var del_butt_flag=false;
		 	var add_butt_flag=false;

		 	if (button=='delete-data') {
		 		del_butt_flag=true;
		 	}else if(button=='add-data'){
		 		add_butt_flag=true;
		 	}

		 	$( "form#custom-courses").submit(function( event ) {
		 		if(add_butt_flag==true){
		 			add_butt_flag=false;
		 			empty_td_flag=false;
			 		//----validation for empty inputs----
					$(hout).find("input").not("input#add-data, input#delete-data, input#course-id_hidden").each(
						function() {
							if ($.trim($(this).val())=="" ) {
								empty_td_flag=true;
								$(this).parent().stop( false, true ).effect( "highlight",10000);
							}
					});
					var split_array_letters=($(hout).find("input#official-course-id").val()).toUpperCase().split("");
					var error_language_trig=false;
					for (var i = 0; i < split_array_letters.length; i++) {
						if(split_array_letters[ i ] =="A" || split_array_letters[ i ] =="B" || split_array_letters[ i ] =="C" || split_array_letters[ i ] =="D" || split_array_letters[ i ] =="E" || split_array_letters[ i ] =="F" || split_array_letters[ i ] =="G" || split_array_letters[ i ] =="H" || split_array_letters[ i ] =="I" || split_array_letters[ i ] =="J" || split_array_letters[ i ] =="K" || split_array_letters[ i ] =="L" || split_array_letters[ i ] =="M" || split_array_letters[ i ] =="N" || split_array_letters[ i ] =="O"|| split_array_letters[ i ] =="P" || split_array_letters[ i ] =="Q" || split_array_letters[ i ] =="R" || split_array_letters[ i ] =="S" || split_array_letters[ i ] =="T" || split_array_letters[ i ] =="U" || split_array_letters[ i ] =="V" || split_array_letters[ i ] =="W" || split_array_letters[ i ] =="X" ||split_array_letters[ i ] =="Y" ||split_array_letters[ i ] =="Z" ) {
							error_language_trig=true;
						}
					}
					if(error_language_trig==true) {
						event.preventDefault();
						alert("Ο Κωδικός Μαθήματος δεν πρέπει να περιέχει αγγλικούς χαρακτήρες.");
					}
					//--validation only for lab timeframes-----------------------------
						var start_time_array = $(hout).find("select#start-time").map(function(){return $(this).val();}).get();
						var end_time_array = $(hout).find("select#end-time").map(function(){return $(this).val();}).get();
						dance:
						for (var i = 0; i < start_time_array.length; i++) {
							var difference=end_time_array[0]-start_time_array[0];
							if (difference<0) {
								event.preventDefault();
								alert('Οι ώρες που επιλέξατε δεν είναι σωστές.Παρακαλώ συμβουλευτείτε τις πληροφορίες στο μπλε πλαίσιο.');
								break;
							};
							if ($(hout).find("select#type").val()=="lab") {
								var each_diff=end_time_array[i]-start_time_array[i];
								if (each_diff!=difference) {
									event.preventDefault();
									alert('Οι ώρες που επιλέξατε δεν είναι σωστές.Παρακαλώ συμβουλευτείτε τις πληροφορίες στο μπλε πλαίσιο.');
									break dance;
								};
							};
						};
					//---------------------------------------------------------------------

					//----Cancel form if validation rules not agreed----
					if (empty_td_flag==true ) {
						$( "div#query_messages .alert" ).remove();
						$( "span#validation_msg" ).html('<div style="position:fixed; z-index:1; width:100%;" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Παρακαλώ συμπληρώστε <strong>ΟΛΑ</strong> τα πεδία.</div>');
						event.preventDefault();
					}

				}
				else if(del_butt_flag==true){
						del_butt_flag=false;

					if(hout.attr("element")=='added'){
						$( "span#validation_msg" ).html('<div style="position:fixed; z-index:1; width:100%;" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Τα στοιχεια που επιλέξατε προς διαγραφή δεν είναι καταχωρημένα.</div>');
	  					$(hout).stop();
						$(hout).animate({backgroundColor: "#ffff99 !important"});
						$(hout).animate({backgroundColor: "#dff0d8"},10000);

	  					event.preventDefault();

	 				}else{
	 					var r=confirm("Είστε σίγουροι οτι θέλετε να διαγράψετε το Κωδικό Μαθήματος;");
						if (r!=true){
							event.preventDefault();
						}
						return true;
	 				}

				}
			});
		});
//-------------------CUSTOM PROFESSORS---------------------------------------------------------------
		$("table#custom_professors").on("click","button#add_professor",
		 function () {
		 	var a = $(this).parent().parent().clone();
		 	$(a).attr("element","added");
		 	$(a).css("background-color","rgb(245,245,245)");
		 	$(a).find("td").css('background-color','rgb(245,245,245)');
		 	$(a).find("input").not("input#add-data, input#delete-data").each(function(){
		 		$(this).attr("value","");
		 		});
		 	$(a).find("input").each(function(){
		 		$(this).attr("disabled","disabled");
		 		});
			$(a).find("a#edit").removeAttr( "status" );

			if ($(a).find("a#edit").attr( "class")=="turned-on-edit") {
				$(a).find("a#edit").attr( "class","disabled-edit");
			};

			//--------------GENERATE COURSE-ID FOR NEW INSERTION-------------------------------------------
			var max_ids_array = $("input[id='professor-id']").map(function(){ return $(this).val();}).get();
			max_ids_array.sort(function(a,b){return a-b});
			for (var i = 0; i < max_ids_array.length; i++) {
				$j=i+1;
				var idx = jQuery.inArray($j.toString(),max_ids_array);
				if (idx==-1) {
					$(a).find("input#professor-id").attr("value",$j);
					$(a).find("input#professor-id_hidden").attr("value",$j+"_new");

					break;
				}else{
					$(a).find("input#professor-id").attr("value",$j+1);
					$(a).find("input#professor-id_hidden").attr("value",$j+1+"_new");
				}
			}
			//--------------------------------------------------------------------------------------------


		 	$(this).parent().parent().parent().append(a);
		 	$("html, body").animate({ scrollTop: $(document).height() }, "slow");
		});
		//----------EDIT BUTTON BEHAVIOUR-----------------------------------------
		$("table#custom_professors").on("click","a#edit",
			function () {
				if ($flag==true) {
					$(this).parent().parent().find("input").not("input#professor-id").removeAttr( "disabled" );

					$(this).parent().parent().attr('id','donothover');

					//----------------EMPHASIZED GREEN COLOUR TABLE ROWS ON FOCUS------------------------------
					//$(this).parent().parent().css('background-color','#dff0d8');
					//---------------------------------------------------------------------
					//
					$(this).attr('status', 'edited');
					$flag=false;

					$(this).attr( "class","turned-on-edit" );

					$(this).parent().parent().parent().find("a#edit").not(this).attr( "class","disabled-edit" );
				}
				else if ($flag==false) {

					if ($(this).attr("status")=="edited") {
						$(this).removeAttr( "status" );
						$(this).parent().parent().removeAttr('id');
						$(this).parent().parent().find("input").each(function(){
												$(this).attr( "disabled","disabled" );
												});
						$(this).parent().parent().parent().find("a#edit").removeAttr( "class");
						$flag=true;
						//---------------UNDO COLOUR TABLE ROWS--------------------------
						$(this).parent().parent().css('background-color','#F5F5F5');
						//-------------------------------------------------------------
					}
				}
				return false;
			});

	//ADD-DATA BUTTON VALIDATION-----------------------------------------------
	$("table#custom_professors").on("click","input#add-data,input#delete-data",
		 function (){
		 	var button=$(this).attr('id');
		 	var hout=$(this).parent().parent();
		 	var del_butt_flag=false;
		 	var add_butt_flag=false;

		 	if (button=='delete-data') {
		 		del_butt_flag=true;
		 	}else if(button=='add-data'){
		 		add_butt_flag=true;
		 	}
		 	$( "form#custom-professors").submit(function( event ) {
		 		if(add_butt_flag==true){
		 			add_butt_flag=false;
		 			empty_td_flag=false;
			 		//----validation for empty inputs----
					$(hout).find("input").not("input#add-data, input#delete-data").each(
						function() {
								if ($.trim($(this).val())=="" ) {
									empty_td_flag=true;
									$(this).parent().stop( false, true ).effect( "highlight",10000);
								}
					});

					//----Cancel form if validation rules not agreed----
					if (empty_td_flag==true || professor_id_type != 'Number' || unique_professor_id==false) {
						$( "div#query_messages .alert" ).remove();
						$( "span#validation_msg" ).html('<div style="position:fixed; z-index:1; width:100%;" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Παρακαλώ συμπληρώστε <strong>ΟΛΑ</strong> τα πεδία.</div>');
	  					event.preventDefault();

					}

				}
				else if(del_butt_flag==true){
						del_butt_flag=false;

					if(hout.attr("element")=='added'){
						$( "span#validation_msg" ).html('<div style="position:fixed; z-index:1; width:100%;" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Τα στοιχεια που επιλέξατε προς διαγραφή δεν είναι καταχωρημένα.</div>');
	  					$(hout).stop();
						$(hout).animate({backgroundColor: "#ffff99 !important"});
						$(hout).animate({backgroundColor: "#dff0d8"},10000);

	  					event.preventDefault();

	 				}else{
	 					var r=confirm("Είστε σίγουροι οτι θέλετε να διαγράψετε το Κωδικό Καθηγητή;");
						if (r!=true){
							event.preventDefault();
						}
						return true;
	 				}

				}
			});
		});
//-------------------CUSTOM CLASSROOMS	---------------------------------------------------------------
		//MAIN table BUTTONS ----------------------------------------------------------
		$("table#custom_classrooms").on("click","button#add_classroom",
		 function () {
		 	var a = $(this).parent().parent().clone();
		 	$(a).attr("element","added");
		 	$(a).css("background-color","rgb(245,245,245)");
		 	$(a).find("td").css('background-color','rgb(245,245,245)');
		 	$(a).find("input").not("input#add-data, input#delete-data").each(function(){
		 		$(this).attr("value","");
		 		});
		 	$(a).find("input").each(function(){
		 		$(this).attr("disabled","disabled");
		 		});
			$(a).find("a#edit").removeAttr( "status" );

			if ($(a).find("a#edit").attr("class")=="turned-on-edit") {
				$(a).find("a#edit").attr( "class","disabled-edit");
			};
			//--------------GENERATE COURSE-ID FOR NEW INSERTION-------------------------------------------
			var max_ids_array = $("input[id='classroom-id']").map(function(){ return $(this).val();}).get();
			max_ids_array.sort(function(a,b){return a-b});
			for (var i = 0; i < max_ids_array.length; i++) {
				$j=i+1;
				var idx = jQuery.inArray($j.toString(),max_ids_array);
				if (idx==-1) {
					$(a).find("input#classroom-id").attr("value",$j);
					$(a).find("input#classroom-id_hidden").attr("value",$j+"_new");
					break;
				}else{
					$(a).find("input#classroom-id").attr("value",$j+1);
					$(a).find("input#classroom-id_hidden").attr("value",$j+1+"_new");
				}
			}
			//--------------------------------------------------------------------------------------------
		 	$(this).parent().parent().parent().append(a);
		 	$("html, body").animate({ scrollTop: $(document).height() }, "slow");
		});
		//---------EDIT BUTTON BEHAVIOUR-----------------------------------------
		$flag=true;
		$("table#custom_classrooms").on("click","a#edit",
			function () {
				if ($flag==true) {
					$(this).parent().parent().find("input").not("input#classroom-id").removeAttr( "disabled" );
					$(this).parent().parent().attr('id','donothover');
					//----------------EMPHASIZED GREEN COLOUR TABLE ROWS ON FOCUS---------------
					//$(this).parent().parent().css('background-color','#dff0d8');
					//--------------------------------------------------------------------------------------------------------

					$(this).attr('status', 'edited');
					$flag=false;

					$(this).attr( "class","turned-on-edit" );

					$(this).parent().parent().parent().find("a#edit").not(this).attr( "class","disabled-edit" );
				}
				else if ($flag==false) {
					if ($(this).attr("status")=="edited") {
						$(this).removeAttr( "status" );
						$(this).parent().parent().removeAttr('id');
						$(this).parent().parent().find("input").each(function(){
												$(this).attr( "disabled","disabled" );
												});
						$(this).parent().parent().parent().find("a#edit").removeAttr( "class");
						$flag=true;
						//---------------UNDO COLOUR TABLE ROWS--------------------------
						//$(this).parent().parent().css('background-color','#F5F5F5');
						$(this).parent().parent().animate({backgroundColor: "#F5F5F5"});
						//-------------------------------------------------------------
					}
				}
				return false;
			});

	//ADD-DATA BUTTON VALIDATION-----------------------------------------------
	$("table#custom_classrooms").on("click","input#add-data,input#delete-data",
		 function (){
		 	var button=$(this).attr('id');
		 	var hout=$(this).parent().parent();
		 	var del_butt_flag=false;
		 	var add_butt_flag=false;

		 	if (button=='delete-data') {
		 		del_butt_flag=true;
		 	}else if(button=='add-data'){
		 		add_butt_flag=true;
		 	}

		 	$( "form#custom-classrooms").submit(function( event ) {

		 		if(add_butt_flag==true){
		 			add_butt_flag=false;
		 			empty_td_flag=false;
			 		//----validation for empty inputs----
					$(hout).find("input").not("input#add-data, input#delete-data").each(
						function() {
							if ($.trim($(this).val())=="" ) {
								empty_td_flag=true;
								$(this).parent().stop( false, true ).effect( "highlight",{ color: "#ffff99 " },10000);
							}
					});
				/*	//----validation for classroom-id to be a number----
					var t=$(hout).find("input#classroom-id").val();
					if(/^-?[0-9]+[.]?[0-9]*$/.test(t)) {
						var classroom_id_type = 'Number';
					}else{
						var classroom_id_type='Not A Number';
						$(hout).find("input#classroom-id").parent().stop( false, true ).effect( "highlight",10000);
					}

					//----validation for classroom-id to be a UNIQUE number----
					if (hout.attr("element")=='added') {
			 			var element_flag=$(hout).find("input#classroom-id").val();
				 	}else{
				 		var element_flag='';
				 	}

				 	var unique_classroom_id=true;

					for (var i = 0; i <= max_ids.max_classroom_id.length; i++) {

						if (max_ids.max_classroom_id[i]==element_flag) {
							unique_classroom_id=false;
							$(hout).find("input#classroom-id").parent().stop( false, true ).effect( "highlight",10000);
						}
					};*/
					//----Cancel form if validation rules not agreed----
					if (empty_td_flag==true || classroom_id_type != 'Number' || unique_classroom_id==false) {
						$( "div#query_messages .alert" ).remove();
						$( "span#validation_msg" ).html('<div style="position:fixed; z-index:1; width:100%;" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Παρακαλώ συμπληρώστε <strong>ΟΛΑ</strong> τα πεδία.</div>');
	  					event.preventDefault();
					}

				}
				else if(del_butt_flag==true){
						del_butt_flag=false;

					if(hout.attr("element")=='added'){
						$( "span#validation_msg" ).html('<div style="position:fixed; z-index:1; width:100%;" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Τα στοιχεια που επιλέξατε προς διαγραφή δεν είναι καταχωρημένα.</div>');
	  					//$(hout).stop( false, true ).effect( "highlight",10000);
	  					$(hout).stop();
						$(hout).animate({backgroundColor: "#ffff99 !important"});
						$(hout).animate({backgroundColor: "#dff0d8"},10000);

	  					event.preventDefault();

	 				}else{
	 					var r=confirm("Είστε σίγουροι οτι θέλετε να διαγράψετε όλες τις δηλώσεις όλων των φοιτητών του εξαμήνου;");
						if (r!=true){
							event.preventDefault();
						}
						return true;
	 				}

				}
			});
		});
//------------VARIOUS ACTIONS----------------------------------------------------------------------------------------------------------------------------------
		$( "form#delete_courses").submit(function( event ) {
			var r=confirm("Είστε σίγουροι οτι θέλετε να διαγράψετε το Κωδικό Μαθήματος;");
						if (r!=true){
							event.preventDefault();
						}
						return true;
		});



		//----------------Date Selection----------------------------------------------------
		$( "#start_date,#end_date" ).datepicker({   dateFormat: 'dd/mm/yy',  
													defaultDate: "+1w",
													changeMonth: true,
													numberOfMonths: 1,
													});
		//Ajax call for lab subscription date
		$("button#submit_date_hour").click(function(){
			  
			var request_data= {start_date: $("input#start_date").val(),
								start_hour: $("select#start_hour").val(),
								start_minutes: $("select#start_minutes").val(),
								end_date: $("input#end_date").val(),
								end_hour: $("select#end_hour").val(),
								end_minutes: $("select#end_minutes").val()};

			var request=$.ajax({
								 url: $("body").attr("url") + "/administrator/admin/ajax_response_set_date", 
								 type: "POST",
					 			 data: request_data
								});
								
			request.done(function( result ) { 
				if(result=="sess_expired"){ alert("Παρακαλώ συνδεθείτε για να συνεχίσετε");window.location.assign($("body").attr("url")+"login");}
				 

				$("#lab_subscription_date_msg").empty(); 
				$(result).hide().appendTo("#lab_subscription_date_msg").fadeIn(1000);

				
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
								 url: $("body").attr("url") + "/administrator/admin/ajax_response_classrooms_schedule", 
								 type: "POST",
					 			 data: request_data
								});
								
			request.done(function( result ) { 
				if(result=="sess_expired"){ alert("Παρακαλώ συνδεθείτε για να συνεχίσετε");window.location.assign($("body").attr("url")+"login");}
				$("div#ajax_classroom_table").empty(); 
				$(result).hide().appendTo("div#ajax_classroom_table").fadeIn(1000);
			});
			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
			 return false;
		});
		//Ajax call for curriculum's schedule
		$("button#submit_curriculum_schedule").click(function(){  
			var request_data= {curriculum_choice: $("select#curriculum_choice").val()};
			var request=$.ajax({
								 url: $("body").attr("url") + "/administrator/admin/ajax_response_curriculum_schedule", 
								 type: "POST",
					 			 data: request_data
								});
							
			request.done(function( result ) { 
				if(result=="sess_expired"){ alert("Παρακαλώ συνδεθείτε για να συνεχίσετε"); window.location.assign($("body").attr("url")+"login");}
				$("div#ajax_curriculum_table").empty(); 
				$(result).hide().appendTo("div#ajax_curriculum_table").fadeIn(1000);
			});
			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
			 return false;
		});
			
		//Ajax call for professor's schedule
		$("button#submit_prof_schedule").click(function(){  
			var request_data= {Authority : "ajax_call",prof_choice: $("#professor_choice").val()};
			var request=$.ajax({
								 url: $("body").attr("url") + "/administrator/admin/ajax_response_prof_schedule", 
								 type: "POST",
								 data: request_data
								});
			request.done(function( result ) {  
				if(result=="sess_expired"){alert("Παρακαλώ συνδεθείτε για να συνεχίσετε");window.location.assign($("body").attr("url")+"login");}
				$("div#ajax_prof_table").empty(); 
				$(result).hide().appendTo("div#ajax_prof_table").fadeIn(1000);
			});
			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
			 return false;
		});
		 
		 //Ajax call for courses' selection
		$("button#submit_courses_selection").click(function(){  
			var request_data= {course_id: $("#courses_selections").val()};
			var request=$.ajax({
								 url: $("body").attr("url") + "/administrator/admin/ajax_response_course_selections", 
								 type: "POST",
								 data: request_data
								});
			request.done(function( result ) { 
				/*for (i=0;i<result.length;i++)
				{ alert(result[i]);}
*/
				if(result=="sess_expired"){alert("Παρακαλώ συνδεθείτε για να συνεχίσετε");window.location.assign($("body").attr("url")+"login");}
				$("div#ajax_courses_info").empty(); 
				$(result).hide().appendTo("div#ajax_courses_info").fadeIn(1000);
			});
			request.fail(function( jqXHR, textStatus ) {
				alert( "Request failed: " + textStatus );
			});
			 return false;
		});

		//Hover function
	 	$("table").not("#classroom_schedule,#set_date").hover(
		  function () {
		    	$(this).addClass("table-hover");
		  },
		  function () {
		    $(this).removeClass("table-hover");
		  }
		);
		//Check to see if the window is top if not then display button
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.scrollToTop').fadeIn();
			} else {
				$('.scrollToTop').fadeOut();
			}
		});
		//Click event to scroll to top
		$('.scrollToTop').click(function(){
			$('html, body').animate({scrollTop : 0},800);
			return false;
		});
		
});
/* End of file admin.js */
/* Location: ./assets/bootstrap/js/administrator/admin.js */
