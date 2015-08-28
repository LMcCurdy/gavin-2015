<?php
// Define variables for SEO
$pageTitle = 'About Us | Gavin Advertising'; // Title of page //
$pageDescription = 'Gavin Advertising intends to put York City on the creativity map with new thinking the best-of-the-best talent & game-changing brands.'; // Title of page //
$pageCanonical = 'http://www.gavinadvertising.com/about-gavin-advertising.php';
// If we don't want the search engines to see our website just yet
//$pageRobots = 'noindex,nofollow';
include('includes/header.php') // Include header file //
?>
<body class="landing <?php echo $deviceType ?>">
	<?php include('includes/nav.php'); ?>
	
<div id="introduction" class="intro-no">
<h1><span>Gavin Advertising</span>History and Home</h1>
<hr />
<p class="fade-me">Welcome to Downtown York City.<br />We’re not new, we’re fresh. Like creative flirtation.</p>
</div>


<div class="two-halves clearfix">

<div class="grid-6 fish-bowl">
</div>


<div class="grid-6">
<div class="small-wrap-right">
<p class="piggly-wiggly">In 1901, 328 W. Market St. was the H. Westley Furniture Company. In 1953, it merged into the John A. Waltersdorf Building. In the '90s it was a sewing machine repair shop and an antique store. Today,
<span>it’s home.</span></p>


</div>
</div>

</div>


<div class="meeting-room"></div>


<div class="clearfix">
<div class="grid-4">
<div class="small-wrap-left">
<p class="piggly-wiggly"><span>Part of Gavin's approach is tied closely to being connected to spaces that are alive with creativity and diversity.</span><br />It is what inspires us to think beyond the expected. Surround yourself with opportunities to be engaged and see what happens. This is why we are proudly located in Downtown York.</p>
</div>
</div>


<div class="grid-8 gavin-g">

</div>

</div>



<div class="clearfix">

<div class="grid-8 g-img">
<img src="assets/img/gavin-office-2-floor.jpg">
</div>

<div class="grid-4 g-img">
<img src="assets/img/gavin-front-desk.jpg">
</div>

</div>


<div class="all-over">
<p class="fade-me"><span>We work with clients all over the world.</span><br />You can find our clients from Maine to Georgia and as far away as Holland, but York is home base for us. We intend to put this town on the creativity map, with new thinking and a team that attracts the best talent and game-changing brands.</p><p class="fade-me">
Little city. Big idea people. Main Street is going to give Madison Avenue a
run for its money.</p>
</div>

<div class="baby-blue">
<a href="<?php echo $siteURL; ?>i-love-york-city.php">Why We Chose York</a>
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

</div>



<div class="pink-floyd-the-wall fade-me">
<div>
<p><span>Join Gavin In</span>Our Next Chapter</p>
<hr />
<a class="button" href="<?php echo $siteURL; ?>work-with-us.php">Let’s Get Started</a>
</div>
</div>



	<?php include('includes/footer.php'); ?>
</body>
</html>