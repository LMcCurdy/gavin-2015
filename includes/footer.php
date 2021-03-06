<footer>
	<div class="clearfix">
		<div class="grid-4 logo-foot">
			<p class="f-gav"><em>Gavin</em><sup>&trade;</sup> <span>Advertising</span></p>
	
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
						<input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" />
						<div style="position: absolute; left: -5000px;"><input type="text" name="b_9b1519964314255f378990afb_11f22c8004" tabindex="-1" value="" /></div>
					</div>
				</form>
			</div>
			<div id="mce-responses" style="margin-top: 10px;">
				<div class="response" id="mce-error-response" style="display: none"></div>
				<div class="response" id="mce-success-response" style="display: none"></div>
			</div>
			<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
			<script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
			<!-- NEW MAILCHIMP FORM -->
		</div>

		<div class="grid-4 padding-f blog-feed">
			<h4>Recent Blog Post</h4>
		<?php
			$rss = new DOMDocument();
			$rss->load("http://www.gavinadvertising.com/orangejuice/feed");
			$feed = array();
			foreach ($rss->getElementsByTagName('item') as $node) {
				$item = array ( 
					'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
					'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
					'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
					);
				array_push($feed, $item);
			}
			$limit = 1;
			for($x=0;$x<$limit;$x++) {
				$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
				$link = $feed[$x]['link'];
				$description = $feed[$x]['desc'];
				echo '<div class="clearfix"><p><strong><a href="'.$link.'" class="title-link">'.$title.'</a></strong>';
				echo '<span>'.$description.'</span>';
				echo '<a href="'.$link.'" title="'.$title.'" class="border">Read More</a></p></div>';
			}
		?> 
		</div>

		<div class="grid-4 padding-f social">
			<h4>Find Us on Social Media</h4>
			<div class="social-media-icons-mobile clearfix">
				<a target="_social" href="//twitter.com/gavinadv"><i class="fa fa-twitter"></i></a>
				<a target="_social" href="//www.facebook.com/GavinAdvertising" ><i class="fa fa-facebook"></i></a>
				<a target="_social" href="//www.linkedin.com/company/gavin-advertising"><i class="fa fa-linkedin"></i></a>
				<a target="_social" href="//www.youtube.com/user/GavinAdvertising/"><i class="fa fa-youtube"></i></a>
				<a target="_social" href="/orangejuice/"><i class="fa fa-comments-o"></i></a>
				<a target="_social" href="//www.pinterest.com/gavinadv/"><i class="fa fa-pinterest-p"></i></a>
				<a target="_social" href="//instagram.com/gavinadvertising"><i class="fa fa-instagram"></i></a>
			</div>
			<h4>Want To Join The Team?</h4>
			<p><strong><a class="footer-link" href="http://gavinadvertising.com/orangejuice/category/careers">View our job openings</a></strong></p>
			
		</div>
	</div><!-- END OF FOOTER WRAPPER -->
</footer>

<div class="second-footer">
	<div class="wrap">
		<p><span class="f-sec">328 W. Market St, York, PA 17401</span><span class="delete-sec"> | </span><span class="f-sec">(717) 848-8155</span><span class="delete-sec"> | </span><span class="f-sec">&copy; <?php echo date('Y'); ?> Gavin&trade; Advertising. </span><span class="f-sec">All Rights Reserved</span><span class="delete-sec"> | </span><span class="f-sec"><a href="/privacy-policy.php">Privacy Policy</a></span></p>
	</div>
</div>

<!-- SCRIPTS **********************************************-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="/assets/js/jquery.lazylinepainter-1.5.1.min.js"></script>
<script src="/assets/js/jquery.waypoints.min.js"></script>
<script src="/assets/js/svgs.js"></script>
<script src="/assets/owl/owl.carousel.js"></script>
<script src="/assets/js/scripts.js"></script>
<script src="/assets/js/validate.js"></script>

<!-- Add mousewheel plugin (this is optional) 
<script type="text/javascript" src="/assets/js/lib/jquery.mousewheel-3.0.6.pack.js"></script>-->

<!-- Add fancyBox -->
<link rel="stylesheet" href="/assets/js/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/assets/js/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/assets/js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="/assets/js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="/assets/js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/assets/js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="/assets/js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script>
	$().ready(function() {
		$("#contactForm").validate();
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
		$('.fancybox-media').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',
		helpers : {
			media : {}
		}
	});

		$(".west").fancybox({
    afterLoad: function() {
        this.title = '<a href="http://undergroundwestchef.com">Visit</a> ' + this.title;
    },
    helpers : {
        title: {
            type: 'inside'
        }
    }
});
				$(".marv").fancybox({
    afterLoad: function() {
        this.title = '<a href="http://avimarvin.com">Visit</a> ' + this.title;
    },
    helpers : {
        title: {
            type: 'inside'
        }
    }
});
$(".kim").fancybox({
    afterLoad: function() {
        this.title = '<a href="http://kimmans.com">Visit</a> ' + this.title;
    },
    helpers : {
        title: {
            type: 'inside'
        }
    }
});
$(".ycea-site").fancybox({
    afterLoad: function() {
        this.title = '<a href="http://ycea-pa.org">Visit</a> ' + this.title;
    },
    helpers : {
        title: {
            type: 'inside'
        }
    }
});
	});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-25772488-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
