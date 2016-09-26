		<div class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container">
			<p class = "navbar-text-1"><?php 
			$r1 = rand(0,1);			
			if ($r1<1) {
echo '@2014 Department of Electronic Engineering All rights reserved | Created by <a target="_blank" href="http://gr.linkedin.com/pub/alehandr0s-spy/57/911/483/">Alexandros Spyropoulos</a> and <a target="_blank" href="http://gr.linkedin.com/pub/grigoris-mastoras/60/b47/8a5/">Grigoris Mastoras</a></p>';
}else{
echo '@2014 Department of Electronic Engineering All rights reserved | Created by <a target="_blank" href="http://gr.linkedin.com/pub/grigoris-mastoras/60/b47/8a5/">Grigoris Mastoras</a> and <a target="_blank" href="http://gr.linkedin.com/pub/alehandr0s-spy/57/911/483/">Alexandros Spyropoulos</a></p>';
}?>
			</div>
		</div>

		<script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			if (typeof jQuery === "undefined") {
				 document.write(unescape("%3Cscript src='<?php echo base_url('assets/bootstrap/jquery/jquery-2.0.3.js');?>' type='text/javascript'%3E%3C/script%3E"));
			}
		</script>
		<script src = "<?php echo base_url('assets/bootstrap/js/bootstrap.js');?> "></script>
		<script src = "<?php echo base_url('assets/bootstrap/js/student/schedule.min.js');?> "></script>
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
