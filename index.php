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
		<video autoplay loop poster="assets/video/placeholder.png" width="100%" height="auto">
			<!-- .mp4 file for native playback in IE9+, Firefox, Chrome, Safari and most mobile browsers -->
			<source src="assets/video/placeholder.mp4" type="video/mp4" />
			<source src="assets/video/placeholder.webmhd.webm" type="video/webm" />
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
									 {'url':'..%2Fplaceholder.mp4','autoPlay':true}]}" />
				<!-- fallback image if flash fails -->
				<img src="assets/video/placeholder.png" width="100%" height="auto" title="No Flash found" alt="" />
			</object>
		</video>			
	</div>
	<div id="driving-action" class="grid-12">
		<div class="halfcircle"></div>
		<div class="circle"><i class="fa fa-angle-double-down"></i></div>
		<h2 class="fade-me">We&rsquo;re devoted to truth in branding <span>and driving action.</span></h2>
		<hr class="fade-me" />
		<p class="fade-me">We take a different approach to being an advertising, public relations and digital marketing agency. We believe in truth in branding and driving action. We thrive on influencing behavior in a complex media market with authentic messaging and strong calls to action. We live to excite clients with inventive solutions by always keeping our eye on the prize: measurable outcomes.</p>
		<div id="ll-button"></div>
		<a href="#" class="button">Here&rsquo;s how we do it</a>
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
		<a href="#"><div id="martins"><div><hr /><p>Martin’s</p><span>All that and a bag of rolls</span></div></div></a>
		<a href="#"><div id="trespa"><div><hr /><p>Trespa</p><span>Strategic Sales and Marketing</span></div></div></a>
		<a href="#"><div id="truenorth"><div><hr /><p>True North Wellness</p><span>Branding for Healthcare Consumerism</span></div></div></a>
		<a href="#"><div id="gig"><div><hr /><p>Glatfelter Insurance Group</p><span>Making complex simple</span></div></div></a>
		<a href="#"><div id="acnb"><div><hr /><p>ACNB</p><span>More than transactions</span></div></div></a>
		<a href="#"><div id="kyw"><div><hr /><p>Know Your Windows</p><span>Drive traffic. Get leads.</span></div></div></a>
		<a href="#"><div id="mini"><div><hr /><p>MINI</p><span>More bite in the bark</span></div></div></a>
		<a href="#"><div id="yti"><div><hr /><p>York Technical Institute</p><span>Too many hits to shake a diploma at</span></div></div></a>
		<a href="#"><div id="peoplesbank"><div><hr /><p>PeoplesBank</p><span>Paying it Forward</span></div></div></a>
	</div>


<div id="more-work">
		<div id="ll-button-work"></div>
		<a href="gavin-awards.php" class="button">View Our Awards</a>
</div>


<div id="what-we-do">
<h2>So Here's Exactly<span>What We Do</span></h2>
<hr />
</div>


<div id="what-we-do-container" class="wrap clearfix">

<div class="grid-6 padding home-ctas">
<div id="target-draw" class="draw-icon-home">
<div id="target"></div>
</div>
<h3>Market Strategy</h3>
<p>We investigate market opportunities for growth and expansion. From focus groups to secondary research and team-building activities, our team crafts effective messaging platforms with complete implementation plans.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="megaphone-draw" class="draw-icon-home">
<div id="megaphone"></div>
</div>
<h3>Public Relations</h3>
<p>We build influence. With more than $10,000,000 in media equivalency value for our clients, our team is the go-to for brands looking to build trust through strategically consistent exposure across every media channel imaginable. </p>
</div>

<div class="grid-6 padding home-ctas">
<div id="pen-draw" class="draw-icon-home">
<div id="pen"></div>
</div>
<h3>Branding &amp; Design</h3>
<p>In building brands from the ground up and creating an authentic brand experience, our design is more than just pretty — we craft creative that drives action.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="computer-draw" class="draw-icon-home">
<div id="computer"></div>
</div>
<h3>Digital</h3>
<p>Living digital is how we approach your brand’s online presence. We know digital media consumption is changing at a rapid pace, and our team designs around the user’s experience.</p>
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
<h3>Brand Building</h3>
<p>We build brands with a comprehensive strategy to take your idea or product to target audiences. Beyond consumers, we think about investors, competition, future influences and market value.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="book-draw" class="draw-icon-home">
<div id="book"></div>
</div>
<h3>Educational</h3>
<p>Educational options are wide ranging. Using public relations, messaging and targeted approaches, we move your organization forward in an aggressively evolving educational environment.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="doctor-draw" class="draw-icon-home">
<div id="doctor"></div>
</div>
<h3>Healthcare</h3>
<p>From patients and referral sources to providers and donors, we work to engage your community, improve the health of those you serve and position your brand as a market leader.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="hammer-draw" class="draw-icon-home">
<div id="hammer"></div>
</div>
<h3>Building Supply</h3>
<p>It’s a complex supply channel, and we know all your segments by heart. Our team builds a plan for the realities of how your target audience consumes content and makes decisions, from the job site to the trade show.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="box-draw" class="draw-icon-home">
<div id="box"></div>
</div>
<h3>Consumer Packaged Goods</h3>
<p>Get it in the cart. Whether it’s the grocery cart or the digital shopping cart, we know CPG. We build engaging digital and brick-and-mortar approaches that drive sales.</p>
</div>

<div class="grid-6 padding home-ctas">
<div id="paper-draw" class="draw-icon-home">
<div id="paper"></div>
</div>
<h3>Work With Us!</h3>
<p>We thrive on influencing behavior. Live to excite clients with inventive solutions. And always keep our eye on the prize: measurable outcomes. We work to pinpoint our client’s exception difference and then amplify it with exceptional, well-thought-out creative that drives action.</p>
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
<p>328 W. Market St.<br />York PA 17401</p>
<p>O: (717) 848-8155<br />F: (717) 855-2292</p>
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