<?php wp_footer(); ?>

<footer>

<div class="clearfix">

<div class="grid-4 logo-foot">
<p class="f-gav"><em>Gavin</em><sup>&trade;</sup> Advertising</p>
<!--NEW MAILCHIMP FORM -->
<div id="mc_embed_signup">
<p id="mail-p">Sign up for the latest updates from Gavin</p>
			<form data-abide action="//gavinadvertising.us2.list-manage.com/subscribe/post?u=9b1519964314255f378990afb&amp;id=11f22c8004" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate clearfix" target="_blank">
				<div id="mc_embed_signup_scroll">
				<div class="name-field">
					<input name="FNAME" type="text" required value="" placeholder="First Name*" id="mce-FNAME" />
					<small class="error">First Name is required</small>
				</div>
				<div class="name-field">
					<input name="LNAME" type="text" required value="" placeholder="Last Name*" id="mce-LNAME" />
					<small class="error">Last Name is required</small>
				</div>
				<div class="email-field">
					<input name="EMAIL" type="email" required value="" placeholder="Email Address*" id="mce-EMAIL" />
					<small class="error">Email is required and must be valid</small>
				</div>
				<input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe">
				<div style="position: absolute; left: -5000px;"><input type="text" name="b_9b1519964314255f378990afb_11f22c8004" tabindex="-1" value="">
				</div>
			</form>
			</div>
				<div id="mce-responses" style="margin-top: 10px;">
					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!-- NEW MAILCHIMP FORM -->
</div>
</div>

<div class="grid-4 padding-f blog-feed">
<h4>Recent Blog Post</h4>

<!-- DELETE THE HTML BELOW WHEN THE SITE GOES LIVE & UNCOMMENT THE RSS PHP CODE -->

<div class="clearfix">
<p><strong><a href="#" class="title-link">Microsoft Does Cool Things To W10</a></strong>
<span>With the official announcement of Windows 10 and a bunch of new products Microsoft is still worse than Apple. Last year Apple made...</span>
<a href="#" class="border">Read More</a>
</p>
</div>




<!-- BLOG POST CAN'T BE PULLED UNTIL THE SITE IS LIVE!! 
<?php
	$rss = new DOMDocument();
	$rss->load('http://www.gavinadvertising.com/in-the-hall/feed/');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			);
		array_push($feed, $item);
	}
	$limit = 5;
	for($x=0;$x<$limit;$x++) {
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		echo '<p><strong>'.$title.'</strong>';
		echo '<span>'.$description.'</span>';
		echo '<a href="'.$link.'" title="'.$title.'">Read More</a></p>';
	}
?> -->
</div>

<div class="grid-4 padding-f social">
<h4>Find Us on Social Media</h4>

<div class="social-media-icons-mobile">
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-linkedin"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>
</div>

</div>



</div><!-- END OF FOOTER WRAPPER -->
</footer>

<div class="second-footer">
<div class="wrap">
<p><span class="f-sec">328 W. Market St, York PA 17401</span><span class="delete-sec"> | </span><span class="f-sec">(717) 848-8155</span><span class="delete-sec"> | </span><span class="f-sec">&copy; <?php echo date('Y'); ?> Gavin&trade; Advertising. </span><span class="f-sec">All Rights Reserved</span><span class="delete-sec"> | </span><span class="f-sec"><a href="<?php echo $siteURL; ?>privacy-policy.php">Privacy Policy</a></span></p>
</div>
</div>








</body>
</html>











<!-- SCRIPTS **********************************************-->


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/jquery.lazylinepainter-1.5.1.min.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/jquery.waypoints.min.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/svgs.js"></script>
<script src="<?php echo $siteURL; ?>assets/owl/owl.carousel.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/scripts.js"></script>
<script src="<?php echo $siteURL; ?>assets/js/validate.js"></script>

 <script>
$().ready(function() {
$("#contactForm").validate();
});
</script>

<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
