<?php
// Define variables for SEO
$pageTitle = 'Gavin Advertising | Devoted to Truth in Branding'; // Title of page //
$pageDescription = 'Gavin Advertising, a full service award-winning advertising, marketing and public relations agency that is devoted to truth in branding and driving action.'; // Title of page //
$pageCanonical = 'http://www.gavinadvertising.com/';
// If we don't want the search engines to see our website just yet
//$pageRobots = 'noindex,nofollow';
include('includes/header.php') // Include header file //
?>
<body class="landing <?php echo $deviceType ?>">
	<?php include('includes/nav.php'); ?>
	<div id="video">
		<a href="#" class="pause"><i class="fa fa-stop"></i></a>
		<div class="grid-12">
			<h2>Creative solutions for a changing media market.</h2>
			<br />
			<h2>How it should be.</h2>
		</div>
		<img src="assets/img/vid-rep.jpg" class="vid-replace" alt="Gavin Advertising">
		<video autoplay loop width="100%" height="auto">
			<!-- .mp4 file for native playback in IE9+, Firefox, Chrome, Safari and most mobile browsers -->
			<source src="assets/video/home-live.mp4" type="video/mp4" />
			<source src="assets/video/home-live.webm" type="video/webm" />
			<!-- flash fallback for IE6, IE7, IE8 and Opera -->
			<object type="application/x-shockwave-flash"
					data="assets/video/swf/flowplayer-3.2.18.swf" 
					width="100%" height="auto">
				<param name="movie" value="assets/video/swf/flowplayer-3.2.18.swf" />
				<param name="allowFullScreen" value="true" />
				<param name="wmode" value="transparent" />
				<!-- note the encoded path to the image and video files, relative to the .swf! -->
				<!-- %2F = slash -->
				<param name="flashVars"
					   value="config={'playlist':['..%2Fplaceholder.png',
									 {'url':'..%2Fhome-live.mp4','autoPlay':true}]}" />
				<!-- fallback image if flash fails -->
				<img src="assets/video/placeholder.png" width="100%" height="auto" title="No Flash found" alt="" />
			</object>
		</video>

	</div>
	<div id="driving-action" class="grid-12">
		<div class="halfcircle"></div>
		<div class="circle"><i class="fa fa-angle-double-down"></i></div>
		<h2 class="fade-me">We&rsquo;re devoted to truth in branding <span>and driving action</span></h2>
		<hr class="fade-me" />
		<p class="fade-me">We take a different approach to being an advertising, public relations and digital marketing agency. We thrive on influencing behavior in a complex media market with authentic messaging and strong calls to action. We live to excite clients with inventive solutions and measurable outcomes.</p>
		<div id="ll-button"></div>
		<a href="<?php echo $siteURL; ?>our-approach.php" class="button">Here&rsquo;s how we do it</a>
<!-- 
		<div style="clear: left; margin-top: 10px;">	
<!~~ 
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width: 356px; height: 84px;">
			  <rect id="path" fill="none" x="2px" y="2px" width="352px" height="80px" fill="none" stroke="#888182" />
			  <!~~ <path id="path" fill="none" x="2px" y="2px" width="352px" height="80px" fill="none" stroke="#888182" stroke-width="2" d="M2 2 H 352 V 80 H 2 L 2 2"/> ~~>
			</svg>
 ~~>
		</div>
 -->
	</div>
	
	<div id="blocks" class="clearfix">
		<a href="<?php echo $siteURL; ?>our-work/martins.php"><div id="martins"><div><hr /><p>Martin’s <br/>Potato Rolls</p><span>All That and a Bag of Rolls</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/trespa-international.php"><div id="trespa"><div><hr /><p>Trespa <br/>North America</p><span>Strategic Sales and Marketing</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/true-north-wellness.php"><div id="truenorth"><div><hr /><p>TrueNorth Wellness Services</p><span>Branding for Health Care Consumerism</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/glatfelter-insurance-group.php"><div id="gig"><div><hr /><p>Glatfelter Insurance Group</p><span>Making Complex Simple</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/adams-county-national-bank.php"><div id="acnb"><div><hr /><p>ACNB Bank</p><span>More than Transactions</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/know-your-windows.php"><div id="kyw"><div><hr /><p>AVI Marvin</p><span>Drive Traffic. Get Leads.</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/mini-of-baltimore.php"><div id="mini"><div><hr /><p>MINI of Baltimore</p><span>More Bite in Their Bark</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/york-technical-institute.php"><div id="yti"><div><hr /><p>YTI Career Institute</p><span>Too Many Hits to Shake a Diploma At</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/peoplesbank.php"><div id="peoplesbank"><div><hr /><p>PeoplesBank</p><span>Paying it Forward</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/lebo-skin-care.php"><div id="lebo-skin"><div><hr /><p>Lèbo Skin Care Center</p><span>Love your skin with Lèbo</span></div></div></a>
		<a href="<?php echo $siteURL; ?>our-work/york-county-economic-alliance.php"><div id="ycea-case"><div><hr /><p>YCEA</p><span>York County Economic Alliance</span></div></div></a>

	</div>


<div id="more-work">
		<div id="ll-button-work"></div>
		<a href="<?php echo $siteURL; ?>orangejuice/category/awards" class="button">View Our Awards</a>
</div>


<div id="what-we-do">
<h2>So Here’s Exactly<span>What We Do</span></h2>
<hr />
</div>


<div id="what-we-do-container" class="wrap clearfix">

<div class="grid-6 padding home-ctas">
<div id="target-draw" class="draw-icon-home">
<div id="target"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>our-work/index.php#marketing">Market Strategy</a></h3>
<p>We investigate market opportunities for growth and expansion. From focus groups to secondary research and team-building activities, our team crafts effective messaging platforms with complete implementation plans.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="megaphone-draw" class="draw-icon-home">
<div id="megaphone"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>our-work/index.php#pr">Public Relations</a></h3>
<p>We build influence. With more than $10,000,000 in media equivalency value for our clients, our team is the go-to for brands looking to build trust through strategically consistent exposure across every media channel imaginable. </p>
</div>

<div class="grid-6 padding home-ctas">
<div id="pen-draw" class="draw-icon-home">
<div id="pen"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>our-work/index.php#branding">Branding &amp; Design</a></h3>
<p>In building brands from the ground up and creating an authentic brand experience, our design is more than just pretty — we craft creative that drives action.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="computer-draw" class="draw-icon-home">
<div id="computer"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>our-work/index.php#digital">Digital</a></h3>
<p>Living digital is how we approach your brand’s online presence. We know digital media consumption is changing at rapid pace, so we design for emerging trends in media consumption.</p>
</div>

</div><!-- End of what-we-do-container -->



<div id="who-we-work-with">
<h2>Our Expertise And<span>Who We Work With</span></h2>
<hr />
</div>


<div id="experts" class="wrap clearfix">

<div class="grid-6 padding home-ctas">
<div id="light-bulb-draw" class="draw-icon-home">
<div id="light-bulb"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>expertise.php#brands">Brand Building</a></h3>
<p>We build brands with a comprehensive strategy to take your idea or product to target audiences. Beyond consumers, we think about investors, competition, future influences and market value.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="book-draw" class="draw-icon-home">
<div id="book"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>expertise.php#edu">Education</a></h3>
<p>Educational options are wide ranging. Using public relations, messaging and targeted approaches, we move your organization forward in an aggressively evolving educational environment.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="doctor-draw" class="draw-icon-home">
<div id="doctor"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>expertise.php#health">Health Care</a></h3>
<p>From patients and referral sources to providers and donors, we work to engage your community, improve the health of those you serve and position your brand as a market leader.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="hammer-draw" class="draw-icon-home">
<div id="hammer"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>expertise.php#building">Building Supply</a></h3>
<p>It’s a complex supply channel, and we know all your segments by heart. Our team builds a plan for the realities of how your target audience consumes content and makes decisions, from the job site to the trade show.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="box-draw" class="draw-icon-home">
<div id="box"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>expertise.php#cpg">Consumer Packaged Goods</a></h3>
<p>Get it in the cart. Whether it’s the grocery cart or the digital shopping cart, we know CPG. We build engaging digital and brick-and-mortar approaches that drive sales.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="paper-draw" class="draw-icon-home">
<div id="paper"></div>
</div>
<h3><a href="<?php echo $siteURL; ?>work-with-us.php">Work With Us!<a></h3>
<p>We work to pinpoint our client’s difference and then amplify it with exceptional, well-thought-out creative that drives action.</p>
</div>

</div><!-- End of experts -->



<div id="lets-connect">
<h2>Ready for the next step?<span>Let’s Connect!</span></h2>
<hr />
</div>

<div class="contact-home clearfix">

<div class="grid-6">
<div class="videoWrapper">
<iframe src="https://mapsengine.google.com/map/u/0/embed?mid=z8r2UX_SSKu8.k0UKYJNb_irs" width="640" height="480"></iframe>
</div>
</div>

<div class="grid-6 footer-contact">
<div class="contact-gavin">
<p><a href="https://www.google.com/maps?daddr=328+West+Market+Street+York+PA+17401" target="_blank">328 W. Market St.<br />York PA 17401</a></p>
<p>O: (717) 848-8155</p>
<p><a href="mailto:gavin@gavinadv.com">gavin@gavinadv.com</a></p>

<div id="g-work">
		<div id="abox" class="abox"></div>
		<a href="<?php echo $siteURL; ?>work-with-us.php" class="button">Work With Gavin</a>
</div>
</div>
</div>


</div><!-- End of lets-connect -->






	<?php include('includes/footer.php'); ?>
</body>
</html>