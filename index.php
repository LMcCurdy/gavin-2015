<?php include('includes/header.php'); ?>
<body class="landing <?php echo $deviceType ?>">
	<header class="clearfix">
		<div id="topnav" class="grid-12">
			<a href="#" class="button">Work with Gavin</a>
			<a target="_social" href="//twitter.com/gavinadv"><i class="fa fa-twitter"></i></a>
			<a target="_social" href="//www.facebook.com/GavinAdvertising" ><i class="fa fa-facebook"></i></a>
			<a target="_social" href="//www.linkedin.com/company/gavin-advertising"><i class="fa fa-linkedin"></i></a>
			<a target="_social" href="//plus.google.com/+GavinAdvertisingYork/posts"><i class="fa fa-google-plus"></i></a>
			<a target="_social" href="#"><i class="fa fa-comments-o"></i></a>
			<a target="_social" href="//www.pinterest.com/gavinadv/"><i class="fa fa-pinterest-p"></i></a>
			<a target="_social" href="//instagram.com/gavinadvertising"><i class="fa fa-instagram"></i></a>
		</div>
		<h1 class="grid-6"><em>Gavin</em><sup>&trade;</sup> Advertising</h1>	
		<nav class="grid-6">
			<ul>
				<li><a href="#"><span>Our</span> Work</a></li>
				<li><a href="#">Approach</a></li>
				<li><a href="#"><span>The</span> Team</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
	</header>
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
		<a href="#"><div id="martins"><div><hr /><p>Martin’s</p></div></div></a>
		<a href="#"><div id="trespa"><div><hr /><p>Trespa</p><span>Brand building influence.</span></div></div></a>
		<a href="#"><div id="kimmans"><div><hr /><p>Kimman’s</p></div></div></a>
		<a href="#"><div class="block"><div><hr /><p>Cindy</div></div></a>
		<a href="#"><div class="block"><div><hr /><p>Jan</div></div></a>
		<a href="#"><div class="block"><div><hr /><p>Marsha</div></div></a>
		<a href="#"><div class="block"><div><hr /><p>Bobby</div></div></a>
		<a href="#"><div class="block"><div><hr /><p>Peter</div></div></a>
		<a href="#"><div class="block"><div><hr /><p>Greg</div></div></a>
	</div>
	<?php include('includes/footer.php'); ?>
</body>
</html>