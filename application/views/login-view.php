<!DOCTYPE html>
<html>
	<head>
		<meta name="google-site-verification" content="TxeweOnZUwoejyIRgRgblwMCWXPdd9z4tvP8Qlm6F1Y" />
		<link rel="shortcut icon" href="<?php echo base_url('assets/icons/Logo_teiath.ico'); ?>">
		<title>Login Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" >
		<link href="<?php echo base_url('assets/bootstrap/css/login-view.css'); ?>" rel="stylesheet" >
	</head>
	<body>

	<div class="container">
		<h3 class="text-center">Συνδεθείτε για να συνεχίσετε</h3>
		<br>
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="container" id="cont">
						<form action="<?php echo base_url('index.php/login/database_query_validation'); ?> " role="form" method="post" accept-charset="utf-8">
						    <div class="form-group">
						      <label for="usernameLabel"></label>

						      <input name="username" type="username" class="form-control input-lg" id="usernameLabel" placeholder="Ονομα Χρήστη" value="<?php echo set_value('username' ,''); ?>">
						      <input name="password" type="password" class="form-control input-lg" id="exampleInputPassword1" placeholder="Κωδικός πρόσβασης">
						    </div>

							<button name="submit" type="submit" class="btn btn-primary btn-block">Σύνδεση</button>
						<!--<p class="text-center"><button type="button" class="btn btn-link "><?php echo anchor('login/signup', 'Δημιουργία λογαριασμού'); ?></button></p>-->
							<br>
						    <?php echo validation_errors(); ?>
						</form>
						
					</div>
				</div>
				<span id="cookie_msg"></span>
			</div>
	</div>
	<noscript>
		<div align="center" style="color:#ff0000;border:1px solid #ff0000;padding:4px;font-size:14px;">
		JavaScript is turned off in your web browser. Turn it on to take full advantage of this site, then refresh the page.
		</div>
	</noscript>
	<div class = "navbar navbar-default navbar-fixed-bottom">
		<div class = "container">
			<p class = "navbar-text-1">©2014 The schedule.<a href="#" style="display:none;" id="cr">.</a></p>
		</div>
	</div>
		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			if (typeof jQuery === "undefined") {
				 document.write(unescape("%3Cscript src='<?php echo base_url('assets/bootstrap/jquery/jquery-2.0.3.js');?>' type='text/javascript'%3E%3C/script%3E"));
			}
		</script>
		<script src = "<?php echo base_url('assets/bootstrap/js/login.js');?> "></script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-52687305-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</body>
</html>
