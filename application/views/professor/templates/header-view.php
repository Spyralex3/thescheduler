<!DOCTYPE html>

<html>
	<head>
		<link rel="shortcut icon" href="<?php echo base_url('assets/icons/Logo_teiath.ico'); ?>">
		<title>TEI Αθήνας</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet"> -->

		<link href="<?php echo base_url('assets/bootstrap/css/professor/professor-view.css'); ?>" rel="stylesheet"> 
		<link href="<?php echo base_url('assets/jasny_bootstrap/css/jasny-bootstrap.min.css'); ?>" rel="stylesheet" >
		
<!--		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  -->
		<script>
			if (typeof jQuery === "undefined") {
				 document.write(unescape("%3Cscript src='<?php echo base_url('assets/bootstrap/jquery/jquery-2.0.3.js');?>' type='text/javascript'%3E%3C/script%3E"));
			}
		</script>
	</head>
	<body url="<?php echo site_url();?>">
		<div id="bootstrapCssTest" class="hide"></div>
		<script>
			if ($('#bootstrapCssTest').is(':visible') === true) {
			    $('<link href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?> "rel="stylesheet" type="text/css" />').appendTo('head');
			    $('<link href="<?php echo base_url("assets/bootstrap/css/professor/professor-view.css"); ?> "rel="stylesheet" type="text/css" />').appendTo('head');
				}
		</script>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<a href="#" class = "navbar-brand"></a>
				<button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse" >
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
					<span class = "icon-bar"></span>
				</button>



				<div class = "collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav ">
						<li class = "<?php echo $visited_professor ?>"><a href="<?php echo site_url('administrator/admin'); ?>">Καθηγητής</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden-xs hidden-sm" ><a class = "">Καλωσήρθες <?php $professor=$this->session->userdata('prof');echo $professor["display_name"];?> </a></li>
						<li><?php echo anchor('professor/prof/logout', 'Αποσύνδεση') . ' '; ?></li>
					</ul>
				</div>

			</div>
		</div>
		<noscript>
		<div align="center" style="color:#ff0000;border:1px solid #ff0000;padding:4px;font-size:14px;">
		JavaScript is turned off in your web browser. Turn it on to take full advantage of this site, then refresh the page.
		</div>
		</noscript>
