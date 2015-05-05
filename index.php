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
			<h2>Welcome to downtown York City.</h2>
			<br />
			<h2>We&rsquo;re not new, we&rsquo;re fresh. <br />Like creative flirtation.</h2>
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
		<p class="fade-me">We take a different approach to being an advertising, marketing and public relations agency. We believe in truth in branding and driving action. We thrive on influencing behavior. Live to excite clients with inventive solutions. And always keep our eye on the prize: measurable outcomes.</p>
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
		<a href="#" class="button">View More Work</a>
</div>


<div id="what-we-do">
<h2>So Here's Exactly<span>What We Do</span></h2>
<hr />
</div>


<div id="what-we-do-container" class="wrap clearfix">

<div class="grid-6 padding home-ctas">
<h3>Market Strategy</h3>
<p>Shank sirloin andouille kevin. Capicola pork chop doner flank, brisket ham hock meatball pork belly jerky. Jowl bacon strip steak, t-bone tenderloin brisket spare ribs tongue pork belly ball tip. Pork chop pork belly meatball chuck venison alcatra. Short loin brisket turducken, hamburger meatloaf shankle doner ball tip. Venison corned beef alcatra meatloaf short loin. Turkey shankle pork, venison tail swine capicola.</p>
</div>

<div class="grid-6 padding home-ctas">
<h3>Public Relations</h3>
<p>Shank sirloin andouille kevin. Capicola pork chop doner flank, brisket ham hock meatball pork belly jerky. Jowl bacon strip steak, t-bone tenderloin brisket spare ribs tongue pork belly ball tip. Pork chop pork belly meatball chuck venison alcatra. Short loin brisket turducken, hamburger meatloaf shankle doner ball tip. Venison corned beef alcatra meatloaf short loin. Turkey shankle pork, venison tail swine capicola.</p>
</div>

<div class="grid-6 padding home-ctas">
<h3>Branding &amp; Design</h3>
<p>Shank sirloin andouille kevin. Capicola pork chop doner flank, brisket ham hock meatball pork belly jerky. Jowl bacon strip steak, t-bone tenderloin brisket spare ribs tongue pork belly ball tip. Pork chop pork belly meatball chuck venison alcatra. Short loin brisket turducken, hamburger meatloaf shankle doner ball tip. Venison corned beef alcatra meatloaf short loin. Turkey shankle pork, venison tail swine capicola.</p>
</div>

<div class="grid-6 padding home-ctas">
<h3>Digital</h3>
<p>Shank sirloin andouille kevin. Capicola pork chop doner flank, brisket ham hock meatball pork belly jerky. Jowl bacon strip steak, t-bone tenderloin brisket spare ribs tongue pork belly ball tip. Pork chop pork belly meatball chuck venison alcatra. Short loin brisket turducken, hamburger meatloaf shankle doner ball tip. Venison corned beef alcatra meatloaf short loin. Turkey shankle pork, venison tail swine capicola.</p>
</div>

</div><!-- End of what-we-do-container -->



<div id="who-we-work-with">
<h2>Our Expertise And<span>Who We Work With</span></h2>
<hr />
</div>


<div id="experts" class="wrap clearfix">

<div class="grid-6 padding home-ctas">
<h3>Brand Building</h3>
<p>Our brand development team implements a strong, unified strategy across all media platforms to deliver a consistent message that is true to our organizational mission and vision an will drive brand awareness among the most desired target audiences.</p>
</div>

<div class="grid-6 padding home-ctas">
<h3>Educational</h3>
<p>Our team works with PK-12 and post-secondary schools and systems, including public, independent, charter, college, university and career training schools. We help schools develop comprehensive marketing strategies designed to move an organization forward in an aggressively evolving educational environment where families have more choices.</p>
</div>

<div class="grid-6 padding home-ctas">
<h3>Healthcare</h3>
<p>Crafting a plan that connects with all audiences, from patients to referral sources to providers and donors, and having a sustainable communications model for care that builds your community, improves the health of those you serve and positions your brand as a market leader is what we focus on.</p>
</div>

<div class="grid-6 padding home-ctas">
<h3>Building Supply</h3>
<p>Manufacturers, distributors and home improvement retailers within the building supply industry is where our experience lies. We aim to establish and improve brand recognition, invigorate consumers and trade engagement and do what matters...drive sales.</p>
</div>

<div class="grid-6 padding home-ctas">
<h3>Consumer Packaged Goods</h3>
<p>Shank sirloin andouille kevin. Capicola pork chop doner flank, brisket ham hock meatball pork belly jerky. Jowl bacon strip steak, t-bone tenderloin brisket spare ribs tongue pork belly ball tip. Pork chop pork belly meatball chuck venison alcatra. Short loin brisket turducken, hamburger meatloaf shankle doner ball tip. Venison corned beef alcatra meatloaf short loin. Turkey shankle pork, venison tail swine capicola.</p>
</div>

<div class="grid-6 padding home-ctas">
<h3>CTA Here!</h3>
<p>Shank sirloin andouille kevin. Capicola pork chop doner flank, brisket ham hock meatball pork belly jerky. Jowl bacon strip steak, t-bone tenderloin brisket spare ribs tongue pork belly ball tip. Pork chop pork belly meatball chuck venison alcatra. Short loin brisket turducken, hamburger meatloaf shankle doner ball tip. Venison corned beef alcatra meatloaf short loin. Turkey shankle pork, venison tail swine capicola.</p>
</div>

</div><!-- End of experts -->



<div id="lets-connect">
<h2>Ready for the next step?<span>Let's Connect!</span></h2>
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
<p>gavin@gavinadv.com</p>

<div id="g-work">
		<div id="abox"></div>
		<a href="#" class="button">Work With Gavin</a>
</div>
</div>
</div>


</div><!-- End of lets-connect -->






	<?php include('includes/footer.php'); ?>
</body>
</html>