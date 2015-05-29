<?php
// Define variables for SEO
$pageTitle = 'I Love York, PA | Gavin Advertising'; // Title of page //
$pageDescription = 'Learn why we love York, PA & why we are dedicated to helping local businesses revitalize the nation\'s first capital by providing effective marketing solutions.'; // Title of page //
$pageCanonical = 'http://www.gavinadvertising.com/i-love-york-city.php';
// If we don't want the search engines to see our website just yet
//$pageRobots = 'noindex,nofollow';
include('includes/header.php') // Include header file //
?>
<body class="landing <?php echo $deviceType ?>">
	<?php include('includes/nav.php'); ?>
	<div id="video">
		<a href="#" class="pause"><i class="fa fa-stop"></i></a>
		<!--<div class="grid-12">
			<h2>Creative solutions for a changing media market.</h2>
			<br />
			<h2>How it should be.</h2>
		</div>-->
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

	<div id="driving-action" class="yorkcity clearfix">
		<h1 class="fade-me">All You Have To Say Is<span>#ILoveYorkCity</span></h1>
		<hr class="fade-me" />
		<p class="fade-me">Like many small businesses in York County we all share the same opinion, we love it! This city aspires to be great every single day with its rich culture, endless amounts of love, support and most importantly family. With a population of almost 50,000 York is quickly becoming a place anyone from anywhere will always remember.</p>

</div>

<div class="circle yc-circle"><i class="fa fa-angle-double-down"></i></div>


<div class="grid-4 york1"></div>
<div class="grid-8 york2"></div>
<div class="clearfix"></div>

<div class="grid-4 york3"></div>
<div class="grid-4 york4"></div>
<div class="grid-4 york5"></div>
<div class="clearfix"></div>

<div class="york6"></div>

	<div class="promo">
	<div id="more-work">
		<div id="ll-button-work"></div>
		<a href="http://www.twitter.com/iloveyorkcity" target="_blank" class="button">@iloveyorkcity</a>
</div>

	</div>

	<?php include('includes/footer.php'); ?>
</body>
</html>