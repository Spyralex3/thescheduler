$(document).ready(function() {

	function get_table_cells_height(){
		var th_width=$("table tr th#header_timeframe").outerWidth();
		//$("table tr th#header_timeframe").css("position","absolute").css("width",th_width+1).css("left","15px").css("height","39px");
		$("table tr td#timeframes").css({"position":"absolute","width":th_width+1,"left":"15px"});
		//var abc = $("table tr th#header_timeframe").clone().css("position","absolute").css("width",th_width+1).css("left","15px").css("height","39px");
		//$(abc).appendTo("table tr th#header_timeframe");
		var attrval=[];
		$("table tr td#hidden_column_cell").map(function(key,value){
							$(this).css({ position: "", visibility: "", display: "" });
							var valueHeight = $(this).outerHeight();
							$(this).css({ position: "", visibility: "", display: "none" });
							attrval.push({key:key,height:valueHeight});
						}).get();
		i=0;
		$("table tr td#timeframes").each(function(){
							$(this).css("height",attrval[i].height+2);
							i++;
						});
	}
	get_table_cells_height();
	$("table#schedule").on("click","a#course_link",function(){
		var intervalID=setInterval(get_table_cells_height,0.1);
		setTimeout(function(){clearInterval(intervalID);},1000)
	});
	//check if course_pending have values if not request to server is aborted
	$("div#submit_div").on("click","button#submit",
		 function (){
		 	var button=$(this).attr('id');
		 	var hout=$(this).parent().parent();
		 	var empty_td_flag=true;
		 	var submit_button_flag=false;

		 	if(button=="submit"){
		 		submit_button_flag=true;
		 	}
		 	$("form#pending_courses").submit(function( event ) {
		 		if(submit_button_flag==true){
		 			submit_button_flag=false;
			 		$(hout).find("td select").each(function(){
			 			if ($.trim($(this).val())!=0 ) {
			 				empty_td_flag=false;
			 			}
			 		});
			 	}else{
			 		return;
			 	}
			 	if (empty_td_flag==true) {
					event.preventDefault();
				}
		 	});
	});
});
