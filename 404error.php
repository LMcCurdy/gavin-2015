<?php
// Define variables for SEO
$pageTitle = 'Whoops Something Went Wrong'; // Title of page //
$pageDescription = ''; // Title of page //
$pageCanonical = 'http://www.gavinadvertising.com/404error.php';
// If we don't want the search engines to see our website just yet
//$pageRobots = 'noindex,nofollow';
include('includes/header.php') // Include header file //
?>
<body class="landing <?php echo $deviceType ?>">
	<?php include('includes/nav.php'); ?>
	
<div id="introduction" class="intro-no">
<h1><span>Uh Oh!</span>Something Must Be Broken</h1>
<hr />
<p class="fade-me">The page you are looking for no longer exists! If this page was important<br/>please contact us immediately!</p>
</div>


<div class="thanks-social wrap">
			<a target="_social" href="//twitter.com/gavinadv"><i class="fa fa-twitter"></i></a>
			<a target="_social" href="//www.facebook.com/GavinAdvertising" ><i class="fa fa-facebook"></i></a>
			<a target="_social" href="//www.linkedin.com/company/gavin-advertising"><i class="fa fa-linkedin"></i></a>
			<a target="_social" href="//plus.google.com/+GavinAdvertisingYork/posts"><i class="fa fa-google-plus"></i></a>
			<a target="_social" href="#"><i class="fa fa-comments-o"></i></a>
			<a target="_social" href="//www.pinterest.com/gavinadv/"><i class="fa fa-pinterest-p"></i></a>
			<a target="_social" href="//instagram.com/gavinadvertising"><i class="fa fa-instagram"></i></a>
</div>

<div class="tall-social">

<div class="facebook-t">
<a target="_social" href="//www.facebook.com/GavinAdvertising" ><i class="fa fa-facebook"></i></a>
</div>


<div class="blog-t">
<a target="_social" href="#"><i class="fa fa-comments-o"></i></a>
</div>

<div class="twitter-t">
<a target="_social" href="//twitter.com/gavinadv"><i class="fa fa-twitter"></i></a>
</div>


<div class="ig-t">
<a target="_social" href="//instagram.com/gavinadvertising"><i class="fa fa-instagram"></i></a>
</div>


</div>





	<?php include('includes/footer.php'); ?>
</body>
</html>